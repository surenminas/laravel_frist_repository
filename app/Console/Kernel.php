<?php

namespace App\Console;

use Termwind\Components\Dd;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use App\Http\Controllers\Admin\Rate\RateUpdateController;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
     
        // $schedule->call(function () {
        //     DB::table('rates')->where('currency', '=', 'GBP')->delete();
        // })->everyMinute();

        $schedule->call(new RateUpdateController)->everyMinute();


    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
