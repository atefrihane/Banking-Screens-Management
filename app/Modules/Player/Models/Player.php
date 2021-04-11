<?php

namespace App\Modules\Player\Models;

use App\Modules\Player\Models\Player;
use App\Modules\Channel\Models\Channel;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('name', 'like', '%' . $value . '%')
            ->where('location', 'like', '%' . $value . '%');
    }

    public function scopeOff($query)
    {
        return $query->whereStatus(0);
    }

    public function scopeTurnOff($query)
    {
        return $query->where('status', 1)
            ->whereRaw('TIMESTAMPDIFF(MINUTE,latest_scan,NOW()) > 2');
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
    public function plannings()
    {
        return $this->hasMany(Player::class);
    }
}
