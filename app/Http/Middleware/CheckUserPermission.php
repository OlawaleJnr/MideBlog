<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
		$permission = explode('|', $permission);
		
		if(checkUserPermission(permission))
		{
			return $next($request);
		}
        
		return reponse()->view('404');
    }
}
