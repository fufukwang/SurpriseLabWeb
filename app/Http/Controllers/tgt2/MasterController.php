<?php

namespace App\Http\Controllers\tgt2;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\tgt2\coupon;
use App\model\tgt2\order;
use App\model\tgt2\pro;


use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use Redirect;

class MasterController extends Controller
{
	public function __construct(Request $request)
    {
        DB::enableQueryLog();
    }
    
    // 前台顯示邀請人頁面
    public function getTeamMaster(Request $request){
        try {
            if($request->has('id') && $request->has('sn')){
                $md5id = $request->id;
                $sn    = $request->sn;
                // 時間還沒超過的正常訂單
                $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
                $order = $order->select('name','day','rang_start','tgt2order.id')->where('sn',$sn)->where('pay_status','已付款')
                    ->whereRaw("MD5(tgt2order.id)='".$md5id."' AND UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))>=UNIX_TIMESTAMP()")
                    ->first();
                if($order){


                    return view('thegreattipsy.frontend.master',compact('order'));
                } else {
                    return "<script>alert('不在範圍!');window.location='/thegreattipsy/index.html';</script>";
                }
            } else {
                return "<script>alert('沒編號!');window.location='/thegreattipsy/index.html';</script>";
            }
        } catch (Exception $exception) {
            Log::error($exception);
            return "<script>alert('有錯誤!');window.location='/thegreattipsy/index.html';</script>";
        }
    }
    // 存入 team 的資料並寄送信件
    public function postTeamSlave(Request $request){
        try {

        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
}
