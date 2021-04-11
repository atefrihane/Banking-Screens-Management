<?php

namespace App\Http\Livewire\Network;

use App\Modules\Channel\Models\Channel;
use App\Modules\Player\Models\Player;
use Livewire\Component;

class ShowAddNetworkPlayer extends Component
{
    public $channels = [];
    public $network;
    public $name = '';
    public $longitude = 0;
    public $latitude = 0;
    public $channel_id = '';

    public $location;
    protected $rules = [
        'name' => 'required|unique:players,name|max:300',
        'channel_id' => 'required|exists:channels,id',
        'location' => 'required|string',
        'longitude' => 'required',
        'latitude' => 'required',

    ];

    protected $listeners = [
        'set:location' => 'setLocationValue',
    ];

    public function setLocationValue($location)
    {
  

        $this->longitude = $location['longitude'];
        $this->latitude = $location['latitude'];
        $this->location = $location['name'];
    }

    public function mount($network)
    {
        $this->network = $network;
        $this->channels = Channel::where('network_id', $network->id)->get();

    }

    public function handleAddPlayer()
    {

        $validateData = $this->validate();
        Player::create($validateData);
        $this->dispatchBrowserEvent('PlayerAdded');

    }
    public function render()
    {
        return view('livewire.network.show-add-network-player');
    }
}
