<?php

namespace App\Http\Middleware;

use Closure;

class TypeCheck
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
        if($request->session()->get('role') != 'Admin'){
            return redirect()->route('userlist');
        }
        return $next($request);
    }
}
