<?php

namespace App\Http\Controllers\terminal;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\terminal\coupon;
use App\model\terminal\order;
use App\model\terminal\pro;
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
                $count = '1'.Carbon::now()->format('Ymd').'0001';
            }
            $people = $request->booking_people;

            $pay_type = '信用卡';
            $money = 0;
            $cut1 = 0; $cut2 = 0;
            $train_check = false;$flight_check = false;$boat_check = false;
            switch($request->ticket_type){
                case 'train': $money = $people * 1250; $train_check = true; break;
                case 'flight': $money = $people * 500; $flight_check = true; break;
                case 'boat': $money = $people * 800; $boat_check = true; break;
                case 'A': $money = $people * 1650; $train_check = true; $flight_check = true; break;
                case 'B': $money = $people * 2400; $train_check = true; $flight_check = true; $boat_check = true; break;
            }

            // 確認人數
            if($train_check){
                $act = pro::where('id',$request->train)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"))->first();
                if($people>$act->Count){
                    Log::error('train 人數滿了');
                    return view('terminal.frontend.booking_fail');
                }
            }
            if($flight_check){
                $act = pro::where('id',$request->flight)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"))->first();
                if($people>$act->Count){
                    Log::error('flight 人數滿了');
                    return view('terminal.frontend.booking_fail');
                }
            }
            if($boat_check){
                $act = pro::where('id',$request->boat)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"))->first();
                if($people>$act->Count){
                    Log::error('boat 人數滿了');
                    return view('terminal.frontend.booking_fail');
                }
            }
            // 確認庫碰碼
            $coupon = 0;
            // 折扣碼
            $manage = '';
            $discountCode = '';
            if($request->has('discount')){
                $discountCode = $request->discount;
                $discount_list = json_decode(setting::where('slug','terminal_pay_discount')->first()->json,true);
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
            $data = [
                // 'pro_id'     => $request->booking_time,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->telephone,
                'email'      => $request->email,
                'notes'      => $request->remark,
                'meat'       => json_encode([]),
                'coupon'     => $coupon,
                'sn'         => $count,
                'money'      => $money - $cut1 - $cut2,
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $manage,
                'is_overseas'=> 2,
                'vegetarian' => 0,
                'dis_code'   => $discountCode,
                'dis_money'  => $cut2,
                'plan'       => $request->ticket_type,
            ];
            // 10% 服務費
            $order = order::create($data);
            switch($data['plan']){
                case 'boat':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->boat]);
                    break;
                case 'train':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->train]);
                    break;
                case 'flight':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->flight]);
                    break;
                case 'A':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->train]);
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->flight]);
                    break;
                case 'B':
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->train]);
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->flight]);
                    DB::table('terminal_pro_order')->insert(['order_id'=>$order->id,'pro_id'=>$request->boat]);
                    break;
            }
            $sentSuccess = false;
            if($data['money'] == 0){
                return view('terminal.frontend.booking_success');
            } else {
                $comments = "落日轉運站";
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
                ->setReturnURL(env('APP_URL').'/terminal/Neweb.ReturnResult') // 由藍新回傳後前景畫面要接收資料顯示的網址
                ->setNotifyURL(env('APP_URL').'/terminal/Neweb.BackReturn') // 由藍新回傳後背景處理資料的接收網址
                ->setClientBackURL(env('APP_URL').'/terminal/booking_now') // 付款取消後返回的網址
                ->submit();
            }

        } catch (\Exception $exception) {
            Log::error($exception);
            return view('terminal.frontend.booking_fail');
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

                return view('terminal.frontend.booking_success');
            } else {
                $pay_data = [
                    'result'    => json_encode($retrunData),
                ];
                $sn = $retrunData['data']['Result']['MerchantOrderNo'];
                order::where('sn',$sn)->orderBy('created_at','DESC')->limit(1)->update($pay_data);
                return view('terminal.frontend.booking_fail',['sp'=>$special]);
            }



        } catch (\Exception $exception) {
            Log::error($exception);
            return view('terminal.frontend.booking_fail',['sp'=>$special]);
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
                    'gday'  => $rangStart.'/'.$rangEnd,
                    'master'=> "?id=".md5($order->id)."&sn=".$order->sn,
                    'template' => 'order',
                ];
                SLS::SendEmailByTemplateName($mailer);


                try {

                    $order->is_send = 1;
                    $order->save();
                    /*
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
                    */
                } catch (\Exception $e){
                    Log::error($e);
                }
            }
            return response('success');

        } catch (\Exception $exception) {
            Log::error($exception);
            return view('terminal.frontend.booking_fail',['sp'=>0]);
        }
    }
}
