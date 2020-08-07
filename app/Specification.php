<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'item_id'
        'content'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
