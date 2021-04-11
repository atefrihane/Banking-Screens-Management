<?php

namespace App\Modules\Planning\Models;

use App\Modules\Channel\Models\Channel;
use App\Modules\Player\Models\Player;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{

    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        return $query
            ->where('schedule_time', 'like', '%' . $value . '%');

    }
    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
    

}
