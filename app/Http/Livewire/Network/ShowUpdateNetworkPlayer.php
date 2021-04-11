<?php

namespace App\Http\Livewire\Network;

use App\Modules\Channel\Models\Channel;
use App\Modules\Network\Models\Network;
use Livewire\Component;

class ShowUpdateNetworkPlayer extends Component
{
    public $channels = [];
    public $player;
    public $network;
    public $name = '';
    public $longitude = 0;
    public $latitude = 0;
    public $channel_id = '';

    public $location;
    public function mount($player)
    {
        $this->channels = Channel::where('network_id', $player->channel->network_id)->get();
  
        $this->name = $player->name;
        $this->longitude = $player->longitude;
        $this->latitude = $player->latitude;

        $this->location = $player->location;
        $this->channel_id = $player->channel_id;
    }

    protected $listeners = [
        'set:location' => 'setLocationValue',
    ];

    public function setLocationValue($location)
    {
  

        $this->longitude = $location['longitude'];
        $this->latitude = $location['latitude'];
        $this->location = $location['name'];
    }

    
    public function render()
    {
        return view('livewire.network.show-update-network-player');
    }

    public function handleUpdatePlayer()
    {

        $validatedData = $this->validate([
            'name' => 'unique:players,name,' . $this->player->id . ',id|max:300',
            'channel_id' => 'required|exists:channels,id',
            'longitude' => 'required',
            'latitude' => 'required',
            'location' => 'required|string',
        ]);

        $this->player->update($validatedData);
        $this->dispatchBrowserEvent('PlayerUpdated');

    }
}
