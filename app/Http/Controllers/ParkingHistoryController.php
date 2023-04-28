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

class ParkingHistoryController extends Controller
{
    public function parkingOrders($Parking)
    {
        return Order::where('mybookparking_id', $Parking)->get();
    }

    public function history($Parking)
    {
        return Order::where('mybookparking_id', $Parking)
        ->with('Airport','Title','DepartTerminal','ArrivalTerminal','Review')
        ->paginate(20);
    }

    public function search(Request $request, $Parking)
    {
        $Order = new Order();
        // dd($Parking);
        // dd($request->all());
        return $Order
        ->where('mybookparking_id', $Parking)
        // ->where('order_date', $Parking)
        // ->where('drop_off_date','<=',date_format(date_create($request->order_date), 'Y-m-d'))
        // ->where('arrival_date','>=',date_format(date_create($request->order_date), 'Y-m-d'))
        // ->whereRaw('? between drop_off_date and arrival_date', [date_format(date_create($request->order_date), 'Y-m-d')])
        // ->whereDate('drop_off_date', '=', date_format(date_create($request->order_date), 'Y-m-d'))
        // ->whereDate('arrival_date', '=', date_format(date_create($request->order_date), 'Y-m-d'))
        // ->whereRaw("
        //     order_status = '$request->order_status'
        //     or reference_no like '%$request->name%'
        // ")
        ->where('order_status', $request->order_status)
        // ->whereRaw("
        //     reference_no like '%$request->name%'
        // ")
        ->whereRaw("
            reference_no like '%$request->name%'
        ")
        ->paginate(20);
    }

    public function orderTakenRemarks(Request $request)
    {
        // dd($request->all());
        $getUser = Auth::user();
        $Order = Order::find($request->id);

        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' 	=> $getUser->id,
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
        ]);

        $attributeNames = [
            'taken_remarks'			=> 'Remarks',
        ];

        $rules = [
            'taken_remarks'         => 'required|max:500',
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
        	// $request->request->add([
        	// 	'order_status' => 'taken',
        	// ]);
            // $Order->updated_by = $request->updated_by;
            // $Order->updated_date = $request->updated_date;
            // $Order->updated_time = $request->updated_time;
            $Order->order_status = 'taken';
            $Order->taken_remarks = $request->taken_remarks;
        	$Order->update();
            return response()->json([
                'success'   => true,
                'message'   => 'Remarks Saved',
            ]);
        }
    }

    public function orderCompletedRemarks(Request $request)
    {
        $getUser = Auth::user();
        $Order = Order::find($request->id);

        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' 	=> $getUser->id,
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
        ]);

        $attributeNames = [
            'completed_remarks'			=> 'Remarks',
        ];

        $rules = [
            'completed_remarks'         => 'required|max:500',
        ];

        $messages = [
            // 'departterminal_id.required'    => 'Depart Terminal Required',
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
        	// dd($Order->email);
        	// $request->request->add([
        	// 	'order_status' => 'completed',
        	// ]);
            // $Order->updated_by = $request->updated_by;
            // $Order->updated_date = $request->updated_date;
            // $Order->updated_time = $request->updated_time;
            $Order->order_status = 'completed';
            $Order->completed_remarks = $request->completed_remarks;
        	$Order->update();
        	// dd($Order);
        	Mail::to($Order->email)->send(new OrderReview($Order));

            return response()->json([
                'success'   => true,
                'message'   => 'Remarks Saved',
            ]);
        }
    }

    public function order($Order)
    {
        return Order::where('id', $Order)->with('Airport','Title','DepartTerminal','ArrivalTerminal','Review')->first();
    }
}
