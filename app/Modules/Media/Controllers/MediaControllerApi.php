<?php

namespace App\Modules\Media\Controllers;

use App\Contracts\MediaRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaControllerApi extends Controller
{

    private $media;

    public function __construct(MediaRepositoryInterface $media)
    {
        $this->media = $media;

    }
    public function handleAddMedia(Request $request)
    {
        $saveMedia = $this->media->store($request->all());
        if ($saveMedia) {

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 400]);

    }

}
