<?php

namespace App\Http\Livewire\Role;

use App\Modules\Role\Models\Role;
use Livewire\Component;

class ShowAddRole extends Component
{
    public $name = '';

    protected $rules = [
        'name' => 'required|string|unique:roles,name|max:300',

    ];

    public function mount()
    {
        $this->roles = Role::exceptSuper()->get();
    }
    public function render()
    {
        return view('livewire.role.show-add-role');
    }

    public function handleAddRole()
    {
        $validatedData = $this->validate();
        Role::create($validatedData);
        $this->dispatchBrowserEvent('RoleAdded');

    }
}
