<?php

namespace App\Modules\Player\Controllers;

use App\Contracts\PlayerRepositoryInterface;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    private $players;
    public function __construct(PlayerRepositoryInterface $players)
    {
        $this->players = $players;
    }

    public function showUpdatePlayer($id)
    {
        $checkPlayer = $this->players->fetchById($id);
        if ($checkPlayer) {
            return view('Player::showUpdatePlayer', ['player' => $checkPlayer, 'network' => $checkPlayer->channel->network]);
        }
        return view('showNotFound');

    }

    public function showPlayer($id)
    {
        $checkPlayer = $this->players->fetchById($id);
        if ($checkPlayer) {
            return redirect()->away($checkPlayer->channel->url);
        }
        return view('showNotFound');
    }
}
