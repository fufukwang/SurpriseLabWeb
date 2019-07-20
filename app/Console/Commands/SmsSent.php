<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\model\club\club_sms;


class SmsSent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:sent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sent 7 days sms';


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
            //club_sms::whereRaw("TO_DAYS(NOW())-TO_DAYS(created_at)<=7")->get();

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}