<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\PayPal;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use DB;
use Hash;
use App\ImageReady;
use DateTime;
use App\Setting;

use App\Parking;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReceivedOrder;
use App\Mail\OrderConfirmation;
use App\ParkingsTestimonial;

class PayPalController extends Controller
{
    public function orderValidate(Request $request)
    {
        // $drop_off_date = date_format(date_create($request->drop_off_date), 'Y-m-d');
        // $arrival_date = date_format(date_create($request->arrival_date), 'Y-m-d');

        // $datetime1 = new DateTime($drop_off_date);
        // $datetime2 = new DateTime($arrival_date);

        // dd($datetime1->diff($datetime2)->format('%a'));



        // dd($request->all());
        $getUser = Auth::user();
        $Setting = Setting::find(1);
        $ParkingsTestimonial = new ParkingsTestimonial();

        date_default_timezone_set('Asia/Karachi');

        if(Auth::check()){
            $request->request->add([
                'created_by'    => $getUser->id,
                'updated_by'    => $getUser->id,
            ]);
        }

        $request->request->add([
            'created_date'  => date('Y-m-d'),
            'created_time'  => date('H:i:s'),
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
            // 'slug'          => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'email'                   => 'Email',
            'confirm_email'           => 'Confirm Email',
            'title_id'                => 'Title',
            'first_name'              => 'First Name',
            'last_name'               => 'Last Name',
            'mobile_number'           => 'Mobile Number',
            'post_code'               => 'Post Code',

            'know_travel_detail'      => 'Travel Detail',
            'departterminal_id'       => 'Depart Terminal',
            'outbound_flight'         => 'Outbound Flight',
            'arrivalterminal_id'      => 'Arrival Terminal',
            'inbound_flight'          => 'Inbound Flight',

            'know_vehical_detail'     => 'Vehical Detail',
            'make'                    => 'Make',
            'model'                   => 'Model',
            'colour'                  => 'Colour',
            'registration'            => 'Registration',

            'accept_terms_condition'  => 'Accept',
        ];

        $rules = [
            'title_id'                => 'required',

            'email'                   => 'required|max:80|email',
            'confirm_email'           => 'required|max:80|email|same:email',
            'first_name'              => 'required|max:60',
            'last_name'               => 'required|max:60',
            'mobile_number'           => 'required|max:18',
            'post_code'               => 'required|max:10',

            'know_travel_detail'      => 'required',

            'know_vehical_detail'     => 'required',

            'accept_terms_condition'  => 'required|integer|min:1',
        ];

        if($request->know_travel_detail == 1){
            $rules['departterminal_id']       = 'required';
            $rules['outbound_flight']         = 'max:60';
            $rules['arrivalterminal_id']      = 'required';
            $rules['inbound_flight']          = 'max:60';
        }

        if($request->know_vehical_detail == 1){
            $rules['make']                    = 'required|max:60';
            $rules['model']                   = 'required|max:60';
            $rules['colour']                  = 'required|max:60';
            $rules['registration']            = 'required|max:60';
        }

        $messages = [
            'departterminal_id.required'    => 'Depart Terminal Required',
            'outbound_flight.required'      => 'Outbound Flight Required',
            'arrivalterminal_id.required'   => 'Arrival Terminal Required',
            'inbound_flight.required'       => 'Inbound Flight Required',
            'accept_terms_condition.min'    => 'You must accept our terms & conditions',
            'accept_terms_condition.integer' => 'You must accept our terms & conditions',
        ];

        $Validator = Validator::make(Input::all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if ($Validator->fails()) {
            return response()->json([
                'success' => false,
                'order_type' => false,
                'errors' => $Validator->errors(),
            ]);
        } 
        else 
        {
            return response()->json([
                'success'   => true,
                'order_type' => true,
                'message'   => 'Order Saved!',
            ]);
        }
    }

    public function orderSave(Request $request)
    {
        $getUser = Auth::user();
        $Setting = Setting::find(1);
        $ParkingsTestimonial = new ParkingsTestimonial();

        date_default_timezone_set('Asia/Karachi');
        // dd($request->all());

        $Parking = Parking::find($request->mybookparking_id);

        $drop_off_date = date_format(date_create($request->drop_off_date), 'Y-m-d');
        $arrival_date = date_format(date_create($request->arrival_date), 'Y-m-d');

        $datetime1 = new DateTime($drop_off_date);
        $datetime2 = new DateTime($arrival_date);

        $Order = new Order();

        if($Parking->offer == 1){
            if($Parking->offer_type == 'percentage'){
                $total = ($Parking->rate / 100) * $Parking->offer_rate;
                $grandTotal = $Parking->rate - $total;
                $request->request->add([
                    'total' => $grandTotal,
                ]);
            }

            if($Parking->offer_type == 'flat'){
                $grandTotal = $Parking->rate - $Parking->offer_rate;
                $request->request->add([
                    'total' => $grandTotal,
                ]);
            }
            // dd($datetime1->diff($datetime2)->format('%a'));
            $Order->amount = number_format($datetime1->diff($datetime2)->format('%a') * $request->total, 2, '.', ',');
        }
        else
        {
            $Order->amount = number_format($datetime1->diff($datetime2)->format('%a') * $Parking->total, 2, '.', ',');
        }


        $Order->airport_id              = $request->parkingrecorddata['airport_id']['id'];
        $Order->mybookparking_id        = $Parking->id;
        $Order->drop_off_date           = $drop_off_date;
        $Order->drop_off_hour           = $request->parkingrecorddata['drop_off_hour'];
        $Order->drop_off_minute         = $request->parkingrecorddata['drop_off_minute'];
        $Order->arrival_date            = $arrival_date;
        $Order->arrival_hour            = $request->parkingrecorddata['arrival_hour'];
        $Order->arrival_minute          = $request->parkingrecorddata['arrival_minute'];
        $Order->days                    = $datetime1->diff($datetime2)->format('%a');

        $Order->email                   = $request->email;
        $Order->title_id                = $request->title_id['id'];
        $Order->first_name              = $request->first_name;
        $Order->last_name               = $request->last_name;
        $Order->mobile_number           = $request->mobile_number;
        $Order->post_code               = $request->post_code;

        $Order->know_travel_detail      = $request->know_travel_detail;
        $Order->departterminal_id       = $request->departterminal_id['id'];
        $Order->outbound_flight         = $request->outbound_flight;
        $Order->arrivalterminal_id      = $request->arrivalterminal_id['id'];
        $Order->inbound_flight          = $request->inbound_flight;

        $Order->know_vehical_detail     = $request->know_vehical_detail;
        $Order->make                    = $request->make;
        $Order->model                   = $request->model;
        $Order->colour                  = $request->colour;
        $Order->registration            = $request->registration;

        $Order->accept_terms_condition  = $request->accept_terms_condition;
        $Order->payment_status          = 1;
        $Order->status                  = 'paid';
        $Order->order_status            = 'up-coming';
        $Order->save();

        $Order->reference_no = 'QV' .'-'. str_pad($Order->id, strlen('0000'), "0", STR_PAD_LEFT) .'-'. date('y');
        $Order->update();

        $ParkingsTestimonial->order_id = $Order->id;
        $ParkingsTestimonial->parking_id = $Order->mybookparking_id;
        $ParkingsTestimonial->reference_no = $Order->reference_no;
        $ParkingsTestimonial->token = str_replace('/', '', Hash::make($Order->reference_no . uniqid()));
        $ParkingsTestimonial->completed = 0;
        $ParkingsTestimonial->status = 1;
        if(Auth::check()){
            $ParkingsTestimonial->created_by    = $request->created_by;
            $ParkingsTestimonial->updated_by    = $request->updated_by;
        }
        $ParkingsTestimonial->created_date  = $request->created_date;
        $ParkingsTestimonial->created_time  = $request->created_time;
        $ParkingsTestimonial->updated_date  = $request->updated_date;
        $ParkingsTestimonial->updated_time  = $request->updated_time;
        $ParkingsTestimonial->save();

        Mail::to($Setting->orders_email)->send(new ReceivedOrder($Order,$Parking));
        Mail::to($Parking->email)->send(new ReceivedOrder($Order,$Parking));
        Mail::to($Order->email)->send(new OrderConfirmation($Order,$Parking));

        return response()->json([
            'success'   => true,
            'order_completed' => true,
            'message'   => 'Order Saved!',
        ]);
    }

    /*public function orderSave(Request $request)
    {
        // dd($request->accept_terms_condition);
        // dd($request->parkingrecorddata['airport_id']['id']);
        
        // $request->request->add([
        //     'airport_id'        => $request->parkingrecorddata['airport_id']['id'],
        //     'title_id'          => $request->title_id['id'],
        //     'drop_off_date'     => $request->drop_off_date,
        //     'drop_off_hour'     => $request->parkingrecorddata['drop_off_hour'],
        //     'drop_off_minute'   => $request->parkingrecorddata['drop_off_minute'],
        //     'arrival_date'      => $request->arrival_date,
        //     'arrival_hour'      => $request->parkingrecorddata['arrival_hour'],
        //     'arrival_minute'    => $request->parkingrecorddata['arrival_minute'],
        // ]);

        $getUser = Auth::user();
        $Setting = Setting::find(1);
        $ParkingsTestimonial = new ParkingsTestimonial();

        date_default_timezone_set('Asia/Karachi');

        if(Auth::check()){
            $request->request->add([
                'created_by'    => $getUser->id,
                'updated_by'    => $getUser->id,
            ]);
        }

        $request->request->add([
            'created_date'  => date('Y-m-d'),
            'created_time'  => date('H:i:s'),
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
            // 'slug'          => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'email'                   => 'Email',
            'confirm_email'           => 'Confirm Email',
            'title_id'                => 'Title',
            'first_name'              => 'First Name',
            'last_name'               => 'Last Name',
            'mobile_number'           => 'Mobile Number',
            'post_code'               => 'Post Code',

            'know_travel_detail'      => 'Travel Detail',
            'departterminal_id'       => 'Depart Terminal',
            'outbound_flight'         => 'Outbound Flight',
            'arrivalterminal_id'      => 'Arrival Terminal',
            'inbound_flight'          => 'Inbound Flight',

            'know_vehical_detail'     => 'Vehical Detail',
            'make'                    => 'Make',
            'model'                   => 'Model',
            'colour'                  => 'Colour',
            'registration'            => 'Registration',

            'accept_terms_condition'  => 'Accept',
        ];

        $rules = [
            'title_id'                => 'required',

            'email'                   => 'required|max:80|email',
            'confirm_email'           => 'required|max:80|email|same:email',
            'title_id'                => 'required',
            'first_name'              => 'required|max:60',
            'last_name'               => 'required|max:60',
            'mobile_number'           => 'required|max:18',
            'post_code'               => 'required|max:10',

            'know_travel_detail'      => 'required',

            'know_vehical_detail'     => 'required',

            'accept_terms_condition'  => 'required|integer|min:1',
        ];

        if($request->know_travel_detail == 1){
            $rules['departterminal_id']       = 'required';
            $rules['outbound_flight']         = 'required|max:60';
            $rules['arrivalterminal_id']      = 'required';
            $rules['inbound_flight']          = 'required|max:60';
        }

        if($request->know_vehical_detail == 1){
            $rules['make']                    = 'required|max:60';
            $rules['model']                   = 'required|max:60';
            $rules['colour']                  = 'required|max:60';
            $rules['registration']            = 'required|max:60';
        }

        $messages = [
            'departterminal_id.required'    => 'Depart Terminal Required',
            'outbound_flight.required'      => 'Outbound Flight Required',
            'arrivalterminal_id.required'   => 'Arrival Terminal Required',
            'inbound_flight.required'       => 'Inbound Flight Required',
            'accept_terms_condition.min'    => 'You must accept our terms & conditions',
            'accept_terms_condition.integer' => 'You must accept our terms & conditions',
        ];

        $Validator = Validator::make(Input::all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if ($Validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $Validator->errors(),
            ]);
        } 
        else 
        {
            $Parking = Parking::find($request->mybookparking_id);
            // dd($Parking->email);

            $drop_off_date = date_format(date_create($request->drop_off_date), 'Y-m-d');
            $arrival_date = date_format(date_create($request->arrival_date), 'Y-m-d');

            $datetime1 = new DateTime($drop_off_date);
            $datetime2 = new DateTime($arrival_date);
            // dd($request->all());
            $Order = new Order();

            // try {
                // DB::transaction(function() use ($request, $Order, $Parking, $ParkingsTestimonial, $drop_off_date, $arrival_date, $datetime1, $datetime2) {

                    $Order->amount                  = $datetime1->diff($datetime2)->format('%a') * $Parking->rate;

                    $Order->airport_id              = $request->parkingrecorddata['airport_id']['id'];
                    $Order->mybookparking_id        = $Parking->id;
                    $Order->drop_off_date           = $drop_off_date;
                    $Order->drop_off_hour           = $request->parkingrecorddata['drop_off_hour'];
                    $Order->drop_off_minute         = $request->parkingrecorddata['drop_off_minute'];
                    $Order->arrival_date            = $arrival_date;
                    $Order->arrival_hour            = $request->parkingrecorddata['arrival_hour'];
                    $Order->arrival_minute          = $request->parkingrecorddata['arrival_minute'];
                    $Order->days                    = $datetime1->diff($datetime2)->format('%a');

                    $Order->email                   = $request->email;
                    $Order->title_id                = $request->title_id['id'];
                    $Order->first_name              = $request->first_name;
                    $Order->last_name               = $request->last_name;
                    $Order->mobile_number           = $request->mobile_number;
                    $Order->post_code               = $request->post_code;

                    $Order->know_travel_detail      = $request->know_travel_detail;
                    $Order->departterminal_id       = $request->departterminal_id['id'];
                    $Order->outbound_flight         = $request->outbound_flight;
                    $Order->arrivalterminal_id      = $request->arrivalterminal_id['id'];
                    $Order->inbound_flight          = $request->inbound_flight;

                    $Order->know_vehical_detail     = $request->know_vehical_detail;
                    $Order->make                    = $request->make;
                    $Order->model                   = $request->model;
                    $Order->colour                  = $request->colour;
                    $Order->registration            = $request->registration;

                    $Order->accept_terms_condition  = $request->accept_terms_condition;
                    $Order->order_status            = 'up-coming';
                    $Order->save();

                    $Order->reference_no = 'QV' .'-'. str_pad($Order->id, strlen('0000'), "0", STR_PAD_LEFT) .'-'. date('y');
                    $Order->update();

                    $ParkingsTestimonial->order_id = $Order->id;
                    $ParkingsTestimonial->parking_id = $Order->mybookparking_id;
                    $ParkingsTestimonial->reference_no = $Order->reference_no;
                    $ParkingsTestimonial->token = str_replace('/', '', Hash::make($Order->reference_no . uniqid()));
                    $ParkingsTestimonial->completed = 0;
                    $ParkingsTestimonial->status = 1;
                    if(Auth::check()){
                        $ParkingsTestimonial->created_by    = $request->created_by;
                        $ParkingsTestimonial->updated_by    = $request->updated_by;
                    }
                    $ParkingsTestimonial->created_date  = $request->created_date;
                    $ParkingsTestimonial->created_time  = $request->created_time;
                    $ParkingsTestimonial->updated_date  = $request->updated_date;
                    $ParkingsTestimonial->updated_time  = $request->updated_time;
                    $ParkingsTestimonial->save();
                    // dd('here');

            //     });
            // } 
            // catch (\Exception $e) 
            // {
            //     return false;
            // }

            // Order::create($request->all());
            Mail::to($Setting->orders_email)->send(new ReceivedOrder($Order,$Parking));
            Mail::to($Parking->email)->send(new ReceivedOrder($Order,$Parking));
            Mail::to($Order->email)->send(new OrderConfirmation($Order,$Parking));

            return response()->json([
                'success'   => true,
                'message'   => 'Order Saved!',
            ]);
        }
    }*/

    public function review($Order, $ReferenceNo, $Token)
    {
        $getUser = Auth::user();
        $Setting = Setting::find(1);
        $ParkingsTestimonial = new ParkingsTestimonial();

        date_default_timezone_set('Asia/Karachi');

        $ParkingsTestimonial = $ParkingsTestimonial->where('order_id',$Order)
        ->where('reference_no',$ReferenceNo)
        ->where('token',$Token);

        if($ParkingsTestimonial->count() > 0){
            if($ParkingsTestimonial->first()->completed != 1){
                return view('site.review-form')->with('Review',$ParkingsTestimonial->first());
            }
            else
            {
                return redirect(url('/'));
            }
        }
        else
        {
            return view('404');
        }
    }

    public function reviewPost($Order, $ReferenceNo, $Token, Request $request)
    {
        $getUser = Auth::user();
        $Setting = Setting::find(1);
        $ParkingsTestimonial = new ParkingsTestimonial();

        date_default_timezone_set('Asia/Karachi');

        if(Auth::check()){
            $request->request->add([
                'updated_by'    => $getUser->id,
            ]);
        }

        $request->request->add([
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
        ]);

        $ParkingsTestimonial = $ParkingsTestimonial->where('order_id',$Order)
        ->where('reference_no',$ReferenceNo)
        ->where('token',$Token)
        ->where('completed',0);

        $attributeNames = [
            'rating'            => 'Rating',
            'comment'           => 'Comment',
        ];

        $rules = [
            'rating'            => 'required:max:5|min:1|integer',
            'comment'           => 'max:800',
        ];

        $messages = [
            // 'departterminal_id.required'    => 'Depart Terminal Required',
        ];

        $Validator = Validator::make(Input::all(), $rules, $messages);
        $Validator->setAttributeNames($attributeNames);

        if ($Validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $Validator->errors(),
            ]);
        } 
        else 
        {
            if($ParkingsTestimonial->count() > 0){
                $ParkingsTestimonial = $ParkingsTestimonial->first();
                $ParkingsTestimonial->comment = $request->comment;
                $ParkingsTestimonial->rating = $request->rating;
                $ParkingsTestimonial->completed = 1;
                $ParkingsTestimonial->completed_at = $request->updated_date;
                if(Auth::check()){
                    $ParkingsTestimonial->updated_by    = $request->updated_by;
                }
                $ParkingsTestimonial->update();

                return response()->json([
                    'success'   => true,
                    'message'   => 'Your Valueable Comment Saved Successfully!',
                ]);
            }
            else
            {
                return view('404');
            }
        }
    }

    /**
     * @param $order_id
     */
    // public function cancelled($order_id)
    // {
    //     $order = Order::findOrFail($order_id);

    //     return redirect()->route('order.paypal', encrypt($order_id))->with([
    //         'message' => 'You have cancelled your recent PayPal payment !',
    //     ]);
    // }
}
