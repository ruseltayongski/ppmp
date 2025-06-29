<?php

namespace App\Http\Controllers;

use App\PpmpStatus;
use App\YearlyReference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            if(Auth::attempt(array('username' => $request->username, 'password' => $request->password))){
                $yearly_reference = YearlyReference::where("year",$request->yearly_ref)->first();
                $ppmp_status = $request->ppmp_status;
                $section = Auth::user()->section;
                $user = Auth::user()->user_priv;

                if(!$yearly_reference){
                    Auth::logout();
                    Session::flush();
                    return Redirect::to('/')->with('ops','Yearly reference not exist!')->with("yearly_ref",$request->yearly_ref)->with('username',$request->username)->with('password',$request->password);
                }

                if($ppmp_status == "program" && !($section == 28 || $section == 32 || $section == 29 || $section ==  27 ||$user == 1 )) {
                    Auth::logout();
                    Session::flush();
                    return Redirect::to('/')->with('ops','Your section is not applicable to use program PPMP');
                }

                Session::put("yearly_reference",$yearly_reference->id);
                Session::put("ppmp_status",$request->ppmp_status);
                Session::put("auth",Auth::user());

                $admin = Auth::user()->user_priv == 1;
                Session::put("admin",$admin);

                if(Auth::user()->user_priv)
                    return Redirect::to('admin/home');
                else
//                    return Redirect::to('user/home');
                return redirect()->route('user', ['section' => $section]);

            }
            else {
                return Redirect::to('/')->with('ops','Invalid Login')->with('username',$request->username);
            }
        }
        if(Auth::check()){
            if(Auth::user()->user_priv)
                return Redirect::to('admin/home');
            else
                $section = Auth::user()->section;
                //return Redirect::to('user/home');
                return redirect()->route('user',['section' => $section]);
        }
        return view('login');
    }
}
