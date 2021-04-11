<?php

namespace App\Http\Livewire\Role;

use App\Modules\Role\Models\Role;
use Livewire\Component;

class ShowUpdateRole extends Component
{
    public $role;
    public $name = '';

    public function mount($role)
    {
        $this->name = $this->role->name;
      

    }
    public function render()
    {
        return view('livewire.role.show-update-role');
    }

    public function handleUpdateRole()
    {
        $validatedData = $this->validate([

            'name' => 'required|email|unique:roles,name,' . $this->role->id . ',id',

        ]);
        $this->role->update($validatedData);

        $this->dispatchBrowserEvent('RoleUpdated');

    }
}
