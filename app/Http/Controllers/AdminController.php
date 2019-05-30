<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminPriv');
    }

    public function home()
    {
        return view('admin.home');
    }

}
