<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'notice',
        'poll',
        'img_url',
        'icon_svg_path',
        'color',
        'work_days',
        'is_available',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'poll' => AsArrayObject::class,        
        'work_days' => 'int',
        'is_available' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'category_id' => [
                'label' => 'Categoria',
                'validation' => 'required',
                'type' => 'model:\App\Model\Category',
                'list_column' => true
            ],
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Ex.: Campus Chapecó',
                'validation' => 'required|min:5',
                'list_column' => true
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: uma breve descrição desse local',
                'list_column' => false
            ],
            'work_days' => [
                'label' => 'Dias úteis',
                'placeholder' => 'Ex.: 10',
                'list_column' => true
            ],            
            'notice' => [
                'label' => 'Aviso',
                'placeholder' => 'Ex.: uma breve descrição desse local',
                'list_column' => false
            ], 
            'poll' => [
                'label' => 'Perguntas adicionais',
                'type' => 'poll',
                'list_column' => false
            ],
            'is_available' => [
                'type' => 'boolean',
                'value_as_text' => [
                    'Indisponível',
                    'Disponível',
                ],
                'label' => 'Disponível',
                'placeholder' => 'Se esse serviço está disponível para solicitação de clientes.',
                'list_column' => true
            ],
            'is_active' => [
                'type' => 'boolean',
                'value_as_text' => [
                    'Inativo',
                    'Ativo',
                ],
                'label' => 'Ativo',
                'placeholder' => 'Se esse serviço deve aparecer em nossos formulários.',
                'list_column' => true
            ],  
        ]
    ];

    /**
     * Get the category associated with the service.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
