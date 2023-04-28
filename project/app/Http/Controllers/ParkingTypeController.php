<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\ParkingType;

class ParkingTypeController extends Controller
{
    public function index()
    {
        return view('admin.parking-type-view');
    }

    public function store(Request $request)
    {
        $ParkingType = new ParkingType();
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
            'title'    			=> 'Title',
            'description'    	=> 'Description',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:parking_types,title',
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Parking Type Already Exist!',
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
            ParkingType::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Parking Type Saved!',
            ]);
        }
    }

    public function all()
    {
        $ParkingType = new ParkingType();
        return $ParkingType->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $ParkingType = new ParkingType();
        return $ParkingType->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $ParkingType = new ParkingType();
        return $ParkingType->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($ParkingType)
    {
        return ParkingType::where('id', $ParkingType)->first();
    }

    public function update(Request $request)
    {
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
            'slug' 	        => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'title'    		    => 'Title',
            'description'    	=> 'Description',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:parking_types,title,'.$request->id,
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Parking Type Already Exist!',
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
            $ParkingType = ParkingType::find($request->id);
            $ParkingType->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Parking Type Updated!',
            ]);
        }
    }

    public function delete(ParkingType $ParkingType)
    {
        $ParkingType->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Parking Type Deleted!',
        ]);
    }
}