<?php
namespace App\Contracts;

interface ChannelRepositoryInterface
{


    public function fetchAll($type);
    public function delete($id);
    public function update($user);
    public function fetchById($id);

}
