<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    protected $fillable = [
        'user_id',
        'fcm_token'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
