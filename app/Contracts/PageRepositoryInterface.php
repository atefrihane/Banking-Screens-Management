<?php
namespace App\Contracts;

interface PageRepositoryInterface
{


    public function load($page , $id);
    public function store($page,$id);
  

}
