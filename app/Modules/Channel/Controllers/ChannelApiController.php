<?php

namespace App\Modules\Channel\Controllers;

use App\Contracts\ChannelRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelApiController extends Controller
{
    private $channels;
    public function __construct(ChannelRepositoryInterface $channels)
    {
        $this->channels = $channels;

    }

    public function handleUploadZip(Request $request)
    {
        $validatedData = request()->validate([
            'zip_file' => 'required|file',
 
        ]);
       
        $uploadChannelZip = $this->channels->uploadZip($request->all());
        if ($uploadChannelZip) {
            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 400]);
    }
}
