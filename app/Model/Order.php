<?php

namespace App\Model;

use App\OrderEvaluation;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Eager load the following always
     */
    protected $with = [
        'user',
        'location',
        'service',
        'comments.user'
    ];

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
        'google_drive_in_folder_link',
        'google_drive_out_folder_link',
        'google_drive_folder_link',
        'requested_due_date',
        'user_id',
        'location_id',
        'service_id',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data' => AsArrayObject::class,
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:h-i d/m/Y',
    ];

    /**
     * Meta information about Livewire crud crud
     *
     * @var array
     */
    public static $crud = [
        'fields' => [
            'title' => [
                'label' => 'Título',
                'placeholder' => 'Ex.: Semana Acadêmica de Física',
                'validation' => 'required|min:5',
            ],
            'description' => [
                'label' => 'Descrição',
                'placeholder' => 'Ex.: Preciso de X, Y e Z.',
                'validation' => 'required|min:10',
                'type' => 'textarea',
                'show' => 'create,edit'
            ],
            'location_id' => [
                'type' => 'model:App\Model\Location',
                'label' => 'Local',
                'validation' => 'required',
                'placeholder' => '',
                'show' => 'create,edit'
            ], 
            'requested_due_date' => [
                'type' => 'date',
                'label' => 'Prazo de entrega sugerido',
            ],
        ]
    ];

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the user associated with the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the location associated with the order.
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Avaliação desse pedido.
     */
    public function evaluation()
    {
        return $this->hasOne(OrderEvaluation::class, 'order_id');
    }

    /**
     * Get the service associated with the order.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getGoogleDriveInFolderIdAttribute()
    {
        if (empty($this->google_drive_in_folder_link)) {
            return '';
        }

        $parts = explode('/', $this->google_drive_in_folder_link);
        return $parts[count($parts) - 1];
    }

    public function getGoogleDriveOutFolderIdAttribute()
    {
        if (empty($this->google_drive_out_folder_link)) {
            return '';
        }

        $parts = explode('/', $this->google_drive_out_folder_link);
        return $parts[count($parts) - 1];
    }    
    
    /**
     * Obtém informações sobre a situação do pedido para mostrar para o usuário,
     * utilizando como base os campos de status, link para github, etc. 
     * As informações retornadas estão em texto "amigável" que pode ser mostrado
     * para o usuário final.
     * 
     * @return stdClass objeto com os campos `text`, `explanation`, `color`.
     */
    public function situation() {
        if (empty($this->github_issue_link)) {
            return (object) [
                'text' => 'Aguardando análise',
                'explanation' => 'Ainda não começamos a trabalhar nessa solicitação. Ela está na fila aguardando análise de viabilidade.',
                'color' => 'yellow-600',
            ];
        }

        if ($this->closed) {
            return (object) [
                'text' => 'Cancelado',
                'explanation' => 'O pedido foi cancelado por solicitação do autor ou porque ele é inviável dentro das possibilidades da equipe.',
                'color' => 'red-600',
            ];
        }

        if (!empty($this->github_issue_link)) {
            return (object) [
                'text' => 'Em andamento',
                'explanation' => 'O pedido está na fila de trabalho para ser realizado. Quando chegar sua vez, ele será conduzido.',
                'color' => 'green-600',
            ];
        }

        return (object) [
            'text' => 'Incerto',
            'explanation' => 'Há muitas indefinições sobre o pedido. Por favor, fale com alguém da equipe.',
            'color' => 'blue-600',
        ];
    }
}
