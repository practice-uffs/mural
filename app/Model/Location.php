<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Ex.: meu título lindo',
                'validation' => 'required|min:5',
                'list_column' => true
            ],
            'slug' => [
                'label' => 'slug',
                'placeholder' => 'Ex.: descrição de alguma coisa',
                'list_column' => true
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: descrição de alguma coisa',
                'list_column' => true
            ],
            'is_active' => [
                'type' => 'boolean',
                'label' => 'is_active',
                'placeholder' => 'Ex.: descrição de alguma coisa',
                'list_column' => true
            ],            
        ]
    ];
}
