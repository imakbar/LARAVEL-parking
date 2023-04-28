<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
	protected $fillable = [

		'user_id',

        'first_name',
        'last_name',
        'phone',
        'mobile',
        'about_me',

        'avatar',

        'status',

	];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Socials()
    {
        return $this->hasMany(Social::class, 'profile_id', 'id');
    }
}
