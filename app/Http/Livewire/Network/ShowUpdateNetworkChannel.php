<?php

namespace App\Http\Livewire\Network;

use App\Modules\Network\Models\Network;
use Livewire\Component;

class ShowUpdateNetworkChannel extends Component
{
    public $channel;
    public $name = '';
    public $url = '';

    public function mount($channel)
    {
        $this->channel = $channel;
        $this->name = $this->channel->name;
        $this->url = $this->channel->url;
    }
    public function render()
    {
        return view('livewire.network.show-update-network-channel');
    }

    public function handleUpdateChannel()
    {

        $validatedData = $this->validate([
            'name' => 'unique:channels,name,' . $this->channel->id . ',id|max:300',
            'url' => 'required|url|max:300',

        ]);

        $this->channel->update($validatedData);
        $this->dispatchBrowserEvent('ChannelUpdated');

    }
}
