<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Charge;

class AdminPriv
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
        if(Auth::user()->user_priv){
            $charge_to = Charge::get();
            Session::put('charge_to',$charge_to);
            return $next($request);
        }
        else
            return Redirect::to('admin/privileged');
    }
}
