<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use DB;
use App\ParkingTab;

class ParkingTabsController extends Controller
{
    public function index()
    {
        return view('admin.parking-tabs-view');
    }

    public function store(Request $request)
    {
        $ParkingTab = new ParkingTab();
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
            'title' 			=> 'required|max:100|unique_with:parking_tabs,title',
        ];

        $messages = [
            'title.unique_with' => 'Parking Tab Already Exist!',
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
            $ParkingTab = ParkingTab::create($request->all());
            $ParkingTab->sort_order = $ParkingTab->id;
            $ParkingTab->update();

            return response()->json([
                'success' => true,
                'message' => 'Parking Tab Saved!',
            ]);
        }
    }

    public function all()
    {
        $ParkingTab = new ParkingTab();
        return $ParkingTab->with(['CreatedBy.Profile','UpdatedBy.Profile'])->orderBy('sort_order','asc')->paginate(2000);
    }

    public function activeAll()
    {
        $ParkingTab = new ParkingTab();
        return $ParkingTab->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $ParkingTab = new ParkingTab();
        return $ParkingTab->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->orderBy('sort_order','asc')->paginate(2000);
    }

    public function find($ParkingTab)
    {
        return ParkingTab::where('id', $ParkingTab)->first();
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
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:parking_tabs,title,'.$request->id,
        ];

        $messages = [
            'title.unique_with' => 'Parking Tab Already Exist!',
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
        	DB::table('parking_tabs')->update(array('open' => null));
            $ParkingTab = ParkingTab::find($request->id);
            $ParkingTab->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Parking Tab Updated!',
            ]);
        }
    }

    public function sorting(Request $request)
    {
    	// dd($request->all());
    	foreach (ParkingTab::all() as $ParkTab) {
    		$ID = $ParkTab->id;
	    	foreach($request->all() as $req){
	    		if($req['id'] == $ID){
	    			$ParkTab->update(['sort_order' => $req['sort_order']]);
	    		}
	    	}
    	}
    }

    public function delete(ParkingTab $ParkingTab)
    {
        $ParkingTab->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Parking Tab Deleted!',
        ]);
    }
}