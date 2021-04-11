<?php
namespace App\Repositories;

use App\Contracts\ImageRepositoryInterface;
use App\Modules\Image\Models\Image;
use Illuminate\Support\Str;

class ImageRepository implements ImageRepositoryInterface
{
    public function uploadImage($image, $resourceName)
    {

        $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($image)->save(public_path('img/' . $resourceName . '/') . $name);
        return '/img/' . $resourceName . '/' . $name;
    }

    public function uploadPdf($image, $resourceName)
    {

        $Newimage = str_replace('data:application/pdf;base64,', '', $image);
        $Newimage = str_replace(' ', '+', $Newimage);
        $imageName = Str::random(10) . '.' . 'pdf';
        \File::put(public_path() . '/img/' . $resourceName . '/' . $imageName, base64_decode($Newimage));
        return '/img/' . $resourceName . '/' . $imageName;

    }

    public function deleteFile($path)
    {
        if (\File::exists(public_path($path))) {

            \File::delete(public_path($path));
            return true;
        }

        return false;

    }

    public function delete($path)
    {
        if (\File::exists(($path))) {

            \File::delete(($path));
            return true;
        }

        return false;

    }
    public function uploadFile($file, $ressourceName)
    {

        $filePath = Str::random(40) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path($ressourceName), $filePath);

        return $ressourceName . '/' . $filePath;

    }
}
