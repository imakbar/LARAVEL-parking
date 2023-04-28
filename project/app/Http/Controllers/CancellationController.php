<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Cancellation;

class CancellationController extends Controller
{
    public function index()
    {
        return view('admin.cancellation-view');
    }

    public function store(Request $request)
    {
        $Cancellation = new Cancellation();
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
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:cancellations,title',
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Cancellation Already Exist!',
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
            Cancellation::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Cancellation Saved!',
            ]);
        }
    }

    public function all()
    {
        $Cancellation = new Cancellation();
        return $Cancellation->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $Cancellation = new Cancellation();
        return $Cancellation->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $Cancellation = new Cancellation();
        return $Cancellation->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Cancellation)
    {
        return Cancellation::where('id', $Cancellation)->first();
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
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:cancellations,title,'.$request->id,
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Cancellation Already Exist!',
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
            $Cancellation = Cancellation::find($request->id);
            $Cancellation->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Cancellation Updated!',
            ]);
        }
    }

    public function delete(Cancellation $Cancellation)
    {
        $Cancellation->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Cancellation Deleted!',
        ]);
    }
}