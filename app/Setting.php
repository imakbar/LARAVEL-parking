<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = [
		'user_verification_by',
		'title',
		'slogan',
		'phone',
		'email',
		'orders_email',
		'office_timing',
		'address',
		'copy_rights',
		
		'logo_light',
		'logo_dark',

		'blog_comments_approved_by',
	];
}
