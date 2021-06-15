<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'status',
        'title',
        'description',
        'data',
        'github_issue_link',
        'requested_due_date',
        'closed',
        'user_id',
        'location_id',
        'service_id',
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
            ],
        ]
    ];
}
