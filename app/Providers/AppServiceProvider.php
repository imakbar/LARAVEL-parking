<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

// use App\Setting;
use Auth;
use App\Profile;
use App\Setting;
use App\SettingSocial;
use App\BlogPost;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function($view){
            $Setting = Setting::find(1);
            if(Auth::check()){
                // dd(Profile::where('user_id',Auth::user()->id)->first());
                // dd(Auth::user()->email);
                $view->with('ASPUserEmail', Auth::user()->email);
                $view->with('ASPProfile', Profile::where('user_id',Auth::user()->id)->first());
            }
            
            $view->with('ASPSetting', $Setting);
            // dd($Setting);
            if($Setting != null OR $Setting->title == null){
                $view->with('ASPTitle', $Setting->title);
            } else { $view->with('ASPTitle', ''); }

            if($Setting != null OR $Setting->phone == null){
                $view->with('ASPPhone', $Setting->phone);
            } else { $view->with('ASPPhone', ''); }

            if($Setting != null OR $Setting->email == null){
                $view->with('ASPEmail', $Setting->email);
            } else { $view->with('ASPEmail', ''); }

            if($Setting != null OR $Setting->office_timing == null){
                $view->with('ASPOfficeTiming', $Setting->office_timing);
            } else { $view->with('ASPOfficeTiming', ''); }

            if($Setting != null OR $Setting->address == null){
                $view->with('ASPAddress', $Setting->address);
            } else { $view->with('ASPAddress', ''); }

            if($Setting != null OR $Setting->copy_rights == null){
                $view->with('ASPCopyRights', $Setting->copy_rights);
            } else { $view->with('ASPCopyRights', ''); }

            if($Setting != null OR $Setting->slogan == null){
                $view->with('ASPSlogan', $Setting->slogan);
            } else { $view->with('ASPSlogan', ''); }

            if($Setting != null OR $Setting->logo_light == null){
                $view->with('ASPLogoLight', $Setting->logo_light);
            } else { $view->with('ASPLogoLight', ''); }

            if($Setting != null OR $Setting->logo_dark == null){
                $view->with('ASPLogoDark', $Setting->logo_dark);
            } else { $view->with('ASPLogoDark', ''); }

            $view->with('ASPSocials', SettingSocial::where('status', 1));

            // $view->with('Setting', Setting::find('1'));

            // RECENT POSTS MAX COMMENTS
            $ASPMaxComments = BlogPost::leftJoin('blog_comments','blog_comments.blogpost_id','=','blog_posts.id')
            ->selectRaw('blog_comments.blogpost_id, count(blog_comments.blogpost_id) as comments')
            ->groupBy('blog_comments.blogpost_id')
            ->orderBy('comments', 'desc')
            ->limit(2);
            $ASPMaxComments = BlogPost::whereIn('id', $ASPMaxComments->pluck('blog_comments.blogpost_id'))
            ->with(['BlogCategorySetup','CreatedBy.Profile','BlogComments'])
            ->get();
            // ->get();
            // return $MaxComments->pluck('blog_comments.blogpost_id');
            $view->with('ASPMaxComments', $ASPMaxComments);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
