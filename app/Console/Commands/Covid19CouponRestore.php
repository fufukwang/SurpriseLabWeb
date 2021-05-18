<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Log;
use Illuminate\Console\Command;
use App\model\tgt2\pro;
use App\model\tgt2\order;
use App\model\tgt2\coupon;

class Covid19CouponRestore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Covid19:CouponRestore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Covid19 site cancal coupon restore ';


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
            // 取得日期區間資料
            $proday = pro::select('id','day')->where('open',1)
                ->whereRaw("day BETWEEN '2021-05-12' AND '2021-06-06'")->get();
            foreach($proday as $pro){
                $ordernow = order::select('id','sn')->where('pro_id',$pro->id)->where('pay_status','已付款')->get();
                $this->line($pro->day.' '.count($ordernow).' 筆');
                foreach ($ordernow as $ord) {
                    // pay_status 改成未付款
                    order::where('id',$ord->id)->update(['pay_status'=>'未完成']);
                    // coupon o_id 改成 0
                    coupon::where('o_id',$ord->sn)->update(['o_id'=>0]);
                }
            }
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

}