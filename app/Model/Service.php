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
        'eval_days',
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
        'eval_days' => 'int',
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
            ],
            'name' => [
                'label' => 'Nome',
                'placeholder' => 'Ex.: Edição de vídeo',
                'validation' => 'required|min:5',
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: uma breve descrição desse serviço',
                'show' => 'create,edit',
            ],
            'work_days' => [
                'label' => 'Dias úteis',
                'placeholder' => 'Ex.: 10',
            ],
            'eval_days' => [
                'label' => 'Dias úteis para avaliação',
                'placeholder' => 'Ex.: 3',
            ],            
            'notice' => [
                'label' => 'Aviso',
                'placeholder' => 'Ex.: estamos com muitas demandas desse serviço, pedidos podem demorar.',
                'show' => 'create,edit',
            ], 
            'color' => [
                'label' => 'Cor',
                'placeholder' => 'Ex.: yellow-500',
                'show' => 'create,edit',
            ],             
            'icon_svg_path' => [
                'label' => 'Ícone (path SVG)',
                'placeholder' => 'Ex.: <path>...</path>',
                'show' => 'create,edit',
            ],            
            'poll' => [
                'label' => 'Perguntas adicionais',
                'type' => 'poll',
                'show' => 'create,edit',
            ],
            'is_available' => [
                'type' => 'boolean',
                'value_as_text' => [
                    'Indisponível',
                    'Disponível',
                ],
                'label' => 'Disponível',
                'placeholder' => 'Se esse serviço está disponível para solicitação de clientes.',
            ],
            'is_active' => [
                'type' => 'boolean',
                'value_as_text' => [
                    'Inativo',
                    'Ativo',
                ],
                'label' => 'Ativo',
                'placeholder' => 'Se esse serviço deve aparecer em nossos formulários.',
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
