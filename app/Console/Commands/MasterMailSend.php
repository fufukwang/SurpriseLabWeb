<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\club\pro;
use App\model\club\order;
use SLS;

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
            // 找出時間內的場次
            $pr21day = pro::select('id')->where('open',1)
                ->whereRaw("floor(UNIX_TIMESTAMP(CONCAT(day,' ',rang_start))/1440)-floor(UNIX_TIMESTAMP()/1440)={$day21}")->get();
            foreach($pr21day as $pro){
                // 找出正常的訂單
                //$order21 = order::
            }

            // 送出信件

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}