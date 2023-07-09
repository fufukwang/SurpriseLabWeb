<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\terminal\pro;
use App\model\terminal\order;
use App\model\terminal\TeamMail;
use Illuminate\Support\Facades\Log;
use SLS;

// use DB;

class TerminalTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'terminal:task {hour}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'terminal task ';


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
                $order07 = order::select('terminalorder.id','name','email','tel','plan')
                    ->leftJoin('terminal_pro_order', 'terminal_pro_order.order_id', '=', 'terminalorder.id')
                    ->where('terminal_pro_order.pro_id',$pro->id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->get();
                foreach ($order07 as $ord) {
                    if($ord->email != ''){
                        $toData = [
                            'name'     => $ord->name,
                            'email'    => $ord->email,
                            'id'       => $ord->id,
                            'template' => 'D7.'.$ord->plan,
                        ];
                        SLS::SendTerminalEmailByTemplateName($toData);
                    }
                }
            }

            // 10 天
            $pr10day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/86400)-floor(UNIX_TIMESTAMP()/86400)=10")->get();
            foreach($pr10day as $pro){
                // 找出正常的訂單
                $order10 = order::select('terminalorder.id','name','email','tel','plan')
                    ->leftJoin('terminal_pro_order', 'terminal_pro_order.order_id', '=', 'terminalorder.id')
                    ->where('terminal_pro_order.pro_id',$pro->id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->get();
                foreach ($order10 as $ord) {
                    if($ord->email != ''){
                        $toData = [
                            'name'     => $ord->name,
                            'email'    => $ord->email,
                            'id'       => $ord->id,
                            'template' => 'D10',
                        ];
                        SLS::SendTerminalEmailByTemplateName($toData);
                    }
                }
            }



            /*
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

                    }
                }
            }
            */
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

}