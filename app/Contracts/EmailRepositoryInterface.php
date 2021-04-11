<?php
namespace App\Contracts;

interface EmailRepositoryInterface
{


    public function fetchAll($type);
    public function delete($id);
    public function update($user);
    public function fetchById($id);

}
