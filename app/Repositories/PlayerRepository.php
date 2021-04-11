<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Modules\Player\Models\Player;
use App\Contracts\PlayerRepositoryInterface;

class PlayerRepository implements PlayerRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Player::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Player::with('channel.network')->find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

    public function updateStatus($player)
    {
        return Player::find($player['id'])
            ->update([
                'status' => 1,
                'latest_scan' => Carbon::now()
            ]);

    }

}
