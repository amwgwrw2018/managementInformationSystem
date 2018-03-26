<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class CheckData
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
    	$tenmathang = DB::select('select Username from taikhoan');
    	foreach($tenmathang as $name){
   if ($request->username == $name->Username) {
              return $next($request);
        }
    	}
     
return redirect('login');
        
    }

}