<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
	protected $fillable = [
		'name',
                'short_name',
                'type',
                'email',
                'phone',
                'website',
                'address',
                'description',
                
                'avatar',

                'status',

                'created_by',
                'created_date',
                'created_time',
                'updated_by',
                'updated_date',
                'updated_time',
	];

    public function Socials()
    {
        return $this->hasMany(AgencySocial::class, 'agency_id', 'id');
    }
}
