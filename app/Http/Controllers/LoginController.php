<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')){
            if(Auth::attempt(array('username' => $request->username, 'password' => $request->password))){
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
