<?php

namespace App\Http\Livewire\Planning;

use App\Modules\Planning\Models\Planning;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPlannings extends Component
{

    use WithPagination;

    public $sortBy = 'schedule_time';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $plannings = Planning::query()
            ->search($this->search)
            ->with('channel','player')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.planning.show-plannings', [
            'plannings' => $plannings,
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

    public function handleDeletePlanning($id)
    {
        $checkPlanning = Planning::find($id);
        if ($checkPlanning) {
            $checkPlanning->delete();

            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
