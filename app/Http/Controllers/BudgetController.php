<?php

namespace App\Http\Controllers;

use App\AllotmentClass;
use App\Budget;
use App\BudgetAllotment;
use App\Division;
use App\Expense;
use App\Program;
use App\Section;
use App\SubAllotment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDO;

class BudgetController extends Controller
{
    public function index() {
        $divisions = Division::all();
        $div_desc = Auth::user()->division;
        $allotment_c = AllotmentClass::all();
        $class = 2;
        $yearly_reference = session::get('yearly_reference');

        if($div_desc == 6) {
            $div_desc = 1;
        }else if ($div_desc == 4) {
            $div_desc = 2;
        }else if ($div_desc == 5) {
            $div_desc = 4;
        }
        //budget allotment
        $budget_a = BudgetAllotment::where('AllotmentClassId','=', $class)
            ->where('RespoId','=', $div_desc)
            ->get();

        $section = Section::all();
        $program = Program::all();
        $expenses = Expense::all();

        $budget = Budget::where('section_id',"=", Auth::user()->section)
            ->whereNotNull('utilized')
            ->where('yearly_ref_id',"=", $yearly_reference)
            ->where('level',"=","admin")
            ->get();

        return view('budget.home',[
            "divisions" => $divisions,
            "div_id" => $div_desc,
            "budget" => $budget_a,
            "list_budget" =>$budget_a,
            "allotment_c" => $allotment_c,
            "sections" => $section,
            "expenses" => $expenses,
            "budget_table" => $budget
        ]);
    }

