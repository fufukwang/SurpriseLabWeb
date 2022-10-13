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
                case 18: $this->checkHour18(); break;
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
                    ->where('terminalorder.pro_id',$pro->id)->whereIn('pay_status',['已付款','已付款(部分退款)'])->get();
                foreach ($order07 as $ord) {
                    if($ord->email != ''){
                        $toData = [
                            'name'     => $ord->name,
                            'email'    => $ord->email,
                            'template' => 'D7.'.$ord->plan,
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