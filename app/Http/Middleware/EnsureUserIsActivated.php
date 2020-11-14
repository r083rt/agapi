<?php

namespace App\Http\Middleware;

use Closure;

class EnsureUserIsActivated
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
        // return $next($request);
        if($request->user()->user_activated_at == null){
            return abort(403,'Akun anda belum diaktivasi, silahkan lakukan pembayaran');
        } else {
            return $next($request);
        }
    }
}
