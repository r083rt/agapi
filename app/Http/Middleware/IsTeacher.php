<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsTeacher
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
        if($request->user()->role->name==="user"){
            return $next($request);
        }
        return response('Harus mempunyai role name user',401);
        // $request->user()->role()
        // return $next($request);
    }
}
