<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next,...$roles)
    // {
    //     if(in_array($request->user()->mstr_role_id,$roles)){
    //         return $next($request);
    //     }
    //     return redirect('/logout');
    // }

        public function handle($request, Closure $next, ... $roles)
    {
            if(in_array(session()->get('level'),$roles))
            {
            return $next($request);
            }
        return redirect('/logout');        
    }
}
