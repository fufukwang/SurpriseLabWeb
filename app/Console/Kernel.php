<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //Commands\Inspire::class,
        //Commands\SmsSent::class,
        Commands\ClubSentMail::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('sms:sent')->dailyAt('8:00');
        //$schedule->command('inspire')->hourly();
        // 中午12點寄送信件及簡訊
        // $schedule->command('club:sentmail')->dailyAt('12:00');  // 191121 取消寄送

    }
}
