<?php

namespace App\Http\Controllers\tgt2;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\tgt2\order;
use App\model\tgt2\TeamMail;
use App\model\tgt2\SendMail;
use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use SLS;
use Redirect;
use Exception;

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
                $order = $order->select('name','day','rang_start','tgt2order.id','sn')->where('sn',$sn)->where('pay_status','已付款')
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
            $md5id = $request->id;
            $sn    = $request->sn;
            $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
            $order = $order->select('name','day','rang_start','tgt2order.id','sn','pople')->where('sn',$sn)->where('pay_status','已付款')
                ->whereRaw("MD5(tgt2order.id)='".$md5id."' AND UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))>=UNIX_TIMESTAMP()")->first();
            if($order){


                $email = $request->email;
                if(TeamMail::where('order_id',$order->id)->where('email',$email)->count()>0){
                    return response()->json(["success"=>false]);
                } else {
                    // MAX人數加4
                    if(TeamMail::where('order_id',$order->id)->count() > $order->pople + 4){
                        return response()->json(["success"=>false]);
                    }
                    
                    $data = [
                        'order_id' => $order->id,
                        'name'     => $request->name,
                        'tel'      => $request->tel,
                        'email'    => $email,
                    ];
                    TeamMail::insert($data);
                    // 檢查確認日期補寄信件
                    $now = time();
                    $lim = strtotime($order->day.' '.$order->rang_start);
                    $hour = round( ($lim - $now) / 60 );
                    // 寄送 A 信件
                    $toData = [
                        'id'    => $order->id,
                        'name'  => $request->name,
                        'email' => $email,
                        'type'  => "DX" // 邀請信件
                    ];
                    // 信件補送
                    SLS::SendPreviewEmail($toData);
                    if($hour <= 30240){ // 24 * 60 * 21
                        $toData['type'] = "D21";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($hour <= 20160){ // 24 * 60 * 14
                        $toData['type'] = "D14";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($hour <= 14400){ // 24 * 60 * 10
                        $toData['type'] = "D10";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($hour <= 7200){ // 24 * 60 * 5
                        $toData['type'] = "D05";
                        SLS::SendPreviewEmail($toData);
                    }
                    if($hour <= 1440){ // 24 * 60 
                        $toData['type'] = "D01";
                        SLS::SendPreviewEmail($toData);
                    }
                    return response()->json(["success"=>true]);
                }
            } else {
                return response()->json(["success"=>false]);
            }
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }






    // 後台控制
    public function getMasterAndSend(Request $request){
        try{
            $this->checkPower($request);
            $order_id = $request->order_id;
            // 取得訂單資料
            $order = order::leftJoin('tgt2pro', 'tgt2pro.id', '=', 'tgt2order.pro_id');
            $order = $order->select('name','day','rang_start','tgt2order.id','tel','email')->where('tgt2order.id',$order_id)->where('pay_status','已付款')->first();
            // 取得人員資料
            $slave = TeamMail::where('order_id',$order_id)->get();
            // 取得寄信資料
            $send = SendMail::where('order_id',$order_id)->get();
            // 塞成一個物件送往前台
            return response()->json([
                'success' => true,
                'master' => $order,
                'slave' => $slave,
                'send' => $send
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
    // 重送
    public function postReSendMail(Request $request){
        try{
            $this->checkPower($request);
            $toData = [
                'id'    => $request->id,
                'name'  => $request->name,
                'email' => $request->email,
                'type'  => $request->type,
            ];
            // 信件補送
            SLS::SendPreviewEmail($toData);
            return response()->json(["success"=>true]);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
    // 團員們
    public function getMasterList(Request $request){
        try{
            $this->checkPower($request);

            $master = TeamMail::orderBy('updated_at','desc');
            if($request->has('search')){
                $search = $request->search;
                $master = $master->whereRaw("(
                    tel LIKE '%{$search}%' AND
                    name LIKE '%{$search}%' AND
                    email LIKE '%{$search}%'
                )");
            }

            $master = $master->paginate(20);
            return view('thegreattipsy.backend.master',compact('master','request'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(404);
        }
    }
    // 修改內容
    public function postMasterStore(Request $request,$id){
        try{
            $this->checkPower($request);
            $data = [
                'name'     => $request->name,
                'tel'      => $request->tel,
                'email'    => $request->email,
            ];
            TeamMail::where('id',$id)->update($data);
            return response()->json(["success"=>true]);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
    // 刪除人員
    public function postMasterDelete(Request $request,$id){
        try{
            $this->checkPower($request);
            TeamMail::where('id',$id)->delete();
            return response()->json(["success"=>true]);
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
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
