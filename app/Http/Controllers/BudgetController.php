<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;

class BudgetController extends Controller
{
    public function index() {
        $divisions = Division::all();
        $div_desc = Auth::user()->division;

        return view('budget.home',[
            "divisions" => $divisions,
            "div" => $div_desc
        ]);
    }

    public function search(Request $request) {

    }
}
