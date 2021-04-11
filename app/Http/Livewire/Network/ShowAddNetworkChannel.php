<?php

namespace App\Http\Livewire\Network;

use App\Modules\Network\Models\Network;
use Livewire\Component;

class ShowAddNetworkChannel extends Component
{
    public $network;
    public $name = '';
    public $url = '';
    protected $rules = [
        'name' => 'required|unique:channels,name|max:300',
        'url' => 'required|url|max:300',
    ];

    public function mount($network)
    {
        $this->network = $network;

    }
    public function render()
    {
        return view('livewire.network.show-add-network-channel');
    }

    public function handleAddChannel()
    {
      
        $validatedData = $this->validate();
        $this->network->channels()->create($validatedData);
        $this->dispatchBrowserEvent('ChannelAdded');

    }
}
