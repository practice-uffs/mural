<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    const TYPE_PLAN   = 1; // draft, early project, etc 
    const TYPE_FINAL  = 2; // able to submit for final defense
    
    const STATUS_WAITING_SUPERVISION   = 1; 
    const STATUS_RUNNING               = 2; 
    const STATUS_WAITING_EXAMINATORS   = 3; 
    const STATUS_IN_EXAMINATION        = 4; 
    const STATUS_APPROVED              = 5; 
    const STATUS_FAILED                = 6;
    const STATUS_CANCELED              = 7;

    protected $fillable = [
        'title',
        'abstract',
        'period',
        'type',
        'status'
    ];

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function particpations()
    {
        return $this->hasMany('App\Participation');
    }
}
