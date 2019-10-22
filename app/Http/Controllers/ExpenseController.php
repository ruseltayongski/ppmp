<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Expense;

class ExpenseController extends Controller
{
    public function expenseList(){
        $expense = Expense::paginate(10);
        return view('expense.expense_list',[
            'expense' => $expense
        ]);
    }
    public function code(){

       /* $id = 122;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Cebu Province' => [
            ],
            'Bohol Province' => [
            ],
            'Negros Oriental and Siquijor' => [
            ],
            'Regionwide' => [
            ]
        ]);
        $expense->save();

        $id = 124;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Expanded Program on Immunization' => [
                "Regionwide"
            ]
        ]);
        $expense->save();


        $id = 125;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Management of Sick Child' => [
                "Integrated Management of Childhood Illnes"
            ]
        ]);
        $expense->save();

        $id = 126;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Venue, Meals and Accommodation' => [
                "Environmental and Occupational Health Unit (EOHU)",
                "Hospital Operations Management Service (HOMS)",
                "Medicine Access Service Unit (MASU)",
            ]
        ]);
        $expense->save();


        $id = 129;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Venue, Meals and Accommodation' => [
            ]
        ]);
        $expense->save();

        $id = 130;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Health Leadership and Governance Program (HLGP)' => [
            ],
            'Provincial Leadership and Governance Program (PLGP)' => [
            ],
            'Municipal Leadership and Governance Program (MLGP)' => [
            ],
        ]);
        $expense->save();


        $id = 132;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Prevention of Blindness Program' => [
                "Cebu Province",
                "Negros Oriental and Siquijor Province",
                "Bohol Province",
            ],
            'Violence and Injury Prevention Program' => [
                "Regionwide"
            ],
            'Tobacco Control Program	' => [
                "Regionwide"
            ],
            'Substance Abuse Program' => [
                "Regionwide"
            ],
            'Mental Health and Persons with Disabilities Program' => [
                "Regionwide"
            ],
        ]);
        $expense->save();


        $id = 143;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Prevention of Blindness Program' => [
                "Cebu Province",
                "Negros Oriental and Siquijor Province",
                "Bohol Province",
            ],
            'Violence and Injury Prevention Program' => [
                "Regionwide"
            ],
            'Tobacco Control Program	' => [
                "Regionwide"
            ],
            'Substance Abuse Program' => [
                "Regionwide"
            ],
            'Mental Health and Persons with Disabilities Program' => [
                "Regionwide"
            ],
        ]);
        $expense->save();


        $id = 144;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Venue, meals and accommodation' => [
            ]
        ]);
        $expense->save();

        $id = 146;
        $expense = Expense::find($id);
        $expense->code = json_encode([
            'Preparedness' => [
            ],
            'Response' => [
            ]
        ]);
        $expense->save();



        return $id;*/

        /*$code = json_encode([
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
        }*/

        $expense = Expense::find(153);
        $expense->description = "Expense1";

        $expense->code = json_encode([
            'A. Second Expense A:' => [
                "1. Third Expense 1",
                "2. Third Expense 2",
                "3. Third Expense 3",
                "4. Fourth Expense 4",
                "5. Fifth Expense 5"
            ],
            'B. Second Expense B:' => [

            ],
            'C. Second Expense C:' => [

            ],
            'D. Second Expense D:' => [

            ],
            'E. Second Expense E:' => [

            ]
        ]);

        $expense->save();


        return "Successfully updated code!";

    }
}
