<?php

namespace App\Http\Controllers\terTP;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\terTP\coupon;
use App\model\terTP\order;
use App\model\terTP\pro;
use App\model\terTP\backme;
use App\model\terTP\inv;
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
        if($this->user->terTP == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
        DB::enableQueryLog();
    }

    /**
     * orders.
     */
    public function Orders(Request $request,$id){
        $order = order::orderBy('updated_at','desc')->where('pro_id',$id);
        $order = $order->get();
        return view('terTP.backend.orders',compact('order'));
    }
    public function OrderEdit(Request $request,$id){
        $order = collect();
        if(is_numeric($id) && $id>0){
            if(order::where('id',$id)->count()>0){
                $order = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')->select('tertp_order.id','day','day_parts','rang_end','rang_start','name','tel','email','sn','meat','notes','pay_type','pay_status','manage','result','pople','vegetarian','sites','edit_type','tertp_order.money','cash','refund','cut','handling','need_english','need_chinese','tax_id','tax_name','vehicle','ticket')->find($id);
                $cooperate = order::select('edit_type')->where('pay_type','合作販售')->groupBy('edit_type')->get();
            } else {
                abort(404);
            }
        }
        $pro = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>=".$order->pople)
            ->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,day"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        return view('terTP.backend.order',compact('order','pro','cooperate'));
    }
    public function OrderUpdate(Request $request,$id){

        $data = [
            'pay_status' => $request->pay_status,
            'manage'     => $request->manage,
            'pay_type'   => $request->pay_type,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'name'       => $request->name,
            // 'vegetarian' => $request->vegetarian,
            'pople'      => $request->people,
            'need_english' => $request->need_english ?? 0,
            'need_chinese' => $request->need_chinese ?? 0,
            'tax_id'     => $request->tax_id ?? '',
            'tax_name'   => $request->tax_name ?? '',
            'vehicle'   => $request->vehicle ?? '',
        ];
        $order = order::find($id);
        if($request->has('pro_id') && $request->pro_id>0){
            $data['pro_id'] = $request->pro_id;
            $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 更改場次";
            // 觸發補寄
            try {
                $ord = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')
                    ->select('pople','tertp_pro.day','rang_start','need_english','tertp_order.id','name','email','tel','need_chinese','sn')->find($order->id);
                if($ord->email != '') $this->sendMailCenter($ord);
                if($ord->tel != '') $this->sendSmsCenter($ord);
            } catch (Exception $e){
                Log::error($e);
            }
        }
        if(is_numeric($id) && $id>0){
            if($request->pay_type == '後台編輯'){
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
        if($request->has('qxx') && $request->qxx != ''){
            return redirect('/tertp/print?'.$request->qxx)->with('message','編輯完成!');
        } else {
            return redirect('/tertp/orders/'.$order->pro_id)->with('message','編輯完成!');
        }
    }
    public function OrderDelete(Request $request,$id){
        $order = order::select('sn')->find($id);
        if($order){
            coupon::where('o_id',$order->sn)->update(['o_id'=>-1]);
        }
        order::where('id',$id)->delete();
        return Response::json(['message'=> '訂單已刪除'], 200);
    }

    
    public function Appointment(Request $request,$pro_id){
        try {
            $pro = pro::find($pro_id);
            return view('terTP.backend.orderAppointment',compact('pro_id','pro'));
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/tertp/pros?')->with('message','此編號無座位表!');
        }
    }
    public function AppointmentUpdate(Request $request,$pro_id){
        try {
            $people = $request->people;
            $count = $this->grenOrderSN();
            $act = pro::where('id',$pro_id)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','special','p1','p2','p6')->first();
            $meat = [];
            /*
            for($i=0;$i<$people;$i++){
                array_push($meat,$request->input('Meal.'.$i));
            }
            */
            $is_overseas = 0;
            if($act->special) {
                $is_overseas = 9;
                if($people!=1 && $people!=2 && $people!=6){
                    return redirect('/tertp/pros?')->with('message','新增失敗!特別場次請選擇 1、2、6符合票券人數');
                }
                $sp_money = json_decode(setting::where('slug','terTP_sp_money')->first()->json,true);
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
            
            $data = [
                'pro_id'     => $pro_id,
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
                'ticket'     => $request->ticket,
                'manage'     => $request->manage,
                'discount'   => '',
                'is_overseas'=> $is_overseas,
                'edit_type'  => $request->edit_type,
                'need_english' => $request->need_english ?? 0,
                'need_chinese' => $request->need_chinese ?? 0,
                'tax_id'     => $request->tax_id ?? '',
                'tax_name'   => $request->tax_name ?? '',
                'vehicle'   => $request->vehicle ?? '',
            ];
            $order = order::create($data);

            if($request->pay_status == '已付款'){
                $ord = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')
                    ->select('pople','tertp_pro.day','rang_start','need_english','tertp_order.id','name','email','tel','need_chinese','sn')->find($order->id);
                if($ord->email != '') $this->sendMailCenter($ord);
                if($ord->tel != '') $this->sendSmsCenter($ord);
            }

            return redirect('/tertp/pros?')->with('message','新增完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/tertp/pros?')->with('message','新增失敗!');
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

    // XLS上傳訂單
    public function orderImportXls(Request $request){
        $filePath = '';
        $message = '';
        try{
            $rules = [
                'xlsx'    => 'required|mimetypes:application/octet-stream,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/zip'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/tertp/backmes')->with('message','新增失敗!(請檢查檔案)');
            } else {
                if ($request->hasFile('xlsx')) {
                    if ($request->file('xlsx')->isValid())
                    {
                        $destinationPath = base_path() . '/storage/app';
                        $extension = $request->file('xlsx')->getClientOriginalExtension();
                        $fileName = 'terTP_inport_order_' . date('YmdHis') . '.' . $extension;
                        $request->file('xlsx')->move($destinationPath, $fileName);
                        $filePath = '/storage/app/' . $fileName;
                    }
                }
            }

            $i = 2; $count = 0;
            Excel::load($filePath, function($reader) use (&$i,&$count,&$message) {
                $data = [];
                $xlsx = $reader->toArray();
                $now = Carbon::now()->toDateString();
                foreach($xlsx as $row){
                    if($row['name'] == ''){
                        $message .= "第{$i}列 姓名有誤<br>";
                        break;
                    } elseif(!is_numeric($row['people']) && $row['people']<=0) {
                        $message .= "第{$i}列 人數有誤<br>";
                        break;
                    } elseif(!is_numeric($row['ticket']) && $row['ticket']<=0) {
                        $message .= "第{$i}列 票券編號錯誤<br>";
                        break;
                    } elseif(!is_numeric($row['money']) && $row['money']<=0) {
                        $message .= "第{$i}列 金額輸入錯誤<br>";
                        break;
                    } elseif(!in_array($row['type'],['p1','p2','p6','單人票','雙人票','六人票'])) {
                        $message .= "第{$i}列 票種輸入錯誤輸入錯誤<br>";
                        break;
                    } else {
                        $meat = [];
                        $is_overseas = 0;
                        $money = $row['money'];
                        // 檢查座位
                        $act = pro::where('id',$row['ticket'])->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','special')->first();
                        if($row['people']>$act->Count){
                            $message .= "第{$i}列 編號({$row['ticket']})人數已滿<br>";
                            break;
                        }
                        $ticket = $row['type'];$numTrue = true;
                        switch($row['type']){
                            case '單人票': $ticket = 'p1'; break;
                            case '雙人票': $ticket = 'p2'; if(($row['people'] % 2) != 0){ $numTrue = false;} break;
                            case '六人票': $ticket = 'p6'; if(($row['people'] % 6) != 0){ $numTrue = false;} break;
                            case 'p2': $ticket = 'p2'; if(($row['people'] % 2) != 0){ $numTrue = false;} break;
                            case 'p6': $ticket = 'p6'; if(($row['people'] % 6) != 0){ $numTrue = false;} break;
                        }
                        if(!$numTrue){
                            $message .= "第{$i}列 票券人數錯誤<br>";
                            break;
                        }
                        $manage = date('Y-m-d H:i:s').' 匯入來源:'.$row['source'];
                        if($row['giftcard']!=''){
                            $manage .= "\n禮物卡序號：".$row['giftcard'];
                        }

                        // 寫入
                        $sn = $this->grenOrderSN();
                        $data = [
                            'pro_id'     => $row['ticket'],
                            'pople'      => $row['people'],
                            'name'       => $row['name'],
                            'tel'        => $row['phone'],
                            'email'      => $row['email'],
                            'ticket'     => $ticket,
                            'notes'      => '',
                            'coupon'     => 0,
                            'sn'         => $sn,
                            'money'      => $money,
                            'pay_type'   => '合作販售',
                            'pay_status' => '已付款',
                            'result'     => '',
                            'manage'     => $manage,
                            'discount'   => '',
                            'vegetarian' => 0,
                            'is_overseas'=> $is_overseas,
                            'edit_type'  => '合作-'.$row['source'],
                            'need_english' => $row['need_english'] ?? 0,
                            'need_chinese' => $row['need_chinese'] ?? 0,
                        ];
                        $order = order::create($data);
                        $count++;
                        /*
                        if($order->pay_status == '已付款'){
                            
                        }
                        */
                        $i++;
                    }

                }
            });
            return redirect('/tertp/print')->with('message',"新增完成!!共新增{$count}筆資料<br>{$message}");
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/tertp/print')->with('message','新增失敗!');
        }
    }


    public function Print(Request $request){
        $order = $this->orderQuery($request);
        $order = $order->paginate($this->perpage);

        return view('terTP.backend.print',compact('order','request'));
    }

    public function Table(Request $request){
        $order = $this->orderQuery($request,true);
        $order = $order->get();
        

        return view('terTP.backend.table',compact('order','request'));
    }

    public function XlsDataOuput(Request $request){
        $order = $this->orderQuery($request);
        $order = $order->get();

        $cellData = $order->toArray();
        Excel::create('名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $data = [];
                array_push($data,["票種","體驗日期","體驗場次","訂位姓名","訂位電話","訂位信箱","訂位人數","餐飲備註","註記/管理","折扣碼/禮物卡","付款方式","付款狀態","原始付款金額","折扣碼折抵","禮物卡/序號折抵","取消人數","手續費%數","手續費金額","退款金額","實際付款金額","後四碼","訂單時間","回傳交易時間","藍新交易序號","訂單編號","發票號碼","發票開立時間"]);
                foreach($cellData as $row){
                    $coupon = "";
                    $pay_type = $row['pay_type'];
                    if($row['pay_type'] == '信用卡'){
                        if($row['is_overseas']>0){
                            $pay_type = '藍新金流';
                            // $coupon = '刷卡付費';
                        } else {
                            $pay_type = '貝殼集器';
                        }
                    } elseif($row['pay_type'] == '後台編輯'){
                        $pay_type = $row['edit_type'];
                    }
                    $pay_status = $row['pay_status'];
                    if($pay_type == '公關位' && ($row['pay_status'] == '已付款' || $row['pay_status'] == '已付款(部分退款)')){
                        $pay_status = '公關位';
                    }
                    $pay_money = '';
                    $pay_last = '';
                    $modify_money = '';
                    $return_Tr_time = '';
                    $coupons = coupon::select('code','b_id','type')->where('o_id',$row['sn'])->get();
                    $blue_sn = '';
                    $backme_sn = '';
                    if(count($coupons)>0){
                        $couponNumber = 0;
                        $tmpBackSn = '';
                        foreach($coupons as $c){
                            if($coupon!=''){
                                $coupon .= "\r\n";
                            }
                            $coupon .= "{$c->code}";
                            
                            $couponNumber++;
                        }
                        $pay_money .= ($couponNumber*4400);
                        if($row['OM']>0){
                            $pay_money .= "\r\n［{$row['OM']}］";
                        }
                    } else {
                        $pay_money = $row['OM'];
                        if($pay_type == '藍新金流' && ($pay_status == '已付款' || $pay_status == '已付款(部分退款)')){
                            $json = json_decode($row['result'],true);
                            if($json['Status'] == "SUCCESS"){
                                $pay_last = $json['data']['Result']['Card4No'] ?? '';
                            }
                            $return_Tr_time = $json['data']['Result']['PayTime'] ?? '';
                            $blue_sn = $json['data']['Result']['TradeNo'] ?? '';
                        }
                    }
                    $ticket = '';
                    $num = 0;
                    $price = 0;

                    switch($row['ticket']){
                        case 'p1': $ticket = '單人票'; $num = $row['pople']; $price = $row['p1']; break;
                        case 'p2': $ticket = '雙人票'; $num = $row['pople'] / 2; $price = $row['p2']; break;
                        case 'p6': $ticket = '六人票'; $num = $row['pople'] / 6; $price = $row['p6']; break;
                        default: $ticket = '混合票種'; $num = 1; $price = $row['co_money']; break;
                    }
                    $handling_fee = 0;
                    if($pay_status == '未完成'){
                        $pay_money = 0;
                    } else {
                        if($row['handling'] > 0 && $row['refund'] > 0) $handling_fee = round($row['handling'] * $row['refund'] / 100);
                        if(is_numeric($pay_money)){
                            $pay_money -= $row['refund'];
                            $pay_money += $handling_fee;
                        } else {
                            $pay_money .= " - " . $row['refund'] . " + " . $handling_fee;
                        }
                    }
                    $imoney = (($price * $num) - $row['dis_money'] - $row['co_money'] - $row['refund'] + $handling_fee);
                    // 發票
                    $inv_number = '';
                    $inv_time = '';
                    $inv = inv::select('number','is_cancal','results')->where('order_id',$row['id'])->orderBy('created_at','desc')->first();
                    if($inv && $inv->is_cancal == 0){
                        $inv_number = $inv->number;
                        $inv_json = json_decode($inv->results,true);
                        if(isset($inv_json['Result']) && $inv_json['Status'] == 'SUCCESS'){
                            $inv_json2 = json_decode($inv_json['Result'],true);
                            $inv_time = $inv_json2['CreateTime'];
                        }
                        
                    }

                    $sheetRow = [
                        $ticket,
                        $row['day'],
                        substr($row['rang_start'],0,5).'~'.substr($row['rang_end'],0,5),
                        $row['name'],
                        $row['tel'],
                        $row['email'],
                        $row['pople'],
                        strip_tags(preg_replace('/\<br(\s*)?\/?\>/i',"\n",$row['notes'])),
                        $row['manage'],
                        $row['dis_code']."\n".$coupon,
                        $pay_type,
                        $pay_status,
                        ($price * $num),
                        $row['dis_money'],
                        $row['co_money'],
                        $row['cut'],
                        $row['handling'],
                        $handling_fee,
                        $row['refund'],
                        $imoney,
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
                // $sheet->setColumnFormat(['O' => 'General']);
                $zero = $sheet->rows($data);
                for($i=0;$i<count($data);$i++){
                    $zero->getStyle('I'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('J'.$i)->getAlignment()->setWrapText(true);
                }
            });
        })->export('xls');
    }
    public function XlsEmailDataOuput(Request $request){
        $order = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id');
        $order = $order->select('name','email')->groupBy('email');
        $order->whereRaw("(tertp_order.pay_status='已付款' OR tertp_order.pay_status='已付款(部分退款)' OR (tertp_order.pay_type='現場付款' AND tertp_order.pay_status<>'取消訂位'))");
        $order = $order->orderBy('tertp_order.updated_at','desc')->get();
        $cellData = $order->toArray();
        Excel::create('Email 名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
/*
    public function beSentOrderMail(Request $request,$id){
        $act = pro::select('day','rang_start','rang_end')->find($id);

        $order = order::find($request->oid);
        $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
        $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
        $mailer = [
            'day'   => Carbon::parse($act->day)->format('Y / m / d'),
            'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
            'pople' => $request->pople,
            'email' => $request->email,
            'name'  => $request->name,
            'phone' => $request->phone,
            'gday'  => $rangStart.'/'.$rangEnd,
            'master'=> "?id=".md5($request->oid)."&sn=".$request->sn,
            'need_chinese' => $order->need_chinese ?? 0,
            'need_english' => $order->need_english ?? 0,
            'template' => 'order',
            'mday'     => $act->day,
        ];
        SLS::SendEmailByTemplateName($mailer);
        SLS::SendSmsByTemplateName($mailer);
        order::where('id',$request->oid)->update(['is_send'=>1]);
        return Response::json(['message'=> '已更新'], 200);
    }
*/
    private function orderQuery(Request $request,$isTable=false){
        $order = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','meat','notes','tertp_order.manage','tertp_pro.money AS PM','tertp_order.money AS OM','tertp_order.created_at AS created_at','tertp_order.pay_status','email','tertp_order.sn','tertp_order.id','day_parts','day','pay_type','pople','pro_id','is_overseas','vegetarian','edit_type','dis_money','dis_code','result','refund','handling','cut','tax_id','tax_name','need_english','vehicle','p1','p2','p6','co_code','co_money','ticket');
        if($isTable){
            $order = $order->whereIn('pay_status',['已付款','已付款(部分退款)']);
        }


        if($request->has('srday')  && $request->srday>=1){
            if($request->srday == 2){
                if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
                if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);    
            }
            if($request->srday == 1){
                if($request->has('daystart') && $request->daystart!='') $order->where('tertp_order.created_at','>=',$request->daystart.' 00:00:00');
                if($request->has('dayend') && $request->dayend!='') $order->where('tertp_order.created_at','<=',$request->dayend.' 23:59:59');    
            }
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
        if($request->has('ticket') && $request->ticket!='') $order->where('ticket',$request->ticket);
        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(tertp_order.pay_status='已付款' OR pay_status='已付款(部分退款)' OR (tertp_order.pay_type='現場付款' AND tertp_order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('tertp_order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("(name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%' OR manage LIKE '%{$search}%')");
        }
        if($request->has('code') && $request->code!=''){
            $text = trim($request->code);
            $order = $order->whereRaw("(co_code LIKE '%{$text}%' OR dis_code LIKE '%{$text}%')");
        }
        // 尚未開過發票
        if($request->has('no_inv') && $request->no_inv == 1){
            // $order->whereRaw("(SELECT COUNT(tertp_inv.id) FROM tertp_inv WHERE is_cancal=0 AND tertp_order.id=tertp_inv.order_id)=0 AND pay_status IN ('已付款','已付款(部分退款)')");
            $order->whereIn('tertp_order.pay_status',['已付款','已付款(部分退款)']);  
            $order->leftJoin('tertp_inv',function($join){
                $join->on('tertp_order.id', '=', 'tertp_inv.order_id');
                $join->where('is_cancal','=',0);
            });
            $order->whereNull('is_cancal');
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('tertp_order.updated_at','desc'); }
        return $order;
    }

}


