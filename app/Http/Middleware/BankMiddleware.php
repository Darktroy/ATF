<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class BankMiddleware
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
        $user = Auth::user();   
//        dd($user->userType->name);
//        dd($user->userType());
        if(isset($user)&& !is_null($user) && $user->userType->name =="BANK"){
            return $next($request);
        } else {
            return redirect('/home');
        }
    }
}
