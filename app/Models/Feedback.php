<?php

namespace App\Models;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Feedback extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'type',
        'comment',
        'stars',
        'is_visible',
        'is_highlight'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'stars' => 'int',
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
            'type' => [
                'type' => 'radio',
                'options' => [
                    'critic' => 'Crítica',
                    'comment' => 'Comentário',
                    'compliment' => 'Elogio',                    
                    'suggestion' => 'Sugestão',
                ],
                'label' => 'Tipo',
                'placeholder' => 'Ex.: meu título lindo',
                'validation' => 'required|in:critic,comment,suggestion,compliment',
            ],
            'stars' => [
                'label' => 'Avaliação',
                'type' => 'radio',
                'options' => [
                    '1' => '😔',
                    '2' => '😐',
                    '3' => '🙂',
                    '4' => '😄',
                    '5' => '🥰',
                ],
                'style' => 'text-4xl',
                'placeholder' => 'Ex.: descrição de alguma coisa',
                'show' => '',
            ],
            'comment' => [
                'label' => 'Comentário',
                'type' => 'textarea',
                'placeholder' => 'Ex.: descrição de algo que você julga pertinente.',
                'validation' => 'required|min:5',                
            ],
            'is_visible' => [
                'type' => 'boolean',
                'label' => 'Visível',
                'placeholder' => 'Ex.: descrição de alguma coisa',
                'show' => 'edit,list'
            ]            
        ]
    ];

    /**
     * Get the user associated with the feedback.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getCreatedAtHumanAttribute()
    {

        $diffInDays = $this->created_at->diffInDays(Carbon::now());

        if ($diffInDays > 3) {
            return $this->created_at->format('d/m/Y (h:i)');
        }

        return $this->created_at->diffForHumans();
    }

}
