<?php

namespace App\Http\Controllers\terminal;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Mail;
use Exception;
use App\model\terminal\coupon;
use App\model\terminal\order;
use App\model\terminal\pro;
use App\model\terminal\backme;
use App\model\terminal\inv;
use App\model\setting;

use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
use Log;
use SLS;
use Excel;

class OrderController extends WebController
{
    public $perpage = 20;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user; //protected 是保護的變數,意思是這變數只能在這個 class使用
    public function __construct(Request $request)
    {
        //驚嘆號是否定判斷的意思
        if(!$request->session()->has('key')){
            return redirect('login')->send();
        } else {
            $this->user = $request->session()->get('key');
        }
        if($this->user->terminal == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
        DB::enableQueryLog();
    }

    /**
     * orders.
     */
    public function Orders(Request $request,$id){
        $order = DB::table('terminal_pro_order')->leftJoin('terminalorder', 'terminalorder.id', '=', 'terminal_pro_order.order_id')->where('terminal_pro_order.pro_id',$id)->get();
        return view('terminal.backend.orders',compact('order'));
    }
    public function OrderEdit(Request $request,$id){
        $order = collect();
        if(is_numeric($id) && $id>0){
            if(order::where('id',$id)->count()>0){
                $order = order::select('id','name','tel','email','sn','meat','notes','pay_type','pay_status','manage','result','pople','vegetarian','edit_type','money','plan','refund','cut','handling','num_f','num_b','num_t')->find($id);
            } else {
                abort(404);
            }
        }
        $train = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>0")->where('ticket_type','train')
                ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day,day_parts"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        $flight = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>0")->where('ticket_type','flight')
                ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day,day_parts"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        $boat = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>0")->where('ticket_type','boat')
                ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day,day_parts"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        return view('terminal.backend.order',compact('order','train','flight','boat'));
    }
    public function OrderUpdate(Request $request,$id){

        $data = [
            'pay_status' => $request->pay_status,
            'manage'     => $request->manage,
            'pay_type'   => $request->pay_type,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'name'       => $request->name,
            'vegetarian' => $request->vegetarian,
            'pople'      => $request->people,
        ];
        $order = order::find($id);
        if(
            ($request->has('boat-store') && $request['boat-store'] ==1 && $request->has('boat') && $request->boat>0) ||
            ($request->has('train-store') && $request['train-store'] ==1 && $request->has('train') && $request->train>0) ||
            ($request->has('flight-store') && $request['flight-store'] ==1 && $request->has('flight') && $request->flight>0)
        ){
            // $data['pro_id'] = $request->pro_id;
            $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 更改場次";
            // 觸發補寄
            try {
                if($request->has('train-store') && $request->has('train-id') && $request->has('train') && $request['train-store'] ==1){
                    DB::table('terminal_pro_order')->where('id',$request['train-id'])->update(['pro_id'=>$request->train]);
                }
                if($request->has('flight-store') && $request->has('flight-id') && $request->has('flight') && $request['flight-store'] ==1){
                    DB::table('terminal_pro_order')->where('id',$request['flight-id'])->update(['pro_id'=>$request->flight]);
                }
                if($request->has('boat-store') && $request->has('boat-id') && $request->has('boat') && $request['boat-store'] ==1){
                    DB::table('terminal_pro_order')->where('id',$request['boat-id'])->update(['pro_id'=>$request->boat]);
                }
                $mailer = [
                    'pople' => $request->people,
                    'email' => $order->email,
                    'name'  => $order->name,
                    'phone' => $order->tel,
                    'id'    => $order->id,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'pre_mail' => true,
                    'template' => $order->plan,
                ];
                $this->SendOrderEmailByTemplateName($mailer);
            } catch (Exception $e){
                Log::error($e);
            }
        }
        // 自條數量
        if($request->has('num_f')) $data['num_f'] = $request->num_f;
        if($request->has('num_t')) $data['num_t'] = $request->num_t;
        if($request->has('num_b')) $data['num_b'] = $request->num_b;
        if(is_numeric($id) && $id>0){
            if($request->pay_type == '後台編輯' || $request->pay_type == '現場購票'){
                $data['edit_type'] = $request->edit_type;
                $data['money'] =  $request->money;
            }
            if($request->pay_status == '已付款(部分退款)'){
                $data['money'] =  $request->money;
            }
            if(isset($data['money']) && $order->money != $data['money']){
                $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 調整金額{$order->money}->{$data['money']}";
            }
            if($order->pople != $data['pople']){
                $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 調整人數{$order->pople}->{$data['pople']}";
            }
            // 退款 & 手續費 & 退票人數
            if($request->has('handling') && $request->has('cut') && $request->has('refund')){
                $data['handling'] = $request->handling;
                $data['cut']      = $request->cut;
                $data['refund']   = $request->refund;
                $handling_fee = round($data['handling']*$data['refund']/100);
                if($order->cut != $data['cut'] || $order->refund != $data['refund'] || $order->handling != $data['handling']){
                    $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 取消 {$data['cut']} 人，\n退款{$data['refund']}，手續費{$data['handling']}%金額{$handling_fee}";
                }
            }
            order::where('id',$id)->update($data);
        } 
        return redirect('/terminal/print?'.$request->qxx)->with('message','編輯完成!');
        /*
        if($request->has('qxx') && $request->qxx != ''){
            return redirect('/terminal/print?'.$request->qxx)->with('message','編輯完成!');
        } else {
            return redirect('/terminal/orders/'.$order->pro_id)->with('message','編輯完成!');
        }
        */
    }
    public function OrderDelete(Request $request,$id){
        $order = order::select('sn')->find($id);
        if($order){
            coupon::where('o_id',$order->sn)->update(['o_id'=>-1]);
            DB::table('terminal_pro_order')->where('order_id',$id)->delete();
        }
        order::where('id',$id)->delete();
        return Response::json(['message'=> '訂單已刪除'], 200);
    }

    
    public function Appointment(Request $request,$pro_id){
        try {
            $pro = pro::find($pro_id);
            $train = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>0")->where('ticket_type','train')
                ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day,day_parts"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
            $flight = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>0")->where('ticket_type','flight')
                ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day,day_parts"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
            $boat = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>0")->where('ticket_type','boat')
                ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day,day_parts"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
            return view('terminal.backend.orderAppointment',compact('pro_id','pro','train','flight','boat'));
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/terminal/pros?')->with('message','此編號無座位表!');
        }
    }
    public function AppointmentUpdate(Request $request,$pro_id){
        try {
            $now = Carbon::now()->toDateString();
            $count = order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');
            $people = $request->people;
            if($count>0){
                $count += 1;
            } else {
                $count = '1'.Carbon::now()->format('Ymd').'0001';
            }
            if(is_numeric($pro_id) && $pro_id>0){
                $act = pro::where('id',$pro_id)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','special','ticket_type')->first();
                $boat = $train = $flight = $pro_id;
            } else {
                $act = (object)[
                    'special' => 0,
                    'cash' => 10000,
                    'ticket_type' => $request->ticket_type,
                ];
                $boat   = $request->has('boat') ? $request->boat : 0;
                $train  = $request->has('train') ? $request->train : 0;
                $flight = $request->has('flight') ? $request->flight : 0;
            }
            $meat = [];
            $is_overseas = 0;
            if($act->special) {
                $is_overseas = 9;
                if($people!=1 && $people!=2 && $people!=6){
                    return redirect('/terminal/pros?')->with('message','新增失敗!特別場次請選擇 1、2、6符合票券人數');
                }
                $sp_money = json_decode(setting::where('slug','terminal_sp_money')->first()->json,true);
                if($people == 1){
                    $money = $sp_money[0]['money'];
                } elseif($people == 2){
                    $money = $sp_money[1]['money'];
                } else {
                    $money = $sp_money[2]['money'];
                }
            } else {
                $money = $act->cash * $people * 1.1;
            }
            if($boat > 0) $num_b = $people;
            if($train > 0) $num_t = $people;
            if($flight > 0) $num_f = $people;
            
            $data = [
                // 'pro_id'     => $pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'notes'      => $request->notes,
                'meat'       => json_encode($meat),
                'coupon'     => 0,
                'sn'         => $count,
                'money'      => $request->money,
                'pay_type'   => $request->pay_type,
                'pay_status' => $request->pay_status,
                'result'     => '',
                'manage'     => $request->manage,
                'discount'   => '',
                'vegetarian' => $request->vegetarian,
                'is_overseas'=> $is_overseas,
                'edit_type'  => $request->edit_type,
                'plan'       => $request->ticket_type,
                'num_b'      => $num_b,
                'num_t'      => $num_t,
                'num_f'      => $num_f,
            ];
            $order = order::create($data);
            switch($data['plan']){
                case 'boat':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$boat]);
                    break;
                case 'train':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$train]);
                    break;
                case 'flight':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$flight]);
                    break;
                case 'A':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$train]);
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$flight]);
                    break;
                case 'B':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$train]);
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$flight]);
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$boat]);
                    break;
            }
            if($request->pay_status == '已付款'){
                $mailer = [
                    'pople' => $order->pople,
                    'email' => $order->email,
                    'name'  => $order->name,
                    'phone' => $order->tel,
                    'id'    => $order->id,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'pre_mail' => true,
                    'template' => $order->plan,
                ];
                if($mailer['email'] != ''){ $this->SendOrderEmailByTemplateName($mailer); }
            }
            

            return redirect('/terminal/pros?')->with('message','新增完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/terminal/pros?')->with('message','新增失敗!');
        }
    }

    // ajax 修改資料
    public function StoreByAjax(Request $request,$id){
        try{
            if($request->ajax() && $request->has('act')){
                if($request->act == 'upateNotes'){
                    order::where('id',$id)->update([
                        'notes' => $request->notes
                    ]);
                    return Response::json(['success'=>true,'message'=> '已更新'], 200);
                } else {
                    return Response::json(['success'=>false],200);
                }
            } else {
                return Response::json(['success'=>false],200);
            }
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json(['success'=>false],200);
        }
    }


    public function Print(Request $request){
        $order = $this->getOrderSearch($request);
        $order = $order->paginate($this->perpage);
        return view('terminal.backend.print',compact('order','request'));
    }

    public function Table(Request $request){
        $order = $this->getOrderSearch($request,true);
        $order = $order->get();
        return view('terminal.backend.table',compact('order','request'));
    }

    public function XlsDataOuput(Request $request){
        $order = $this->getOrderSearch($request);
        $order = $order->get();

        $cellData = $order->toArray();
        Excel::create('名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $data = [];
                array_push($data,["體驗日期","體驗場次","訂位姓名","訂位電話","訂位信箱","訂位人數","微醺列車訂位人數","FLIGHT訂位人數","餐飲備註","註記/管理","優惠券","付款方式","付款狀態","原始付款金額","行銷折扣","取消人數","手續費%數","手續費金額","退款金額","實際付款金額","後四碼","訂單時間","回傳交易時間","藍新交易序號","訂單編號","發票號碼","發票開立時間"]);
                foreach($cellData as $row){
                    $coupon = "";
                    if($row['pay_type'] == '信用卡'){
                        if($row['is_overseas']>0){
                            $pay_type = '藍新金流';
                            $coupon = '刷卡付費';
                        } else {
                            $pay_type = '貝殼集器';
                        }
                    } elseif($row['pay_type'] == '後台編輯' || $request->pay_type == '現場購票'){
                        $pay_type = $row['edit_type'];
                    }
                    $pay_status = $row['pay_status'];
                    if($pay_type == '公關位' && ($row['pay_status'] == '已付款' || $row['pay_status'] == '已付款(部分退款)')){
                        $pay_status = '公關位';
                    }
                    $pay_money = '';
                    $pay_last = '';
                    $coupons = coupon::where('o_id',$row['sn'])->get();
                    $return_Tr_time = '';
                    $blue_sn = '';
                    if(count($coupons)>0){
                        foreach($coupons as $c){
                            if($coupon!=''){
                                $coupon .= "\r\n";
                                $pay_money.= "\r\n";
                                $pay_last.= "\r\n";
                            }
                            $coupon .= "{$c->code}";
                            $pay_money .= backme::select('money')->find($c->b_id)->money;
                            $pay_last .= backme::select('last_four')->find($c->b_id)->last_four;
                        }
                    } else {
                        $pay_money = $row['OM'];
                        if($pay_type == '藍新金流' && ($pay_status == '已付款' || $pay_status == '已付款(部分退款)')){
                            $json = json_decode($row['result'],true);
                            if($json['Status'] == "SUCCESS"){
                                $pay_last = $json['data']['Result']['Card4No'];
                            }
                            $return_Tr_time = $json['data']['Result']['PayTime'] ?? '';
                            $blue_sn = $json['data']['Result']['TradeNo'] ?? '';
                        }
                    }
                    
                    $handling_fee = 0;
                    if($pay_status == '未完成'){
                        $pay_money = 0;
                    } else {
                        if($row['handling'] > 0 && $row['refund'] > 0) $handling_fee = round($row['handling'] * $row['refund'] / 100);
                        $pay_money -= $row['refund'];
                        $pay_money += $handling_fee;
                    }
                    $plan = '';
                    switch($row['plan']){
                        case 'train': $plan = "微醺列車 The Great Tipsy : The Next Stop"; break;
                        case 'flight': $plan = "FLIGHT 無光飛航"; break;
                        case 'boat': $plan = "Boat for ONE 單人船票"; break;
                        case 'A': $plan = "套票A：Train+Flight"; break;
                        case 'B': $plan = "套票B：Train+Flight+Boat"; break;
                    }
                    $day = $plan;
                    $range = $plan;
                    foreach(DB::table('terminal_pro_order')->leftJoin('terminalpro', 'terminalpro.id', '=', 'terminal_pro_order.pro_id')->where('order_id',$row['id'])->get() as $r){
                        $day .= "\r\n{$r->day} {$r->day_parts} ";
                        $range .= "\r\n" . substr($r->rang_start,0,5) . " ~ " . substr($r->rang_end,0,5) . "({$r->ticket_type})";
                    }
                    // 發票
                    $inv_number = '';
                    $inv_time = '';
                    $inv = inv::select('number','is_cancal','results')->where('order_id',$row['id'])->first();
                    if($inv && $inv->is_cancal == 0){
                        $inv_number = $inv->number;
                        $inv_json = json_decode($inv->results,true);
                        if(isset($inv_json['Result']) && $inv_json['Status'] == 'SUCCESS'){
                            $inv_json2 = json_decode($inv_json['Result'],true);
                            $inv_time = $inv_json2['CreateTime'];
                        }
                        
                    }

                    $sheetRow = [
                        $day,
                        $range,
                        $row['name'],
                        $row['tel'],
                        $row['email'],
                        $row['pople'],
                        $row['num_t'],
                        $row['num_f'],
                        $row['notes'],
                        $row['manage'],
                        $coupon,
                        $pay_type,
                        $pay_status,
                        $row['OM'],
                        $row['dis_money'],
                        $row['cut'],
                        $row['handling'],
                        $handling_fee,
                        $row['refund'],
                        $pay_money,
                        $pay_last,
                        $row['created_at'],
                        $return_Tr_time,
                        $blue_sn."\t",
                        $row['sn']."\t",
                        $inv_number,
                        $inv_time,
                    ];
                    array_push($data,$sheetRow);
                }
                // $sheet->setColumnFormat(['P' => '*']);
                $zero = $sheet->rows($data);
                for($i=0;$i<=count($data);$i++){
                    $zero->getStyle('A'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('B'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('G'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('H'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('I'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('J'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('M'.$i)->getAlignment()->setWrapText(true);
                    // $zero->getStyle('P'.$i)->setDataType(\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                    // $sheet->fromArray($data, null, 'A1', false, false)
                }
            });
        })->export('xls');
    }
    public function XlsEmailDataOuput(Request $request){
        $order = order::leftJoin('terminalpro', 'terminalpro.id', '=', 'terminalorder.pro_id');
        $order = $order->select('name','email')->groupBy('email');
        $order->whereRaw("(terminalorder.pay_status='已付款' OR terminalorder.pay_status='已付款(部分退款)' OR (terminalorder.pay_type='現場付款' AND terminalorder.pay_status<>'取消訂位'))");
        $order = $order->orderBy('terminalorder.updated_at','desc')->get();
        $cellData = $order->toArray();
        Excel::create('Email 名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    public function beSentOrderMail(Request $request,$id){
        $mailer = [
            'pople' => $request->pople,
            'email' => $request->email,
            'name'  => $request->name,
            'phone' => $request->phone,
            'id'    => $request->oid,
            'master'=> "?id=".md5($request->oid)."&sn=".$request->sn,
            'template' => $request->plan,
        ];
        $this->SendOrderEmailByTemplateName($mailer);
        order::where('id',$request->oid)->update(['is_send'=>1]);
        return Response::json(['message'=> '已更新'], 200);
    }



    private function getOrderSearch(Request $request,$isTable=false){
        try {
            $order = order::select('name','tel','meat','notes','terminalorder.manage','terminalorder.money AS OM','terminalorder.created_at AS created_at','terminalorder.pay_status','email','terminalorder.sn','terminalorder.id','email','pay_type','pople','pro_id','is_overseas','vegetarian','edit_type','plan','result','dis_money','refund','handling','cut','num_t','num_f','num_b');

            if($isTable){
                $order = $order->whereIn('pay_status',['已付款','已付款(部分退款)']);
            }

            //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
            if($request->has('srday')  && $request->srday!=1){
                /*
                if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
                if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);    
                */
                $order->whereIn('id', function($query) use ($request)
                {
                    $query->select('order_id')
                      ->leftJoin('terminal_pro_order', 'terminalpro.id', '=', 'terminal_pro_order.pro_id')
                      ->groupBy('order_id')
                      ->from('terminalpro');
                    if($request->has('daystart') && $request->daystart!='') $query->where('day','>=',$request->daystart);
                    if($request->has('dayend') && $request->dayend!='') $query->where('day','<=',$request->dayend);
                });
            }
            if($request->has('is_overseas') && ($request->is_overseas==1 || $request->is_overseas==2)) $order->where('is_overseas',$request->is_overseas); 
            if($request->has('special')){
                if($request->special == 1){
                    $order->where('is_overseas',9); 
                }
                if($request->special == 0){
                    $order->where('is_overseas','<',5); 
                }
            }
            // 開過發票
            if($request->has('no_inv') && $request->no_inv == 1){
                $order->whereRaw("(SELECT COUNT(terminalinv.id) FROM terminalinv WHERE is_cancal=0 AND terminalorder.id=terminalinv.order_id)=0");
            }

            if($request->has('dayparts') && $request->dayparts!=''){
                $order->whereIn('id', function($query) use ($request)
                {
                    $query->select('order_id')
                      ->leftJoin('terminal_pro_order', 'terminalpro.id', '=', 'terminal_pro_order.pro_id')
                      ->groupBy('order_id')
                      ->from('terminalpro');
                    $query->where('day_parts',$request->dayparts);
                });
            }
            if($request->has('ticket_type') && $request->ticket_type!=''){
                $order->whereIn('id', function($query) use ($request)
                {
                    $query->select('order_id')
                      ->leftJoin('terminal_pro_order', 'terminalpro.id', '=', 'terminal_pro_order.pro_id')
                      ->groupBy('order_id')
                      ->from('terminalpro');
                    $query->where('ticket_type',$request->ticket_type);
                });
            }
            if($request->has('pay_status') && $request->pay_status=='已預約'){
                $order->whereRaw("(terminalorder.pay_status='已付款' OR terminalorder.pay_status='已付款(部分退款)')");
            } elseif($request->pay_status!=''){
                $order->where('terminalorder.pay_status',$request->pay_status);  
            } 
            if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
            if($request->has('plan') && $request->plan!='') $order->where('plan',$request->plan);
            if($request->has('search') && $request->search!=''){
                $search = $request->search;
                $order = $order->whereRaw("(name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'  OR result LIKE '%{$search}%' )");
            }
            if($request->has('code') && $request->code!=''){
                $text = trim($request->code);
                $coupons = coupon::orderBy('updated_at','desc')->select('o_id')->whereRaw("(
                    code LIKE '%{$text}%'
                )")->get();
                $order = $order->whereIn('sn',$coupons->toArray());
            }
            if($request->has('discount') && $request->discount!='') $order->where('dis_code',strtoupper($request->discount));

            if($request->has('order') && $request->order!=''){
                $ord = explode('|',$request->order);
                if(count($ord)>0){
                    if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                    $order = $order->OrderBy($ord[0],$ord[1]);
                }
            } else { $order = $order->orderBy('terminalorder.updated_at','desc'); }

            return $order;
        } catch (Exception $e){
            Log::error($e);
        }
    }
}


