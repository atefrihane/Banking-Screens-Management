<?php

namespace App\Http\Livewire\Network;

use Livewire\Component;

class ShowUpdateNetwork extends Component
{
    public $network;
    public $name = '';

    public function mount($network)
    {
        $this->network = $network;
        $this->name = $network->name;
    }
    public function render()
    {
        return view('livewire.network.show-update-network');
    }

    public function handleUpdateNetwork()
    {
       

        $validatedData = $this->validate([
            'name' => 'unique:networks,name,' . $this->network->id . ',id|max:300',

        ]);

        $this->network->update([
            'name' => $this->name,

        ]);
        $this->dispatchBrowserEvent('NetworkUpdated');

    }
}
