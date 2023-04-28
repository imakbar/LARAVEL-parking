<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use DB;
use App\Airport;
use App\AirportTerminal;

class AirportTermialsController extends Controller
{
    public function index($Airport)
    {
        return view('admin.airport-terminals-view')->with('Airport', Airport::find($Airport));
    }

    public function store(Request $request)
    {
        $AirportTerminal = new AirportTerminal();
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
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:airport_terminals,airport_id,title',
        ];

        $messages = [
            'title.unique_with' => 'Terminal Already Exist!',
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
            $AirportTerminal = AirportTerminal::create($request->all());
            $AirportTerminal->sort_order = $AirportTerminal->id;
            $AirportTerminal->update();

            return response()->json([
                'success' => true,
                'message' => 'Terminal Saved!',
            ]);
        }
    }

    public function all($Airport)
    {
        $AirportTerminal = new AirportTerminal();
        return $AirportTerminal->with(['CreatedBy.Profile','UpdatedBy.Profile'])
        ->where('airport_id', $Airport)
        ->orderBy('sort_order','asc')
        ->paginate(2000);
    }

    public function activeAll()
    {
        $AirportTerminal = new AirportTerminal();
        return $AirportTerminal->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $AirportTerminal = new AirportTerminal();
        return $AirportTerminal->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->orderBy('sort_order','asc')->paginate(2000);
    }

    public function find($AirportTerminal)
    {
        return AirportTerminal::where('id', $AirportTerminal)->first();
    }

    public function update(Request $request)
    {
        // dd($request->all());
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
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:airport_terminals,airport_id,title,'.$request->id,
        ];

        $messages = [
            'title.unique_with' => 'Terminal Already Exist!',
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
            $AirportTerminal = AirportTerminal::find($request->id);
            $AirportTerminal->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Terminal Updated!',
            ]);
        }
    }

    public function sorting(Request $request)
    {
    	// dd($request->all());
    	foreach (AirportTerminal::all() as $Terminal) {
    		$ID = $Terminal->id;
	    	foreach($request->all() as $req){
	    		if($req['id'] == $ID){
	    			$Terminal->update(['sort_order' => $req['sort_order']]);
	    		}
	    	}
    	}
    }

    public function delete(AirportTerminal $AirportTerminal)
    {
        $AirportTerminal->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Terminal Deleted!',
        ]);
    }
}