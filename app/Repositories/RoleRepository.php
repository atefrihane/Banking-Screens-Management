<?php
namespace App\Repositories;

use App\Contracts\RoleRepositoryInterface;
use App\Modules\Role\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    public function fetchAll($type)
    {
        return [
            'all' => Role::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Role::find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

}
