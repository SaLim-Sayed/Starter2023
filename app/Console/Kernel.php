<?php

namespace App\Console;

use App\Console\Commands\Notify;
use App\Console\Commands\expiration;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('user:expire')->everyMinute();
        $schedule->command('notify:email')->everyMinute();
    }

    protected $commands = [
        expiration::class,
        Notify::class,
     ];
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands/expiration');
        $this->load(__DIR__.'/Commands/Notify');


        require base_path('routes/console.php');
    }
}
