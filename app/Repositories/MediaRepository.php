<?php
namespace App\Repositories;

use App\Modules\Media\Models\Media;
use App\Contracts\ImageRepositoryInterface;
use App\Contracts\MediaRepositoryInterface;

class MediaRepository implements MediaRepositoryInterface
{

    private $image;

    public function __construct(ImageRepositoryInterface $image)
    {
        $this->image = $image;

    }

    public function store($media)
    {
        $mediaLink = $this->image->uploadFile($media['link'], '/img/files');
        return Media::create([
            'type' => $media['type'],
            'link' => $mediaLink,
        ]);

    }

}
