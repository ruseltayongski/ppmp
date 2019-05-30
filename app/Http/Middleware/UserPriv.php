<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Saa;

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
            $saa = Saa::where('section','=',Auth::user()->section)->first();
            if($saa){
                return $next($request);
            } else {
                return Redirect::to('charge/default');
            }
        }
        else
            return Redirect::to('/privilage');
    }
}
