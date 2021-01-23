<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\tgt2\pro;
use App\model\tgt2\order;
use App\model\tgt2\TeamMail;
use log;
use SLS;

// use DB;

class MasterMailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'team:sentmail';

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
            // 定義時間
            $day21 = 30240; // 24 * 60 * 21
            $day14 = 20160; // 24 * 60 * 14
            $day10 = 14400; // 24 * 60 * 10
            $day05 = 7200; // 24 * 60 * 5
            $day01 = 1440; // 24 * 60 * 1
            /*
            $pros = pro::select(DB::raw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60) AS A,rang_start"))
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60)>=0")->get();
                $this->line(count($pros));
            foreach($pros as $pro){
                $this->line($pro->A.'|'.$pro->rang_start);
            }
            */
            // 找出時間內的場次
            $pr21day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60)={$day21}")->get();
            foreach($pr21day as $pro){
                // 找出正常的訂單
                $order21 = order::select('id','name','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order21 as $ord) {
                    $teamMail = TeamMail::where('order_id',$ord->id)->get();
                    $needSend = true;
                    $teamNum = 0;
                    // 主揪 信件變數組合
                    $toData = [
                        'id'    => $ord->id,
                        'name'  => $ord->name,
                        'email' => $ord->email,
                        'type'  => 'D21'
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
                                'type'  => 'D21'
                            ];
                            $teamNum++;
                        } else {
                            $needSend = false;
                        }
                    }
                }
            }

            // 14
            $pr14day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60)={$day14}")->get();
            foreach($pr14day as $pro){
                // 找出正常的訂單
                $order14 = order::select('id','name','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order14 as $ord) {
                    $teamMail = TeamMail::where('order_id',$ord->id)->get();
                    $needSend = true;
                    $teamNum = 0;
                    // 主揪 信件變數組合
                    $toData = [
                        'id'    => $ord->id,
                        'name'  => $ord->name,
                        'email' => $ord->email,
                        'type'  => 'D14'
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
                                'type'  => 'D14'
                            ];
                            $teamNum++;
                        } else {
                            $needSend = false;
                        }
                    }
                }
            }
            // 10
            $pr10day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60)={$day10}")->get();
            foreach($pr10day as $pro){
                // 找出正常的訂單
                $order10 = order::select('id','name','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order10 as $ord) {
                    $teamMail = TeamMail::where('order_id',$ord->id)->get();
                    $needSend = true;
                    $teamNum = 0;
                    // 主揪 信件變數組合
                    $toData = [
                        'id'    => $ord->id,
                        'name'  => $ord->name,
                        'email' => $ord->email,
                        'type'  => 'D10'
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
                                'type'  => 'D10'
                            ];
                            $teamNum++;
                        } else {
                            $needSend = false;
                        }
                    }
                }
            }
            // 5
            $pr05day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60)={$day05}")->get();
            foreach($pr05day as $pro){
                // 找出正常的訂單
                $order05 = order::select('id','name','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order05 as $ord) {
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
                }
            }
            // 1
            $pr01day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/60)-floor(UNIX_TIMESTAMP()/60)={$day01}")->get();
            foreach($pr01day as $pro){
                // 找出正常的訂單
                $order01 = order::select('id','name','email')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                foreach ($order01 as $ord) {
                    $teamMail = TeamMail::where('order_id',$ord->id)->get();
                    $needSend = true;
                    $teamNum = 0;
                    // 主揪 信件變數組合
                    $toData = [
                        'id'    => $ord->id,
                        'name'  => $ord->name,
                        'email' => $ord->email,
                        'type'  => 'D01'
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
                                'type'  => 'D01'
                            ];
                            $teamNum++;
                        } else {
                            $needSend = false;
                        }
                    }
                }
            }
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

}