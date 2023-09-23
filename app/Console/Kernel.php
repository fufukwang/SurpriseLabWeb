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
        // Commands\ClubSentMail::class,
        Commands\MasterMailSend::class,
        // Commands\Covid19CouponRestore::class,
        Commands\Dark3Task::class,
        Commands\TerminalTask::class,
        Commands\ParisTask::class,
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
        $schedule->command('team:sentmail 17')->dailyAt('17:00'); // 前21.14.10天 寄送信件 // 2024 D10 信件改為11點寄送
        //$schedule->command('team:sentmail 18')->dailyAt('18:00'); // 前10天寄送簡訊 調整成12點寄送
        $schedule->command('team:sentmail 11')->dailyAt('11:00'); // 前一天寄送簡訊 // 2024 D10 信件改為11點寄送
        $schedule->command('team:sentmail 12')->dailyAt('12:00'); //  簡訊時間調整
        // dark3 寄送
        // 230601 先停掉整個排程
        $schedule->command('dark3:task 17')->dailyAt('17:00'); // 無光S3 行前信寄送
        $schedule->command('terminal:task 18')->dailyAt('18:00'); // 落日 行前信寄送
        $schedule->command('dark3:task 25')->hourly();
        $schedule->command('terminal:task 25')->hourly();


        $schedule->command('paris:task 18')->dailyAt('18:00'); // 落日 行前信寄送
    }
}
