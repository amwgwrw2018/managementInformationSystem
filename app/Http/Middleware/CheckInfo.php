<?php

namespace App\Http\Middleware;

use Closure;

class CheckInfo
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
    	if($request->input('so')>200){
return $next($request);
    	}
        
    }
       public function terminate($request, $response)
    {
       echo $request->input('so');
    }
}
