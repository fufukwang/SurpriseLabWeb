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
        Commands\MasterMailSend::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 簡訊已停用
        // $schedule->command('sms:sent')->dailyAt('8:00');
        // 每小時檢查並發送鳩團信件(等待開啟中)
        // $schedule->command('team:sentmail')->hourly();
        // 中午12點寄送信件及簡訊
        // $schedule->command('club:sentmail')->dailyAt('12:00');  // 191121 取消寄送
        // 要求各項時間
        // $schedule->command('team:sentmail 17')->dailyAt('13:00'); // 前21.14.10天 寄送信件
        // $schedule->command('team:sentmail 18')->dailyAt('13:00'); // 前10天寄送簡訊
        // $schedule->command('team:sentmail 11')->dailyAt('11:00'); // 前一天寄送簡訊
    }
}
