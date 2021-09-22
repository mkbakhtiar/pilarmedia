<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CekStatusOn
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
        if(!Session::get('idUser')){
            return redirect('/');
        }
        return $next($request);
    }
}
