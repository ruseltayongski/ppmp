<?php

namespace App\Http\Controllers;

use App\Item;
use App\PisUser;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\ModeProcurement;
use App\Charge;

class PpmpController extends Controller
{
    public function index($id){
        $expenses = Expense::get();
        $all_item = Item::get();
        $encoded = Item::where('userid','=',Auth::user()->username)->count();
        $mode_procurement = ModeProcurement::get();
        $charge_to = Charge::where('id','=',$id)->get();
        return view('ppmp.ppmp_list',[
            "expenses" => $expenses,
            "all_item" => $all_item,
            "encoded" => $encoded,
            "mode_procurement" => $mode_procurement,
            "charge_to" => $charge_to
        ]);
    }

    public function ppmpUpdate(Request $request){
        foreach($request->get('item_id') as $value){
            if($request->get('status'.$value)){
                $status = 'approve';
            } else {
                $status = 'pending';
            }
            Item::updateOrCreate(
                ['id'=>$value],
                [
                    'userid' => $request->get('userid'.$value),
                    'expense_id' => $request->get('expense_id'.$value),
                    'tranche' => $request->get('tranche'.$value),
                    'description' => $request->get('description'.$value),
                    'unit_measurement' => $request->get('unit_measurement'.$value),
                    'qty' => $request->get('qty'.$value),
                    'unit_cost' => $request->get('unit_cost'.$value),
                    'estimated_budget' => $request->get('estimated_budget'.$value),
                    'mode_procurement' => $request->get('mode_procurement'.$value),
                    'jan' => $request->get('jan'.$value),
                    'feb' => $request->get('feb'.$value),
                    'mar' => $request->get('mar'.$value),
                    'apr' => $request->get('apr'.$value),
                    'may' => $request->get('may'.$value),
                    'jun' => $request->get('jun'.$value),
                    'jul' => $request->get('jul'.$value),
                    'aug' => $request->get('aug'.$value),
                    'sep' => $request->get('sep'.$value),
                    'oct' => $request->get('aug'.$value),
                    'nov' => $request->get('aug'.$value),
                    'dec' => $request->get('dec'.$value),
                    'status' => $status
                ]
            );

        }

        return Redirect::back()->with('success', 'Successfully updated item!');
    }

    public function ppmpDelete(Request $request){
        Item::find($request->id)->delete();
        return 'Successfully Delete!';
    }

}
