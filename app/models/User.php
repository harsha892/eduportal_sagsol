<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{

    use Notifiable;

    // Rest omitted for brevity

    

    protected $hidden = ['contact_id', 'password', 'roles'];
    protected $appends = ['role_id'];

    public function roles()
    {
        return $this->hasOne(RoleUser::class);
    }
    public function getRoleIdAttribute()
    {
        return $this->roles->role_id;
    }
    

    public function contact()
    {
        return $this->hasOne(Contact::class); //contacts -> contact_id
    }

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

}
