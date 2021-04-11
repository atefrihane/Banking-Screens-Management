<?php

namespace App\Modules\Role\Controllers;

use App\Http\Controllers\Controller;
use App\Contracts\RoleRepositoryInterface;

class RoleController extends Controller
{
    private $roles;
    public function __construct(RoleRepositoryInterface $roles)
    {
        $this->roles = $roles;
    }

    public function showUpdateRole($id)
    {
        $checkRole = $this->roles->fetchById($id);
        if ($checkRole) {

            return view('Role::showUpdateRole', [
                'role' => $checkRole,
            ]);
        }
        return view('showNotFound');

    }
}
