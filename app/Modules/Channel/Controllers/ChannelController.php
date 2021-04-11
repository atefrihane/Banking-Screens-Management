<?php

namespace App\Modules\Channel\Controllers;

use App\Contracts\ChannelRepositoryInterface;
use App\Http\Controllers\Controller;

class ChannelController extends Controller
{
    private $channels;
    public function __construct(ChannelRepositoryInterface $channels)
    {
        $this->channels = $channels;

    }

    public function showUpdateChannel($id)
    {
        $checkChannel = $this->channels->fetchById($id);
        if ($checkChannel) {
            return view('Channel::showUpdateChannel', [
                'channel' => $checkChannel,
                'network' => $checkChannel->network,

            ]);
        }

        return view('showNotFound');

    }

    public function showUploadZip($id)
    {
        $checkChannel = $this->channels->fetchById($id);
        if ($checkChannel) {
            return view('Channel::showUploadZip', [
                'channel' => $checkChannel,
                'network' => $checkChannel->network,

            ]);
        }

        return view('showNotFound');
    }

    public function handleDownloadZip($id)
    {
        $checkChannel = $this->channels->fetchById($id);
        if ($checkChannel) {
            $file_path = public_path($checkChannel->zip_file);
            return response()->download( $file_path);
          
        }

        return view('showNotFound');

    }
}
