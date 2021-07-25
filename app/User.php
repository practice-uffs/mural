<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Channels;

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
        'name', 'email', 'password', 'username', 'uid',  'cpf', 'type'
    ];

    public function isAdmin() {
        return $this -> type == SELF::ADMIN;
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

    public function channels()
    {
        return $this->hasOne(Channels::class);
    }
}
