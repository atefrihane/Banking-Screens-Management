<?php

namespace App\Http\Livewire\Media;

use App\Contracts\ImageRepositoryInterface;
use App\Modules\Media\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;

class ShowVideos extends Component
{

    use WithPagination;

    public $sortBy = 'link';

    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $videos = Media::query()
            ->videos()
            ->search($this->search)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.media.show-videos', [
            'videos' => $videos,
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

    public function handleDeleteVideo(ImageRepositoryInterface $image, $id)
    {
        $checkMedia = Media::find($id);
        if ($checkMedia) {
            $image->delete($checkMedia->link);
            $checkMedia->delete();
            $this->render();
            $this->dispatchBrowserEvent('ElementDeleted');
        }

    }

}
