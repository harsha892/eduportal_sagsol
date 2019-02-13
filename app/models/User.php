<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends SentinelUser implements JWTSubject
{

    use Notifiable;
    use \Venturecraft\Revisionable\RevisionableTrait;
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();
    }
    // Rest omitted for brevity
    protected $hidden = ['password', 'roles'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, h:iA',
        'updated_at' => 'datetime:d/m/Y, h:iA',
        'status' => 'boolean',
    ];

    /**
     * Get the user details
     *
     */
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    /**
     * Check for user permission via role
     *
     * @param $role
     *
     * @return count
     */
    public function hasRole($role)
    {
        return $this->where('role', $role)
            ->where('id', $this->id)
            ->count();
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

    public function canCreateUser()
    {
        if (!$this->roles || !$this->roles->first()) {
            return false;
        }

        return in_array($this->roles->first()->id, [1, 2, 3]);
    }

    public function canCreateGroup()
    {
        if (!$this->roles || !$this->roles->first()) {
            return false;
        }

        return in_array($this->roles->first()->id, [1]);
    }

}
