<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Item;
use App\Expense;
use Illuminate\Support\Facades\Redirect;

class ExcelController extends Controller
{
    public function excelImport(){
        return view('excel.expense_import');
    }
    public function importExpense(Request $request)
    {

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['description' => $value->description];
            }
            Expense::insert($arr);
        }
    }
    public function importItem(Request $request)
    {

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'userid' => $value->userid,
                    'expense_id' => $value->expense_id,
                    'tranche' => $value->tranche,
                    'division' => 6,
                    'description' => $value->description,
                    'unit_measurement' => $value->unit_measurement,
                    'qty' => $value->qty,
                    'unit_cost' => $value->unit_cost,
                    'estimated_budget' => $value->estimated_budget,
                    'mode_procurement' => $value->mode_procurement,
                    'jan' => $value->jan,
                    'feb' => $value->feb,
                    'mar' => $value->mar,
                    'apr' => $value->apr,
                    'may' => $value->may,
                    'jun' => $value->jun,
                    'jul' => $value->jul,
                    'aug' => $value->aug,
                    'sep' => $value->sep,
                    'oct' => $value->oct,
                    'nov' => $value->nov,
                    'dec' => $value->dec,
                    'status' => $value->status,
                ];
            }
            Item::insert($arr);
        }
        return Redirect::back()->with('itemAdd', 'Successfully added item!');
    }

}
