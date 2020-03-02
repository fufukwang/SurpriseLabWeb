<?php

namespace App\Http\Controllers\clubT;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\club\club_sms;
use App\model\club\coupon;
use App\model\club\order;
use App\model\club\pro;


use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;
use SLS;

class FrontController extends Controller
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }
    
    public function getting_intro_sms(Request $request){
        try{
            if($request->ajax() && $request->has('act')){
                switch ($request->act) {
                    case 'checker':
                        $input = $request->all();
                        $dial_code = $input['dial_code'];
                        $phone     = $input['phone'];
                        $agree     = $input['agree'];
                        $count = club_sms::where('dial_code',$dial_code)->where('phone',$phone)->count();
                        if($count==0 && $agree==1){
                            // 傳送 SMS 
                            if($dial_code == "+886"){
                                $phone_number = "0".$phone;
                            } else {
                                $phone_number = str_replace('+','',$dial_code).$phone;
                            }
                            $message = "[ 嘿！你有一則來自《明日俱樂部》的訊息 ]\n\n一切即將開始 - 進入以下連結，你將與《明日俱樂部》正式連接：https://bit.ly/316nSWM \n\n記住，連結將在期限內自動銷毀，請把握時間。";
                            $sent_obj = SLS::sent_single_sms($phone_number,$message);
                            $sent_result = json_encode($sent_obj);
                            if($sent_obj['is_error']){
                                $is_sent = 0;
                            } else {
                                $is_sent = 1; 
                            }

                            club_sms::create([
                                'dial_code' => $dial_code,
                                'agree'     => $agree,
                                'phone'     => $phone,
                                'is_sent'   => $is_sent,
                                'sent_result' => $sent_result,
                            ]);

                            return Response::json(['success'=> true,'message'=>'ok'], 200);  
                        } else {
                            return Response::json(['success'=> false,'message'=>'already'], 200);  
                        }
                    break;
                    default:
                        return Response::json(['success'=> false,'message'=>'not action'], 200);  
                    break;
                }
            } else {
                return Response::json(['success'=> false,'message'=>'false'], 200);  
            }
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json(['success'=> false,'message'=>'false'], 200);
        }
        //return $this->sent_sms_func();
    }
    

    private function sent_sms_func(){
        return SLS::toW3CTime();
    }

    public function GetAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act')){
                $pople = $request->pople;
                if(is_numeric($pople) && $pople>0){
                    $pro = pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(club_order) WHERE club_order.pro_id=club_pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$pople);
                } else {
                    return Response::json(['success'=> 'N'], 200);
                }
                

                switch ($request->act) {
                    case 'getBypople': // 票種 & 人數 取得 day
                        $pro = $pro->select('day')->groupBy('day')->where('day','>=',Carbon::today());
                        $pro = $pro->get();
                        return $pro->toJson();
                    break;
                    case 'getByday': // 日期 取得 時段
                        $day        = $request->day;

                        $pro = $pro->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(club_order) WHERE club_order.pro_id=club_pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,money,cash"))->orderBy('rang_start')->where('day',$day)->get();
                        return $pro->toJson();
                    break;


                    case 'CheckCoupon':
                        $restPeople = $request->restPeople;
                        $coupon = coupon::where('code',$request->code)->where('o_id',0);
                        if($request->has('coupon') && count($request->coupon)>0){
                            $coupon = $coupon->whereNotIn('code',$request->coupon);
                        }
                        $coupon = $coupon->count();
                        if($coupon>0){

                            $me = coupon::where('code',$request->code)->select('type')->first();
                            $type = '';
                            switch ($me->type) {
                                case 'p1': $type = '單人票'; $ticketAmount = 1; break;
                                case 'p4': $type = '四人票'; $ticketAmount = 4; break;
                                case 'p10': $type = '十人票'; $ticketAmount = 10; break;
                            }
                            // 人數小於 兌換券人數
                            if($restPeople < $ticketAmount){
                                return Response::json(['success'=> 'N','message'=>'您輸入的序號已超過剩餘折抵人數，請重新檢查'], 200);
                            }

                            return Response::json(['success'=> 'Y','ticketAmount'=>$ticketAmount,'ticketType'=>$me->type,'ticket'=>$type], 200);    
                        } else {
                            return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
                        }
                    break;
                }
            }
        } else {
            abort(404);
        }
    }

    public function ReOrderData(Request $request){
        try {
            $now = Carbon::now()->toDateString();
            $count = order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');

            if($count>0){
                $count += 1;
            } else {
                $count = Carbon::now()->format('Ymd').'001';
            }
            $people = $request->pople;

            $act = pro::where('id',$request->pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(club_order) WHERE club_order.pro_id=club_pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts')->first();
            if($people>$act->Count){
                Log::error('人數滿了');
                return Response::json(array(
                    'success' => false,
                    'message' => '人數已滿'
                ), 200);
            }

            if($request->Pay == 'onsite'){
                $pay_type = '現場付款';
                $money = $act->cash * $people;
            } else {
                $pay_type = '信用卡';
                $money = $act->money * $people;
            }
            $cut1 = 0; $cut2 = 0;
            // 確認庫碰碼
            $coupon = 0;
            $totleCut = 0;
            if($request->has('coupon')){
                foreach ($request->coupon as $key => $value) {
                    $coupon_count = coupon::where('code',$value)->where('o_id',0)->count();
                    if($coupon_count>0){
                        $me = coupon::where('code',$value)->where('o_id',0)->select('type')->first();

                        $type = '';
                        switch ($me->type) {
                            case 'p1': $type = '單人票'; $ticketAmount = 1; break;
                            case 'p4': $type = '四人票'; $ticketAmount = 4; break;
                            case 'p10': $type = '十人票'; $ticketAmount = 10; break;
                        }
                        $totleCut += $ticketAmount;

                        $coupon++;
                        coupon::where('code',$value)->where('o_id',0)->update(['o_id'=>$count]);
                        if($request->Pay == 'onsite'){
                            $cut1 =  $cut1 + ($act->cash * $ticketAmount);
                        } else {
                            $cut1 =  $cut1 + ($act->money * $ticketAmount);
                        }
                    }
                }
                // 人數小於 兌換券人數
                if($totleCut > $people){
                    return Response::json(['success'=> 'N','message'=>'您輸入的序號已超過剩餘折抵人數，請重新檢查'.$totleCut.'-'.$people], 200);
                }
            }
            


            $pay_status = '未完成';
            if(intval($money - $cut1 - $cut2)  == 0){
                $pay_status = '已付款';
            }
            $data = [
                'pro_id'     => $request->pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'dial_code'  => $request->dial_code,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'notes'      => $request->notes,
                'meat'       => '',
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $request->manage,
                'is_overseas'=> $request->has('is_overseas') ? $request->is_overseas : 0,
                'vegetarian' => $request->vegetarian,
                'no_alcohol' => $request->no_alcohol,
            ];

            $order = order::create($data);
            
            $sentSuccess = false;
            $isPay = false;
            if($data['money'] == 0){
                $sentSuccess = true;
            } else {
                // 送到金流

                $pay_by_prime = 'https://prod.tappaysdk.com/tpc/payment/pay-by-prime'; // 正式
                $partner_key  = 'partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC';
                $merchant_id  = 'surpriselab_00001';
/*
                $pay_by_prime = 'https://sandbox.tappaysdk.com/tpc/payment/pay-by-prime'; // 測試
                $partner_key  = 'partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC';
                $merchant_id  = 'surpriselab_TAISHIN';
                */
                $amount = $money - $cut1 - $cut2;
                // 疫情影響第一階段調整
                $amount *= 1.1; // 一成服務費
                // 第二階段加入折扣碼
                switch ($request->discount) {
                    case 'preplayer': $amount -= ($people*200); break;
                    case 'friendplayer': $amount -= ($people*450); break;
                    case 'vipplayer': $amount -= ($people*700); break;
                }
                /*
                if($data['is_overseas'] == 1){
                    $amount *= 1.1; // 一成服務費
                }
                */
                $postData = [
                    "prime"       => $request->prime,
                    "partner_key" => $partner_key,
                    "merchant_id" => $merchant_id,
                    "details"     => "明日俱樂部",
                    "amount"      => $amount,
                    "order_number"=> $count,
                    "cardholder"  => [
                        "phone_number" => $request->dial_code.$request->tel,
                        "name"         => $request->name,
                        "email"        => $request->email,
                        "zip_code"     => "",
                        "address"      => "",
                        "national_id"  => "",
                    ],
                    "remember"    => false
                ];

                $r = curl_init();
                curl_setopt($r, CURLOPT_URL, $pay_by_prime);
                curl_setopt($r, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'x-api-key:'.$partner_key));
                curl_setopt($r, CURLOPT_POST, 1);
                curl_setopt($r, CURLOPT_POSTFIELDS, json_encode($postData));
                curl_setopt($r, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($r, CURLOPT_CONNECTTIMEOUT, 35);
                $tappayData = curl_exec($r);
                curl_close($r);
                $order->result = $tappayData;
                if($request->discount!=''){
                    $order->manage = "使用折扣碼:".$request->discount;
                }
                $order->money = $amount; // 加上服務費的費用
                $tappayObj = json_decode($tappayData);
                if($tappayObj->status == 0){
                    $order->pay_status = '已付款';
                    $sentSuccess = true;
                }
                $order->save();
                $isPay = true;
            }


            if($order->pay_status == '已付款' || $order->pay_type == '現場付款'){
                
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                $mailer = [
                    'day'   => implode(" ",str_split(Carbon::parse($act->day)->format('Y/m/d'))),
                    'time'  => implode(" ",str_split(substr($act->rang_start,0,5))),
                    'pople' => $people,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'sub'   => '【明日俱樂部】訂位確認信'
                ];
                //config(['mail.username' => env('MAIL_CLUB_USER')]);
                //config(['mail.password' => env('MAIL_CLUB_PASS')]);
                if(strpos($mailer['email'],'@yahoo') || strpos($mailer['email'],'@hotmail')) {
                    config(['mail.host' => 'smtp.gmail.com']);
                    config(['mail.username' => env('MAIL_CLUB_USER')]);
                    config(['mail.password' => env('MAIL_CLUB_PASS')]);
                }
                $mailTemplate = 'order';
                if($isPay){
                    $mailTemplate = 'orderGo';
                    $mailer['sub'] = '【明日俱樂部行前提醒】九項你需要知道的行前注意事項';
                }
                Mail::send('clubtomorrow.email.'.$mailTemplate,$mailer,function($m) use ($mailer){
                    $m->from('clubtomorrow@surpriselab.com.tw', '明日俱樂部');
                    $m->sender('clubtomorrow@surpriselab.com.tw', '明日俱樂部');
                    $m->replyTo('clubtomorrow@surpriselab.com.tw', '明日俱樂部');

                    $m->to($mailer['email'], $mailer['name']);
                    $m->subject($mailer['sub']);
                });

                /*
                取消信件寄送
                $phone = $request->tel;
                if($request->dial_code == "+886"){
                    $phone_number = "0".$phone;
                } else {
                    $phone_number = str_replace('+','',$request->dial_code).$phone;
                }
                $message = config('setting.club.order_sms');
                $sent_obj = SLS::sent_single_sms($phone_number,$message);
                */
                
            }
            

            return Response::json(array(
                'success'   => $sentSuccess,
                'SN'        => $count
            ), 200);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }





    // 換日期
    public function changeActivityAjax(Request $request){
        if($request->ajax() && $request->has('act')){
            $input = $request->all();
            switch ($input['act']) {
                case 'getDayTime':
                    $id = $input['id'];
                    $pro = pro::where('id',$id)->select('day','rang_start','rang_end')->first();
                    return Response::json(array(
                        'success' => true,
                        'day'     => $pro->day,
                        'time'    => substr($pro->rang_start,0,5).'-'.substr($pro->rang_end,0,5)
                    ), 200);

                    break;
                case 'myOrder':
                    $dial_code = $input['dial_code'];
                    $phone     = $input['phone'];
                    $email     = $input['email'];
                    $order = order::leftJoin('club_pro', 'club_pro.id', '=', 'club_order.pro_id');
                    $order = $order->select('rang_start','rang_end','name','tel','notes','club_order.manage','club_pro.money AS PM','club_order.money AS OM','club_order.created_at AS created_at','club_order.pay_status','email','club_order.sn','club_order.id','day_parts','day','pay_type','pople','pro_id','is_overseas','dial_code','discount');
                    // 日期(場次)範圍
                    $order = $order->where('can_re',1); // 可自行改期
                    $order = $order->whereRaw("(club_order.pay_status='已付款' OR club_order.pay_status='更改場次')");
                    $order = $order->where('dial_code',$dial_code)->where('email',$email)->where('tel',$phone)->get();

                    $success = false;
                    $orders = [];
                    foreach($order as $row){
                        // 訂單票券
                        $ticket = ''; $p1 = 0;$p4 = 0;$p10 = 0;
                        $coupons = coupon::select('type')->where('o_id',$row->sn)->get();
                        foreach($coupons as $r){
                            switch ($r->type) {
                                case 'p1': $p1++; break;
                                case 'p4': $p4++; break;
                                case 'p10': $p10++; break;
                            }
                        }
                        if($p1>0) $ticket .= "單人票 Single Player * ".$p1;
                        if($p4>0) $ticket .= "四人票 Multiplayer for 4 * ".$p4;
                        if($p10>0) $ticket .= "十人票 Multiplayer for 10 * ".$p10;
                        // 日期時段
                        $cday  = '';
                        $ctime = '';
                        if($row->pay_status == '更改場次' && $row->discount>0){
                            $pro = pro::leftJoin('club_order', 'club_pro.id', '=', 'club_order.pro_id')->where('club_order.id',$row->discount)->select('day','rang_start','rang_end')->first();
                            if($pro){
                                $cday  = $pro->day;
                                $ctime = substr($pro->rang_start,0,5).'-'.substr($pro->rang_end,0,5);
                            }
                        }
                        $tmp = [
                            'id'        => $row->id,
                            'name'      => $row->name,
                            'people'    => $row->pople,
                            'dial_code' => $row->dial_code,
                            'phone'     => $row->tel,
                            'email'     => $row->email,
                            'notes'     => $row->notes,
                            'status'    => $row->pay_status,
                            'day'       => $row->day,
                            'time'      => substr($row->rang_start,0,5).'-'.substr($row->rang_end,0,5),
                            'cday'      => $cday,
                            'ctime'     => $ctime,
                            'ticket'    => $ticket,
                        ];
                        array_push($orders, $tmp);
                        $success = true;
                    }
                    return Response::json(array(
                        'success' => $success,
                        'order'   => $orders
                    ), 200);
                    break;
                case 'changeOrder':
                    $order_id = $input['order_id'];
                    $pro_id   = $input['pro_id'];
                    $people   = $input['people'];
                    $now = Carbon::now()->toDateString();
                    $sn = order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');
                    if($sn>0){
                        $sn += 1;
                    } else {
                        $sn = Carbon::now()->format('Ymd').'001';
                    }
                    // 檢查座位是否足夠
                    $act = pro::where('id',$pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(club_order) WHERE club_order.pro_id=club_pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'day','rang_start','rang_end')->first();
                    if($people>$act->Count){
                        Log::error('人數滿了');
                        return Response::json(array(
                            'success' => false,
                            'message' => '人數已滿'
                        ), 200);
                    }
                    // 建立一筆新的訂單
                    $order = order::find($order_id);
                    $manage = $order->manage."\n".date('Y-m-d H:i:s').' '.$order->sn." 更改場次";
                    $newOrder = order::create([
                        'pro_id'    => $pro_id,
                        'pople'     => $order->pople,
                        'name'      => $order->name,
                        'dial_code' => $order->dial_code,
                        'tel'       => $order->tel,
                        'email'     => $order->email,
                        'notes'     => $order->notes,
                        'meat'      => $order->meat,
                        'coupon'    => $order->coupon,
                        'sn'        => $sn,
                        'money'     => $order->money,
                        'pay_type'  => $order->pay_type,
                        'pay_status'=> '已付款',
                        'result'    => $order->result,
                        'manage'    => $manage,
                        'discount'  => $order_id,
                        'is_overseas'=> $order->is_overseas,
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);
                    // 更改舊訂單的狀態 已付款 -> 更改日期 並新增備註
                    $order->pay_status = '更改場次';
                    $order->discount   = $newOrder->id;
                    $order->manage     = $order->manage."\n".date('Y-m-d H:i:s').' '.$sn." 更改場次";
                    $order->save();
                    // 更改兌換券訂單編號
                    coupon::where('o_id',$order->sn)->update(['o_id'=>$sn]);
                    // 寄送信件
                    $sentSuccess = true;
                    try {
                        $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                        $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                        $mailer = [
                            'day'   => implode(" ",str_split(Carbon::parse($act->day)->format('Y/m/d'))),
                            'time'  => implode(" ",str_split(substr($act->rang_start,0,5))),
                            'pople' => $order->pople,
                            'email' => $order->email,
                            'name'  => $order->name,
                            'gday'  => $rangStart.'/'.$rangEnd,
                        ];
                        if(strpos($mailer['email'],'@yahoo') || strpos($mailer['email'],'@hotmail')) {
                            config(['mail.host' => 'smtp.gmail.com']);
                            config(['mail.username' => env('MAIL_CLUB_USER')]);
                            config(['mail.password' => env('MAIL_CLUB_PASS')]);
                        }
                        Mail::send('clubtomorrow.email.order',$mailer,function($m) use ($mailer){
                            $m->from('clubtomorrow@surpriselab.com.tw', '明日俱樂部');
                            $m->sender('clubtomorrow@surpriselab.com.tw', '明日俱樂部');
                            $m->replyTo('clubtomorrow@surpriselab.com.tw', '明日俱樂部');

                            $m->to($mailer['email'], $mailer['name']);
                            $m->subject('【明日俱樂部】訂位確認信');
                        });
                    } catch (Exception $exception) {
                        Log::error($exception);
                        $sentSuccess = true;
                    }
                    return Response::json(array(
                        'success'   => $sentSuccess,
                        'SN'        => $sn
                    ), 200);
                    break;
            }
            
        }
    }

}
