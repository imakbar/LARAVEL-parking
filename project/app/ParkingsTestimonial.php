<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingsTestimonial extends Model
{
	protected $fillable = [
		'order_id',
        'reference_no',
        'token',
        'completed',
        'completed_at',

        'rating',
        'comment',

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

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id')->orderBy('id','desc');
    }
}
