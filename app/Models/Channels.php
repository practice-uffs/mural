<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
