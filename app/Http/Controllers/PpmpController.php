<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class PpmpController extends Controller
{
    public function index(){
        $expenses = Expense::get();
        return view('ppmp.ppmp_list',[
            "expenses" => $expenses
        ]);
    }
}
