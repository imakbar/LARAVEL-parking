<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingServicesDetail extends Model
{
	protected $fillabel = [
                'sort_order',
		'parking_id',
                'parkingservice_id',

                'status',

                'created_by',
                'created_date',
                'created_time',
                'updated_by',
                'updated_date',
                'updated_time',
	];

        public function ParkingService()
        {
                return $this->belongsTo(ParkingService::class, 'parkingservice_id', 'id');
        }
}
