<?php

namespace App\Modules\Email\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

protected $guarded = ['id'];

public function scopeSearch($query, $value)
{
    return $query
        ->where('address', 'like', '%' . $value . '%')

    ;

}

}
