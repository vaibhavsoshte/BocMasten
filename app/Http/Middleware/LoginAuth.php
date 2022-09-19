<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class LoginAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       

        $path=$request->path();
       // echo $path;
       if($path=="Login" && Session::get('userid'))
        {
            return redirect('/UserHome'); 
        }
        else if($path=="UserHome" && !Session::has('userid'))
        {
             return redirect('/Login');
        }
        return $next($request);
    }
}
