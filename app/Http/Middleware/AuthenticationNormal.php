<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AuthenticationNormal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) return redirect('/login');
        if(Auth::user()->type == 'normal'){
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
