<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Registration;
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
        $schedule->call(function () {
            Registration::join('events', 'events.id', '=', 'registrations.event_id')
                        ->where('events.tanggal_event', '<', Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'))->delete();
        })->dailyAt('22:45')
        ->timezone('Asia/Jakarta');
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
