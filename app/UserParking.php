<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserParking extends Model
{
	protected $fillable = [
		'user_id',
        'parking_id',

        'status',

        'created_by',
        'created_date',
        'created_time',
        'updated_by',
        'updated_date',
        'updated_time',
	];

        public function User()
        {
                return $this->belongsTo(User::class, 'user_id', 'id');
        }

        public function Parking()
        {
                return $this->belongsTo(Parking::class, 'parking_id', 'id');
        }
}
