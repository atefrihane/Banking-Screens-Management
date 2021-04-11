<?php
namespace App\Repositories;

use App\Contracts\ChannelRepositoryInterface;
use App\Contracts\ImageRepositoryInterface;
use App\Modules\Channel\Models\Channel;

class ChannelRepository implements ChannelRepositoryInterface
{

    private $image;

    public function __construct(ImageRepositoryInterface $image)
    {
        $this->image = $image;

    }
    public function fetchAll($type)
    {
        return [
            'all' => Channel::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Channel::with('network')->find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

    public function uploadZip($channel)
    {

        $checkChannel = $this->fetchById($channel['channel_id']);
        if ($checkChannel) {
            $checkChannel->zip_file ? $this->image->deleteFile($checkChannel->zip_file) : '';
            $zipFileLink = $this->image->uploadFile($channel['zip_file'], '/img/files');
            $checkChannel->update([
                'zip_file' => $zipFileLink,
            ]);
            return true;
        }
        return false;
    }

}
