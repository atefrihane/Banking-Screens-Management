<?php

namespace App\Modules\Channel\Models;

use App\Modules\Page\Models\Page;
use App\Modules\Network\Models\Network;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Planning\Models\Planning;

class Channel extends Model
{

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%');

    }

    public function network()
    {
        return $this->belongsTo(Network::class, 'network_id');
    }

    public function page()
    {
        return $this->hasOne(Page::class);
    }
    public function plannings()
    {
        return $this->hasMany(Planning::class);
    }

}
