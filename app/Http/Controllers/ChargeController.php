<?php

namespace App\Http\Controllers;

use App\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ChargeController extends Controller
{
    public function chargeDefault(){
        return view('charge.charge_default',['charge_menu' => true]);
    }
    public function home(){
        return view('admin.home');
    }
    public function chargeAdd(Request $request){
        $charge = new Charge();
        $charge->userid = Auth::user()->username;
        $charge->division = Auth::user()->division;
        $charge->section = Auth::user()->section;
        $charge->description = $request->description;
        $charge->beginning_balance = $request->beginning_balance;
        $charge->remaining_balance = 0;
        $charge->datein = $request->datein;
        $charge->status = 1;
        $charge->save();

        Session::put('status','Charge was successfully added!');
        return Redirect::to('/');
    }

    public function test(){
        Session::flash('status', 'Post was successfully added!');
        return Redirect::to('charge/default');
    }
}
