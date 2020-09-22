<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
