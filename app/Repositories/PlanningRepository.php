<?php
namespace App\Repositories;

use App\Contracts\PlanningRepositoryInterface;
use App\Modules\Planning\Models\Planning;

class PlanningRepository implements PlanningRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Planning::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Planning::with('channel', 'player')->find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

}
