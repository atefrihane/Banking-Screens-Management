<?php

namespace App\Http\Livewire\Email;

use App\Modules\Email\Models\Email;
use Livewire\Component;

class ShowUpdateEmail extends Component
{
    public $email;
    public $address;


    public function mount($email)
    {
        $this->email = $email;
        $this->address = $email->address;
    }
    public function render()
    {
        return view('livewire.email.show-update-email');
    }

    public function handleUpdateEmail()
    {

    
        $validatedData = $this->validate([
            'address' => 'required|email|unique:emails,address,' . $this->email->id . ',id',

        ]);
        $this->email->update($validatedData);
     
        $this->dispatchBrowserEvent('EmailUpdated');

    }
}
