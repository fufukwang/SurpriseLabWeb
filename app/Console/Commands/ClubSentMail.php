<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\club\order;
use SLS;

class ClubSentMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'club:sentmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'order sent';


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
            // 取得前一天的內容
            $orders = order::whereRaw("TO_DAYS(NOW())-TO_DAYS(created_at)=1")->where('pay_status','已付款')->get();
            foreach ($orders as $order) {
                // sent email
                
                // sent sms
                $phone = $order->tel;
                if($order->dial_code == "+886"){
                    $phone_number = "0".$phone;
                } else {
                    $phone_number = str_replace('+','',$order->dial_code).$phone;
                }
                $message = "有你的信件喔";
                $sent_obj = SLS::sent_single_sms($phone_number,$message);
            }

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}