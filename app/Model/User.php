<?php

namespace App\Model;

use App\Model\Order;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    const ADMIN = 'admin';
    const NORMAL = 'normal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'username',
        'uid',
        'cpf',
        'type'
    ];

    protected $hidden = [
        'password',
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
                'validation' => 'required',
            ],
            'email' => [
                'label' => 'E-mail',
                'validation' => 'required',                
            ],  
            'username' => [
                'label' => 'Username',
                'validation' => 'required',                
            ],
            'type' => [
                'label' => 'Privilégio',
                'type' => 'select',
                'validation' => 'required',
                'options' => [
                    self::ADMIN => 'Administrador',
                    self::NORMAL => 'Normal (cliente)',
                ],
            ],
        ]
    ];

    public function isAdmin() {
        return $this->type == SELF::ADMIN;
    }


    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }    

    // JWT Subct methods
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getFirstNameAttribute()
    {
        // Using $this->name, which is a string representing a full name, extract only the first name
        $name = $this->name;
        $parts = explode(' ', $this->name);

        if (isset($parts[0])) {
            $name = $parts[0];
        }
        
        return Str::title($name);
    }

    /**
     * Get all of the user's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the user's orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }    
}
