<?php

namespace App\Http\Controllers\paris;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\paris\coupon;
use App\model\paris\order;
use App\model\paris\pro;
use App\model\setting;

use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;
use SLS;

class FrontController extends WebController
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }


    public function GetAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act')){
                $pople = $request->pople;
                if($request->has('ticketType')){
                    if($request->ticketType == '雙人共舞票'){
                        $pople = $pople * 2;
                    } elseif($request->ticketType == '四人群舞票'){
                        $pople = $pople * 4;
                    }
                }
                if(is_numeric($pople) && $pople>0){
                    $pro = pro::where('open',1)->whereRaw("(sites-{$this->oquery})>=".$pople);
                } else {
                    return Response::json(['success'=> 'N'], 200);
                }
                

                switch ($request->act) {
                    case 'getBypople': // 票種 & 人數 取得 day
                        $ticketType = $request->ticketType;
                        $pro = $pro->select(DB::raw("(SUM(sites) - SUM(({$this->oquery}))) AS sites,day"))->groupBy('day')->where('day','>=',Carbon::today())->where('special',0);
                        $pro = $pro->get();
                        return $pro->toJson();
                    break;
                    /*
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
                    */
                    case 'getBydartpart': // 日期 時段 取得 range
                        $dayparts   = $request->day_parts;
                        $day        = $request->day;
                        $ticketType = $request->ticketType;
                        $pro = $pro->select(DB::raw("(sites-{$this->oquery}) AS sites,id,rang_start,rang_end,money,cash,p1,p2,p4"))->where('day',$day)->get();
                        return $pro->toJson();
                    break;
/*
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
                                case 'p2': $type = '單人獨舞票'; break;
                                case 'p2': $type = '雙人共舞票'; break;
                                case 'p4': $type = '四人群舞票'; break;
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
*/
                    case 'CheckDiscount':
                        $slug = $request->useType;
                        $discount_obj = false;
                        $discount_code = strtoupper($request->code);
                        $discount_list = json_decode(setting::where('slug','paris_'.$slug.'_discount')->first()->json,true);
                        foreach($discount_list as $row){
                            if(strtoupper($row['code']) == $discount_code){
                                $discount_obj = $row;
                                break;
                            }
                        }

                        if($discount_obj){
                            // 數量確認
                            if($discount_obj['number'] > 0){
                                $queryBetween = "'".Carbon::now()->subSeconds(900)->format('Y-m-d H:i:s')."' AND '".Carbon::now()->format('Y-m-d H:i:s')."'";
                                $used_count = order::where('dis_code',$discount_code)
                                    ->whereRaw("(pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))")->count();
                                if($discount_obj['number'] <= $used_count){
                                    return Response::json(['success'=> 'N','message'=>'序號錯誤或已額滿'], 200);
                                }
                            }
                            // 額度
                            if(isset($discount_obj['satisfy']) && $discount_obj['satisfy'] > 0){
                                if($request->need >= $discount_obj['satisfy']){
                                    // do nothing
                                } else {
                                    return Response::json(['success'=> 'N','message'=>'金額未達此折扣碼限制'], 200);
                                }
                            }
                            // 期限限制
                            if(isset($discount_obj['day']) && $discount_obj['day'] !=''){
                                if(strtotime($discount_obj['day'].' 23:59:59')<time()){
                                    return Response::json(['success'=> 'N','message'=>'此序號已過期'], 200);
                                }
                            }
                            // 票種限制
                            if(isset($discount_obj['ticket']) && $discount_obj['ticket'] !=''){

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
                    /*
                    $json = json_decode(setting::where('slug','dark3_setting')->first()->json,true);
                    $json['pay'] = order::whereIn('pay_status',['已付款','已付款(部分退款)'])->where('is_overseas',2)->sum('pople') ?? 0;
                    */
                    $json = [
                        'max' => pro::sum('sites') ?? 0,
                        'pay' => order::whereIn('pay_status',['已付款','已付款(部分退款)'])->sum('pople') ?? 0,
                    ];
                    return Response::json($json,200);
                }
                // 刷卡票數
                if($request->method == 'getMaxDate'){
                    $json = json_decode(setting::where('slug','paris_setting')->first()->json,true);
                    return Response::json($json,200);
                }
            }
        } else {
            abort(404);
        }
    }

    public function PostAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act') && $request->has('ticket') && $request->act=='CheckParisCoupon'){
                $coupon = coupon::where('code',$request->code)->whereRaw('(end_at>="'.Carbon::now()->format('Y-m-d H:i:s').'" OR end_at IS NULL)');
                $coupon = $coupon->where('o_id',0)->count();
                if($coupon>0){
                    $me = coupon::where('code',$request->code)->select('type')->first();
                    $type = '';
                    switch ($me->type) {
                        case 'p1': $type = '單人獨舞票'; break;
                        case 'p2': $type = '雙人共舞票'; break;
                        case 'p4': $type = '四人群舞票'; break;
                    }
                    if($request->ticket == $type){
                        $pro = pro::select($me->type.' as money')->find($request->num);
                        return Response::json([
                            'success' => 'Y',
                            'money'  => $pro->money
                        ], 200);        
                    } else {
                        return Response::json(['success'=> 'N','message'=>'序號票種錯誤或已使用'], 200);
                    }
                } else {
                    return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
                }
            } elseif($request->has('act') && $request->act=='CheckParisCoupons'){
                $coupon = coupon::where('code',$request->code)
                    ->whereRaw('(end_at>="'.Carbon::now()->format('Y-m-d H:i:s').'" OR end_at IS NULL)')->where('o_id',0)->count();
                if($coupon>0){
                    $me = coupon::where('code',$request->code)->select('type')->first();
                    $type = '';
                    $cut = 0;
                    switch ($me->type) {
                        case 'p1': $type = '單人獨舞票'; $cut = 1; break;
                        case 'p2': $type = '雙人共舞票'; $cut = 2; break;
                        case 'p4': $type = '四人群舞票'; $cut = 4; break;
                    }
                    $pro = pro::select($me->type.' as money')->find($request->num);
                    return Response::json([
                        'success' => 'Y',
                        'cut' => $cut,
                        'type' => $type,
                    ], 200);        
                } else {
                    return Response::json(['success'=> 'N','message'=>'序號錯誤或已使用'], 200);
                }
            } elseif($request->has('act') && $request->act=='CheckParisDiscount'){
                $slug = $request->useType ?? 'pay';
                $discount_obj = false;
                $discount_code = strtoupper($request->code);
                $discount_list = json_decode(setting::where('slug','paris_'.$slug.'_discount')->first()->json,true);
                foreach($discount_list as $row){
                    if(strtoupper($row['code']) == $discount_code){
                        $discount_obj = $row;
                        break;
                    }
                }

                if($discount_obj){
                    // 數量確認
                    if($discount_obj['number'] > 0){
                        $queryBetween = "'".Carbon::now()->subSeconds(900)->format('Y-m-d H:i:s')."' AND '".Carbon::now()->format('Y-m-d H:i:s')."'";
                        $used_count = order::where('dis_code',$discount_code)
                                    ->whereRaw("(pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN {$queryBetween}))")->count();
                        if($discount_obj['number'] <= $used_count){
                            return Response::json(['success'=> 'N','message'=>'序號錯誤或已額滿'], 200);
                        }
                    }
                    // 額度
                    if(isset($discount_obj['satisfy']) && $discount_obj['satisfy'] > 0){
                        if($request->need >= $discount_obj['satisfy']){
                            // do nothing
                        } else {
                            return Response::json(['success'=> 'N','message'=>'金額未達此折扣碼限制'], 200);
                        }
                    }
                    // 期限限制
                    if(isset($discount_obj['day']) && $discount_obj['day'] !=''){
                        if(strtotime($discount_obj['day'].' 23:59:59')<time()){
                            return Response::json(['success'=> 'N','message'=>'此序號已過期'], 200);
                        }
                    }
                    // 票種限制
                    if(isset($discount_obj['ticket']) && $discount_obj['ticket'] !=''){
                        if($request->ticket != $discount_obj['ticket']){
                            return Response::json(['success'=> 'N','message'=>'序號與票種不符，請確認您選擇的票種'], 200);
                        }
                    }
                    return Response::json(['success'=> 'Y','money'=>$discount_obj['money']], 200);
                } else {
                    return Response::json(['success'=> 'N','message'=>'序號錯誤或已額滿'], 200);
                }
            }
        } else {
            return Response::json(['success'=> 'N','message'=>'序號錯誤'], 200);
        }
    }

    public function ReOrderData(Request $request){
        try {
            $count = $this->grenOrderSN();
            $people = $request->people;
            $act = pro::where('id',$request->pro_id)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts','p1','p2','p4')->first();
            if($people>$act->Count){
                Log::error('人數滿了');
                return Response::json(['success'=> 'N','message'=>'人數滿了'], 200);
            }
            
            $pay_type = '信用卡';
            // $money = $act->$ticket * $request->num;
            $money = 0;
            $cut1 = 0; $cut2 = 0; $cutPeople = 0;
            // 確認庫碰碼
            $coupon = 0;
            $couponCode = '';
            $manage = '';
            $ticket = '';
            $pay_status = '未完成';

            $data = [
                'pro_id'     => $request->pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->area_code.$request->phone,
                'email'      => $request->email,
                'notes'      => $request->notes,
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $manage,
                'is_overseas'=> 2,
                'ticket'     => $ticket,
                'dis_code'   => '',
                'dis_money'  => 0,
                'co_code'    => '',
                'co_money'   => $cut1,
                'tax_id'     => $request->company_tax_ID ?? '',
                'tax_name'   => $request->company_name ?? '',
                'vehicle'    => $request->vehicle ?? '',
                'need_english' => $request->need_english ?? 0,
                'need_chinese' => $request->need_chinese ?? 0,
            ];
            $order = order::create($data);

            // 新增訂單後檢查
            if($request->has('coupons') && $request->coupons !=''){
                $couponCode = $request->coupons;
                foreach ($couponCode as $key => $value) {
                    $coN = coupon::where('code',$value)->whereRaw('(end_at>="'.Carbon::now()->format('Y-m-d H:i:s').'" OR end_at IS NULL)')->where('o_id',0)->count();
                    if($coN>0){
                        $me = coupon::where('code',$value)->where('o_id',0)->select('type')->first();
                        $mytype = $me->type;
                        coupon::where('code',$value)->where('o_id',0)->update(['o_id'=>$count]);
                        $money += $act->$mytype;
                        $cut1 += $act->$mytype;
                        $manage .= $value.'折抵 '.$act->$mytype."\n";

                        switch($mytype){
                            case 'p1': $cutPeople += 1; break;
                            case 'p2': $cutPeople += 2; break;
                            case 'p4': $cutPeople += 4; break;
                        }
                        if($key == 0){ $ticket = $mytype;
                        } else {
                            if($ticket != $mytype) $ticket = '';
                        }
                    } else {
                        $manage .= '使用序號列表:'.implode(",", $couponCode);
                        order::where('id',$order->id)->update(['manage' => $manage,]);
                        Log::error('paris booking 序號驗證錯誤'.$value);
                        return Response::json(['success'=> 'N','message'=>'序號驗證錯誤'], 200);
                    }
                }
            }
            if(count($request->coupons) == 0 ){
                Log::error('序號驗證錯誤0');
                return Response::json(['success'=> 'N','message'=>'序號驗證錯誤'], 200);
            }

            if(intval($money - $cut1 - $cut2)  == 0 && $people == $cutPeople){
                $pay_status = '已付款';
            }

            if($people == $cutPeople){
                $updateData = [
                    'coupon'     => $coupon,
                    'money'      => $money - $cut1 - $cut2,
                    'pay_status' => $pay_status,
                    'manage'     => $manage,
                    'ticket'     => $ticket,
                    'co_money'   => $cut1,
                ];
                order::where('id',$order->id)->update($updateData);
                $ord = order::leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id')
                    ->select('pople','paris_pro.day','rang_start','need_english','paris_order.id','name','email','tel','need_chinese','sn')->find($order->id);

                $this->sendMailCenter($ord);
                $this->sendSmsCenter($ord);
                return Response::json(['success'=> 'Y','message'=>'成功登記'], 200);
            } else {
                return Response::json(['success'=> 'N','message'=>'人數錯誤'], 200);
            }

        } catch (\Exception $exception) {
            Log::error($exception);
            return Response::json(['success'=> 'N','message'=>'其他錯誤'], 200);
        }
    }
