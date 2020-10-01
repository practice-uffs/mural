<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'name', 'path', 'mime_type', 'description', 'item_id'
    ];
}
