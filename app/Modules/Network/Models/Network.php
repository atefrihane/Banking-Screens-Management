<?php

namespace App\Modules\Network\Models;

use App\Modules\Channel\Models\Channel;
use Illuminate\Database\Eloquent\Model;

class Network extends Model {

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%');

    }

    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
}
