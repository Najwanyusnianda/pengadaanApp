<?php

namespace App\Http\Middleware;

use Closure;

class Bagian
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
        if(auth()->user()->is_user == 0){
            return $next($request);
        }
        return redirect('/dashboard')->with('error',"You don't have bagian access");
    }
}
