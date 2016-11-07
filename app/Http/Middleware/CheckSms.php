<?php

namespace App\Http\Middleware;

use Closure;

class CheckSms
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
        $smscode = $request->smscode;
        $phonenumber = $request->phonenumber;
        $_smscode = Cache::get('$phonenumber');
        if($_smscode != $smscode){
            return false;
        }
        return $next($request);
    }
}
