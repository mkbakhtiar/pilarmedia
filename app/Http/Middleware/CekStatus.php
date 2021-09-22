<?php

namespace App\Http\Middleware;
use Session;

use Closure;

class CekStatus
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
        if(Session::get('idUser')){
            $user = \App\UserModel::where('id', Session::get('idUser'))->first();
            if ($user->user_akses == '2') {
                return redirect('/dashboard');
            } elseif ($user->user_akses == '3') {
                return redirect('/d-manajer');
            }
        }else{
            // return redirect('/');
        }


        return $next($request);
    }
}
