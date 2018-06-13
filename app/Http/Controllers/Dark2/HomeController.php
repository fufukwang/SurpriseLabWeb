<?php

namespace App\Http\Controllers\Dark2;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\d2order;
use App\model\d2pro;
use App\model\d2coupon;


use DB;
use Response;
use App\model\DarkContact;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;

class HomeController extends Controller
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }
    

    public function contactstore(Request $request){
        $data = [
            'tel'    => $request->tel,
            'status' => '未處理',
            'email'  => $request->email,
            'name'   => $request->name,
            'notes'  => $request->notes,
        ];
        Mail::send('TFO.email.Contact',$data,function($m) use ($data){
            $m->from('service@surpriselab.com.tw', 'Dinner In The Dark 2');
            $m->sender('service@surpriselab.com.tw', 'Dinner In The Dark 2');
            $m->replyTo('service@surpriselab.com.tw', 'Dinner In The Dark 2');

            $m->to('service@surpriselab.com.tw', 'Dinner In The Dark 2');

            $m->subject('Dinner In The Dark 2，聯絡我們-通知');
        });
        DarkContact::insert($data);
        return redirect("/".config('setting.dark2.path')."/")->with('message','留言完成!');
    }
























    public function GetAjaxData(Request $request){
        if($request->ajax()){
            if($request->has('act')){
                $pople = $request->pople;
                $pro = d2pro::where('open',1)->whereRaw("(sites-IFNULL((SELECT SUM(pople) FROM(d2order) WHERE d2order.pro_id=d2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$pople);
                switch ($request->act) {
                    case 'getBypople': // 取得 day
                        $pro = $pro->select('day')->groupBy('day')->where('day','>=',Carbon::today())->get();
                        return $pro->toJson();
                    break;
                    case 'getByday': // 取得 dayparts
                        $day = $request->day;
                        $pro = $pro->select('dayparts','day')->groupBy('dayparts')->where('day',$day)->get();
                        return $pro->toJson();
                    break;
                    case 'getBydartpart': // 取得 range
                        $dayparts = $request->dayparts;
                        $day      = $request->day;
                        $pro = $pro->select('id','rangstart','rangend','money','cash')->where('dayparts',$dayparts)->where('day',$day)->get();
                        return $pro->toJson();
                    break;


                    case 'CheckCoupon':
                        $coupon = d2coupon::where('code',$request->code)->where('order_id',0);
                        if($request->has('coupon') && count($request->coupon)>0){
                            $coupon = $coupon->whereNotIn('code',$request->coupon);
                        }
                        $coupon = $coupon->count();
                        if($coupon>0){
                            $me = d2coupon::where('code',$request->code)->select('wine')->first();
                            return Response::json(['success'=> 'Y','wine'=>$me->wine], 200);
                        } else {
                            return Response::json(['success'=> 'N'], 200);
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
            $count = d2order::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d')='{$now}'")->max('sn');

            if($count>0){
                $count += 1;
            } else {
                $count = Carbon::now()->format('Ymd').'001';
            }
            $people = $request->Pople;

            $act = d2pro::where('id',$request->pro_id)->where('open',1)->select(DB::raw("(sites-IFNULL((SELECT SUM(pople) FROM(d2order) WHERE d2order.pro_id=d2pro.id AND (pay_status='已付款' OR (pay_type='現場付款' AND pay_status<>'取消訂位') OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Count"),'id','money','cash','day','rangstart','rangend')->first();
            if($people>$act->Count){
                return Response::json(array(
                    'success' => false,
                    'message' => 'full'
                ), 200);
            }

            if($request->Pay == 'onsite'){
                $pay_type = '現場付款';
                $money = $act->cash * $people * 1.1;
            } else {
                $pay_type = '信用卡';
                $money = $act->money * $people * 1.1;
            }
            $cut1 = 0; $cut2 = 0;
            // 確認庫碰碼
            $coupon = 0;
            if($request->has('coupon')){
                foreach ($request->coupon as $key => $value) {
                    $coupon_count = d2coupon::where('code',$value)->where('order_id',0)->count();
                    if($coupon_count>0){
                        $coupon++;
                        d2coupon::where('code',$value)->where('order_id',0)->update(['order_id'=>$count]);
                        if($request->Pay == 'onsite'){
                            $cut1 += $act->cash * 2 * 1.1;
                        } else {
                            $cut1 += $act->money * 2 * 1.1;
                        }
                    }
                }
            }
            // 確認則扣碼
            switch ($request->discount) {
                case 'dininginthedarks1': $cut2 = 200; break;
                case 'tableforone41': $cut2 = 200; break;
                case 'gqinthedark': $cut2 = 100; break;
                case 'juksyinthedark': $cut2 = 100; break;
                case 'vogueinthedark': $cut2 = 100; break;
                case 'sdinthedark': $cut2 = 100; break;
            }

            //$count = str_pad($count,3,"0",STR_PAD_LEFT);
            $meat = [];
            for($i=0;$i<$people;$i++){
                array_push($meat,$request->input('Meal.'.$i));
            }
            $pay_status = '未完成';
            if($money - $cut1 - $cut2  == 0){
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
                'discount'   => $request->discount,
            ];

            $order = d2order::create($data);
            /*
            $order = new d2order;
            $order->Name   = $request->Name;
            $order->Tel    = $request->Tel;
            $order->EMail  = $request->EMail;
            $order->SN     = $count;
            $order->Notes  = $request->Notes;
            $order->Surprised  = $request->Surprised;
            $order->Pay    = $request->Pay;
            $order->AID    = $request->AID;
            $order->Pople  = $request->Pople;
            if($order->Pay=='onsite') $order->Status = 'SUCCESS';
            $order->save();
            $OID = $order->OID;
            for($i=0;$i<$request->Pople;$i++){
                $pople = new pople;
                $pople->OID  = $OID;
                $pople->Meal = $request->input('Meal.'.$i);
                $pople->Sort = $i;
                $pople->save();
            }
            $time = time();
            $act = act::find($request->AID);
            $Money = $act->Card*$order->Pople;
            $Amt  = ($Money*.1) + $Money;
            $CheckValue = strtoupper(hash("sha256", "HashKey=ybmYe0KpakHaNnkJGYUOLe7pLFfoPO9o&Amt={$Amt}&MerchantID=35699182&MerchantOrderNo={$count}&TimeStamp={$time}&Version=1.2&HashIV=Zvnev7DFskQfIbYo"));
    */
            $sentSuccess = false;
            if($request->Pay == 'onsite'){
                $sentSuccess = true;
            } else {
                // 送到金流
                $pay_by_prime = 'https://sandbox.tappaysdk.com/tpc/payment/pay-by-prime'; // 測試
                //$pay_by_prime = 'https://prod.tappaysdk.com/tpc/payment/pay-by-prime'; // 正式
                $postData = [
                    "prime"       => $request->prime,
                    "partner_key" => "partner_YtmrbXaN9Xl11iIO30AFBjoXR8pRqpON6SmNV0l2bXbde3L2Ut13SQAC",
                    "merchant_id" => "surpriselab_TAISHIN",
                    "details"     => "無光晚餐",
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
            /*
            // 加入電子報
            $data = array(
                'email_address' => $request->email
            );
            $result = MC::checksub('0656269a9c',$data);
            $json = json_decode($result,true);
            if($json['status']==404){
                $data = array(
                    'email_address' => $request->email,
                    'status'        => 'subscribed',
                    'merge_fields'  => array(
                        'FNAME' => $request->name
                    )
                );
                //訂閱的動作
                $rr = MC::subscribe('0656269a9c',$data);
            }
            if($sentSuccess){
                $this->SendSuccessByGmail([
                    'tomail' => $request->email,
                    'name'   => $request->name,
                    'time'   => str_replace(' 00:00:00','',$act->day).' '.substr($act->rangstart,0,5).'~'.substr($act->rangend,0,5),
                    'pop'    => $request->Pople
                ]);
            }
            */



            if($order->pay_status == '已付款' || $order->pay_type == '現場付款'){
                $mailer = [
                    'day'   => $act->day.' '.substr($act->rangstart,0,5).'-'.substr($act->rangend,0,5),
                    'pople' => $request->Pople,
                    'email' => $data['email'],
                    'name'  => $data['name'],
                ];
                Mail::send('Dark2.email.order',$mailer,function($m) use ($mailer){
                    $m->from('service@surpriselab.com.tw', '無光晚餐第二季');
                    $m->sender('service@surpriselab.com.tw', '無光晚餐第二季');
                    $m->replyTo('service@surpriselab.com.tw', '無光晚餐第二季');

                    $m->to($mailer['email'], $mailer['name']);
                    $m->subject('無光晚餐第二季-訂單完成信件!');
                });
            }
            

            return Response::json(array(
                'success'   => true,
                'SN'        => $count,
            ), 200);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
/*
    public function getPayDone(Request $request){
        $obj = json_decode($request->JSONData,true);

        $result = json_decode($obj['Result'],true);
        $order = orderlist::where('SN',$result['MerchantOrderNo'])->first();
        $order->Status  = $obj['Status'];
        $order->Message = $obj['Message'];
        $order->Result  = $obj['Result'];
        $order->save();
        $success = false;
        if($obj['Status']=='SUCCESS'){
            $act = act::find($order->AID);
            $this->SendSuccessByGmail([
                'tomail' => $order->EMail,
                'name'   => $order->Name,
                'time'   => str_replace(' 00:00:00','',$act->ADay).' '.substr($act->STime,0,5).'~'.substr($act->ETime,0,5),
                'pop'    => $order->Pople
            ]);
            $success = true;  
            return view('frontend.reservation',compact('success'));
        } else {
            return view('frontend.payfail');
        }
    }

    private function SendSuccessByGmail($obj){
        Mail::send('frontend.email',$obj,function($m) use ($obj){
            $m->from('service@surpriselab.com.tw', '無光晚餐');
            $m->sender('service@surpriselab.com.tw', '無光晚餐');
            $m->replyTo('service@surpriselab.com.tw', '無光晚餐');

            $m->to($obj['tomail'], $obj['name']);
            $m->subject('無光晚餐訂位成功 !');
        });
    }

    public function GetAjaxData(Request $request){
    	if($request->ajax()){
    		if($request->has('act')){
    			switch ($request->act) {
    				case 'GetActByPople':
    					$act = act::whereRaw("(Pop-IFNULL((SELECT SUM(Pople) FROM(OrderLists) WHERE OrderLists.AID=Acts.AID AND (Status='SUCCESS' OR (Status='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0))>=".$request->Pople)
    						->select('ADay','Sp','One')->groupBy('ADay')->where('ADay','>=',Carbon::today());
                        if($request->Pople==1){
                            $act = $act->where('One',1);
                        }
                        $act = $act->get();
                        //dd(DB::getQueryLog());
    					return $act->toJson();
    				break;
    				case 'GetActByDate':
    					$act = act::where('ADay',$request->Day)->select(DB::raw("(Pop-IFNULL((SELECT SUM(Pople) FROM(OrderLists) WHERE OrderLists.AID=Acts.AID AND (Status='SUCCESS' OR (Status='' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))),0)) AS Pople, ADay,AID,STime,ETime,One,Sp,Card,Money"))->get();
    					return $act->toJson();
    				break;
    			}
    		}
    	} else {
    		abort(404);
    	}
    }
    */
}
