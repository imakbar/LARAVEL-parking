<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Parking extends Model
{
	protected $fillable = [
        'airport_id',

        'email',
		'title',
        'slug',

        'rate',
        'offer',
        'offer_type',
        'offer_rate',
        'discount',
        'total',
        
        'distance',
        'transfer',

        'parkingtype_id',
        'cancellation_id',

        'overview',
        'return_procedure',
        'drop_off_procedure',
        'terms_and_conditions',
        'important',

        'active_overview',
        'active_return_procedure',
        'active_drop_off_procedure',
        'active_terms_and_conditions',
        'active_important',

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

    public function Airport()
    {
        return $this->belongsTo(Airport::class, 'airport_id', 'id');
    }

    public function ParkingType()
    {
        return $this->belongsTo(ParkingType::class, 'parkingtype_id', 'id');
    }

    public function Cancellation()
    {
        return $this->belongsTo(Cancellation::class, 'cancellation_id', 'id');
    }

    public function ParkingServicesDetails()
    {
        return $this->hasMany(ParkingServicesDetail::class, 'parking_id', 'id')->orderBy('sort_order','asc');
    }

    public function Orders()
    {
        return $this->hasMany(Order::class, 'mybookparking_id', 'id')->orderBy('id','desc');
    }

    public function ParkingRatings()
    {
        return $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id');
        // $Data = $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id');
        // dd($Data->where('rating', 3)->get());
        // $Rating_1 = $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id')->where('rating', 1)->count();
        // $Rating_2 = $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id')->where('rating', 2)->count();
        // $Rating_3 = $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id')->where('rating', 3)->count();
        // $Rating_4 = $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id')->where('rating', 4)->count();
        // $Rating_5 = $this->hasMany(ParkingsTestimonial::class, 'parking_id', 'id')->where('rating', 5)->count();
        // dd(5*$Rating_5 + 4*$Rating_4 + 3*$Rating_3 + 2*$Rating_2 + 1*$Rating_1) / ($Rating_5+$Rating_4+$Rating_3+$Rating_2+$Rating_1);
        // return (5*$Rating_5 + 4*$Rating_4 + 3*$Rating_3 + 2*$Rating_2 + 1*$Rating_1) / ($Rating_5+$Rating_4+$Rating_3+$Rating_2+$Rating_1);
    }

    public function Rating($Parking)
    {
        $Rating_1 = $this->join('orders','orders.mybookparking_id','parkings.id')
        ->join('parkings_testimonials as pt','pt.order_id','orders.id')
        ->where('parkings.id', $Parking)
        ->where('pt.rating', 1)
        ->select(
            'parkings.id',
            'pt.*'
        )
        ->count();
        $Rating_2 = $this->join('orders','orders.mybookparking_id','parkings.id')
        ->join('parkings_testimonials as pt','pt.order_id','orders.id')
        ->where('parkings.id', $Parking)
        ->where('pt.rating', 2)
        ->select(
            'parkings.id',
            'pt.*'
        )
        ->count();
        $Rating_3 = $this->join('orders','orders.mybookparking_id','parkings.id')
        ->join('parkings_testimonials as pt','pt.order_id','orders.id')
        ->where('parkings.id', $Parking)
        ->where('pt.rating', 3)
        ->select(
            'parkings.id',
            'pt.*'
        )
        ->count();
        $Rating_4 = $this->join('orders','orders.mybookparking_id','parkings.id')
        ->join('parkings_testimonials as pt','pt.order_id','orders.id')
        ->where('parkings.id', $Parking)
        ->where('pt.rating', 4)
        ->select(
            'parkings.id',
            'pt.*'
        )
        ->count();
        $Rating_5 = $this->join('orders','orders.mybookparking_id','parkings.id')
        ->join('parkings_testimonials as pt','pt.order_id','orders.id')
        ->where('parkings.id', $Parking)
        ->where('pt.rating', 5)
        ->select(
            'parkings.id',
            'pt.*'
        )
        ->count();
        // return $Data;
        // $Rating_1 = $Data->where('pt.rating', 1)->count();
        // $Rating_2 = $Data->where('pt.rating', 2)->count();
        // $Rating_3 = $Data->where('pt.rating', 3)->count();
        // $Rating_4 = $Data->where('pt.rating', 4)->count();
        // $Rating_5 = $Data->where('pt.rating', 5)->count();
        // return $Rating_4;
        return (5*$Rating_5 + 4*$Rating_4 + 3*$Rating_3 + 2*$Rating_2 + 1*$Rating_1) / ($Rating_5+$Rating_4+$Rating_3+$Rating_2+$Rating_1);
    }
}
