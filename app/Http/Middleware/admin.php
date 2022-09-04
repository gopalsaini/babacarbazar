<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
		
		if(!Session::get('admin_logindata')){
			$request->session()->flash('error','Unauthorized access.');
            return redirect('/');
		}
		
		return $next($request);
    }
}
