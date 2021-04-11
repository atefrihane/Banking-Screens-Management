<?php

namespace App\Http\Livewire\Planning;

use App\Modules\Channel\Models\Channel;
use App\Modules\Planning\Models\Planning;
use App\Modules\Player\Models\Player;
use Livewire\Component;

class ShowUpdatePlanning extends Component
{
    public $planning;
    public $channel_id;
    public $player_id;
    public $schedule_time;
    public $channels = [];
    public $players = [];

    protected $listeners = [
        'set:updateScheduleTime' => 'setScheduleTime',
    ];
    public function mount($planning)
    {
  
        $this->channel_id = $planning->channel_id;
        $this->player_id = $planning->player_id;
        $this->schedule_time = $planning->schedule_time;
      
        $this->channels = Channel::all();
        $this->players = Player::all();
    }

    public function handleLoadPlayers($id)
    {
        $checkPlayer = Player::with('channel')->find($id);
        if ($checkPlayer) {
             $this->channels = Channel::whereNetworkId($checkPlayer->channel->network_id)->get();
        }

    }
    public function render()
    {
        return view('livewire.planning.show-update-planning');
    }

    public function setScheduleTime($value)
    {
  
       $this->schedule_time = $value;
    }

    public function handleUpdatePlanning()
    {
      
        $validatedData = $this->validate([
            'channel_id' => 'required|exists:channels,id',
            'player_id' => 'required|exists:players,id',
            'schedule_time' => 'required|date|unique:plannings,schedule_time,'.$this->planning->id.',id,channel_id,' . $this->channel_id.',player_id,'.$this->player_id,
        ]);
        $this->planning->update($validatedData);
        $this->dispatchBrowserEvent('PlanningUpdated');

    }

}
