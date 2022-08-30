<?php

namespace App\Console;

use App\Jobs\ProcessWriteFile;
use App\Jobs\ProcessWriteFile1;
use App\Jobs\ProcessWriteFile2;
use App\Jobs\ProcessWriteFile3;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->job(new ProcessWriteFile1, 'write_file_1', 'database')->everyMinute();
        $schedule->job(new ProcessWriteFile2, 'write_file_2', 'database')->everyThreeMinutes();
        $schedule->job(new ProcessWriteFile3, 'write_file_3', 'database')->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
