<?php

namespace App\Console\Commands;

use App\Mail\AlertOffPlayers;
use App\Modules\Email\Models\Email;
use App\Modules\Player\Models\Player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ScanPlayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:scan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanning players status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $playersOff = Player::turnOff()->get();

        if ($playersOff->isNotEmpty()) {
            Player::turnOff()
                ->update([
                    'status' => 0,
                ]);
            $emails = Email::pluck('address');
            if ($emails->isNotEmpty()) {
                foreach ($emails as $email) {
                    Mail::to($email)->send(new AlertOffPlayers($playersOff));
                }
            }

            Log::channel('player')->info('Player Scan processed');
        }

    }
}
