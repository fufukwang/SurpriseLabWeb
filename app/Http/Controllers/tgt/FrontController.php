<?php

namespace App\Http\Controllers\tgt;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\tgt\coupon;
use App\model\tgt\order;
use App\model\tgt\pro;


use DB;
use Response;
use App\model\DarkContact;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;

class FrontController extends Controller
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }
    


    public function GetAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act')){
                $pople = $request->pople;
                if(is_numeric($pople) && $pople>0){
                    $pro = pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(tgtorder) WHERE tgtorder.pro_id=tgtpro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$pople);
                } else {
                    return Response::json(['success'=> 'N'], 200);
                }
                

                switch ($request->act) {
                    case 'getBypople': // 票種 & 人數 取得 day
                        $ticketType = $request->ticketType;
                        $pro = $pro->select('day')->groupBy('day')->where('day','>=',Carbon::today());
                        if($ticketType == 1){
                            $pro = $pro->whereRaw("floor(ABS(DATEDIFF( '17530101', `tgtpro`.`day`)) % 7 / 5)=0");
                        }
                        $pro = $pro->get();
                        return $pro->toJson();
                    break;
                    case 'getByday': // 日期 取得 時段
                        $day        = $request->day;
                        $ticketType = $request->ticketType;
                        /*
                        $dayOW      = Carbon::parse($day)->dayOfWeek;
                        if($ticketType == 1 && ($dayOW == 0 || $dayOW == 5 || $dayOW == 6)){
                            $pro = $pro->where('day_parts','午場');
                        }
                        */
                        $pro = $pro->select('day_parts','day')->groupBy('day_parts')->where('day',$day)->get();
                        return $pro->toJson();
                    break;
                    case 'getBydartpart': // 日期 時段 取得 range
                        $dayparts   = $request->day_parts;
                        $day        = $request->day;
                        $ticketType = $request->ticketType;
                        /*
                        $dayOW      = Carbon::parse($day)->dayOfWeek;
                        if($ticketType == 1 && ($dayOW == 0 || $dayOW == 5 || $dayOW == 6)){
                            $pro = $pro->where('day_parts','午場');
                        }
                        */
                        $pro = $pro->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(tgtorder) WHERE tgtorder.pro_id=tgtpro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,money,cash"))->where('day_parts',$dayparts)->where('day',$day)->get();
                        return $pro->toJson();
                    break;

                    case 'CheckCoupon':
                        $coupon = coupon::where('code',$request->code)->where('o_id',0);
                        if($request->has('coupon') && count($request->coupon)>0){
                            $coupon = $coupon->whereNotIn('code',$request->coupon);
                        }
                        $coupon = $coupon->count();
                        if($coupon>0){
                            $me = coupon::where('code',$request->code)->select('type')->first();
                            $type = '';
                            switch ($me->type) {
                                case 'l1': $type = '時間有點限制票'; break;
                                case 'a1': $type = '暢⾏無阻票'; break;
                                case 'a4': $type = '四⼈沈醉票'; break;
                            }
                            $ticketType = $request->ticketType;
                            $dayOW      = Carbon::parse($request->day)->dayOfWeek;
                            // 人數小於 4 但是又輸入四人沉醉票
                            /*
                            if($me->type == 'a4' && $pople<4){
                                return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
                            }
                            */
                            // 有點限制票選擇到周末晚場
                            if(($dayOW == 0 || $dayOW == 6) && $me->type == 'l1'){
                                return Response::json(['success'=> 'N','message'=>'票券選擇時間錯誤'], 200);
                            }
                            return Response::json(['success'=> 'Y','ticket'=>$type], 200);    
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
            $people = $request->Pople;

            $act = pro::where('id',$request->pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(tgtorder) WHERE tgtorder.pro_id=tgtpro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts')->first();
            if($people>$act->Count){
                Log::error('人數滿了');
                return Response::json(array(
                    'success' => false,
                    'message' => 'full'
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
            if($request->has('coupon')){
                foreach ($request->coupon as $key => $value) {
                    $coupon_count = coupon::where('code',$value)->where('o_id',0)->count();
                    if($coupon_count>0){
                        $me = coupon::where('code',$value)->where('o_id',0)->select('type')->first();
                        $dayOW      = Carbon::parse($act->day)->dayOfWeek;
                        // 人數小於 4 但是又輸入四人沉醉票
                        /*
                        if($me->type == 'a4' && $people<4){
                            Log::error('序號錯誤或已使用 ' . $value . ' | ' . $act->id);
                            return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
                        }
                        */
                        // 有點限制票選擇到周末晚場
                        if(($dayOW == 0 || $dayOW == 6) && $me->type == 'l1'){
                            Log::error('票券選擇時間錯誤 ' . $value . ' | ' . $act->id);
                            return Response::json(['success'=> 'N','message'=>'票券選擇時間錯誤'], 200);
                        }

                        $coupon++;
                        coupon::where('code',$value)->where('o_id',0)->update(['o_id'=>$count]);
                        if($request->Pay == 'onsite'){
                            $cut1 += $act->cash;
                            //$cut1 += ($me->type == 'a4') ? ($act->cash * 4) : $act->cash;
                        } else {
                            $cut1 += $act->money;
                            //$cut1 += ($me->type == 'a4') ? ($act->money * 4) : $act->money;
                        }
                    }
                }
            }


            //$count = str_pad($count,3,"0",STR_PAD_LEFT);
            $meat = [];
            for($i=0;$i<$people;$i++){
                array_push($meat,$request->input('Meal.'.$i));
            }
            $pay_status = '未完成';
            if(intval($money - $cut1 - $cut2)  == 0){
                $pay_status = '已付款';
            }
            $data = [
                'pro_id'     => $request->pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'notes'      => $request->notes,
                'meat'       => json_encode($meat),
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $request->manage,
                'is_overseas'=> $request->has('is_overseas') ? 1 : 0,
            ];

            $order = order::create($data);
            
            $sentSuccess = false;
            if($data['money'] == 0){
                $sentSuccess = true;
            } else {
                // 送到金流
                //$pay_by_prime = 'https://sandbox.tappaysdk.com/tpc/payment/pay-by-prime'; // 測試
                $pay_by_prime = 'https://prod.tappaysdk.com/tpc/payment/pay-by-prime'; // 正式
                $postData = [
                    "prime"       => $request->prime,
                    "partner_key" => "partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC",
                    "merchant_id" => "surpriselab_00001",
                    "details"     => "微醺",
                    "amount"      => $money - $cut1 - $cut2,
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
                curl_setopt($r, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'x-api-key:partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC'));
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
                config(['mail.username' => env('MAIL_TGT_USER')]);
                config(['mail.password' => env('MAIL_TGT_PASS')]);
                Mail::send('thegreattipsy.email.order',$mailer,function($m) use ($mailer){
                    $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店');
                    $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店');
                    $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店');

                    $m->to($mailer['email'], $mailer['name']);
                    $m->subject('微醺大飯店-訂單完成信件!');
                });
            }
            

            return Response::json(array(
                'success'   => true,
                'SN'        => $count
            ), 200);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }

}
