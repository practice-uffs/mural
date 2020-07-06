<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'text'   => ':)',
    ];

    protected $fillable = [
        'user_id',
        'item_id',
        'text'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
