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
                            $sent_obj = SLS::sent_single_sms($phone_number);
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

                        $pro = $pro->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(club_order) WHERE club_order.pro_id=club_pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,money,cash"))->where('day',$day)->get();
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

                            return Response::json(['success'=> 'Y','ticketAmount'=>$ticketAmount,'ticket'=>$type], 200);    
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
            ];

            $order = order::create($data);
            
            $sentSuccess = false;
            if($data['money'] == 0){
                $sentSuccess = true;
            } else {
                // 送到金流

                $pay_by_prime = 'https://prod.tappaysdk.com/tpc/payment/pay-by-prime'; // 正式
                $partner_key  = 'partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC';
                $merchant_id  = 'surpriselab_00001';
                
                $amount = $money - $cut1 - $cut2;
                if($data['is_overseas'] == 1){
                    $amount *= 1.1; // 一成服務費
                }
                $postData = [
                    "prime"       => $request->prime,
                    "partner_key" => $partner_key,
                    "merchant_id" => $merchant_id,
                    "details"     => "微醺",
                    "amount"      => $amount,
                    "order_number"=> $count,
                    "cardholder"  => [
                        "phone_number" => $request->tel,
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
                $tappayObj = json_decode($tappayData);
                if($tappayObj->status == 0){
                    $order->pay_status = '已付款';
                    $sentSuccess = true;
                }
                $order->save();
            
            }


            if($order->pay_status == '已付款' || $order->pay_type == '現場付款'){
                /*
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                $rangTS    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_start,0,5)))));
                $rangTE    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_end,0,5)))));
                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('m/d'),
                    'time'  => $act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $request->Pople,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                    'gday'  => $rangStart.'/'.$rangEnd,
                ];
                config(['mail.username' => env('MAIL_CLUB_USER')]);
                config(['mail.password' => env('MAIL_CLUB_PASS')]);
                Mail::send('thegreattipsy.email.order',$mailer,function($m) use ($mailer){
                    $m->from('thegreattipsy@surpriselab.com.tw', '明日俱樂部');
                    $m->sender('thegreattipsy@surpriselab.com.tw', '明日俱樂部');
                    $m->replyTo('thegreattipsy@surpriselab.com.tw', '明日俱樂部');

                    $m->to($mailer['email'], $mailer['name']);
                    $m->subject('明日俱樂部-訂單完成信件!');
                });
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

}
