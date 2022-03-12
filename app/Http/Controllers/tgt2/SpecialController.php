<?php

namespace App\Http\Controllers\tgt2;

use Illuminate\Http\Request;

use MC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\tgt2\coupon;
use App\model\tgt2\order;
use App\model\tgt2\pro;
use App\model\setting;
use Treerful\Pay2goInvoice\Invoice;

use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;
use SLS;

class SpecialController extends Controller
{
	public function __construct(Request $request)
    {
        // DB::enableQueryLog();
    }
    public function getHome(Request $request){
        // 抓取並驗證 t6 是否已滿
        // 成立 & pedding 300 秒內的訂單
        $count = order::where('is_overseas',9)->where('pople',6)
            ->whereRaw("(pay_status='已付款' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()-interval 600 second and SYSDATE()))")->count();


        $data = [
            'count' => $count,
            't6'    => json_decode(setting::where('slug','tgt2_sp_t6')->first()->json,true),
            'money' => json_decode(setting::where('slug','tgt2_sp_money')->first()->json,true),
        ];

        return view('thegreattipsy.frontend.booking_special',compact('data'));
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
                return view('thegreattipsy.frontend.booking_fail',['sp'=>1]);
            }

            $pay_type = '信用卡';
            $sp_money = json_decode(setting::where('slug','tgt2_sp_money')->first()->json,true);
            if($people == 1){
                $money = $sp_money[0]['money'];
            } elseif($people == 2){
                $money = $sp_money[1]['money'];
            } else {
                $money = $sp_money[2]['money'];
            }
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
                $discount_list = json_decode(setting::where('slug','tgt2_sp_discount')->first()->json,true);
                foreach($discount_list as $row){
                    if(strtoupper($row['code']) == $discountCode){
                        $manage = $discountCode.'折扣 '.$row['money'];
                        $cut2 = $row['money'];
                        break;
                    }
                }








                /*
                if($discountCode == 'TIPSYAGAIN' || $discountCode == 'TWATIPSY'){
                    $manage = $request->discount.'折扣 100';
                    $cut2 = 100;
                } elseif($discountCode == 'SHOPEETIPSY' || $discountCode == 'GARENATIPSY' || $discountCode == 'LINEBANKTIPSY' || $discountCode == 'YOXITIPSY' || $discountCode == 'COMPALTIPSY' || $discountCode == 'NANSHANTIPSY' || $discountCode == 'MIXERBOXTIPSY' || $discountCode == 'YAHOOTIPSY' || $discountCode == 'MICROSOFTTIPSY' || $discountCode == 'GOOGLETIPSY' || $discountCode == 'CTBCTIPSY' || $discountCode == 'ESLITETIPSY'){
                    $manage = $request->discount.'折扣 220';
                    $cut2 = 220;
                } elseif($discountCode == 'TIPSYAGAIN01' || $discountCode == 'TIPSYAGAIN02' || $discountCode == 'TIPSYAGAIN03'){
                    $manage = $request->discount.'折扣 200';
                    $cut2 = 200;
                }
                */
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
                'money'      => $money - $cut1 - $cut2,// ($money * 1.1) - $cut1 - $cut2,// 10% 服務費
                'pay_type'   => $pay_type,
                'pay_status' => $pay_status,
                'result'     => '',
                'manage'     => $manage,
                'is_overseas'=> 9,
                'vegetarian' => $request->vegetarian_food,
                'dis_code'   => $discountCode,
                'dis_money'  => $cut2,
            ];
            
            $order = order::create($data);
            
            $sentSuccess = false;
            if($data['money'] == 0){
                return view('thegreattipsy.frontend.booking_success');
            } else {
                $comments = "微醺大飯店：1980s";
                if($cut2>0){
                    $comments .= "(折扣  {$discountCode} - {$cut2})";
                }
                // 送到金流
                return $newebpay->payment(
                    $count, // 訂單編號
                    $data['money'], // 交易金額
                    $comments, // 交易描述
                    $data['email'] // 付款人信箱
                )->submit();
                
            }

        } catch (\Exception $exception) {
            Log::error($exception);
            return view('thegreattipsy.frontend.booking_fail',['sp'=>1]);
        }
    }














    // 後台動作
    // 特殊場次設定
    public function getSpecialSetting(Request $request){
        try{
            $this->checkPower($request);

            $data = [
                't6'    => json_decode(setting::where('slug','tgt2_sp_t6')->first()->json,true),
                'money' => json_decode(setting::where('slug','tgt2_sp_money')->first()->json,true),
            ];


            return view('thegreattipsy.backend.settings.special',compact('data'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(404);
        }
    }
    // 折扣碼設定
    public function getDiscountSetting(Request $request){
        try{
            $this->checkPower($request);
            


            $data = [
                'pay' => json_decode(setting::where('slug','tgt2_pay_discount')->first()->json,true),
                'sp'  => json_decode(setting::where('slug','tgt2_sp_discount')->first()->json,true),
            ];


            return view('thegreattipsy.backend.settings.discount',compact('data'));


            
        } catch (Exception $exception) {
            Log::error($exception);
            abort(404);
        }
    }
    // 儲存設定
    public function postSettingStore(Request $request){
        $return = [
            'success' => false
        ];
        try{
            $this->checkPower($request);
            
            if($request->has('slug')){
                if($request->slug == 'tgt2_sp_t6'){
                    $is_store = setting::where('slug','tgt2_sp_t6')->update(['json'=>json_encode(['number'=> $request->number])]);
                    if($is_store) $return['success'] = true;
                } elseif($request->slug == 'tgt2_sp_money'){
                    $is_store = setting::where('slug','tgt2_sp_money')->update(['json'=>json_encode([
                        [ 'number' => 1,'money' => $request->t1_money ],
                        [ 'number' => 2,'money' => $request->t2_money ],
                        [ 'number' => 6,'money' => $request->t6_money ],
                    ])]);
                    if($is_store) $return['success'] = true;
                } elseif($request->slug == 'tgt2_sp_discount'){
                    $is_store = setting::where('slug','tgt2_sp_discount')->update(['json'=>$request->obj]);
                    if($is_store) $return['success'] = true;
                } elseif($request->slug == 'tgt2_pay_discount'){
                    $is_store = setting::where('slug','tgt2_pay_discount')->update(['json'=>$request->obj]);
                    if($is_store) $return['success'] = true;
                }
            }
            return response()->json($return);
            
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json($return);
        }
    }


    private function checkPower(Request $request){
        // 驗證登入
        if(!$request->session()->has('key')){
            return redirect('login')->send();
        } else {
            $this->user = $request->session()->get('key');
        }
        if($this->user->thegreattipsy == 0 && $this->user->tgt2 == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
    }
}
