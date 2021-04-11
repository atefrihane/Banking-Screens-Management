<?php

namespace App\Modules\Network\Controllers;

use App\Contracts\NetworkRepositoryInterface;
use App\Http\Controllers\Controller;

class NetworkController extends Controller
{
    private $networks;
    public function __construct(NetworkRepositoryInterface $networks)
    {
        $this->networks = $networks;
    }

    public function showUpdateNetwork($id)
    {
        $checkNetwork = $this->networks->fetchById($id);
        if ($checkNetwork) {
            return view('Network::showUpdateNetwork', [
                'network' => $checkNetwork,
            ]);
        }
        return view('showNotFound');

    }
    public function showNetworkChannels($id)
    {
        $checkNetwork = $this->networks->fetchById($id);
        if ($checkNetwork) {
            return view('Network::showNetworkChannels', [
                'network' => $checkNetwork,
            ]);
        }
        return view('showNotFound');

    }

    public function showAddNetworkChannel($id)
    {

        $checkNetwork = $this->networks->fetchById($id);
        if ($checkNetwork) {
            return view('Network::showAddNetworkChannel', [
                'network' => $checkNetwork,
            ]);
        }
        return view('showNotFound');

    }

    public function showNetworkPlayers($id)
    {
        $checkNetwork = $this->networks->fetchById($id);
        if ($checkNetwork) {
            return view('Network::showNetworkPlayers', [
                'network' => $checkNetwork,
            ]);
        }
        return view('showNotFound');
    }


    public function showAddNetworkPlayer($id)
    {

        $checkNetwork = $this->networks->fetchById($id);
        if ($checkNetwork) {
            return view('Network::showAddNetworkPlayer', [
                'network' => $checkNetwork,
            ]);
        }
        return view('showNotFound');

    }



}
