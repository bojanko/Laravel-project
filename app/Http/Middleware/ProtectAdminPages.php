<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use Closure;
use App\Post;

class ProtectAdminPages
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
		if(!Auth::check()){
			return redirect('/');
		}
		
        return $next($request);
    }
}
