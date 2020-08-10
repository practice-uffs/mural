<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'content'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
