<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Paginator;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use File;
use App\ImageReady;
use App\Setting\BlogCategorySetup;
use App\BlogPost;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('admin.blog-posts-view');
    }

    public function store(Request $request)
    {
        $BlogPost = new BlogPost();
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
            'blogcategorysetup_id'  => 'Category',
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'blogcategorysetup_id'  => 'required',
            'title' 			=> 'required|max:100|unique_with:blog_posts,title',
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
        ];

        $messages = [
            'title.unique_with' => 'Blog Post Already Exist!',
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
            $BlogPost = BlogPost::create($request->all());

            return response()->json([
                'success'   => true,
                'message'   => 'Post Saved!',
                'id'        => $BlogPost->id,
            ]);
        }
    }

    public function all()
    {
        $BlogPost = new BlogPost();
        return $BlogPost->with(['CreatedBy.Profile','UpdatedBy.Profile','BlogCategorySetup'])->paginate(20);
    }

    public function search(Request $request)
    {
        $BlogPost = new BlogPost();
        return $BlogPost->where('title', 'like', '%'.$request->name.'%')->with(['CreatedBy.Profile','UpdatedBy.Profile','BlogCategorySetup'])->paginate(20);
    }

    public function find($BlogPost)
    {
        return BlogPost::where('id', $BlogPost)->first();
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
            'blogcategorysetup_id'  => 'Category',
            'title'    		    => 'Title',
            'meta_tags'         => 'Meta Tags',
            'meta_description'  => 'Meta Description',
        ];

        $rules = [
            'blogcategorysetup_id'  => 'required',
            'title' 		    => 'required|max:100|unique_with:blog_posts,title,'.$request->id,
            'meta_tags'         => 'required|max:160',
            'meta_description'  => 'required|max:160',
        ];

        $messages = [
            'ntitleame.unique_with' => 'Blog Post Already Exist!',
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
            $BlogPost = BlogPost::find($request->id);
            $BlogPost->update($request->all());

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $BlogPost->avatar = $ImageReady->imageReadyExtension($BlogPost->id, uniqid(), $avatar, '/uploads/posts/', 200, 200, 400, 400, 400, 300);
            }

            $BlogPost->update();

            return response()->json([
                'success' => true,
                'message' => 'Blog Post Updated!',
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
            $BlogPost = BlogPost::find($request->id);
            File::delete('uploads/posts/'.$BlogPost->avatar);
            File::delete('uploads/posts/xs-'.$BlogPost->avatar);
            File::delete('uploads/posts/sm-'.$BlogPost->avatar);
            File::delete('uploads/posts/md-'.$BlogPost->avatar);

            if($request->hasFile('avatar')){
                $avatar = $request->file('avatar');

                $BlogPost->avatar = $ImageReady->imageReadyExtension($BlogPost->id, uniqid(), $avatar, '/uploads/posts/', 200, 200, 400, 400, 400, 300);
            }

            $BlogPost->update();

            return response()->json([
                'success' => true,
                'message' => 'Image Saved!',
            ]);
        }
    }

    public function delete(BlogPost $BlogPost)
    {
        $BlogPost->delete();
        File::delete('uploads/posts/'.$BlogPost->avatar);
        File::delete('uploads/posts/xs-'.$BlogPost->avatar);
        File::delete('uploads/posts/sm-'.$BlogPost->avatar);
        File::delete('uploads/posts/md-'.$BlogPost->avatar);
        return response()->json([
            'success' => true, 
            'message' => 'Blog Post Deleted!',
        ]);
    }
}