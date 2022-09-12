<?php

namespace App\Http\Controllers\dark3;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\dark3\coupon;
use App\model\dark3\order;
use App\model\dark3\pro;
use App\model\setting;

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
    


    public function GetAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act')){
                $pople = $request->pople;
                if(is_numeric($pople) && $pople>0){
                    $pro = pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$pople);
                } else {
                    return Response::json(['success'=> 'N'], 200);
                }
                

                switch ($request->act) {
                    case 'getBypople': // 票種 & 人數 取得 day
                        $ticketType = $request->ticketType;
                        $pro = $pro->select('day')->groupBy('day')->where('day','>=',Carbon::today())->where('special',0);
                        if($ticketType == 1){
                            $pro = $pro->whereRaw("floor(ABS(DATEDIFF( '17530101', `dark3pro`.`day`)) % 7 / 5)=0");
                        }
                        $pro = $pro->get();
                        return $pro->toJson();
                    break;
                    case 'getSpecialBypople': // 票種 & 人數 取得 day
                        $ticketType = $request->ticketType;
                        $pro = $pro->select('day')->groupBy('day')->where('day','>=',Carbon::today())->where('special',1);
                        $pro = $pro->get();
                        return $pro->toJson();
                    break;
                    case 'getByday': // 日期 取得 時段
                        $day        = $request->day;
                        $ticketType = $request->ticketType;
                        $pro = $pro->select('day_parts','day')->groupBy('day_parts')->where('day',$day)->get();
                        return $pro->toJson();
                    break;
                    case 'getBydartpart': // 日期 時段 取得 range
                        $dayparts   = $request->day_parts;
                        $day        = $request->day;
                        $ticketType = $request->ticketType;
                        $pro = $pro->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS sites,id,rang_start,rang_end,money,cash"))->where('day_parts',$dayparts)->where('day',$day)->get();
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
                                case 'p2': $type = '雙人套票'; break;
                                case 'p4': $type = '雙菜單套票'; break;
                                case 'gift': $type = '禮物卡'; break;
                            }
                            $ticketType = $request->ticketType;
                            return Response::json([
                                'success' => 'Y',
                                'ticket'  => $type
                            ], 200);    
                        } else {
                            return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
                        }
                    break;

                    case 'CheckDiscount':
                        $slug = $request->useType;
                        $discount_obj = false;
                        $discount_code = strtoupper($request->code);
                        $discount_list = json_decode(setting::where('slug','dark3_'.$slug.'_discount')->first()->json,true);
                        foreach($discount_list as $row){
                            if(strtoupper($row['code']) == $discount_code){
                                $discount_obj = $row;
                                break;
                            }
                        }

                        if($discount_obj){
                            // 數量確認
                            if($discount_obj['number'] > 0){
                                $used_count = order::where('dis_code',$discount_code)
                                    ->whereRaw("pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE())")->count();
                                if($discount_obj['number'] <= $used_count){
                                    return Response::json(['success'=> 'N','message'=>'序號錯誤或已額滿'], 200);
                                }
                            }
                            if(isset($discount_obj['satisfy']) && $discount_obj['satisfy'] > 0){
                                if($request->need >= $discount_obj['satisfy']){
                                    // do nothing
                                } else {
                                    return Response::json(['success'=> 'N','message'=>'金額未達此折扣碼限制'], 200);
                                }
                            }
                            return Response::json(['success'=> 'Y','money'=>$discount_obj['money']], 200);
                        } else {
                            return Response::json(['success'=> 'N','message'=>'序號錯誤或已額滿'], 200);
                        }
                    break;
                }
            } elseif($request->has('method')){
                // 總售出票數
                if($request->method == 'getMaxPeople'){
                    $json = json_decode(setting::where('slug','dark3_setting')->first()->json,true);
                    $json['pay'] = order::whereIn('pay_status',['已付款','已付款(部分退款)'])->where('is_overseas',2)->sum('pople') ?? 0;
                    return Response::json($json,200);
                }
                // 刷卡票數
                if($request->method == 'getMaxDate'){
                    $json = json_decode(setting::where('slug','dark3_setting')->first()->json,true);
                    return Response::json($json,200);
                }
            }
        } else {
            abort(404);
        }
    }

    public function PostAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act') && $request->act=='CheckDarkCoupon'){
                $coupon = coupon::where('code',$request->code)->where('o_id',0);
                if($request->has('coupon') && count($request->coupon)>0){
                    $coupon = $coupon->whereNotIn('code',$request->coupon);
                }
                $coupon = $coupon->count();
                if($coupon>0){
                    $me = coupon::where('code',$request->code)->select('type')->first();
                    $type = '';
                    switch ($me->type) {
                        case 'p2': $type = '雙人套票'; break;
                        case 'p4': $type = '雙菜單套票'; break;
                        case 'gift': $type = '禮物卡'; break;
                    }
                    $ticketType = $request->ticketType;
                    return Response::json([
                        'success' => 'Y',
                        'ticket'  => $type
                    ], 200);    
                } else {
                    return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
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
                $count = Carbon::now()->format('Ymd').'0001';
            }
            $people = $request->Pople;

            $act = pro::where('id',$request->pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(dark3order) WHERE dark3order.pro_id=dark3pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts')->first();
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
            $cutPeople = 0;
            if($request->has('coupon')){
                foreach ($request->coupon as $key => $value) {
                    $coupon_count = coupon::where('code',$value)->where('o_id',0)->count();
                    if($coupon_count>0){
                        $me = coupon::where('code',$value)->where('o_id',0)->select('type')->first();
                        $coupon++;
                        coupon::where('code',$value)->where('o_id',0)->update(['o_id'=>$count]);
                        /*
                        if($request->Pay == 'onsite'){
                            if ($me->type == 'p2') {
                                $cut1 += $act->cash * 2;
                            } elseif ($me->type == 'p4') {
                                $cut1 += $act->cash * 4;
                            } elseif ($me->type == 'p6') {
                                $cut1 += $act->cash * 6;
                            }
                        } else {
                            if ($me->type == 'p2') {
                                $cut1 += $act->money * 2;
                            } elseif ($me->type == 'p4') {
                                $cut1 += $act->money * 4;
                            } elseif ($me->type == 'p6') {
                                $cut1 += $act->money * 6;
                            }
                        }
                        */
                        $cutPeople += 2;
                    }
                }
            }


            //$count = str_pad($count,3,"0",STR_PAD_LEFT);
            /*
            $meat = [];
            for($i=0;$i<$people;$i++){
                array_push($meat,$request->input('Meal.'.$i));
            }
            */
            $pay_status = '未完成';
            if($people - $cutPeople == 0){
                $pay_status = '已付款';
                $money = 0;
            }
            $data = [
                'pro_id'     => $request->pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->tel,
                'email'      => $request->email,
                'notes'      => $request->notes,
                'meat'       => json_encode([]),
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $request->manage,
                'is_overseas'=> $request->has('is_overseas') ? $request->is_overseas : 0,
                'vegetarian' => $request->vegetarian,
                'dis_code'   => '',
                'dis_money'  => $cut2,
            ];

            $order = order::create($data);
            
            $sentSuccess = false;
            if($data['money'] == 0){
                $sentSuccess = true;
            } else {
                // 送到金流
                if(env('APP_ENV') == 'production'){
                    $pay_by_prime = 'https://prod.tappaysdk.com/tpc/payment/pay-by-prime'; // 正式
                    $partner_key  = 'partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC';
                    $merchant_id  = 'surpriselab_00001';
                } else {
                    $pay_by_prime = 'https://sandbox.tappaysdk.com/tpc/payment/pay-by-prime'; // 測試
                    $partner_key  = 'partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC';
                    $merchant_id  = 'surpriselab_TAISHIN';
                }
                
                $amount = $money - $cut1 - $cut2;
                if($data['is_overseas'] == 1){
                    $amount *= 1.1;
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
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                /*
                $rangTS    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_start,0,5)))));
                $rangTE    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_end,0,5)))));
                */
                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('Y / m / d'),
                    'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $request->Pople,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                    'phone' => $data['tel'],
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'template' => 'order',
                ];
                SLS::SendEmailByTemplateName($mailer);
                SLS::SendSmsByTemplateName($mailer);
                $order->is_send = 1;
                $order->save();
                // 信件補送
                $now = time();
                $lim = strtotime($act->day.' '.$act->rang_start);
                $day = round( ($lim - $now) / 86400 );
                if($day <= 14){
                    $mailer['template'] = 'D14';
                    SLS::SendEmailByTemplateName($mailer);
                }
                if($day <= 7){
                    $mailer['template'] = 'D7';
                    SLS::SendSmsByTemplateName($mailer);
                }
                if($day == 0){
                    $mailer['template'] = 'DX';
                    SLS::SendSmsByTemplateName($mailer);
                }

                /*
                if(strpos($mailer['email'],'@yahoo')) {
                    config(['mail.host' => 'smtp.gmail.com']);
                    config(['mail.username' => env('MAIL_TGT_USER')]);
                    config(['mail.password' => env('MAIL_TGT_PASS')]);
                }
                try {
                    if($mailer['pople']==1){
                        $mailTheme = 'orderOne';
                    } else {
                        $mailTheme = 'order';
                    }
                    Mail::send('thegreattipsy.email.'.$mailTheme,$mailer,function($m) use ($mailer){
                        $m->from('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->sender('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');
                        $m->replyTo('thegreattipsy@surpriselab.com.tw', '微醺大飯店：1980s');

                        $m->to($mailer['email'], $mailer['name']);
                        $m->subject('訂位確認信 ── 內有重要任務');
                    });
                    $order->is_send = 1;
                    $order->save();
                    SLS::sent_single_sms($order->tel,"《微醺大飯店：1980s》訂位確認信已寄出，內含重要任務，請務必、務必查看。若未收到，請至促銷內容分類尋找，也歡迎來信客服信箱詢問！\n\n非常期待與您見面。\n\n順安, 微醺大飯店：1980s");
                    // 信件補送
                    $now = time();
                    $lim = strtotime($act->day.' '.$act->rang_start);
                    $day = round( ($lim - $now) / 86400 );
                    // 寄送 A 信件
                    $toData = [
                        'id'    => $order->id,
                        'name'  => $order->name,
                        'email' => $order->email,
                        'type'  => "DX" // 邀請信件
                    ];
                    // 信件補送
                    //SLS::SendPreviewEmail($toData);
                    if($day <= 21){
                        $toData['type'] = "D21";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day <= 14){
                        $toData['type'] = "D14";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day <= 11){
                        $toData['day'] = $act->day.' '.$act->rang_start;
                        $toData['type'] = "D10";
                        SLS::SendPreviewEmail($toData);
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》行前提醒信已寄至您的信箱，請前往查看。 若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待見面。\n\n順安, 微醺大飯店：1980s");
                    }
                    if($day <= 5){
                        $toData['type'] = "D05";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($day == 0){
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》開幕酒會將在今日舉行，期待見面！\n\n順安, 微醺大飯店：1980s");
                    }
                    // SLS::sent_single_sms($order->tel,"《微醺大飯店》酒會邀請函已寄出。\n\n若未收到，請由此開啟 ☛ https://bit.ly/tipsyinvt\n\n我們萬分期待您的前來。");
                } catch (\Exception $e){
                    Log::error($e);
                }
                */
            }
            

            return Response::json(array(
                'success'   => $sentSuccess,
                'SN'        => $count
            ), 200);
        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }

}
