<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Airport;

class AirportController extends Controller
{
    public function index()
    {
        return view('admin.airport-view');
    }

    public function store(Request $request)
    {
        $Airport = new Airport();
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'created_by' 	=> $getUser->id,
            'created_date' 	=> date('Y-m-d'),
            'created_time' 	=> date('H:i:s'),
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
            'slug' 	        => str_slug($request->name, '-'),
        ]);

        $attributeNames = [
            'short_name'    	=> 'Short Name',
            'name'    			=> 'Name',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'short_name' 		=> 'required|max:50',
            'name' 				=> 'required|max:100|unique_with:airports,name',
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
        ];

        $messages = [
            'name.unique_with' => 'Airport Already Exist!',
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
            Airport::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Airport Saved!',
            ]);
        }
    }

    public function all()
    {
        $Airport = new Airport();
        return $Airport->with(['CreatedBy.Profile','UpdatedBy.Profile','Terminals'])->paginate(20);
    }

    public function activeAll()
    {
        $Airport = new Airport();
        return $Airport->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $Airport = new Airport();
        return $Airport->where('name', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Airport)
    {
        return Airport::where('id', $Airport)->with(['Terminals'])->first();
    }

    public function update(Request $request)
    {
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by' 	=> $getUser->id,
            'updated_date' 	=> date('Y-m-d'),
            'updated_time' 	=> date('H:i:s'),
            'slug' 	        => str_slug($request->name, '-'),
        ]);

        $attributeNames = [
            'short_name' 		=> 'Short Name',
            'name'    		    => 'name',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'short_name' 		=> 'required|max:50',
            'name' 				=> 'required|max:100|unique_with:airports,name,'.$request->id,
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
        ];

        $messages = [
            'name.unique_with' => 'Airport Already Exist!',
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
            $Airport = Airport::find($request->id);
            $Airport->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Airport Updated!',
            ]);
        }
    }

    public function delete(Airport $Airport)
    {
        $Airport->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Airport Deleted!',
        ]);
    }
}