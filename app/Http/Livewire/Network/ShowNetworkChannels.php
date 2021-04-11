<?php

namespace App\Http\Livewire\Network;

use App\Modules\Channel\Models\Channel;
use App\Modules\Network\Models\Network;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNetworkChannels extends Component
{
    use WithPagination;
    public $network;
    public $search = '';
    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function mount($network)
    {
        $this->network = $network;

    }

    public function render()
    {

        $channels = Channel::query()
            ->whereNetworkId($this->network->id)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.network.show-network-channels', [
            'channels' => $channels,
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }

        return $this->sortBy = $field;
    }

    public function updatingSearch()
    {

        $this->render();

    }

    public function handleDeleteChannel($id)
    {
        $checkChannel = Channel::find($id);
        if ($checkChannel) {

            $checkChannel->delete();
            // $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
