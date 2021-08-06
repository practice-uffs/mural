<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'notice',
        'img_url',
        'icon_svg_path',
        'color',
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
                'placeholder' => 'Ex.: Evento',
                'validation' => 'required',
            ],
            'slug' => [
                'label' => 'Abreviação (sem acentos ou espaços)',
                'placeholder' => 'Ex.: evento',
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: uma breve descrição dessa categoria',
                'show' => 'create,edit'                
            ],
            'notice' => [
                'label' => 'Aviso',
                'placeholder' => 'Ex.: Há muitas solicitações de serviço nessa categoria, o tempo de resposta pode ser mais longo.',
                'show' => 'create,edit'
            ],
            'color' => [
                'label' => 'Cor',
                'placeholder' => 'Ex.: yellow-500',
                'show' => 'create,edit'
            ],
            'is_active' => [
                'type' => 'boolean',
                'value_as_text' => [
                    'Inativa',
                    'Ativa',
                ],
                'label' => 'Ativa',
                'placeholder' => 'Se essa categoria deve aparecer em nossos formulários.',
            ],            
        ]
    ];
}
