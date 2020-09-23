<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'name', 'path', 'mime_type', 'description', 'item_id'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