    public function sectionIndex(){

        $divisions = Division::all();
        $div_desc = Auth::user()->division;
        $allotment_c = AllotmentClass::all();
        $class = 2;
        $yearly_reference = session::get('yearly_reference');

        $budget = Budget::where('section_id',"=", Auth::user()->section)
            ->whereNotNull('utilized')
            ->where('yearly_ref_id',"=", $yearly_reference)
            ->get();

        $sub_allotment = SubAllotment::where('section_id',"=", Auth::user()->section)
            ->whereNotNull('beginning_bal')
            ->where('yearly_ref_id',"=", $yearly_reference)
            ->get();

        return view('section.allocate_section',[
            "divisions" => $divisions,
            "div_id" => $div_desc,
            "allotment_c" => $allotment_c,
            "budget_table" => $budget,
            "sub_allotment" => $sub_allotment
        ]);
    }
    //admin
    public function addBudget(Request $request) {
        if(empty($request->section_id[0])){
            $test= $this->addExpense($request);
        }else
            $test= $this->addSection($request);
        return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //Admin - expense
    public function addExpense(Request $request) {
        $test = "";
        if(Auth::user()->user_priv == 1){
            $level = "admin";
        }else {
            $level = "expense";
        }

        $division_id = Auth::user()->division;
        $section_id = Auth::user()->section;
        $yearly_reference = Session::get('yearly_reference');
        $beginning_bal = BudgetAllotment::select('Beginning_balance')
            ->where('FundSourceId',"=", $request->fund_source)
            ->first();

        $beginning_bal = $beginning_bal->Beginning_balance;
        $expense_amount_count = 0;
        $remaining_bal = 0;
        foreach($request->expense_id as $id) {
            $budget = new Budget();
            $budget->utilized = $request->expense_amt[$expense_amount_count];
            $budget->expense_id = $id;
            $budget->fundSource_id = $request->fund_source;
            $budget->division_id = $division_id;
            $budget->yearly_ref_id = $yearly_reference;
            $budget->section_id = $section_id;
            $budget->beginning_bal = $beginning_bal;
            $budget->remaining_bal = $beginning_bal-$budget->utilized;
            $budget->level = $level;
            $budget->save();
            $expense_amount_count++;
        }
        return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //Admin-section
    public function addSection(Request $request) {
        $test = "";
        $level = "admin";
        $division_id = Auth::user()->division;
        $yearly_reference = Session::get('yearly_reference');
        $beginning_bal = BudgetAllotment::select('Beginning_balance')
                                ->where('FundSourceId',"=", $request->fund_source)
                                ->first();
        Session::put("fund_source",$request->fund_source);

        $beginning_bal = $beginning_bal->Beginning_balance;
        $section_amount_count = 0;
        foreach($request->section_id as $id) {
            $budget = new Budget();
            $budget->utilized = $request->section_amt[$section_amount_count];
            $budget->section_id = $id;
            $budget->fundSource_id = $request->fund_source;
            $budget->division_id = $division_id;
            $budget->yearly_ref_id = $yearly_reference;
            $budget->beginning_bal = $beginning_bal;
            $budget->remaining_bal = $beginning_bal-$budget->utilized;
            $budget->level = $level;
            $budget->save();
            $section_amount_count++;
        }

            return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //Section-program
    public function addProgram(Request $request) {
        $test ="";
        $level = "program";
        $division_id = Auth::user()->division;
        $section_id = Auth::user()->section;
        $yearly_reference = Session::get('yearly_reference');
        $beginning_bal = Budget::select('utilized')
            ->where('section_id','=', Auth::user()->section)
            ->first();

        Budget::where('section_id',"=",$section_id)
            ->where('program_id',"=", $request->program_id)
            ->whereNotNull('section_id')
            ->delete();

        $fund_source = Budget::select('fundSource_id')
            ->where('section_id',"=", $section_id)
//            ->where('level',"=","program")
            ->first();

        if(!(empty($request->saa_no && $request->saa_amt))){
            $budget = new SubAllotment();
            $budget->saa_no = $request->saa_no;
            $budget->beginning_bal = $request->saa_amt;
            $budget->division_id = $division_id;
            $budget->yearly_ref_id = $yearly_reference;
            $budget->section_id = $section_id;
            $budget->save();
        }else {
            $beginning_bal = $beginning_bal->utilized;
            $program_amount_count = 0;
            $remaining_bal = 0;
            foreach($request->program_id as $id) {
                $budget = new Budget();
                $budget->utilized = $request->program_amt[$program_amount_count];
                $budget->program_id = $id;
                $budget->division_id = $division_id;
                $budget->yearly_ref_id = $yearly_reference;
                $budget->section_id = $section_id;
                $budget->beginning_bal = $beginning_bal;
                $budget->fundSource_id = $fund_source->fundSource_id;
                $budget->level = $level;
                $budget->save();
                $program_amount_count++;
            }
        }
        return Redirect::action('BudgetController@sectionIndex')->with('msg', 'Successfully Allocated!');
    }
    //edit (3)
    public function editProgram(Request $request){
        $remaining_bal = $request->bal;
        $program_id = $request->prog;
        $fund = $request->fund;
        if(Auth::user()->user_priv != 1) {
            $fund_id = Budget::where("section_id","=", $request->program_id)
                ->first();
           $title = Budget::where("section_id","=", $request->program_id)
                ->first();
        }else {
            $fund_id = Budget::where("fundSource_id","=", $request->program_id)
                ->first();
            $title = BudgetAllotment::where("FundSourceId","=", $request->program_id)
                ->first();
        }
        return view("budget.updateExpense",[
        "program" => $fund_id,
        "title" => $title,
        "bal" => $remaining_bal,
        "program_id" => $program_id,
        "fund" => $fund,
//
        ]);
    }

    public function edit(Request $request){
        $remaining_bal = $request->bal;

        $fund_id = Budget::where("section_id","=",$request->program_id)
            ->first();

        return view("section.allocate_section",[
            "program" => $fund_id,
            "bal" => $remaining_bal
        ]);
    }
    //admin
    public function updateBal(Request $request) {

        if(Auth::user()->user_priv == 1) {
            $new = Budget::where('fundSource_id', "=", $request->fund_id)
                ->whereNotNull('section_id')
                ->whereNotNull('expense_id')
                ->get()->toArray();
        }else{
            $new = Budget::where('id', "=", $request->fund_id)
                ->whereNotNull('section_id')
                ->whereNotNull('expense_id')
                ->get()->toArray();
        }
        if(empty($new)){
            $test= $this->editSection($request);
        }else {
            $test= $this->editExpense($request);
        }

        return Redirect::action('BudgetController@index')->with('msg', 'successfully updated!');
    }
    //Admin - edit
    public function editExpense(Request $request) {
        $test = "";
        $level = "expense";
        $section_id = Auth::user()->section;
        $division_id = Auth::user()->division;
        $yearly_reference = Session::get('yearly_reference');
        Budget::where('fundSource_id',"=",$request->fund_id)
            ->whereNotNull('expense_id')
            ->whereNotNull('section_id')
            ->delete();
        $expense_amount_count = 0;
        foreach($request->expense_id as $id) {
            $budget = new Budget();
            $budget->utilized = $request->expense_amt[$expense_amount_count];
            $budget->expense_id = $id;
            $budget->fundSource_id = $request->fund_id;
            $budget->section_id = $section_id;
            $budget->division_id = $division_id;
            $budget->yearly_ref_id = $yearly_reference;
            $budget->level = $level;
            $budget->save();
            $expense_amount_count++;
        }
        return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //admin - edit Section
    public function editSection(Request $request) {
        $test = "";
        $level = "admin";
        $division_id = Auth::user()->division;
        $yearly_reference = Session::get('yearly_reference');
        Budget::where('fundSource_id',"=",$request->fund_id)
            ->whereNotNull('section_id')
            ->delete();
        $section_amount_count = 0;

        foreach($request->section_id as $id) {
            $budget = new Budget();
            $budget->utilized = $request->section_amt[$section_amount_count];
            $budget->section_id = $id;
            $budget->fundSource_id = $request->fund_id;
            $budget->division_id = $division_id;
            $budget->yearly_ref_id = $yearly_reference;
            $budget->level = $level;
            $budget->save();
            $section_amount_count++;
        }
        return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //standard user
    public function expense(Request $request) {
        $test = "";
        $fund = $request->fund;
        $level = "expense";
        $section_id = Auth::user()->section;
        $division_id = Auth::user()->division;
        $yearly_reference = Session::get('yearly_reference');
        if($request->program_id != 0) {
            Budget::where('section_id',"=",Auth::user()->section)
                ->whereNotNull('expense_id')
                ->where('section_id',"=",$section_id)
                ->where('program_id',"=",$request->program_id)
                ->where('fundSource_id',"=", $fund)
                ->delete();
        }else {
            Budget::where('section_id',"=",Auth::user()->section)
                ->whereNotNull('expense_id')
                ->where('program_id',"=",0)
                ->where('fundSource_id',"=", $fund)
                ->delete();
        }

        $expense_amount_count = 0;
        foreach($request->expense_id as $id) {
            $budget = new Budget();
            $budget->utilized = $request->expense_amt[$expense_amount_count];
            $budget->expense_id = $id;
            $budget->section_id = $section_id;
            $budget->division_id = $division_id;
            $budget->yearly_ref_id = $yearly_reference;
            $budget->program_id = $request->program_id;
            $budget->level = $level;
            $budget->fundSource_id = $fund;
            $budget->save();
            $expense_amount_count++;
        }
        return Redirect::action('BudgetController@sectionIndex')->with('msg', 'Successfully Updated!');
    }

    public function getFMIS_data(){
        $div_desc = Auth::user()->division;
        $class = 2;

        if($div_desc == 6) {
            $div_desc = 1;
        }else if ($div_desc == 4) {
            $div_desc = 2;
        }else if ($div_desc == 5) {
            $div_desc = 4;
        }
        //budget allotment
        $fmis_data = BudgetAllotment::where('AllotmentClassId','=', $class)
            ->where('RespoId','=', $div_desc)
            ->get();

        return($fmis_data);
    }



}
