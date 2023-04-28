<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use App\ImageReady;
use Carbon\Carbon;

use App\Parking;
use App\ParkingService;
use App\ParkingServicesDetail;
use App\Order;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReview;

class MyBookingsController extends Controller
{
	public function index()
	{
		// return Auth::user();
		// return Order::where('email',Auth::user()->email)->get();
		if(Auth::check()){		
			return view('site.my-bookings-view')
			// ->with('AuthCheck', Auth::check() == true? 'yes':'no')
			->with('Orders', Order::where('email', Auth::user()->email)->with('Parking')->get());
		}
		else
		{
			return view('site.my-bookings-view')
			// ->with('AuthCheck', Auth::check() == true? 'yes':'no')
			->with('Orders', 0);
		}
	}

	public function myBookings(Request $request)
	{
		// dd($request->all());
		$getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            // 'created_date'  => date('Y-m-d'),
        ]);

        $attributeNames = [
            'email'				=> 'Email',
            'reference_no'		=> 'Reference No',
            'mobile_reg'		=> 'Mobile Number',
        ];

        $rules = [];

        $messages = [
            // 'departterminal_id.required'    => 'Depart Terminal Required',
        ];

        if($request->search == 'withreference'){
        	$rules['reference_no'] 	= 'required|max:10';
        	$rules['email'] 		= 'required|email';
        }

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
        	if($request->search == 'withreference'){
        		$withreference = Order::where('email', $request->email)->where('reference_no', $request->reference_no);
	        	if($withreference->count() > 0){
	        		return Order::where('email', $request->email)->with(['Parking'])->get();
	        	}
	        	else
	        	{
	        		return response()->json([
		                'success'   => false,
		                'res_type'  => 'error',
		                'message'   => 'Error! No booking found in system against entered information.',
		            ]);
	        	}
	        }

	        if($request->search == 'withoutreference'){
	        	// dd($request->search);
        		$withoutreference = Order::where('email', $request->email)->where('mobile_number', $request->mobile_reg);
	        	if($withoutreference->count() > 0){
	        		return Order::where('email', $request->email)->with(['Parking'])->get();
	        	}
	        	else
	        	{
	        		return response()->json([
		                'success'   => false,
		                'res_type'  => 'error',
		                'message'   => 'Error! No booking found in system against entered information.',
		            ]);
	        	}
	        }
        }
	}
}
