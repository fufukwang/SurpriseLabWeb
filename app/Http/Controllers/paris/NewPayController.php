<?php

namespace App\Http\Controllers\paris;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\paris\coupon;
use App\model\paris\order;
use App\model\paris\pro;
use Treerful\Pay2goInvoice\Invoice;
use App\model\setting;

use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;
use SLS;

class NewPayController extends WebController
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
                $count = '2'.Carbon::now()->format('Ymd').'0001';
            }

            $people = $request->num;
            if($request->has('ticket')){
                if($request->ticket == '雙人共舞票'){
                    $people = $people * 2;
                } elseif($request->ticket == '四人群舞票'){
                    $people = $people * 4;
                }
            }
            $act = pro::where('id',$request->booking_time)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts')->first();
            if($people>$act->Count){
                Log::error('人數滿了');
                return view('paris.frontend.booking_fail');
            }

            $pay_type = '信用卡';
            $money = $act->money * $people;
            $cut1 = 0; $cut2 = 0;
            // 確認庫碰碼
            $coupon = 0;
            /*
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
            */
            // 折扣碼
            $manage = '';
            $discountCode = '';
            if($request->has('discount')){
                $discountCode = $request->discount;
                $discount_list = json_decode(setting::where('slug','paris_pay_discount')->first()->json,true);
                foreach($discount_list as $row){
                    if(strtoupper($row['code']) == $discountCode){
                        $manage = $discountCode.'折扣 '.$row['money'];
                        $cut2 = $row['money'];
                        break;
                    }
                }
            }

            $pay_status = '未完成';
            if(intval($money - $cut1 - $cut2)  == 0){
                $pay_status = '已付款';
            }
            $ticket = '';
            switch($request->ticket){
                case '單人獨舞票': $ticket = 'p1'; break;
                case '雙人共舞票': $ticket = 'p2'; break;
                case '四人群舞票': $ticket = 'p4'; break;
            }

            $data = [
                'pro_id'     => $request->booking_time,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->area_code.$request->phone,
                'email'      => $request->email,
                'notes'      => $request->notice,
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $manage,
                'is_overseas'=> 2,
                'ticket'     => $ticket,
                // 'vegetarian' => $request->vegetarian_food,
                'dis_code'   => $discountCode,
                'dis_money'  => $cut2,
                'co_code'    => $couponCode,
                'co_money'   => $cut1,
                'tax_id'     => $request->company_tax_ID ?? '',
                'tax_name'   => $request->company_name ?? '',
                'vehicle'    => $request->vehicle ?? '',
                'need_english' => $request->need_english ?? 0,
                'need_chinese' => $request->need_chinese ?? 0,
            ];
            $order = order::create($data);

            $sentSuccess = false;
            if($data['money'] == 0){
                return view('paris.frontend.booking_success');
            } else {
                $comments = "巴黎舞會";
                if($cut2>0){
                    $comments .= "(折扣  {$discountCode} - {$cut2})";
                }
                // 送到金流
                return $newebpay->payment(
                    $count, // 訂單編號
                    $data['money'], // 交易金額
                    $comments, // 交易描述
                    $data['email'] // 付款人信箱
                )
                ->setTradeLimit(600)
                ->setReturnURL(env('APP_URL').'/lebaldeparis/Neweb.ReturnResult') // 由藍新回傳後前景畫面要接收資料顯示的網址
                ->setNotifyURL(env('APP_URL').'/lebaldeparis/Neweb.BackReturn') // 由藍新回傳後背景處理資料的接收網址
                ->setClientBackURL(env('APP_URL').'/lebaldeparis/booking') // 付款取消後返回的網址
                ->submit();
            }

        } catch (\Exception $exception) {
            Log::error($exception);
            return view('paris.frontend.booking_fail');
        }
    }
    // 藍新回傳顯示訂單正確失敗頁面
    public function postReturnByNeweb(Request $request){
        $special = 0;
        try {
            // 接收回傳資料
            $retrunData = $request->all();
            $newebpay = new \NewebPay();
            $retrunData['data'] = $newebpay->decodeCallback($retrunData['TradeInfo']);
            $sn = $retrunData['data']['Result']['MerchantOrderNo'];
            $order = order::where('sn',$sn)->orderBy('created_at','DESC')->first();
            if($order->is_overseas == 9) $special = 1;
            // 確認是否成功
            if($retrunData['Status'] == 'SUCCESS'){
                // 找出訂單並寫入訊息
                $pay_data = [
                    'result'    => json_encode($retrunData),
                    'pay_status' => '已付款'
                ];
                order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update($pay_data);

                return view('paris.frontend.booking_success');
            } else {
                $pay_data = [
                    'result'    => json_encode($retrunData),
                ];
                $sn = $retrunData['data']['Result']['MerchantOrderNo'];
                order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update($pay_data);
                return view('paris.frontend.booking_fail',['sp'=>$special]);
            }



        } catch (\Exception $exception) {
            Log::error($exception);
            return view('paris.frontend.booking_fail',['sp'=>$special]);
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
                        'result' => json_encode($retrunData),
                        'pay_status' => '已付款'
                    ];
                    order::where('id',$order->id)->orderBy('created_at','DESC')->limit(1)->update($pay_data);
                    $order->pay_status = '已付款';
                }
            }

            // 寄送信件
            if($order->pay_status == '已付款' && $order->is_send === 0 && $order->discount == null){
                order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update(['discount'=>'back']);
                $act = pro::where('id',$order->pro_id)->first();
                $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_start))));
                $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($act->day.' '.$act->rang_end))));
                $mailer = [
                    'day'   => Carbon::parse($act->day)->format('Y / m / d'),
                    'time'  => substr($act->rang_start,0,5),//$act->day_parts.$rangTS.'-'.$rangTE,
                    'pople' => $order->pople,
                    'email' => $order->email,
                    'name'  => $order->name,
                    'phone' => $order->tel,
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'need_english' => $order->need_english,
                    'template' => 'order',
                    'mday'     => $act->day,
                ];
                SLS::SendEmailByTemplateName($mailer);
                SLS::SendSmsByTemplateName($mailer);
                try {
                    $order->is_send = 1;
                    $order->save();
                    // 信件補送
                    $now = time();
                    $lim = strtotime($act->day.' '.$act->rang_start);
                    $day = round( ($lim - $now) / 86400 );
                    if($day <= 7){
                        $mailer['template'] = 'D7';
                        SLS::SendEmailByTemplateName($mailer);
                        SLS::SendSmsByTemplateName($mailer);
                    }
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
