<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use App\ImageReady;

use App\Parking;
use App\ParkingService;
use App\ParkingServicesDetail;
use App\UserParking;

class ParkingsController extends Controller
{
    public function index()
    {
        return view('admin.parking-view');
    }

    public function store(Request $request)
    {
        // dd($request->all());
    	$request->request->add([
    		'airport_id' 		=> $request->airport_id['id'],
    		'cancellation_id' 	=> $request->cancellation_id['id'],
    		'parkingtype_id' 	=> $request->parkingtype_id['id'],
    	]);
        $Parking = new Parking();
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by' 	=> $getUser->id,
            'created_date' 	=> date('Y-m-d'),
            'created_time' 	=> date('H:i:s'),
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
            'slug' 	        => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'airport_id'        => 'Airport',
            'title'             => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
            'rate'              => 'Rate',
            'email'             => 'Email Address',
            'distance'  		=> 'Distance',
            'transfer'  		=> 'Transfer',
            'parkingtype_id'  	=> 'Parking Type',
            'cancellation_id'  	=> 'Cancellation',
        ];

        $rules = [
        	'airport_id'		=> 'required',
            'title' 			=> 'required|max:100|unique_with:parkings,airport_id,title',
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
            'rate'              => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'email'  			=> 'required|max:50|email',
            'distance'  		=> 'required|max:160',
            'transfer'  		=> 'required|max:160',
            'parkingtype_id'  	=> 'required',
            'cancellation_id'  	=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Parking Already Exist!',
        ];

        if($request->offer == 1){
            if($request->offer_type == 'percentage'){
                $total = ($request->rate / 100) * $request->offer_rate;
                $grandTotal = $request->rate - $total;
                $request->request->add([
                    'discount' => $total,
                    'total' => $grandTotal,
                ]);
            }

            if($request->offer_type == 'flat'){
                $grandTotal = $request->rate - $request->offer_rate;
                $request->request->add([
                    'discount' => $request->offer_rate,
                    'total' => $grandTotal,
                ]);
            }
        }

        if($request->offer == 0){
            $request->request->add([
                'offer_type' => null,
                'offer_rate' => 0,
                'discount' => 0,
                'total' => $request->rate,
            ]);
        }

        if($request->offer != 0){
            $rules['offer_type'] = 'required';
            $rules['offer_rate'] = 'required|integer|min:1';
        }

