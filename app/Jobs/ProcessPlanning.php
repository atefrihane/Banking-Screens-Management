<?php

namespace App\Jobs;

use App\Modules\Player\Models\Player;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessPlanning implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $deleteWhenMissingModels = true;
    private $planning;
    public function __construct($planning)
    {
        $this->planning = $planning;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Player::find($this->planning->player_id)
            ->update([
                'channel_id' => $this->planning->channel_id,
            ]);
        $this->planning->update(['status' => 1]);

        Log::channel('planning')->info('Planning processed');
    }
}
