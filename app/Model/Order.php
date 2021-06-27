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
            'location_id' => [
                'type' => 'model:App\Model\Location',
                'label' => 'Local',
                'placeholder' => '',
                'list_column' => false
            ],  
            'github_issue_link' => [
                'type' => 'file',
                'label' => 'File',
                'placeholder' => 'Clique aqui ou arreste um arquivo para essa área para fazer upload',
                'list_column' => false
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
        return $this->belongsTo(User::class)->withTimestamps();
    }

    /**
     * Get the location associated with the order.
     */
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    /**
     * Get the service associated with the order.
     */
    public function service()
    {
        return $this->hasOne(Service::class);
    }    
}
