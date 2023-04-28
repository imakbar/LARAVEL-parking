<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use App\ImageReady;
use App\Step;

class StepsController extends Controller
{
    public function index()
    {
        return view('admin.steps-form-view');
    }

    public function store(Request $request)
    {
        $Step = new Step();
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
            'short_title'    	=> 'Short Title',
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
            'description'  		=> 'Description',
        ];

        $rules = [
            'short_title' 		=> 'required|max:100',
            'title' 			=> 'required|max:100|unique_with:steps,title',
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
            // 'description'  		=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Step Already Exist!',
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
            $Step = Step::create($request->all());

            return response()->json([
                'success'   => true,
                'message'   => 'Post Saved!',
                'id'        => $Step->id,
            ]);
        }
    }

    public function all()
    {
        $Step = new Step();
        return $Step->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $Step = new Step();
        return $Step->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->limit(3)->get();
    }

    public function search(Request $request)
    {
        $Step = new Step();
        return $Step->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Step)
    {
        return Step::where('id', $Step)->first();
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
            'short_title'    	=> 'Short Title',
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
            'description'  		=> 'Description',
        ];

        $rules = [
            'short_title' 		=> 'required|max:100',
            'title' 			=> 'required|max:100|unique_with:steps,title,'.$request->id,
            'meta_tags'         => 'max:160',
            'meta_description'  => 'max:160',
            // 'description'  		=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Step Already Exist!',
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
            $Step = Step::find($request->id);
            $Step->update($request->all());

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $Step->avatar = $ImageReady->imageReadyExtension($Step->id, uniqid(), $avatar, '/uploads/steps/', 200, 200, 400, 400, 400, 300);
            }

            $Step->update();

            return response()->json([
                'success' => true,
                'message' => 'Step Updated!',
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
            $Step = Step::find($request->id);
            File::delete('uploads/steps/'.$Step->avatar);
            File::delete('uploads/steps/xs-'.$Step->avatar);
            File::delete('uploads/steps/sm-'.$Step->avatar);
            File::delete('uploads/steps/md-'.$Step->avatar);

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $Step->avatar = $ImageReady->imageReadyExtension($Step->id, uniqid(), $avatar, '/uploads/steps/', 200, 200, 400, 400, 400, 300);
            }

            $Step->update();

            return response()->json([
                'success' => true,
                'message' => 'Image Saved!',
            ]);
        }
    }

    public function delete(Step $Step)
    {
        $Step->delete();
        File::delete('uploads/steps/'.$Step->avatar);
        File::delete('uploads/steps/xs-'.$Step->avatar);
        File::delete('uploads/steps/sm-'.$Step->avatar);
        File::delete('uploads/steps/md-'.$Step->avatar);
        return response()->json([
            'success' => true, 
            'message' => 'Step Deleted!',
        ]);
    }
}