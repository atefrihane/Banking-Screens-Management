<?php

namespace App\Http\Livewire\Network;

use Livewire\Component;
use App\Modules\Network\Models\Network;

class ShowAddNetwork extends Component
{

    public $name = '';
    protected $rules = [
        'name' => 'required|unique:networks,name|max:300',
    ];
    public function render()
    {
        return view('livewire.network.show-add-network');
    }

    public function handleAddNetwork()
    {
        $this->validate();
        Network::create(['name' => $this->name]);
        $this->dispatchBrowserEvent('NetworkAdded');

    }
}
