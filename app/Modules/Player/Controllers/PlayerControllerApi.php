<?php

namespace App\Modules\Player\Controllers;

use App\Contracts\PlayerRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerControllerApi extends Controller
{
    private $players;
    public function __construct(PlayerRepositoryInterface $players)
    {
        $this->players = $players;
    }

    public function handleUpdatePlayer(Request $request)
    {

        $validatedData = $request->validate([
            'id' => 'required|exists:players,id',

        ]);

        $updatePlayer = $this->players->updateStatus($validatedData);
        if ($updatePlayer) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 400);

    }

    public function handleDownloadZip($id)
    {
        $checkPlayer = $this->players->fetchById($id);
        if ($checkPlayer) {
            $file_path = public_path($checkPlayer->channel->zip_file);
            return response()->download($file_path);

        }

        return response()->json(['status' => 'error'], 400);

    }

    public function handleGetUrl($id)
    {
        $checkPlayer = $this->players->fetchById($id);
        if ($checkPlayer) {
          return response()->json(['url' => $checkPlayer->channel->url] , 200);

        }

        return response()->json(['status' => 'error'], 400);
    }
}
