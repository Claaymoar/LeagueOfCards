<?php

namespace App\Http\Middleware;

use Closure;

class SuperuserMiddleware
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

        if($request->user()->usertype == 'superuser'){

            return $next($request);

        } else {
            return redirect('/');
        }
        
    }
}
