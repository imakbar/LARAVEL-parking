<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	protected $fillable = [
                'user_id',
                'profile_id',
        	'socialsetup_id',
                'name',
                'icon',
                'social_link',

                'status',

                'created_by',
                'created_date',
                'created_time',
                'updated_by',
                'updated_date',
                'updated_time',
	];
}
