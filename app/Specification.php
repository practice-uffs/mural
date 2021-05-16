<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $fillable = [
        'img',
        'title',
        'description',
        'deadline',
        'example',
        'category_id',
        'available'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
