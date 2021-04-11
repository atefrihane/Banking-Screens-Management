<?php
namespace App\Contracts;

interface NetworkRepositoryInterface
{


    public function fetchAll($type);
    public function delete($id);
    public function update($user);
    public function fetchById($id);

}
