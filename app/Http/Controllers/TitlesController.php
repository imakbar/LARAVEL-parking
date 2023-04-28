<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Title;

class TitlesController extends Controller
{
    public function index()
    {
        return view('admin.titles-view');
    }

    public function store(Request $request)
    {
        $Title = new Title();
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
            // 'description'    	=> 'Description',
            // 'meta_tags'         => 'Meta Tags',
            // 'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:titles,title',
            // 'meta_tags'         => 'max:160',
            // 'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Title Already Exist!',
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
            Title::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Title Saved!',
            ]);
        }
    }

    public function all()
    {
        $Title = new Title();
        return $Title->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $Title = new Title();
        return $Title->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $Title = new Title();
        return $Title->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Title)
    {
        return Title::where('id', $Title)->first();
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
            // 'description'    	=> 'Description',
            // 'meta_tags'         => 'Meta Tags',
            // 'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:titles,title,'.$request->id,
            // 'meta_tags'         => 'max:160',
            // 'meta_description'  => 'max:160',
        ];

        $messages = [
            'title.unique_with' => 'Title Already Exist!',
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
            $Title = Title::find($request->id);
            $Title->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Title Updated!',
            ]);
        }
    }

    public function delete(Title $Title)
    {
        $Title->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Title Deleted!',
        ]);
    }
}