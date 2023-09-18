<?php

namespace App\Http\Controllers\paris;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\model\paris\order;
use App\model\paris\TeamMail;
use App\model\paris\SendMail;
use DB;
use Response;
use Carbon\Carbon;
use Mail;
use Log;
use SLS;
use Redirect;
use Exception;

class MasterController extends WebController
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
                $order = order::leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id');
                $order = $order->select('name','day','rang_start','paris_order.id','sn')->where('sn',$sn)->whereIn('pay_status',['已付款','已付款(部分退款)'])
                    ->whereRaw("MD5(paris_order.id)='".$md5id."' AND UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))>=UNIX_TIMESTAMP()")
                    ->first();
                if($order){
                    return view('paris.frontend.master',compact('order'));
                } else {
                    return "<script>alert('活動不在範圍!');window.location='/lebaldeparis/index.html';</script>";
                }
            } else {
                return "<script>alert('無設定編號!');window.location='/lebaldeparis/index.html';</script>";
            }
        } catch (Exception $exception) {
            Log::error($exception);
            return "<script>alert('有錯誤!');window.location='/lebaldeparis/index.html';</script>";
        }
    }
    // 存入 team 的資料並寄送信件
    public function postTeamSlave(Request $request){
        try {
            $md5id = $request->id;
            $sn    = $request->sn;
            $order = order::leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id');
            $order = $order->select('name','day','rang_start','paris_order.id','sn','pople')->where('sn',$sn)->whereIn('pay_status',['已付款','已付款(部分退款)'])
                ->whereRaw("MD5(paris_order.id)='".$md5id."' AND UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))>=UNIX_TIMESTAMP()")->first();
            if($order){


                $email = $request->email;
                if(TeamMail::where('order_id',$order->id)->where('email',$email)->count()>0){
                    return response()->json(["success"=>false,"message"=>"此信箱已完成登錄!"]);
                } else {
                    // MAX人數加4
                    if(TeamMail::where('order_id',$order->id)->count() > $order->pople + 3){
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
            $order = order::leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id');
            $order = $order->select('name','day','rang_start','paris_order.id','tel','email','sn')->where('paris_order.id',$order_id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->first();
            if($order){
                $order->md5id = md5($order->id);
            } else {
                return response()->json(["success"=>false]);
            }
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
    // 重送 MAIL
    public function postReSendMail(Request $request){
        try{
            $this->checkPower($request);
            $ord = order::leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id')
                ->select('pople','paris_pro.day','rang_start','need_english','paris_order.id','name','email','tel','need_chinese','sn')->find($request->id);

            if($this->sendMailCenter($ord,$request->type)){
                return response()->json(["success"=>true]);
            } else {
                return response()->json(["success"=>false]);
            }
        } catch (Exception $exception) {
            Log::error($exception);
            return response()->json(["success"=>false]);
        }
    }
    // 重送 SMS
    public function postReSendSMS(Request $request){
        try{
            $this->checkPower($request);
            $ord = order::leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id')
                ->select('pople','paris_pro.day','rang_start','need_english','paris_order.id','name','email','tel','need_chinese','sn')->find($request->id);

            if($this->sendSmsCenter($ord,$request->type)){
                return response()->json(["success"=>true]);
            } else {
                return response()->json(["success"=>false]);
            }
            /*
            $tel = $request->tel;
            switch ($request->type) {
                case 'DX':
                    SLS::sent_single_sms($tel,"《微醺大飯店》酒會邀請函已寄出。\n\n若未收到，請由此開啟 ☛ https://bit.ly/tipsyinvt\n\n我們萬分期待您的前來。");
                    break;
                case 'D7':
                    SLS::sent_single_sms($tel,"敬愛的賓客，《微醺大飯店：1980s》行前提醒信已寄至您的信箱，請前往查看。 若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待見面。\n\n順安, 微醺大飯店：1980s");
                    break;
                case 'o':
                    SLS::sent_single_sms($tel,"敬愛的賓客，《微醺大飯店：1980s》開幕酒會將在今日舉行，期待見面！\n\n順安, 微醺大飯店：1980s");
                    break;
            }*/
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

            $master = TeamMail::leftJoin('paris_order', 'paris_team_mail.order_id', '=', 'paris_order.id')->orderBy('paris_team_mail.updated_at','desc');
            $master = $master->select(
                'paris_team_mail.id',
                'order_id',
                'paris_team_mail.name',
                'paris_team_mail.tel',
                'paris_team_mail.email',
                'paris_order.name as master_name',
                'paris_order.email as master_email'
            ); 
            if($request->has('search')){
                $search = $request->search;
                $master = $master->whereRaw("(
                    paris_team_mail.tel LIKE '%{$search}%' OR
                    paris_team_mail.name LIKE '%{$search}%' OR
                    paris_team_mail.email LIKE '%{$search}%'
                )");
            }

            $master = $master->paginate(20);
            return view('paris.backend.master',compact('master','request'));
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
        if($this->user->paris == 0){
            return redirect('/welcome')->send()->with('message','權限不足!');
        }
    }
}
