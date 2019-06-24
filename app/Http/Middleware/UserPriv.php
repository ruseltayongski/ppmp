<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Charge;
use Illuminate\Support\Facades\Session;
use App\Division;
use App\Section;

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
            $division = Division::where('id','=',Auth::user()->division)->first();
            $section = Section::where('id','=',Auth::user()->section)->first();
            if(!isset($division)){
                return Redirect::to('division/update');
            }
            elseif(!isset($section)){
                return Redirect::to('section/update');
            }
            elseif(count($charge_to) == 0){
                return Redirect::to('charge/default');
            }
            else {
                Session::put('charge_to',$charge_to);
                Session::put('charge_menu',true);
                return $next($request);
            }
        }
        else
            return Redirect::to('user/privileged');
    }


}
