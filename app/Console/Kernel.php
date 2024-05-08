<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Agenda;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\DemoCron::class,
    ];

    protected function schedule(Schedule $schedule)
    {

        $agenda = Agenda::whereDate('tgl_agenda', date('Y-m-d'))->orderBy('waktu', 'asc')->limit(6)->Paginate(6);
        
        // $schedule->command('demo:cron')
        $schedule->exec('node /agenda1/public/js/main.js')
        ->dailyAt('7:19');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
