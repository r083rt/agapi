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
        $role_name = $request->user()->role->name;
        $teachers = ['user','admin','surveyor','headmaster'];
        if(in_array($role_name, $teachers)){
            return $next($request);
        }
        return response('Harus mempunyai role name user',401);
        // $request->user()->role()
        // return $next($request);
    }
}
