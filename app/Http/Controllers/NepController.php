<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Nep;
use Illuminate\Http\Request;

class NepController extends Controller
{
    public function edit(Request $request){
        $remaining_bal = $request->bal;

        $fund_id = Budget::where("section_id","=",$request->program_id)
            ->first();

        return view("budget.update_nep",[
            "program" => $fund_id,
            "bal" => $remaining_bal
        ]);
    }
}
