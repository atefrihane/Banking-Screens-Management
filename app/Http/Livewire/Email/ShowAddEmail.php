<?php

namespace App\Http\Livewire\Email;

use App\Modules\Email\Models\Email;
use Livewire\Component;

class ShowAddEmail extends Component
{

    public $address = '';
    public $url = '';
    protected $rules = [
        'address' => 'required|email|unique:emails,address',

    ];

    public function render()
    {
        return view('livewire.email.show-add-email');
    }

    public function handleAddEmail()
    {

        $validatedData = $this->validate();
        Email::create($validatedData);
        $this->dispatchBrowserEvent('EmailAdded');

    }
}
