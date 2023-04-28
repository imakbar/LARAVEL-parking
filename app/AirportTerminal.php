<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class AirportTerminal extends Model
{
	protected $fillable = [
        'airport_id',
		'sort_order',
        'title',
        'slug',

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

    public function Airport()
    {
        return $this->belongsTo(Airport::class, 'airport_id', 'id');
    }
}
