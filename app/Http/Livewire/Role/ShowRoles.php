<?php

namespace App\Http\Livewire\Role;

use App\Modules\Role\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRoles extends Component
{

    use WithPagination;

    public $sortBy = 'name';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $roles = Role::query()
            ->where('name', '<>', 'superadmin')
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.role.show-roles', [
            'roles' => $roles,
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

    public function handleDeleteRole($id)
    {
        $checkRole = Role::find($id);
        if ($checkRole) {
            $checkRole->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
