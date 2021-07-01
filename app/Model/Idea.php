<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'description',
        'is_visible',
        'is_highlight',
        'user_id'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_visible' => 'boolean',
        'is_highlight' => 'boolean'
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'title' => [
                'label' => 'Título oi oi',
                'placeholder' => 'Ex.: meu título lindo',
                'validation' => 'required|min:5',
                'list_column' => true
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: descrição de alguma coisa',
                'list_column' => false
            ]
        ]
    ];

    /**
     * Get the user associated with the idea.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
