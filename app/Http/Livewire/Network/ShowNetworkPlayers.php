<?php

namespace App\Http\Livewire\Network;

use App\Modules\Network\Models\Network;
use App\Modules\Player\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNetworkPlayers extends Component
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

        $network = $this->network;

        $players = Player::query()
            ->whereHas('channel', function ($q) use ($network) {
                $q->where('network_id', $network->id);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.network.show-network-players', [
            'players' => $players,
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

    public function handleDeletePlayer($id)
    {
        $checkPlayer = Player::find($id);
        if ($checkPlayer) {

            $checkPlayer->delete();
            // $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
