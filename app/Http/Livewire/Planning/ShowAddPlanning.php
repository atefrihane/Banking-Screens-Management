<?php

namespace App\Http\Livewire\Planning;

use App\Jobs\ProcessPlanning;
use App\Modules\Channel\Models\Channel;
use App\Modules\Planning\Models\Planning;
use App\Modules\Player\Models\Player;
use Carbon\Carbon;
use Livewire\Component;

class ShowAddPlanning extends Component
{
    public $channel_id = '';
    public $player_id = '';
    public $schedule_time;
    public $channels = [];
    public $players = [];

    public function mount()
    {

        $this->players = Player::all();
    }
    public function render()
    {
        return view('livewire.planning.show-add-planning');
    }

    public function handleLoadPlayers($id)
    {
        $checkPlayer = Player::with('channel')->find($id);
        if ($checkPlayer) {
             $this->channels = Channel::whereNetworkId($checkPlayer->channel->network_id)->get();
        }

    }
    public function handleAddPlanning()
    {

        $validatedData = $this->validate([
            'channel_id' => 'required|exists:channels,id',
            'player_id' => 'required|exists:players,id',
            'schedule_time' => 'required|date|unique:plannings,schedule_time,NULL,id,channel_id,' . $this->channel_id . ',player_id,' . $this->player_id,
        ]);
        $planning = Planning::create($validatedData);
        ProcessPlanning::dispatch($planning)->delay(Carbon::parse($planning->schedule_time));
        $this->dispatchBrowserEvent('PlanningAdded');

    }

 

}
