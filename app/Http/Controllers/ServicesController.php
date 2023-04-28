<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use App\Service;

class ServicesController extends Controller
{
    public function index()
    {
        return view('admin.services-form-view');
    }

    public function store(Request $request)
    {
        $Service = new Service();
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
            'icon'    			=> 'Icon',
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
            'description'  		=> 'Description',
        ];

        $rules = [
            'icon' 				=> 'required|max:100',
            'title' 			=> 'required|max:100|unique_with:services,title',
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
            // 'description'  		=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Service Already Exist!',
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
            $request->request->add(['icon' => $request->icon['name']]);
            $Service = Service::create($request->all());

            return response()->json([
                'success'   => true,
                'message'   => 'Post Saved!',
                'id'        => $Service->id,
            ]);
        }
    }

    public function all()
    {
        $Service = new Service();
        return $Service->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $Service = new Service();
        return $Service->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->limit(3)->get();
    }

    public function search(Request $request)
    {
        $Service = new Service();
        return $Service->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Service)
    {
        return Service::where('id', $Service)->first();
    }

    public function update(Request $request)
    {
        $getUser = Auth::user();
        date_default_timezone_set('Asia/Karachi');

        $request->request->add([
            'updated_by'    => $getUser->id,
            'updated_date'  => date('Y-m-d'),
            'updated_time'  => date('H:i:s'),
            'slug' 	        => str_slug($request->title, '-'),
        ]);

        $attributeNames = [
            'icon'    			=> 'Icon',
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
            'description'  		=> 'Description',
        ];

        $rules = [
            'icon' 				=> 'required|max:100',
            'title' 			=> 'required|max:100|unique_with:services,title,'.$request->id,
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
            // 'description'  		=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Service Already Exist!',
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
            $Service = Service::find($request->id);
            if($Service->icon != $request->icon){
                $request->request->add(['icon' => $request->icon['name']]);
            }
            $Service->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Service Updated!',
            ]);
        }
    }

    public function delete(Service $Service)
    {
        $Service->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Service Deleted!',
        ]);
    }
}