<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Charge;
use Illuminate\Support\Facades\Session;

class UserPriv
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(!Auth::user()->user_priv){
            $charge_to = Charge::where('section','=',Auth::user()->section)->get();
            if(isset($charge_to)){
                Session::put('charge_to',$charge_to);
                return $next($request);
            } else {
                return Redirect::to('charge/default');
            }
        }
        else
            return Redirect::to('/privilage');
    }
}
