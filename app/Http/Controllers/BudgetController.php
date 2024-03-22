<?php

namespace App\Http\Controllers;

use App\AllotmentClass;
use App\Budget;
use App\BudgetAllotment;
use App\Division;
use App\Expense;
use App\Nep;
use App\Nep_allocation;
use App\NepAllocation;
use App\Program;
use App\Saa;
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
        //$budget_a = BudgetAllotment::where('AllotmentClassId','=', $class)
//        $budget_a = BudgetAllotment::where('RespoId','=', $div_desc)
//            //->where('YearlyReferenceId',"=", $yearly_reference)
//            ->get();
        $budget_a = Nep::where('yearly_ref_id',"=", $yearly_reference)
            ->get();
        $saa = SubAllotment::all();

        $section = Section::all();
        $program = Program::all();
        $expenses = Expense::all();

        $budget = Budget::where('section_id',"=", Auth::user()->section)
            ->whereNotNull('utilized')
            ->where('yearly_ref_id',"=", $yearly_reference)
            ->where('level',"=","admin")
            ->get();
        $nep_alloc = NepAllocation::where('yearly_ref_id',"=",$yearly_reference)->get();

        return view('budget.home',[
            "divisions" => $divisions,
            "div_id" => $div_desc,
            "budget" => $budget_a,
            "list_budget" =>$budget_a,
            "allotment_c" => $allotment_c,
            "sections" => $section,
            "expenses" => $expenses,
            "budget_table" => $budget,
            "nep" => $nep_alloc
        ]);
    }

    public function sectionIndex(){

        $divisions = Division::all();
        $div_desc = Auth::user()->division;
        $allotment_c = AllotmentClass::all();
        $class = 2;
        $yearly_reference = session::get('yearly_reference');

        $query1 = DB::table('nep_allocation')
            //->select('nep_id', 'section_id')
            ->where('section_id', '=', Auth::user()->section)
            ->where('yearly_ref_id','=', $yearly_reference)
            ->where('level','=','admin')
            ->get();

        //change if naa nay saa
        $query2 = DB::table('saa')
            // ->select('saa_no', 'section_id')
            ->where('section_id', '=', Auth::user()->section)
            ->where('yearly_ref_id',"=", $yearly_reference)
            ->where("status","=","admin");

        //union or normal query if SAA is already here
        $mysqlData = NepAllocation::
            where('yearly_ref_id', 2)
            ->get();

        $sqlServerData = SubAllotment::
            where('BudgetAllotmentId', '2')
            ->get();

//        $result = $mysqlData->union($sqlServerData)->toArray();

        $nep = Nep::where('yearly_ref_id','=',$yearly_reference)
            ->where("yearly_ref_id","=", $yearly_reference)
            ->get();

        $nep_alloc = NepAllocation::select('nep.*', 'nep_allocation.*')
            ->leftjoin('nep','nep.id',"=", 'nep_allocation.nep_id')
            ->where('nep_allocation.yearly_ref_id',"=", $yearly_reference)
            ->where('nep_allocation.section_id',"=", Auth::user()->section)
            ->where('nep_allocation.level',"=",'program')
            ->where('nep_allocation.division_id',"=", Auth::user()->division)
            ->get();

        //must be changed withe the actual db for saa from budget if they have included sections
        $saa = Saa::where('section_id',"=", Auth::user()->section)
            ->whereNotNull('utilized')
            ->where('yearly_ref_id',"=", $yearly_reference)
        ->get();

        $program = Program::all();

        return view('section.allocate_section1',[
            "divisions" => $divisions,
            "div_id" => $div_desc,
            "allotment_c" => $allotment_c,
            //"budget_table" => $budget,
            "sub_allotment" => $saa,
            "nep" => $nep,
            "charge" => $query1,
            "nep_alloc" => $nep_alloc,
            "program" => $program
        ]);
    }
    //admin
    public function addBudget(Request $request) {
        if(empty($request->section_id)){
            $test= $this->addExpense($request);
        }else
            $test= $this->addSection($request);
        return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //Admin - expense
    public function addExpense(Request $request)
    {
//        $data = $request->expense_id[0];
        $test = "";
        if (Auth::user()->user_priv == 1) {
            $level = "admin";
        } else {
            $level = "expense";
        }

        $division_id = Auth::user()->division;
        $section_id = Auth::user()->section;
        $yearly_reference = Session::get('yearly_reference');
        $allotment_class = $request->allotment_id;

        if($request->plan ="nep") {
            $nep = new Nep();
            $nep->expense_id = $request->expense_id;
            $nep->nep_title = $request->nep_title;
            $nep->division_id = $division_id;
            $nep->yearly_ref_id = $yearly_reference;
            $nep->section_id = $section_id;
            $nep->beginning_bal = $request->nep_amt;
            $nep->remaining_bal = $nep->beginning_bal - $nep->utilized;
            $nep->level = $level;
            $nep->allotment_class = $allotment_class;
            $nep->save();

            if(is_array($request->expense_id)) {
                $expense_amount_count = 0;
                foreach ($request->expense_id as $id) {
                    $nep_alloted = new NepAllocation();
                    $nep_alloted->nep_id = $nep->id;
                    $nep_alloted->utilized = $request->expense_amt[$expense_amount_count];
                    $nep_alloted->expense_id = $id;
                    $nep_alloted->division_id = $division_id;
                    $nep_alloted->yearly_ref_id = $yearly_reference;
                    $nep_alloted->section_id = $section_id;
                    $nep_alloted->beginning_bal = $request->nep_amt;
                    $nep_alloted->remaining_bal = $request->nep_amt;
                    $nep_alloted->level = $level;
                    $nep_alloted->allotment_class = $allotment_class;
                    $nep_alloted->save();
                    $expense_amount_count++;
                }
            }
        }

        return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //Admin-section
    public function addSection(Request $request) {
        $test = "";
        $level = "admin";
        $division_id = Auth::user()->division;
        $yearly_reference = Session::get('yearly_reference');
        $allotment_class = $request->allotment_id;
//        $beginning_bal = BudgetAllotment::select('Beginning_balance')
//                                ->where('FundSourceId',"=", $request->fund_source)
//                                ->first();
//        Session::put("fund_source",$request->fund_source);

        if ($request->plan == "nep") {
            $nep = new Nep();
            $nep->nep_title = $request->nep_title;
            $nep->division_id = $division_id;
            $nep->yearly_ref_id = $yearly_reference;
            $nep->section_id = $request->section_id[0];
            $nep->beginning_bal = $request->nep_amt;
            $nep->remaining_bal = $nep->beginning_bal - $nep->utilized;
            $nep->level = $level;
            $nep->allotment_class = $allotment_class;
            $nep->save();

            if (is_array($request->section_id)) {
                $section_amount_count = 0;
                foreach ($request->section_id as $id) {
                    $nep_alloted = new NepAllocation();
                    $nep_alloted->nep_id = $nep->id;
                    $nep_alloted->utilized = $request->section_amt[$section_amount_count];
                    $nep_alloted->division_id = $division_id;
                    $nep_alloted->yearly_ref_id = $yearly_reference;
                    $nep_alloted->section_id = $id;
                    $nep_alloted->beginning_bal = $request->nep_amt;
                    $nep_alloted->remaining_bal = $nep_alloted->beginning_bal - $nep_alloted->utilized;
                    $nep_alloted->level = $level;
                    $nep_alloted->allotment_class = $allotment_class;
                    $nep_alloted->save();
                    $section_amount_count++;
                }
            }
        }
            return Redirect::action('BudgetController@index')->with('msg', 'Successfully Allocated!');
    }
    //Section-program
    public function addProgram(Request $request) {
        $test ="";
        $charge = $request->charge;
        $level = "expense";
        $level1= "program";
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
        if(isset($beginning_bal->utilized))
        $beginning_bal = $beginning_bal->utilized;
        $expense_amount_count = 0;

        if(!(empty($request->expense_id))){
            foreach($request->expense_id as $id) {
                $budget = new NepAllocation();
                $budget->utilized = $request->expense_amt[$expense_amount_count];
                $budget->expense_id = $id;
                $budget->division_id = $division_id;
                $budget->yearly_ref_id = $yearly_reference;
                $budget->section_id = $section_id;
                $budget->beginning_bal = $beginning_bal;
                $budget->nep_id = $charge;
                $budget->level = $level;
                $budget->save();
                $expense_amount_count++;
            }
        }else {
            $program_amount_count = 0;
            $remaining_bal = 0;
            if(isset($request->program_id))
            foreach($request->program_id as $id) {
                $budget = new NepAllocation();
                $budget->utilized = $request->program_amt[$program_amount_count];
                $budget->program_id = $id;
                $budget->division_id = $division_id;
                $budget->yearly_ref_id = $yearly_reference;
                $budget->section_id = $section_id;
                $budget->beginning_bal = $beginning_bal;
                $budget->nep_id = $charge;
                $budget->level = $level1;
                $budget->save();
                $program_amount_count++;
            }
        }
        return Redirect::action('BudgetController@sectionIndex')->with('msg', 'Successfully Allocated!');
    }
    //edit (3)
    public function editProgram(Request $request){
        $remaining_bal = $request->bal;
        $nep_id = $request->nep_id;
        //$fund = $request->fund;
        if(Auth::user()->user_priv != 1) {
            $fund_id = Budget::where("section_id","=", $request->program_id)
                ->first();
           $title = Budget::where("section_id","=", $request->program_id)
                ->first();
        }else {
            //No saa since automatic rata mukuha sa budget
            $fund_id = Nep::where("id","=", $request->nep_id)->first();
//
        }
        return view("budget.updateExpense",[
        "nep" => $fund_id,
       // "title" => $title,
        "bal" => $remaining_bal,
        "nep_id" => $nep_id
        //"fund" => $fund
        ]);
    }

    //admin
    public function updateBal(Request $request) {

        if(Auth::user()->user_priv == 1) {
              //fundsource allocation from ppmp
//            $new = Budget::where('nep_id', "=", $request->fund_id)
//                ->whereNotNull('section_id')
//                ->whereNotNull('expense_id')
//                ->get()->toArray();

            $new = NepAllocation::where('nep_id',"=",$request->fund_id)
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
//        Budget::where('fundSource_id',"=",$request->fund_id)
//            ->whereNotNull('expense_id')
//            ->whereNotNull('section_id')
//            ->delete();
        NepAllocation::where('nep_id',"=",$request->fund_id)
            ->whereNotNull('expense_id')
            ->whereNotNull('section_id')
            ->delete();
        $expense_amount_count = 0;
        if(isset($request->expense_id))
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
//        Budget::where('fundSource_id',"=",$request->fund_id)
//            ->whereNotNull('section_id')
//            ->delete();
        NepAllocation::where('nep_id',"=",$request->fund_id)
            ->whereNotNull('section_id')
            ->delete();
        $section_amount_count = 0;
        if(isset($request->section_id))
        foreach($request->section_id as $id) {
            $budget = new NepAllocation();
            $budget->utilized = $request->section_amt[$section_amount_count];
            $budget->section_id = $id;
            $budget->nep_id = $request->fund_id;
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
        if(isset($request->expense_id))
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

    public function show(Request $request)
    {
        $yearly_reference = session::get('yearly_reference');
        $tabId = $request->input('tabId');
        //$allotment_c = AllotmentClass::all();
        // Fetch the tab content based on the $tabId and return it as a response
        // For example, you could fetch data from a database or prepare the content dynamically

        if($tabId == "tab1") {
            $tabContent = Nep::where('yearly_ref_id',"=", $yearly_reference)->get();
         }else if($tabId == "tab2"){
             $tabContent = BudgetAllotment::get();

         }else {
                 $tabContent = SubAllotment::get();
             }

        return response()->json($tabContent);
    }

    public function getNep () {
        $yearly_reference = session::get('yearly_reference');
        $nep = Nep::where("yearly_ref_id","=", $yearly_reference)
            ->get();

        return($nep);
    }

    public function getId (Request $request) {
        $yearly_reference = Session::get('yearly_reference');
        $charge = $request->charging;

        $nep_charge = NepAllocation::select('nep.nep_title','nep_allocation.nep_id','nep_allocation.utilized')
            ->join('nep','nep.id','=', 'nep_allocation.nep_id')
            ->where('nep.id',"=", $charge)
            ->where('nep_allocation.section_id',"=", Auth::user()->section)
            ->where("nep.yearly_ref_id","=", $yearly_reference)
            ->first();

        $saa_charge = Saa::select('saa_no','utilized')
            ->where('id',"=", $charge)
            ->where('section_id',"=", Auth::user()->section)
            ->where("yearly_ref_id","=", $yearly_reference)
            ->first();

        if($nep_charge) {
            $charges = $nep_charge;
        }elseif($saa_charge) {
            $charges = $saa_charge;
        }
        return response()->json($charges);
    }

}
