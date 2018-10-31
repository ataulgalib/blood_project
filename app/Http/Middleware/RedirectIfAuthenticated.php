<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check(url('/admin'))) {
            return redirect('/home');
        }else{
            
                return redirect()->action('AdminController@login')->with('flash_message_error','Please Login to acesss');
                return redirect()->action('UserController@login')->with('flash_message_error','Please Login to acesss');
                
                
            }

        return $next($request);
    }
    
}
