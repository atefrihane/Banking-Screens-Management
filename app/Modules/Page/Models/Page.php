<?php

namespace App\Modules\Page\Models;

use App\Modules\Channel\Models\Channel;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $guarded = ['id'];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

}
