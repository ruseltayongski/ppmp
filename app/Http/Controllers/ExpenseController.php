<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Expense;

class ExpenseController extends Controller
{
    public function expenseList(){
        $expense = Expense::get();
        return view('expense.expense_list',[
            'expense' => $expense
        ]);
    }
    public function test(){
        /*$expense = Expense::find(1);
        $expense->code = json_encode([
            'A. CONSUMABLES:' => [
                "1. COMMON-USE/REGULAR/STANDARD OFFICE SUPPLIES:",
                "2. TRAINING SUPPLIES:",
                "3. EQUIPMENT CONSUMABLES",
            ],
            'B. NON-CONSUMABLE:' => [

            ],
            'C. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION' => [

            ]
        ]);


        $expense->save();
        return 'Successfully Expenses Saved';*/

        $code = json_encode([
            'A. CONSUMABLES:' => [
                "1. COMMON-USE/REGULAR/STANDARD OFFICE SUPPLIES:",
                "2. TRAINING SUPPLIES:",
                "3. EQUIPMENT CONSUMABLES",
            ],
            'B. NON-CONSUMABLE:' => [

            ],
            'C. OTHER COMMON-USE OFFICE SUPPLIES SPECIFICALLY USED ONLY BY CONCERNED SECTION' => [

            ]
        ]);

        $temp = json_decode($code,true);
        $index1 = 0;
        $index2 = 0;
        $alphabet = range('A', 'Z');
        foreach($temp as $key1 => $value1){
            $expense = $alphabet[$index1];
            echo json_encode($key1)."*****".$expense."******"."\n\n";
            foreach($value1 as $val1){
                $index2++;
                echo json_encode($val1)."======".$expense.'-'.$index2."=======\n\n";
            }
            $index1++;
        }

    }
}
