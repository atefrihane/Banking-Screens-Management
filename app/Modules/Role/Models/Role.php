<?php

namespace App\Modules\Role\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%');

    }

    public function scopeExceptSuper($query)
    {
        return $query
            ->where('name', '<>', 'superadmin');

    }
    public function formatName()
    {
        return ucfirst($this->name);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