        if($request->offer_type == 'flat'){
            $rules['offer_rate'] = 'required|integer|min:1|max:'.$request->rate;
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
    	   // dd($request->all());
            $Parking = Parking::create($request->all());

            foreach($request->checkedParkingServices as $checkedParkingServices){
                // dd($parkingservice_id['id']);
                $PSD = new ParkingServicesDetail();
                $PSD->parking_id = $Parking->id;
                $PSD->parkingservice_id = $checkedParkingServices;
                $PSD->sort_order = ParkingService::find($checkedParkingServices)->sort_order;
                $PSD->status = 1;
                $PSD->created_by =$request->created_by;
                $PSD->created_date =$request->created_date;
                $PSD->created_time =$request->created_time;
                $PSD->updated_by =$request->updated_by;
                $PSD->updated_date =$request->updated_date;
                $PSD->updated_time =$request->updated_time;
                $PSD->save();
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Parking Saved!',
                'id'        => $Parking->id,
            ]);
        }
    }

    public function all()
    {
        $Parking = new Parking();
        if(Auth::user()->type == 'admin'){
            return $Parking->with(['CreatedBy.Profile','UpdatedBy.Profile','Orders'])->paginate(20);
        }
        else
        {
            $UserParking = new UserParking();
            $getUser = Auth::user();
            $UserParkings = $UserParking->where('user_id', $getUser->id)->where('status',1)->pluck('parking_id');
            return $Parking->whereIn('id', $UserParkings)->with(['CreatedBy.Profile','UpdatedBy.Profile','Orders'])->paginate(20);
            return 'asdfl';
        }
    }

    public function activeAll()
    {
        $Parking = new Parking();
        return $Parking->where('status',1)->get();
    }

    public function search(Request $request)
    {
        $Parking = new Parking();
        return $Parking->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Parking)
    {
        // return Parking::find($Parking)->ParkingServicesDetails;
        // $PSDData = ParkingServicesDetail::where('parking_id', $Parking)->select('parkingservice_id')->pluck('parkingservice_id');
        return Parking::where('id', $Parking)->with(['CreatedBy.Profile','UpdatedBy.Profile','Airport.Terminals','ParkingType','Cancellation','ParkingServicesDetails.ParkingService'])->first();
    }

    public function findSelectedParkingServices($Parking)
    {
        return ParkingServicesDetail::where('parking_id', $Parking)->select('parkingservice_id')->pluck('parkingservice_id');
    }

    public function update(Request $request)
    {
        // dd($request->all());
        // $Parking = new Parking();
        $getUser = Auth::user();
        $Parking = Parking::find($request->id);

        $request->request->add([
            'airport_id'        => $request->airport_id['id'],
            'cancellation_id'   => $request->cancellation_id['id'],
            'parkingtype_id'    => $request->parkingtype_id['id'],
        ]);
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by'    => $Parking->created_by,
            'created_date'  => $Parking->created_date,
            'created_time'  => $Parking->created_time,
            'updated_by'    => $getUser->id,
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
            'slug'          => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'airport_id'        => 'Airport',
            'title'             => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
            'rate'              => 'Rate',
            'email'             => 'Email Address',
            'distance'          => 'Distance',
            'transfer'          => 'Transfer',
            'parkingtype_id'    => 'Parking Type',
            'cancellation_id'   => 'Cancellation',
        ];

        $rules = [
            'airport_id'        => 'required',
            'title'             => 'required|max:100|unique_with:parkings,airport_id,title,'.$request->id,
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
            'rate'              => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'email'             => 'required|max:50|email',
            'distance'          => 'required|max:160',
            'transfer'          => 'required|max:160',
            'parkingtype_id'    => 'required',
            'cancellation_id'   => 'required',
        ];

        $messages = [
            'title.unique_with' => 'Parking Already Exist!',
        ];

        if($request->offer == 1){
            if($request->offer_type == 'percentage'){
                $total = ($request->rate / 100) * $request->offer_rate;
                $grandTotal = $request->rate - $total;
                $request->request->add([
                    'discount' => $total,
                    'total' => $grandTotal,
                ]);
            }

            if($request->offer_type == 'flat'){
                $grandTotal = $request->rate - $request->offer_rate;
                $request->request->add([
                    'discount' => $request->offer_rate,
                    'total' => $grandTotal,
                ]);
            }
        }

        if($request->offer == 0){
            $request->request->add([
                'offer_type' => null,
                'offer_rate' => 0,
                'discount' => 0,
                'total' => $request->rate,
            ]);
        }

        if($request->offer != 0){
            $rules['offer_type'] = 'required';
            $rules['offer_rate'] = 'required|integer|min:1';
        }

        if($request->offer_type == 'flat'){
            $rules['offer_rate'] = 'required|integer|min:1|max:'.$request->rate;
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
            // dd($request->all());
            $Parking->update($request->all());

            ParkingServicesDetail::where('parking_id', $request->id)->delete();
            foreach($request->checkedParkingServices as $checkedParkingServices){
                // dd($parkingservice_id['id']);
                $PSD = new ParkingServicesDetail();
                $PSD->parking_id = $Parking->id;
                $PSD->parkingservice_id = $checkedParkingServices;
                $PSD->sort_order = ParkingService::find($checkedParkingServices)->sort_order;
                $PSD->status = 1;
                $PSD->created_by =$request->created_by;
                $PSD->created_date =$request->created_date;
                $PSD->created_time =$request->created_time;
                $PSD->updated_by =$request->updated_by;
                $PSD->updated_date =$request->updated_date;
                $PSD->updated_time =$request->updated_time;
                $PSD->save();
            }

            return response()->json([
                'success'   => true,
                'message'   => 'Parking Updated!',
                'id'        => $Parking->id,
            ]);
        }
    }

    public function updateAvatar(Request $request)
    {
        $getUser = Auth::user();
        $ImageReady = new ImageReady();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' => $getUser->id,
            'updated_date' => date('Y-m-d'),
            'updated_time' => date('H:i:s'),
        ]);

        $attributeNames = [
            'avatar' => 'Image',
        ];

        $rules = [
            'avatar' => 'max:2000kb|mimes:jpeg,jpg,png', // dimensions:max_width=400,min_width=150,max_height=400,min_height=150
        ];

        $messages = [
            // 'avatar.unique_with' => 'Post Already Exist!',
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
            $Parking = Parking::find($request->id);
            File::delete('uploads/parkings/'.$Parking->avatar);
            File::delete('uploads/parkings/xs-'.$Parking->avatar);
            File::delete('uploads/parkings/sm-'.$Parking->avatar);
            File::delete('uploads/parkings/md-'.$Parking->avatar);

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $Parking->avatar = $ImageReady->imageReadyExtension($Parking->id, uniqid(), $avatar, '/uploads/parkings/', 200, 200, 400, 400, 400, 300);
            }

            $Parking->update();

            return response()->json([
                'success' => true,
                'message' => 'Image Saved!',
            ]);
        }
    }

    public function delete(Parking $Parking)
    {
        $Parking->delete();
        File::delete('uploads/parkings/'.$Parking->avatar);
        File::delete('uploads/parkings/xs-'.$Parking->avatar);
        File::delete('uploads/parkings/sm-'.$Parking->avatar);
        File::delete('uploads/parkings/md-'.$Parking->avatar);
        return response()->json([
            'success' => true, 
            'message' => 'Parking Deleted!',
        ]);
    }

    public function parkings()
    {
        return view('site.parkings-view');
    }

    public function activeParkings()
    {
        return Parking::where('status',1)
        ->with(['Airport.Terminals','ParkingType','Cancellation','ParkingServicesDetails.ParkingService'])
        ->paginate(2);
    }

    public function getParkings(Request $request)
    {
        // dd(date_format(date_create($request->drop_off_date), 'Y-m-d'));
        $request->request->add([
            'drop_off_date'     => date_format(date_create($request->drop_off_date), 'Y-m-d'),
            'arrival_date'      => date_format(date_create($request->arrival_date), 'Y-m-d'),
        ]);
        // dd($request->all());
        $Parking = new Parking();
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        // $request->request->add([
        //     'created_by'    => $getUser->id,
        //     'created_date'  => date('Y-m-d'),
        //     'created_time'  => date('H:i:s'),
        //     'updated_by'    => $getUser->id,
        //     'updated_date'  => date('Y-m-d'),
        //     'updated_time'  => date('H:i:s'),
        //     'slug'          => str_slug($request->title, '-'),
        // ]);

        $attributeNames = [
            'airport_id'        => 'Airport',
            'drop_off_date'     => 'Drop Off Date',
            'drop_off_hour'     => 'Drop Off Hour',
            'drop_off_minute'   => 'Drop Off Minute',
            'arrival_date'      => 'Arrival Date',
            'arrival_hour'      => 'Arrival Hour',
            'arrival_minute'    => 'Arrival Minute',
        ];

        $rules = [
            'airport_id'        => 'required',
            'drop_off_date'     => 'required',
            'drop_off_hour'     => 'required',
            'drop_off_minute'   => 'required',
            'arrival_date'      => 'required|after:'.$request->drop_off_date,
            'arrival_hour'      => 'required',
            'arrival_minute'    => 'required',
        ];

        $messages = [
            'airport_id.required' => 'Please Select Airport',
            'arrival_date.after' => 'The Arrival Date must be a date after Drop-Off date',
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
            // $request->request->add([
            //     'drop_off_date' => date_format(date_create($request->drop_off_date), 'Y-m-d'),
            //     'arrival_date'  => date_format(date_create($request->arrival_date), 'Y-m-d'),
            // ]);
            return $Parking::where('airport_id', $request->airport_id['id'])
            ->where('status',1)
            ->with(['Airport.Terminals','ParkingType','Cancellation','ParkingServicesDetails.ParkingService','Orders.Review'])
            ->get();
        }
    }

    public function rating($Parking)
    {
        $ParkingData = new Parking();
        // return $ParkingData->Rating($Parking);
        return $ParkingData->find($Parking)->ParkingRatings()->avg('rating');
    }

    public function ratings()
    {
        $Parking = new Parking();
        $ParkData = [];
        foreach($Parking->all() as $Park){
            $ParkingId = number_format((float)$Parking->find($Park->id)->ParkingRatings()->avg('rating'), 2, '.', '');
            $ParkData[] = array('parking_id' => $Park->id, 'rating' => $ParkingId);
        }
        return $ParkData;
    }
}