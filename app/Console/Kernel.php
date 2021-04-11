<?php

namespace App\Console;

use App\Console\Commands\ScanPlayer;
use App\Modules\Player\Models\Player;
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
        ScanPlayer::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       
        $schedule->command('player:scan')
            ->everyMinute();

        // $planningTasks = Planning::where('status', 0)->get();
        // if ($planningTasks->isNotEmpty()) {
        //     foreach ($planningTasks as $planningTask) {

        //         $schedule->call(function () use ($planningTask) {
        //             //update player
        //             Player::find($planningTask->player_id)
        //                 ->update([
        //                     'channel_id' => $planningTask->channel_id,
        //                 ]);
        //             $planningTask->execute();
        //         })->cron($planningTask->schedule_time);
        //     }

        // }
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
