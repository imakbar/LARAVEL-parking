<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Setting\BlogCategorySetup;

class BlogCategorySetupController extends Controller
{
    public function index()
    {
        return view('setting.blog-category-setup-view');
    }

    public function store(Request $request)
    {
        $BlogCategorySetup = new BlogCategorySetup();
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
            'title' 			=> 'required|max:100|unique_with:blog_category_setups,title',
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
        ];

        $messages = [
            'title.unique_with' => 'Category Already Exist!',
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
            BlogCategorySetup::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Category Saved!',
            ]);
        }
    }

    public function all()
    {
        $BlogCategorySetup = new BlogCategorySetup();
        return $BlogCategorySetup->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function activeAll()
    {
        $BlogCategorySetup = new BlogCategorySetup();
        return $BlogCategorySetup->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $BlogCategorySetup = new BlogCategorySetup();
        return $BlogCategorySetup->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($BlogCategorySetup)
    {
        return BlogCategorySetup::where('id', $BlogCategorySetup)->first();
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
            'title' 			=> 'required|max:100|unique_with:blog_category_setups,title,'.$request->id,
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
        ];

        $messages = [
            'title.unique_with' => 'Category Already Exist!',
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
            $BlogCategorySetup = BlogCategorySetup::find($request->id);
            $BlogCategorySetup->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Category Updated!',
            ]);
        }
    }

    public function delete(BlogCategorySetup $BlogCategorySetup)
    {
        $BlogCategorySetup->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Category Deleted!',
        ]);
    }
}