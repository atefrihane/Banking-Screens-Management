<?php
namespace App\Repositories;

use App\Contracts\NetworkRepositoryInterface;
use App\Modules\Network\Models\Network;

class NetworkRepository implements NetworkRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Network::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Network::find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

}
