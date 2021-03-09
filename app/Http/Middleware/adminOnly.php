<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminOnly
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
        //return Auth::user()->admin_status;

        if(Auth::user()->admin_status != "Enable") {
            Auth::logout();
            return redirect('login')->with('fail','Your account can not login');
        }

        return $next($request);
    }
}
