<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use App\Faq;

class FaqsController extends Controller
{
    public function index()
    {
        return view('admin.faqs-view');
    }

    public function store(Request $request)
    {
        $Faq = new Faq();
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
            'description'       => 'Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:faqs,title',
            'description'       => 'required',
        ];

        $messages = [
            'title.unique_with' => 'FAQ Already Exist!',
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
            Faq::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'FAQ Saved!',
            ]);
        }
    }

    public function all()
    {
        $Faq = new Faq();
        return $Faq->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }
    public function faqs()
    {
        return view('site.faqs-view');
    }

    public function active()
    {
        $Faq = new Faq();
        return $Faq->where('status',1)->with(['CreatedBy.Profile','UpdatedBy.Profile'])->get();
    }

    public function search(Request $request)
    {
        $Faq = new Faq();
        return $Faq->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile'])->paginate(20);
    }

    public function find($Faq)
    {
        return Faq::where('id', $Faq)->first();
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
            'description'       => 'Description',
        ];

        $rules = [
            'title' 			=> 'required|max:100|unique_with:faqs,title,'.$request->id,
            'description'       => 'required',
        ];

        $messages = [
            'title.unique_with' => 'FAQ Already Exist!',
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
            $Faq = Faq::find($request->id);
            $Faq->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'FAQ Updated!',
            ]);
        }
    }

    public function delete(Faq $Faq)
    {
        $Faq->delete();
        return response()->json([
            'success' => true, 
            'message' => 'FAQ Deleted!',
        ]);
    }
}