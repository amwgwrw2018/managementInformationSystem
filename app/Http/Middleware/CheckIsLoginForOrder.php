<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsLoginForOrder
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
        if(is_null($request->session()->get('currentUser'))){
            return redirect()->route('loginweb');
        }else{
        return $next($request);
    }
    }
}
