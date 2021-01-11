<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Mail;
use Illuminate\Support\Facades\Storage;
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
            

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}