<?php

namespace App\Http\Livewire\Network;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Modules\Network\Models\Network;

class ShowNetworks extends Component
{
    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
  
        $networks = Network::query()
            ->orderBy($this->sortBy, $this->sortDirection)
            ->search($this->search)
            ->paginate($this->perPage);

        return view('livewire.network.show-networks', [
            'networks' => $networks,
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

    public function handleDeleteNetwork($id)
    {
        $checkNetwork = Network::find($id);
        if ($checkNetwork) {

            $checkNetwork->delete();
            // $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

    public function handleEndProcessNetwork($id)
    {
        $checkNetwork = Network::find($id);;
        if ($checkNetwork) {

            $checkNetwork->update(['last_scan' => Carbon::now()]);

            $this->dispatchBrowserEvent('ProcessEnded');
            $this->dispatchBrowserEvent('RefreshDropDown');

        }
    }

}
