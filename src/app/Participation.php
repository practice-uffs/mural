<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    const AUTHOR     = 1; 
    const ADVISOR    = 2; 
    const COADVISOR  = 3; 
    const EXAMINER   = 4;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => Participation::AUTHOR,
    ];

    protected $fillable = [
        'user_id',
        'project_id',
        'role',
        'confirmed',
        'confirmed_on'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
