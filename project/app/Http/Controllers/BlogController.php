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
use App\BlogComment;
use App\BlogCommentDetail;
use App\Setting;

class BlogController extends Controller
{
	public function index()
	{
		return view('site.blog-view');
	}

    public function blogCategoryPosts($BlogCategorySetup)
    {
        if(BlogCategorySetup::where('slug',$BlogCategorySetup)->count() > 0){
            $BlogCategorySetup = BlogCategorySetup::where('slug', $BlogCategorySetup)->first();
            return view('site.blog-category-posts-view')
            ->with('BlogCategorySetup', $BlogCategorySetup)
            ->with('AuthCheck', Auth::check() == true? 'yes':'no');
        }
        else
        {
            return view('404');
        }
    }

	public function blogPost($BlogCategorySetup, $BlogPost)
	{
		// return Auth::check() == true? 'yes':'no';
        if(BlogCategorySetup::where('slug',$BlogCategorySetup)->count() > 0 AND BlogPost::where('slug',$BlogPost)->count() > 0){
            $BlogCategorySetup = BlogCategorySetup::where('slug', $BlogCategorySetup)->first();
            if(BlogPost::where('slug',$BlogPost)->where('blogcategorysetup_id', $BlogCategorySetup->id)->count() > 0){
                $BlogPost = BlogPost::where('slug', $BlogPost)->where('blogcategorysetup_id', $BlogCategorySetup->id)->first();
                return view('site.blog-post-view')
                    ->with('BlogCategorySetup', $BlogCategorySetup)
                    ->with('BlogPost', $BlogPost)
                    ->with('AuthCheck', Auth::check() == true? 'yes':'no')
                    ->with('commnets', BlogComment::get());
            }
            else
            {
                return view('404');
            }
        }
        else
        {
            return view('404');
        }
	}

	public function blogPostCommentSave(Request $request)
	{
    	// dd($request->all());
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
            'user_id' 		=> $getUser->id,
        ]);

        $attributeNames = [
            'comment'  => 'Comment',
        ];

        $rules = [
            'comment'  => 'required|max:500',
        ];

        $messages = [
            // 'comment.unique_with' => 'Comment Already Exist!',
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
        	$Setting = Setting::find(1);
        	if($Setting->blog_comments_approved_by == 'admin'){
        		$request->request->add(['status' => 0]);
        	}
        	else
        	{
        		$request->request->add(['status' => 1]);
        	}

            BlogComment::create($request->all());

            return response()->json([
                'success'   => true,
                'message'   => 'Your Comment Submitted!',
                // 'id'        => $BlogPost->id,
            ]);
        }
    }



	public function blogActiveAll()
	{
		$BlogPost = new BlogPost();
		return $BlogPost->where('status',1)->with(['BlogCategorySetup','CreatedBy.Profile'])->paginate(18);
	}

    public function blogActiveAllCount()
    {
        return BlogPost::where('status',1)->get();
    }

	public function blogCommentsActiveAll($BlogPost)
	{
		$BlogComment = new BlogComment();
		return $BlogComment
		->where('blogpost_id', $BlogPost)->where('status',1)
		->with([
			'CreatedBy.Profile',
			'Replies.CreatedBy.Profile',
			'Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.Replies.Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.Replies.Replies.Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.Replies.Replies.Replies.Replies.Replies.CreatedBy.Profile',
			'Replies.Replies.Replies.Replies.Replies.Replies.Replies.Replies.Replies.CreatedBy.Profile',
		])
		// ->select('id','blogcomment_id')
		// ->groupBy('id','blogcomment_id')
		->where('blogcomment_id', null)
		->get();
	}

    public function blogCommentsActiveCount($BlogPost)
    {
        $BlogComment = new BlogComment();
        return $BlogComment
        ->where('blogpost_id', $BlogPost)->where('status',1)
        ->get();
    }

    public function blogCategoryPostsActiveAll($BlogCategorySetup)
    {
        if(BlogCategorySetup::where('slug',$BlogCategorySetup)->count() > 0){        
            $BlogCategorySetup = BlogCategorySetup::where('slug',$BlogCategorySetup)->first();
            return BlogPost::where('blogcategorysetup_id',$BlogCategorySetup->id)->with(['BlogCategorySetup','CreatedBy.Profile'])->paginate(18);
        }
        else
        {
            return view('404');
        }
    }

    public function recentPostsMaxComments()
    {
        $MaxComments = BlogPost::leftJoin('blog_comments','blog_comments.blogpost_id','=','blog_posts.id')
        ->selectRaw('blog_comments.blogpost_id, count(blog_comments.blogpost_id) as comments')
        ->where('blog_posts.status',1)
        ->groupBy('blog_comments.blogpost_id')
        ->orderBy('comments', 'desc')
        ->limit(3);
        // ->get();
        // return $MaxComments->pluck('blog_comments.blogpost_id');
        return BlogPost::whereIn('id', $MaxComments->pluck('blog_comments.blogpost_id'))
        ->with(['BlogCategorySetup','CreatedBy.Profile','BlogComments'])
        ->get();
    }

    public function recentPosts()
    {
        return BlogPost::where('status',1)
        ->with(['BlogCategorySetup','CreatedBy.Profile','BlogComments'])
        ->orderBy('id','desc')
        ->limit(3)
        ->get();
    }
}
