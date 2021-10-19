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
                $ppmp_status = PpmpStatus::where('description',$request->ppmp_status)->first();
                if(!($yearly_reference && $ppmp_status)){
                    Auth::logout();
                    Session::flush();
                    return Redirect::to('/')->with('ops','Yearly reference not exist!')->with("yearly_ref",$request->yearly_ref)->with('username',$request->username)->with('password',$request->password);
                }

                Session::put("yearly_reference",$yearly_reference->id);
                Session::put("ppmp_status",$ppmp_status->id);

                if(Auth::user()->user_priv)
                    return Redirect::to('admin/home');
                else
                    return Redirect::to('user/home');

            } else {
                return Redirect::to('/')->with('ops','Invalid Login')->with('username',$request->username);
            }
        }
        if(Auth::check()){
            if(Auth::user()->user_priv)
                return Redirect::to('admin/home');
            else
                return Redirect::to('user/home');
        }
        return view('login');
    }
}
