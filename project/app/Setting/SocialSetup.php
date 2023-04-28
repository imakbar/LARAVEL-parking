<?php

namespace App\Setting;

use Illuminate\Database\Eloquent\Model;

class SocialSetup extends Model
{
        protected $fillable = [
        	'name',
                'icon',

                'status',

                'created_by',
                'created_date',
                'created_time',
                'updated_by',
                'updated_date',
                'updated_time',
        ];
}