/*
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
            $act = pro::where('id',$request->pro_id)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts')->first();
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

                        $cutPeople += 2;
                    }
                }
            }


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
                'meat_eat'   => $request->meat_food ?? 0,
                'no_beef'    => $request->meat_food_noBeef ?? 0,
                'no_pork'    => $request->meat_food_noPork ?? 0,
                'no_nut_m'   => $request->meat_food_noNut ?? 0,
                'no_shell'   => $request->meat_food_noSeafood ?? 0,
                'no_fish'    => $request->meat_food_noAllSeafood ?? 0,
                'no_nut_v'   => $request->vegetarian_food_noNut ?? 0,
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

                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('Y / m / d'),
                    'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $request->Pople,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                    'phone' => $data['tel'],
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'vegetarian' => $data['vegetarian'],
                    'meat_eat' => $data['meat_eat'],
                    'no_beef' => $data['no_beef'],
                    'no_pork' => $data['no_pork'],
                    'no_nut_m' => $data['no_nut_m'],
                    'no_shell' => $data['no_shell'],
                    'no_fish' => $data['no_fish'],
                    'no_nut_v' => $data['no_nut_v'],
                    'need_english' => 0, // 前端沒數字
                    'eday'   => Carbon::parse($act->day)->format('d / m / Y'),
                    'template' => 'order',
                    'mday'     => $act->day,
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
                    SLS::SendEmailByTemplateName($mailer);
                    SLS::SendSmsByTemplateName($mailer);
                }
                if($day == 0){
                    $mailer['template'] = 'DX';
                    SLS::SendSmsByTemplateName($mailer);
                }

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
*/
}
