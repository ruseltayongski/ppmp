<?php

namespace App\Http\Controllers;

use App\Item;
use App\PisUser;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PpmpController extends Controller
{
    public function index(){
        $expenses = Expense::get();
        $all_item = Item::get();
        $encoded = Item::where('userid','=',Auth::user()->username)->count();
        return view('ppmp.ppmp_list',[
            "expenses" => $expenses,
            "all_item" => $all_item,
            "encoded" => $encoded
        ]);
    }
}
