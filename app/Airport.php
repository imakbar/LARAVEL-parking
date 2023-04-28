<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
	protected $fillable = [
        'short_name',
		'name',
        'slug',

        'meta_tags',
        'meta_description',
        'description',

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

    public function Terminals()
    {
        return $this->hasMany(AirportTerminal::class, 'airport_id', 'id')->orderBy('sort_order','asc');
    }
}
