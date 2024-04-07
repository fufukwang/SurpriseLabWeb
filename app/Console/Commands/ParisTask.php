<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\paris\pro;
use App\model\paris\order;
use App\model\paris\TeamMail;
use Illuminate\Support\Facades\Log;
use SLS;

// use DB;

class ParisTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'paris:task {hour}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'paris task ';


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
                case 18: $this->checkHour18(); break;
                case 25: $this->checkEveryHour(); break;
            }

        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
    // 每小時執行
    private function checkEveryHour(){
        try {
            /*
            $undone = order::select('id','email','name')->where('pay_status','未完成')
                ->whereRaw("floor(UNIX_TIMESTAMP()/3600)-floor(UNIX_TIMESTAMP(created_at)/3600)=12")->get();
            // 找出12小時前的未完成訂單
            foreach($undone as $ord){
                // 確認 12 小時內此信箱沒有已完成訂單
                $isdone = order::select('id')->whereIn('pay_status',['已付款','已付款(部分退款)'])->where('email',$ord->email)
                    ->whereRaw("floor(UNIX_TIMESTAMP()/3600)-floor(UNIX_TIMESTAMP(created_at)/3600)<=12")->count();
                if($isdone == 0){
                    // 確認沒訂單的就發送 undone 信件
                    if($ord->email != ''){
                        $toData = [
                            'name'     => $ord->name,
                            'email'    => $ord->email,
                            'template' => 'undone'
                        ];
                    }
                    SLS::SendTerminalEmailByTemplateName($toData);
                }
            }

            $hour12 = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/3600)-floor((UNIX_TIMESTAMP()/3600)+8)=3")->get();
            foreach($hour12 as $pro){
                $ord12 = order::select('terminalorder.id','name','email','tel','plan')
                    ->leftJoin('terminal_pro_order', 'terminal_pro_order.order_id', '=', 'terminalorder.id')
                    ->where('terminal_pro_order.pro_id',$pro->id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->get();
                foreach ($ord12 as $ord) {
                    if($ord->tel != ''){
                        $toData = [
                            'phone'    => $ord->tel,
                            'template' => 'DX',
                        ];
                        SLS::TerminalSendSMS($toData);
                    }
                }
            }
            */
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }
    // 17 點執行
    private function checkHour18(){
        // 前 7 天 & 當天
        try {
            // 7 天
            $pr07day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=7")->get();
            foreach($pr07day as $pro){
                // 找出正常的訂單
                $order07 = order::select('pople','paris_pro.day','rang_start','need_english','paris_order.id','name','email','tel','need_chinese','sn','pay_type')
                    ->leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id')
                    ->where('paris_order.pro_id',$pro->id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->get();
                foreach ($order07 as $ord) {
                    if($ord->pay_type !== '合作販售'){
                        $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($ord->day.' '.$ord->rang_start))));
                        $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($ord->day.' '.$ord->rang_end))));
                        $toData = [
                            'day'   => Carbon::parse($ord->day)->format('Y / m / d'),
                            'pople' => $ord->pople,
                            'id'    => $ord->id,
                            'name'  => $ord->name,
                            'email' => $ord->email,
                            'phone' => $ord->tel,
                            'time'  => substr($ord->rang_start,0,5),
                            'gday'  => $rangStart.'/'.$rangEnd,
                            'master'=> "?id=".md5($ord->id)."&sn=".$ord->sn,
                            'mday'  => $ord->day,
                            'need_english' => $ord->need_english,
                            'need_chinese' => $ord->need_chinese,
                            'template' => 'D7',
                        ];
                        if($ord->email != ''){
                            $teamMail = TeamMail::where('order_id',$ord->id)->get();
                            $needSend = true;
                            $teamNum = 0;
                            while($needSend){
                                if($toData['email'] != ''){ SLS::SendEmailParisByTemplateName($toData); }
                                if($toData['phone'] != ''){ SLS::SendSmsParisByTemplateName($toData); }
                                if($teamMail && count($teamMail)>$teamNum){
                                    $toData['name'] = $teamMail[$teamNum]->name;
                                    $toData['email'] = $teamMail[$teamNum]->email;
                                    $toData['phone'] = $teamMail[$teamNum]->phone;
                                    $teamNum++;
                                } else {
                                    $needSend = false;
                                }
                            }
                        }
                    }
                }
            }





            // 2 天
            $pr02day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=2")->get();
            foreach($pr02day as $pro){
                // 找出正常的訂單
                $order02 = order::select('pople','paris_pro.day','rang_start','need_english','paris_order.id','name','email','tel','need_chinese','sn','pay_type')
                    ->leftJoin('paris_pro', 'paris_pro.id', '=', 'paris_order.pro_id')
                    ->whereRaw("(sites-IFNULL((SELECT SUM(pople)-SUM(cut) FROM(paris_order) WHERE paris_order.pro_id=paris_pro.id AND (pay_status='已付款' OR pay_status='已付款(部分退款)' OR (pay_status='未完成' AND created_at BETWEEN SYSDATE()+interval 27900 second and SYSDATE()+interval 28800 second))),0))>0")
                    ->where('paris_order.pro_id',$pro->id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->get();
                foreach ($order02 as $ord) {
                        $rangStart = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($ord->day.' '.$ord->rang_start))));
                        $rangEnd   = str_replace(' ','T',str_replace(':','',str_replace('-','',Carbon::parse($ord->day.' '.$ord->rang_end))));
                        $toData = [
                            'day'   => Carbon::parse($ord->day)->format('Y / m / d'),
                            'pople' => $ord->pople,
                            'id'    => $ord->id,
                            'name'  => $ord->name,
                            'email' => $ord->email,
                            'phone' => $ord->tel,
                            'time'  => substr($ord->rang_start,0,5),
                            'gday'  => $rangStart.'/'.$rangEnd,
                            'master'=> "?id=".md5($ord->id)."&sn=".$ord->sn,
                            'mday'  => $ord->day,
                            'need_english' => $ord->need_english,
                            'need_chinese' => $ord->need_chinese,
                            'template' => 'D2',
                        ];
                        if($ord->email != ''){
                            $teamMail = TeamMail::where('order_id',$ord->id)->get();
                            $needSend = true;
                            $teamNum = 0;
                            while($needSend){
                                if($toData['email'] != ''){ SLS::SendEmailParisByTemplateName($toData); }
                                if($teamMail && count($teamMail)>$teamNum){
                                    $toData['name'] = $teamMail[$teamNum]->name;
                                    $toData['email'] = $teamMail[$teamNum]->email;
                                    $toData['phone'] = $teamMail[$teamNum]->phone;
                                    $teamNum++;
                                } else {
                                    $needSend = false;
                                }
                            }
                        }
                }
            }










        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

}