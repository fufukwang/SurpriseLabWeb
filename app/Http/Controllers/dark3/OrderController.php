<?php

namespace App\Http\Controllers\dark3;

use Illuminate\Http\Request;
use Response;


use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Mail;
use Exception;
use App\model\dark3\coupon;
use App\model\dark3\order;
use App\model\dark3\pro;
use App\model\dark3\backme;
use App\model\dark3\inv;
use App\model\setting;

use App\Http\Controllers\Controller;
use Validator;
use Carbon\Carbon;
use DB;
use Log;
use SLS;
use Excel;

class OrderController extends Controller
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
        if($this->user->dark3 == 0){
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
        return view('dininginthedark3.backend.orders',compact('order'));
    }
    public function OrderEdit(Request $request,$id){
        $order = collect();
        if(is_numeric($id) && $id>0){
            if(order::where('id',$id)->count()>0){
                $order = order::leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id')->select('dark3order.id','day','day_parts','rang_end','rang_start','name','tel','email','sn','meat','notes','pay_type','pay_status','manage','result','pople','vegetarian','sites','edit_type','dark3order.money','cash')->find($id);
            } else {
                abort(404);
            }
        }
        $pro = pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$order->pople)
            ->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,day"))->orderBy('day','asc')->orderBy('rang_start','asc')->get();
        return view('dininginthedark3.backend.order',compact('order','pro'));
    }
    public function OrderUpdate(Request $request,$id){

        $data = [
            'pay_status' => $request->pay_status,
            'manage'     => $request->manage,
            'pay_type'   => $request->pay_type,
            'tel'        => $request->tel,
            'email'      => $request->email,
            'vegetarian' => $request->vegetarian,
        ];
        if($request->has('pro_id') && $request->pro_id>0){
            $data['pro_id'] = $request->pro_id;
            $data['manage'] = $data['manage']."\n".date('Y-m-d H:i:s')." 更改場次";
            // 觸發補寄
            try {
                $order = order::leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id')->select('dark3order.id','day','day_parts','rang_end','rang_start','name','tel','email','sn','meat','notes','pay_type','pay_status','manage','result','pople','vegetarian','sites')->find($id);
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($order->day.' '.$order->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($order->day.' '.$order->rang_end))));
                $mailer = [
                    'day'   => Carbon::parse($order->day)->format('Y / m / d'),
                    'time'  => substr($order->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $order->pople,
                    'email' => $order->email,
                    'name'  => $order->name,
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'phone' => $order->tel,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'template' => 'order',
                ];
                if($mailer['email'] != ''){
                    SLS::SendEmailByTemplateName($mailer);
                    SLS::SendSmsByTemplateName($mailer);
                    // 信件補送
                    $now = time();
                    $lim = strtotime($order->day.' '.$order->rang_start);
                    $day = round( ($lim - $now) / 86400 );
                    if($day <= 7){
                        $mailer['template'] = 'D7';
                        SLS::SendSmsByTemplateName($mailer);
                    }
                    if($day == 0){
                        $mailer['template'] = 'DX';
                        SLS::SendSmsByTemplateName($mailer);
                    }
                }
            } catch (Exception $e){
                Log::error($e);
            }
        }
        if(is_numeric($id) && $id>0){
            if($request->pay_type == '後台編輯'){
                $data['edit_type'] = $request->edit_type;
                $data['money'] =  $request->money;
            }
            order::where('id',$id)->update($data);
            $order = order::find($id);
        } 
        if($request->has('qxx') && $request->qxx != ''){
            return redirect('/dark3/print?'.$request->qxx)->with('message','編輯完成!');
        } else {
            return redirect('/dark3/orders/'.$order->pro_id)->with('message','編輯完成!');
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
            return view('dininginthedark3.backend.orderAppointment',compact('pro_id','pro'));
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/dark3/pros?')->with('message','此編號無座位表!');
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
                $count = Carbon::now()->format('Ymd').'0001';
            }
            $act = pro::where('id',$pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rang_start','rang_end','special')->first();
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
                    return redirect('/dark3/pros?')->with('message','新增失敗!特別場次請選擇 1、2、6符合票券人數');
                }
                $sp_money = json_decode(setting::where('slug','dark3_sp_money')->first()->json,true);
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
                'manage'     => $request->manage,
                'discount'   => '',
                'vegetarian' => $request->vegetarian,
                'is_overseas'=> $is_overseas,
                'edit_type'  => $request->edit_type,
            ];
            $order = order::create($data);

            if($request->pay_status == '已付款'){
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                /*
                $rangTS    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_start,0,5)))));
                $rangTE    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_end,0,5)))));
                */
                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('Y / m / d'),
                    'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $people,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                    'phone' => $data['tel'],
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'template' => 'order',
                ];
                if($mailer['email'] != ''){
                    SLS::SendEmailByTemplateName($mailer);
                    SLS::SendSmsByTemplateName($mailer);
                    $order->is_send = 1;
                    $order->save();
                    // 信件補送
                    $now = time();
                    $lim = strtotime($order->day.' '.$order->rang_start);
                    $day = round( ($lim - $now) / 86400 );
                    if($day <= 7){
                        $mailer['template'] = 'D7';
                        SLS::SendSmsByTemplateName($mailer);
                    }
                    if($day == 0){
                        $mailer['template'] = 'DX';
                        SLS::SendSmsByTemplateName($mailer);
                    }
                }
            }

            return redirect('/dark3/pros?')->with('message','新增完成!');
        } catch (Exception $exception) {
            Log::error($exception);
            return redirect('/dark3/pros?')->with('message','新增失敗!');
        }
    }


    public function Print(Request $request){
        $order = order::leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','meat','notes','dark3order.manage','dark3pro.money AS PM','dark3order.money AS OM','dark3order.created_at AS created_at','dark3order.pay_status','email','dark3order.sn','dark3order.id','day_parts','day','email','pay_type','pople','pro_id','is_overseas','vegetarian','edit_type');

        //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('srday')  && $request->srday!=1){
            if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
            if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);    
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

        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(dark3order.pay_status='已付款' OR (dark3order.pay_type='現場付款' AND dark3order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('dark3order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'");
        }
        if($request->has('code') && $request->code!=''){
            $text = trim($request->code);
            $coupons = coupon::orderBy('updated_at','desc')->select('o_id')->whereRaw("(
                code LIKE '%{$text}%'
            )")->get();
            $order = $order->whereIn('sn',$coupons->toArray());


            // $order = $order->whereRaw("(SELECT COUNT(id) FROM(dark3coupon) WHERE code='{$request->code}' AND dark3coupon.o_id=dark3order.sn)>0");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('dark3order.updated_at','desc'); }
        $order = $order->paginate($this->perpage);

        return view('dininginthedark3.backend.print',compact('order','request'));
    }

    public function Table(Request $request){
        $order = order::leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','meat','notes','dark3order.manage','dark3pro.money AS PM','dark3order.money AS OM','dark3order.created_at AS created_at','dark3order.pay_status','email','dark3order.sn','dark3order.id','day_parts','day','email','pay_type','pople','pro_id','is_overseas','vegetarian','edit_type');
        //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('srday')  && $request->srday!=1){
            if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
            if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);
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

        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(dark3order.pay_status='已付款' OR (dark3order.pay_type='現場付款' AND dark3order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('dark3order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'");
        }
        if($request->has('code') && $request->code!=''){
            $text = trim($request->code);
            $coupons = coupon::orderBy('updated_at','desc')->select('o_id')->whereRaw("(
                code LIKE '%{$text}%'
            )")->get();
            $order = $order->whereIn('sn',$coupons->toArray());
            // $order = $order->whereRaw("(SELECT COUNT(id) FROM(dark3coupon) WHERE code='{$request->code}' AND dark3coupon.o_id=dark3order.sn)>0");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('dark3order.updated_at','desc'); }
        $order = $order->get();
        

        return view('dininginthedark3.backend.table',compact('order','request'));
    }

    public function XlsDataOuput(Request $request){
        $order = order::leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id');
        $order = $order->select('rang_start','rang_end','name','tel','notes','dark3order.manage','dark3pro.money AS PM','dark3order.money AS OM','dark3order.created_at AS created_at','dark3order.pay_status','email','dark3order.sn','dark3order.id','day_parts','day','email','pay_type','pople','pro_id','dis_code','is_overseas','edit_type','result');
        //if($request->has('day') && $request->day!='') $order->where('day',$request->day);
        if($request->has('srday')  && $request->srday!=1){
            if($request->has('daystart') && $request->daystart!='') $order->where('day','>=',$request->daystart);
            if($request->has('dayend') && $request->dayend!='') $order->where('day','<=',$request->dayend);
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
        
        if($request->has('dayparts') && $request->dayparts!='') $order->where('day_parts',$request->dayparts);
        if($request->has('pay_status') && $request->pay_status=='已預約'){
            $order->whereRaw("(dark3order.pay_status='已付款' OR (dark3order.pay_type='現場付款' AND dark3order.pay_status<>'取消訂位'))");
        } elseif($request->pay_status!=''){
            $order->where('dark3order.pay_status',$request->pay_status);  
        } 
        if($request->has('pay_type') && $request->pay_type!='') $order->where('pay_type',$request->pay_type);
        if($request->has('search') && $request->search!=''){
            $search = $request->search;
            $order = $order->whereRaw("name LIKE '%{$search}%' OR tel LIKE '%{$search}%' OR email LIKE '%{$search}%' OR sn LIKE '%{$search}%'");
        }
        if($request->has('code') && $request->code!=''){
            $text = trim($request->code);
            $coupons = coupon::orderBy('updated_at','desc')->select('o_id')->whereRaw("(
                code LIKE '%{$text}%'
            )")->get();
            $order = $order->whereIn('sn',$coupons->toArray());
            // $order = $order->whereRaw("(SELECT COUNT(id) FROM(dark3coupon) WHERE code='{$request->code}' AND dark3coupon.o_id=dark3order.sn)>0");
        }

        if($request->has('order') && $request->order!=''){
            $ord = explode('|',$request->order);
            if(count($ord)>0){
                if($ord[0] == 'rang_start') $order = $order->OrderBy('day',$ord[1]);
                $order = $order->OrderBy($ord[0],$ord[1]);
            }
        } else { $order = $order->orderBy('dark3order.updated_at','desc'); }
        $order = $order->get();

        $cellData = $order->toArray();
        Excel::create('名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $data = [];
                array_push($data,["體驗日期","體驗場次","訂位姓名","訂位電話","訂位信箱","訂位人數","餐飲備註","註記/管理","優惠券","付款方式","付款狀態","實際付款金額","後四碼"]);
                foreach($cellData as $row){
                    $coupon = "";
                    if($row['pay_type'] == '信用卡'){
                        if($row['is_overseas']>0){
                            $pay_type = '藍新金流';
                            $coupon = '刷卡付費';
                        } else {
                            $pay_type = '貝殼集器';
                        }
                    } elseif($row['pay_type'] == '後台編輯'){
                        $pay_type = $row['edit_type'];
                    }
                    $pay_status = $row['pay_status'];
                    if($pay_type == '公關位' && $row['pay_status'] == '已付款'){
                        $pay_status = '公關位';
                    }
                    $pay_money = '';
                    $pay_last = '';
                    $coupons = coupon::where('o_id',$row['sn'])->get();
                    
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
                        if($pay_type == '藍新金流' && $pay_status == '已付款'){
                            $json = json_decode($row['result'],true);
                            if($json['Status'] == "SUCCESS"){
                                $pay_last = $json['data']['Result']['Card4No'];
                            }
                        }
                    }
                    
                    if($pay_status !== '已付款') $pay_money = 0;


                    $sheetRow = [
                        $row['day'],
                        substr($row['rang_start'],0,5).'~'.substr($row['rang_end'],0,5),
                        $row['name'],
                        $row['tel'],
                        $row['email'],
                        $row['pople'],
                        $row['notes'],
                        $row['manage'],
                        $coupon,
                        $pay_type,
                        $pay_status,
                        $pay_money,
                        $pay_last,
                    ];
                    array_push($data,$sheetRow);
                }

                $zero = $sheet->rows($data);
                for($i=0;$i<count($data);$i++){
                    $zero->getStyle('G'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('H'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('I'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('L'.$i)->getAlignment()->setWrapText(true);
                    $zero->getStyle('M'.$i)->getAlignment()->setWrapText(true);
                    // $sheet->fromArray($data, null, 'A1', false, false)
                }
            });
        })->export('xls');
    }
    public function XlsEmailDataOuput(Request $request){
        $order = order::leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id');
        $order = $order->select('name','email')->groupBy('email');
        $order->whereRaw("(dark3order.pay_status='已付款' OR (dark3order.pay_type='現場付款' AND dark3order.pay_status<>'取消訂位'))");
        $order = $order->orderBy('dark3order.updated_at','desc')->get();
        $cellData = $order->toArray();
        Excel::create('Email 名單',function ($excel) use ($cellData){
            $excel->sheet('data', function ($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    public function beSentOrderMail(Request $request,$id){
        $act = pro::select('day','rang_start','rang_end')->find($id);


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
            'template' => 'order',
        ];
        SLS::SendEmailByTemplateName($mailer);
        SLS::SendSmsByTemplateName($mailer);
        order::where('id',$request->oid)->update(['is_send'=>1]);
        return Response::json(['message'=> '已更新'], 200);
    }

}


