<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type',
        'type',
        'name', 'email', 'password',
        'permissions',
    ];

    public function UserActivation()
    {
        return $this->belongsTo(UserActivation::class, 'id', 'user_id');
    }

    public function Profile()
    {
        return $this->belongsTo(Profile::class, 'id', 'user_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
