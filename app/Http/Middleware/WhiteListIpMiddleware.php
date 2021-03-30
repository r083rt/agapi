<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WhiteListIpMiddleware
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
        $whitelistIp = config('whitelistip');
        $remote_ip = $_SERVER['REMOTE_ADDR'];
        if(in_array($remote_ip, $whitelistIp))return $next($request);
        // return respone('IP Not Allowed',403);
        return redirect('/');
    }
}
