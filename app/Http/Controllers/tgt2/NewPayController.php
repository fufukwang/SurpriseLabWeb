<?php

namespace App\Http\Controllers\tgt2;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\tgt2\coupon;
use App\model\tgt2\order;
use App\model\tgt2\pro;
use Treerful\Pay2goInvoice\Invoice;

use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;
use SLS;

class NewPayController extends Controller
{
	public function __construct(Request $request)
    {
        // DB::enableQueryLog();
    }
    // 訂單處理送往金流 ( 藍新 )
    public function postOrderByNeweb(Request $request){
        try {
            $newebpay = new \NewebPay();
            $now = Carbon::now()->toDateString();
            $count = order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');

            if($count>0){
                $count += 1;
            } else {
                $count = Carbon::now()->format('Ymd').'0001';
            }

            $people = $request->booking_people;

            $act = pro::where('id',$request->booking_time)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(tgt2order) WHERE tgt2order.pro_id=tgt2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts')->first();
            if($people>$act->Count){
                Log::error('人數滿了');
                return view('thegreattipsy.frontend.booking_fail');
            }

            $pay_type = '信用卡';
            $money = $act->money * $people;
            $cut1 = 0; $cut2 = 0;
            // 確認庫碰碼
            $coupon = 0;
            if($request->has('coupon')){
                foreach ($request->coupon as $key => $value) {
                    $coupon_count = coupon::where('code',$value)->where('o_id',0)->count();
                    if($coupon_count>0){
                        $me = coupon::where('code',$value)->where('o_id',0)->select('type')->first();
                        $coupon++;
                        coupon::where('code',$value)->where('o_id',0)->update(['o_id'=>$count]);
                        if($me->type == 'eb1' || $me->type == 'p1'){
                            $cut1 += $act->money;
                        } elseif ($me->type == 'p2') {
                            $cut1 += $act->money * 2;
                        } elseif ($me->type == 'p4') {
                            $cut1 += $act->money * 4;
                        } elseif ($me->type == 'p6') {
                            $cut1 += $act->money * 6;
                        }
                    }
                }
            }

            $pay_status = '未完成';
            if(intval($money - $cut1 - $cut2)  == 0){
                $pay_status = '已付款';
            }
            $data = [
                'pro_id'     => $request->booking_time,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->phone,
                'email'      => $request->email,
                'notes'      => $request->notice,
                'meat'       => json_encode([]),
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => '',
                'is_overseas'=> 2,
                'vegetarian' => $request->vegetarian_food,
            ];

            $order = order::create($data);
            
            $sentSuccess = false;
            if($data['money'] == 0){
                return view('thegreattipsy.frontend.booking_success');
            } else {
                // 送到金流
                return $newebpay->payment(
                    $count, // 訂單編號
                    $data['money'], // 交易金額
                    "微醺", // 交易描述
                    $data['email'] // 付款人信箱
                )->submit();
                /*
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
                */
            }

        } catch (\Exception $exception) {
            Log::error($exception);
            return view('thegreattipsy.frontend.booking_fail');
        }
    }
    // 藍新回傳顯示訂單正確失敗頁面
    public function postReturnByNeweb(Request $request){
        try {
            // 接收回傳資料
            $retrunData = $request->all();
            $newebpay = new \NewebPay();
            $retrunData['data'] = $newebpay->decodeCallback($retrunData['TradeInfo']);
            $sn = $retrunData['data']['Result']['MerchantOrderNo'];
            $order = order::where('sn',$sn)->orderBy('created_at','DESC')->first();
            // 確認是否成功
            if($retrunData['Status'] == 'SUCCESS'){
                // 找出訂單並寫入訊息
                $pay_data = [
                    'result'    => json_encode($retrunData),
                    'pay_status' => '已付款'
                ];
                order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update($pay_data);

                return view('thegreattipsy.frontend.booking_success');
            } else {
                $pay_data = [
                    'result'    => json_encode($retrunData),
                ];
                $sn = $retrunData['data']['Result']['MerchantOrderNo'];
                order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update($pay_data);
                return view('thegreattipsy.frontend.booking_fail');
            }









        } catch (\Exception $exception) {
            Log::error($exception);
            return view('thegreattipsy.frontend.booking_fail');
        }
    }
    // 藍新背景回傳寄送信件 & 二次確認
    public function postBackReturn(Request $request){
        try {
            $retrunData = $request->all();
            $newebpay = new \NewebPay();
            $retrunData['data'] = $newebpay->decodeCallback($retrunData['TradeInfo']);

            // 確認訂單編號
            $pay_data = [
                'meat' => json_encode($retrunData),
            ];
            $sn = $retrunData['data']['Result']['MerchantOrderNo'];
            // 存入資料庫
            order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update($pay_data);
            $order = order::where('sn',$sn)->orderBy('created_at','DESC')->first();
            // 確認訂單寫入狀態
            if($order && $retrunData['Status'] == 'SUCCESS'){
                if($order->result == ''){
                    $pay_data = [
                        'pay_status' => '已付款'
                    ];
                    order::where('id',$order->id)->orderBy('created_at','DESC')->limit(1)->update($pay_data);
                    $order->pay_status = '已付款';
                }
            }

            



            // 寄送信件
            if($order->pay_status == '已付款' && $order->is_send === 0){
                $act = pro::where('id',$order->pro_id)->first();
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                /*
                $rangTS    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_start,0,5)))));
                $rangTE    = str_replace('03:','27:',str_replace('01:','25:',str_replace('02:','26:',str_replace('00:','24:',substr($act->rang_end,0,5)))));
                */
                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('Y / m / d'),
                    'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $order->pople,
                    'email' => $order->email,
                    'name'  => $order->name,
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn
                ];
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
                    /*
                    if($day <= 5){
                        $toData['type'] = "D05";
                        SLS::SendPreviewEmail($toData);
                    }
                    */
                    if($day == 0){
                        SLS::sent_single_sms($order->tel,"敬愛的賓客，《微醺大飯店：1980s》開幕酒會將在今日舉行，期待見面！\n\n順安, 微醺大飯店：1980s");
                    }
                    // SLS::sent_single_sms($order->tel,"《微醺大飯店》酒會邀請函已寄出。\n\n若未收到，請由此開啟 ☛ https://bit.ly/tipsyinvt\n\n我們萬分期待您的前來。");
                } catch (\Exception $e){
                    Log::error($e);
                }
            }
            return response('success');

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
}
