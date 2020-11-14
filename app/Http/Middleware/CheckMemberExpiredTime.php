<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Profile;

class CheckMemberExpiredTime
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
        // dd($request->user()->load());
        // return response()->json($request->user()->load('profile')->profile == null);
        if($request->user()->load('profile')->profile == null){
            $request->user()->profile()->save(new Profile);
        }

        // if (
        //     strtotime($request->user()->user_activated_at) < strtotime('-6 months')
        //     && $request->user()->user_activated_at != null
        //     ) {
        //         $request->user()->update([
        //             'user_activated_at' => null
        //         ]);
        //     //return abort(403,'Akun anda sudah expired, silahkan lakukan pembayaran perpanjangan');
           
        // }
        return $next($request);
    }
}
