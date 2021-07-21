<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Channels extends Model
{
    protected $fillable = [
        'user_id',
        'fcm_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
