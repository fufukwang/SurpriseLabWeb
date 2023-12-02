<?php

namespace App\Http\Controllers\terTP;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\terTP\coupon;
use App\model\terTP\order;
use App\model\terTP\pro;
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
            $count = $this->grenOrderSN();
            $people = $request->booking_people;$ticket = '';
            switch($request->ticket_type){
                case '單人票': $ticket = 'p1'; break;
                case '雙人票': $ticket = 'p2';$people = $people * 2; break;
                case '六人票': $ticket = 'p6';$people = $people * 6; break;
            }
            $pro_id = $request->train;
            $act = pro::where('id',$pro_id)->where('open',1)->select(DB::raw("(sites-{$this->oquery}) AS Count"),'id','money','cash','day','rang_start','rang_end','day_parts','p1','p2','p6')->first();
            if($people>$act->Count){
                Log::error('人數滿了');
                return view('terminal.frontend.booking_fail');
            }

            $pay_type = '信用卡';
            $money = $act->$ticket * $request->booking_people;
            $cut1 = 0; $cut2 = 0;
            // 確認庫碰碼
            $coupon = 0;
            $couponCode = '';
            $manage = '';
            if($request->has('allocation') && $request->allocation !=''){
                $couponCode = $request->allocation;
                $coN = coupon::where('code',$couponCode)->whereRaw('(end_at>="'.Carbon::now()->format('Y-m-d H:i:s').'" OR end_at IS NULL)')->where('o_id',0)->count();
                if($coN>0){
                    $me = coupon::where('code',$couponCode)->where('o_id',0)->select('type')->first();
                    $mytype = $me->type;
                    if($ticket == $mytype){
                        coupon::where('code',$couponCode)->where('o_id',0)->update(['o_id'=>$count]);
                        $cut1 = $act->$mytype;
                        $manage .= $couponCode.'折抵 '.$cut1."\n";
                    } else {
                        Log::error('giftcard種類不符');    
                        return view('terTP.frontend.booking_fail');
                    }
                } else {
                    Log::error('序號驗證錯誤');
                    return view('terTP.frontend.booking_fail');
                }
            }

            // 折扣碼
            $discountCode = '';
            if($request->has('coupon') && $request->coupon !=''){
                $discountCode = $request->coupon;
                $discount_list = json_decode(setting::where('slug','ter_pay_discount')->first()->json,true);
                foreach($discount_list as $row){
                    if(strtoupper($row['code']) == $discountCode){
                        $manage .= $discountCode.'折扣 '.$row['money']."\n";
                        $cut2 = $row['money'];
                        break;
                    }
                }
            }

            $pay_status = '未完成';
            if(intval($money - $cut1 - $cut2)  <= 0){
                $pay_status = '已付款';
            }


            $data = [
                'pro_id'     => $pro_id,
                'pople'      => $people,
                'name'       => $request->name,
                'tel'        => $request->area_code.$request->telephone,
                'email'      => $request->email,
                'notes'      => $request->remark,
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
                $data = [
                    'ticket' => $request->ticket_type,
                    'num' => $request->booking_people,
                    'day' => preg_replace('/-/','/',$act->day),
                    'time' => substr($act->rang_start,0,5).'-'.substr($act->rang_end,0,5),
                    'money' => $order->money,
                ];

                $ord = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')
                    ->select('pople','tertp_pro.day','rang_start','need_english','tertp_order.id','name','email','tel','need_chinese','sn')->find($order->id);

                $this->sendMailCenter($ord);
                $this->sendSmsCenter($ord);
                return view('terminal.frontend.booking_success',compact('data'));
            } else {
                $comments = "巴黎舞會";
                if($cut1>0){
                    $comments .= "(折抵  {$couponCode} - {$cut1})";
                }
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
                ->setReturnURL(env('APP_URL').'/terminal/Neweb.ReturnResult') // 由藍新回傳後前景畫面要接收資料顯示的網址
                ->setNotifyURL(env('APP_URL').'/terminal/Neweb.BackReturn') // 由藍新回傳後背景處理資料的接收網址
                ->setClientBackURL(env('APP_URL').'/terminal/booking') // 付款取消後返回的網址
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
                $pro = pro::select('day','rang_start','rang_end')->find($order->pro_id);
                $num = 0;
                $ticket = '';
                switch($order->ticket){
                    case 'p1': $num = $order->pople; $ticket = '單人票'; break;
                    case 'p2': $num = $order->pople / 2; $ticket = '雙人票'; break;
                    case 'p6': $num = $order->pople / 6; $ticket = '六人票'; break;
                }
                $data = [
                    'ticket' => $ticket,
                    'num' => $num,
                    'day' => preg_replace('/-/','/',$pro->day),
                    'time' => substr($pro->rang_start,0,5).'-'.substr($pro->rang_end,0,5),
                    'money' => $order->money,
                ];
                if(env('APP_ENV') == 'dev'){
                    $ord = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')
                        ->select('pople','tertp_pro.day','rang_start','need_english','tertp_order.id','name','email','tel','need_chinese','sn')->find($order->id);

                    $this->sendMailCenter($ord);
                    $this->sendSmsCenter($ord);
                }
                return view('terminal.frontend.booking_success',compact('data'));
            } else {
                // 移除 copon 的使用紀錄
                coupon::where('o_id',$sn)->limit(1)->update(['o_id'=>0]);
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
                
                $ord = order::leftJoin('tertp_pro', 'tertp_pro.id', '=', 'tertp_order.pro_id')
                    ->select('pople','tertp_pro.day','rang_start','need_english','tertp_order.id','name','email','tel','need_chinese','sn')->find($order->id);

                $this->sendMailCenter($ord);
                $this->sendSmsCenter($ord);
            }
            return response('success');

        } catch (\Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
}
