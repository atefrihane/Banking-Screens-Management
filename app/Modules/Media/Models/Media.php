<?php

namespace App\Modules\Media\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

    protected $guarded = ['id'];
    public function scopeSearch($query, $value)
    {
        return $query
            ->where('link', 'like', '%' . $value . '%')

        ;

    }
    public function scopeImages($query)
    {
        return $query->whereType(1);

    }

    public function scopeVideos($query)
    {
        return $query->whereType(2);
    }

}
