<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\dark3\pro;
use App\model\dark3\order;
use App\model\dark3\TeamMail;
use Illuminate\Support\Facades\Log;
use SLS;

// use DB;

class Dark3Task extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dark3:task {hour}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'team send 5 mail in 21,14,10,5,1 . check every hour.';


    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $hour = $this->argument('hour');
            switch ((int)$hour) {
                case 17: $this->checkHour17(); break;
            }

        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
    // 17 點執行
    private function checkHour17(){
        // 前 7 天 & 當天
        try {
            // 14 天
            $pr14day = pro::select('id','day')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=14")->get();
            foreach($pr14day as $pro){
                // 找出正常的訂單
                $order14 = order::select('id','name','email','tel')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order14 as $ord) {
                    if($ord->tel != '' && $ord->email != ''){
                        $toData = [
                            'name'     => $ord->name,
                            'email'    => $ord->email,
                            'template' => 'D14',
                            'mday' => $pro->day,
                        ];
                        SLS::SendEmailByTemplateName($toData);
                    }
                }
            }
            // 7 天
            $pr07day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=7")->get();
            foreach($pr07day as $pro){
                // 找出正常的訂單
                $order07 = order::select('dark3order.id','name','email','tel','day','rang_start','pople')
                    ->leftJoin('dark3pro', 'dark3pro.id', '=', 'dark3order.pro_id')
                    ->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order07 as $ord) {
                    if($ord->tel != '' && $ord->email != ''){
                        $toData = [
                            'phone'    => $ord->tel,
                            'template' => 'D7',
                            'mday'     => $ord->day,
                        ];
                        SLS::SendSmsByTemplateName($toData);
                        $toData = [
                            'pople'    => $ord->pople,
                            'name'     => $ord->name,
                            'email'    => $ord->email,
                            'day'      => Carbon::parse($ord->day)->format(' m 月 d 日'),
                            'time'     => substr($ord->rang_start,0,5),
                            'template' => 'D7',
                            'mday'     => $ord->day,
                        ];
                        SLS::SendEmailByTemplateName($toData);
                        /*
                        $teamMail = TeamMail::where('order_id',$ord->id)->get();
                        $needSend = true;
                        $teamNum = 0;
                        // 主揪 信件變數組合
                        $toData = [
                            'id'    => $ord->id,
                            'name'  => $ord->name,
                            'email' => $ord->email,
                            'type'  => 'D05'
                        ];
                        while($needSend){
                            // 信件寄送
                            SLS::SendPreviewEmail($toData);
                            // 判斷是否有其他信箱需要寄送
                            if($teamMail && count($teamMail)>$teamNum){
                                $toData = [
                                    'id'    => $ord->id,
                                    'name'  => $teamMail[$teamNum]->name,
                                    'email' => $teamMail[$teamNum]->email,
                                    'type'  => 'D05'
                                ];
                                $teamNum++;
                            } else {
                                $needSend = false;
                            }
                        }
                        */
                    }
                }
            }
            $proday = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=0")->get();
            foreach($proday as $pro){
                $ordernow = order::select('id','tel','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($ordernow as $ord) {
                    if($ord->tel != '' && $ord->email != ''){
                        $toData = [
                            'phone'    => $ord->tel,
                            'template' => 'DX',
                        ];
                        SLS::SendSmsByTemplateName($toData);
                        /*
                        SLS::sent_single_sms($ord->tel,$message);
                        $teamMail = TeamMail::select('tel')->where('order_id',$ord->id)->get();
                        foreach ($teamMail as $tm) {
                            SLS::sent_single_sms($tm->tel,$message);
                        }
                        */
                    }
                }
            }
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
    /*
    // 18 點執行 // 0224 改為 12點寄送
    private function checkHour12(){
        // 前10天簡訊
        try {
            $message = "敬愛的賓客，《微醺大飯店：1980s》行前提醒信已寄至您的信箱，請前往查看。 若未收到，請至垃圾信匣或促銷內容分類尋找唷！\n\n非常期待見面。\n\n順安, 微醺大飯店：1980s";
            $proday = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=11")->get();
            foreach($proday as $pro){
                $ordernow = order::select('id','tel','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($ordernow as $ord) {
                    if($ord->email != ''){
                        SLS::sent_single_sms($ord->tel,$message);
                        $teamMail = TeamMail::select('tel')->where('order_id',$ord->id)->get();
                        foreach ($teamMail as $tm) {
                            SLS::sent_single_sms($tm->tel,$message);
                        }
                    }
                }
            }
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
    */
}