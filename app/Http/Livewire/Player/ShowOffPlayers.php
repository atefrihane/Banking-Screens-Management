<?php

namespace App\Http\Livewire\Player;

use App\Contracts\PlayerRepositoryInterface;
use App\Modules\Player\Models\Player;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOffPlayers extends Component
{

    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $players = Player::query()
            ->off()
            ->with('channel.network')
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.player.show-off-players', [
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

    public function handleDeletePlayer(PlayerRepositoryInterface $player, $id)
    {
        $checkPlayer = Player::find($id);
        if ($checkPlayer) {
            $player->delete($checkPlayer->link);
            $checkPlayer->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
