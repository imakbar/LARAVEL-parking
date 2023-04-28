<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUsForm extends Model
{
	protected $fillable = [
		'name',
        'email',
        'subject',
        'message',

        'status',

        'created_date',
        'created_time',
        'updated_date',
        'updated_time',
	];
}
