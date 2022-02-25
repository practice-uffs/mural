<?php

namespace App\Models;

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
        'eval_days',
        'work_days',
        'order',
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
        'eval_days' => 'int',
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
                'type' => 'model:\App\Models\Category',
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
            'eval_days' => [
                'label' => 'Tempo de avaliação (dias úteis)',
                'placeholder' => 'Ex.: 3',
                'help' => 'Tempo mínimo que a equipe leva para analisar o pedido e decidir se ele é executável ou não.',                
                'show' => 'create,edit',
            ],                   
            'work_days' => [
                'label' => 'Tempo de execução (dias úteis)',
                'placeholder' => 'Ex.: 10',
                'help' => 'Tempo médio esperado que a equipe leva para executar o pedido e entregar algo para revisão.',
                'show' => 'create,edit',
            ],
            'notice' => [
                'label' => 'Aviso',
                'placeholder' => 'Ex.: estamos com muitas demandas desse serviço, pedidos podem demorar.',
                'show' => 'create,edit',
            ], 
            'order' => [
                'label' => 'Ordem',
                'placeholder' => 'Ex.: 1',
                'show' => 'create,edit',
            ],             
            'color' => [
                'label' => 'Cor',
                'placeholder' => 'Ex.: yellow-500',
                'help' => 'Utilizar cores no formato do Tailwind.',
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
