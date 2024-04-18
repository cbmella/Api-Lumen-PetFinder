<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CommandFetchFormatsResources;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        CommandFetchFormatsResources::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(CommandFetchFormatsResources::class)
            ->daily(); //Ejecute la tarea todos los días a medianoche.
            //->everySecond(); //activar para realizar el test de funcionamiento
        
        $schedule->command('queue:prune-batches --hours=1 --unfinished=1 --cancelled=1')->daily();
        $schedule->command('queue:flush')->daily();
    }
}
