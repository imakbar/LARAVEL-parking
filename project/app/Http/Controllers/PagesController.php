<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Page;

class PagesController extends Controller
{
    public function index()
    {
        return view('admin.pages-view');
    }

    public function store(Request $request)
    {
        $Page = new Page();
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
            'description'  		=> 'Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:pages,title',
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
            'description'  		=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Page Already Exist!',
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
            Page::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Page Saved!',
            ]);
        }
    }

    public function all()
    {
        $Page = new Page();
        return $Page->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function search(Request $request)
    {
        $Page = new Page();
        return $Page->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Page)
    {
        return Page::where('id', $Page)->first();
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
            'description'  		=> 'Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:pages,title,'.$request->id,
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
            'description'  		=> 'required',
        ];

        $messages = [
            'title.unique_with' => 'Page Already Exist!',
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
            $Page = Page::find($request->id);
            $Page->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Page Updated!',
            ]);
        }
    }

    public function delete(Page $Page)
    {
        $Page->delete();
        return response()->json([
            'success' => true, 
            'message' => 'Page Deleted!',
        ]);
    }

    public function HowItWorks()
    {
    	$Page = new Page();
        $Page = $Page->where('slug','how-it-works')
        ->where('status',1)
        ->with(['CreatedBy.Profile','UpdatedBy.Profile'])
        ->first();
    	
    	if($Page != null){
	    	return view('site.page-how-it-works-view')->with('Page', $Page);
    	}
    	else
    	{
    		return view('404');
    	}
    }
    public function pageHowItWorks()
    {
        $Page = new Page();
        return $Page->where('slug','how-it-works')->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->first();
    }

    public function MeetAndGreet()
    {
    	$Page = new Page();
        $Page = $Page->where('slug','meet-and-greet')
        ->where('status',1)
        ->with(['CreatedBy.Profile','UpdatedBy.Profile'])
        ->first();
    	
    	if($Page != null){
	    	return view('site.page-meet-and-greet-view')->with('Page', $Page);
    	}
    	else
    	{
    		return view('404');
    	}
    }
    public function pageMeetAndGreet()
    {
        $Page = new Page();
        return $Page->where('slug','meet-and-greet')->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->first();
    }
}