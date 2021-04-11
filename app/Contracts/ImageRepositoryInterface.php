<?php
namespace App\Contracts;

interface ImageRepositoryInterface
{
    public function uploadImage($image, $resourceName);
    public function uploadPdf($file, $resourceName);
}
