<?php

namespace App\Http\Livewire\Email;

use Livewire\Component;
use Livewire\WithPagination;
use App\Modules\Role\Models\Role;
use App\Modules\Email\Models\Email;


class ShowEmails extends Component
{

    use WithPagination;

    public $sortBy = 'address';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $emails = Email::query()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.email.show-emails', [
            'emails' => $emails,
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

    public function handleDeleteEmail($id)
    {
        $checkEmail = Email::find($id);
        if ($checkEmail) {
            $checkEmail->delete();
        
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
