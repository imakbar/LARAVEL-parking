<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class roleAuthentication
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
        if(Auth::user()->type == 'admin' OR Auth::user()->type == 'user'){
            return $next($request);
        }
        else
        {
            return redirect('/');
        }
    }
}
