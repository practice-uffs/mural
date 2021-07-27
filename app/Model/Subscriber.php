<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'created_at',
        'updatated_at',
        'email_verified_at',
    ];

    protected $cast = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'email' => [
                'label' => 'E-mail',
                'validation' => 'required',                
            ],  
            'created_at' => [
                'label' => 'created_at',
            ],
        ]
    ];
}
