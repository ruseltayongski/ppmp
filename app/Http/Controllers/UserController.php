<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PisUser;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserPriv');
    }

    public function home()
    {
        $picture = PisUser::where("userid","=",Auth::user()->username)->first()->picture;
        $test = view('profile',[
            "picture" => $picture
        ]);
        return view('user.home',[
            "test" => $test
        ]);
    }
}
