<?php
namespace App\Repositories;

use App\Contracts\EmailRepositoryInterface;
use App\Contracts\ImageRepositoryInterface;
use App\Modules\Email\Models\Email;

class EmailRepository implements EmailRepositoryInterface
{

 

    public function fetchAll($type)
    {
        return [
            'all' => Email::all(),
        ][$type];

    }

    public function fetchById($id)
    {
        return Email::find($id);

    }

    public function update($user)
    {

    }

    public function delete($id)
    {

    }

 

}
