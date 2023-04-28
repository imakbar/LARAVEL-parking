<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class ParkingService extends Model
{
	protected $fillable = [
        'sort_order',
		'title',
        'slug',
        'description',

        'meta_tags',
        'meta_description',

        'avatar',

        'status',

        'created_by',
        'created_date',
        'created_time',
        'updated_by',
        'updated_date',
        'updated_time',
	];

    public function CreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function UpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
