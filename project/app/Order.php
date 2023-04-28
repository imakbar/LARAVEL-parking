<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	// const PAYMENT_COMPLETED = 1;
 //    const PAYMENT_PENDING = 0;

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $fillable = [
    	'transaction_id',
    	'amount',
    	'payment_status',

        'reference_no',

        'drop_off_date',
        'drop_off_hour',
        'drop_off_minute',
        'arrival_date',
        'arrival_hour',
        'arrival_minute',
        'days',

        'airport_id',
        'mybookparking_id',
        'email',
        'title_id',
        'first_name',
        'last_name',
        'mobile_number',
        'post_code',

        'know_travel_detail',
        'departterminal_id',
        'outbound_flight',
        'arrivalterminal_id',
        'inbound_flight',

        'know_vehical_detail',
        'make',
        'model',
        'colour',
        'registration',

        'accept_terms_condition',
        
        'order_status',
        'taken_remarks',
        'completed_remarks',

        'status',
    ];

    public function Airport()
    {
        return $this->belongsTo(Airport::class, 'airport_id', 'id');
    }

    public function Parking()
    {
        return $this->belongsTo(Parking::class, 'mybookparking_id', 'id');
    }

    public function Title()
    {
        return $this->belongsTo(Title::class, 'title_id', 'id');
    }

    public function DepartTerminal()
    {
        return $this->belongsTo(AirportTerminal::class, 'departterminal_id', 'id');
    }

    public function ArrivalTerminal()
    {
        return $this->belongsTo(AirportTerminal::class, 'arrivalterminal_id', 'id');
    }

    public function Review()
    {
        return $this->belongsTo(ParkingsTestimonial::class, 'id', 'order_id')->orderBy('id','desc');
    }
}
