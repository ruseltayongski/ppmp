<?php

namespace App\Http\Controllers;

use App\DtsUser;
use App\Item;
use App\ItemDaily;
use App\PisUser;
use App\Program;
use App\ProgramSetting;
use App\Qty;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use App\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\ModeProcurement;
use App\Charge;
use App\Designation;
use App\Division;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use App\CreatedLogs;


class PpmpController extends Controller
{
    public function index($section) {
        $expenses = Expense::get();
        $section = Auth::user()->section;

        $prog = Session::get('prog');

        if(Session::get("admin")) {
            $section= session::get('section_id');
            //Session::put('section_id',$section);
        }
        Session::put('section_id',$section);
        $end_user_name = strtoupper(Auth::user()->lname.', '.Auth::user()->fname);
        $end_user_designation = Designation::find(Auth::user()->designation)->description;
        $head = Division::select(DB::raw("upper(concat(users.lname,', ',users.fname)) as head_name"),'designation.description as designation')
            ->LeftJoin('dts.users','users.id','=','division.head')
            ->LeftJoin('dts.designation','designation.id','=','users.designation')
            ->where('division.id','=',Auth::user()->division)
            ->first();

        $program_settings = ProgramSetting::all();
//        if(Auth::user()->username == "201600256") {
//            $programs = Program::all();
//        }
//        else
        $programs = Program::where('section_id','=',$section)
            ->where("id","!=", $prog)
            ->get();

        return view('ppmp.dashboard',[
            "expenses" => $expenses,
            "programs" => $programs,
            "end_user_name" => $end_user_name,
            "end_user_designation" => $end_user_designation,
            "head" => $head,
            "program_settings" => $program_settings,
            "section" => $section
        ]);
    }

    public function divisionCheck() {
        $expenses = Expense::get();
        $division_id = Auth::user()->division;

        $sections = Section::where('division',"=",$division_id)->get();
        Session::put("sections",$sections);

        return view('ppmp.division_check',[
            "expenses" => $expenses,
            "sections" => $sections
        ]);
    }

    public function setProgram(Request $request) {

        $programs = $request->programs;
        $expense = $request->expense;
        $user = $request->user_id;
        $section_id = Auth::user()->section;
        $division_id = $request->division_id;

        Session::put("prog",$request->programs);

        if(session::get('admin')) {
            $section_id = session::get('section_id');
        }

        $set_program = ProgramSetting::where('expense_id','=',$expense)
            ->where('section_id','=', $section_id)
            ->where('program_id',"=", $programs)
            ->get();

        if(count($set_program) > 0 && $expense != 1)
            $set_program->each->delete();

        foreach ($programs as $program) {
            $set_program = new ProgramSetting();
            $set_program->program_id = $program;
            $set_program->expense_id = $expense;
            $set_program->created_by = $user;
            $set_program->section_id = $section_id;
            $set_program->division_id = $division_id;
            $set_program->save();
        }
        return back();
    }

    public function ppmpProgram($expense_id = null,Request $request) {

        $section_id = Auth::user()->section;

        if(session::get('admin')) {
            $section_id = session::get('section_id');
        }

        $program_settings = ProgramSetting::select("programs.id","programs.description")
                                        ->where('program_settings.expense_id',"=",$expense_id)
                                        ->where('program_Settings.section_id',"=", $section_id)
                                        ->Join("programs","programs.id","=","program_settings.program_id")
                                        ->get();

        $keyword = "";
        $item_to_filter = "NO_DATA"; //TEMP NO DATA
        if($request->isMethod('post') || isset($request->item_id[0]) ){
            if($request->item_save){ //if ang button ge saved
                //return $request->all();
                $item_to_filter = $this->ppmpProgramUpdate($request);
            }

            $keyword = $request->item_search;
            if($keyword){
                $item = Item::
                where("description","like","%$keyword%")
                    ->where(function($q){
                        $q->where('item.status','=','approve')
                            ->orWhere('item.status','=','fixed');
                    })
                    ->pluck('expense_id')->toArray();
                if(!$item){ //if mag add sa new item then wala sa result, search the item_to_filter
                    $keyword = $item_to_filter;
                    $item = Item::where('division','=',Auth::user()->division)
                        ->where("description","like","%$keyword%")
                        ->where(function($q){
                            $q->where('item.status','=','approve')
                                ->orWhere('item.status','=','fixed');
                        })
                        ->pluck('expense_id')->toArray();
                }
                $expenses = Expense::whereIn("id",$item)->get();
            } else {
                $expenses = Expense::where("id","=",$expense_id)->get();
            }

        } else {
            $expenses = Expense::where("id","=",$expense_id)->get();
        }

        $all_item = Item::get();

        $mode_procurement = ModeProcurement::get();
        $end_user_name = strtoupper(Auth::user()->lname.', '.Auth::user()->fname);
        $end_user_designation = Designation::find(Auth::user()->designation)->description;
        $head = Division::select(DB::raw("upper(concat(users.lname,', ',users.fname)) as head_name"),'designation.description as designation')
            ->LeftJoin('dts.users','users.id','=','division.head')
            ->LeftJoin('dts.designation','designation.id','=','users.designation')
            ->where('division.id','=',Auth::user()->division)
            ->first();

        return view('ppmp.program_list',[
            "expenses" => $expenses,
            "all_item" => $all_item,
            "mode_procurement" => $mode_procurement,
            "end_user_name" => $end_user_name,
            "end_user_designation" => $end_user_designation,
            "head" => $head,
            "item_search" => $keyword,
            "expense_id" => $expense_id,
            "request" => $request,
            "program_settings" => $program_settings,
            "section_id" => $section_id
        ]);
    }

    public function programBlade(Request $request) {
        $user = Auth::user();

        $sections = Section::where('division',"=", $user->division)
                    ->get();
        $expenses = Expense::all();

        $keyword = "";
        $item_to_filter = "NO_DATA"; //TEMP NO DATA
        if($request->isMethod('post') || isset($request->item_id[0]) ){
            if($request->item_save){ //if ang button ge savedRe
                //return $request->all();
                $item_to_filter = $this->ppmpUpdate($request);
            }
            $keyword = $request->item_search;
            if($keyword){
                $item = Item::
                where("description","like","%$keyword%")
                    ->where(function($q){
                        $q->where('item.status','=','approve')
                            ->orWhere('item.status','=','fixed');
                    })
                    ->pluck('expense_id')->toArray();
                if(!$item){ //if mag add sa new item then wala sa result, search the item_to_filter
                    $keyword = $item_to_filter;
                    $item = Item::where('division','=',Auth::user()->division)
                        ->where("description","like","%$keyword%")
                        ->where(function($q){
                            $q->where('item.status','=','approve')
                                ->orWhere('item.status','=','fixed');
                        })
                        ->pluck('expense_id')->toArray();
                }

            } else {

            }

        } else {
        }

        return view('ppmp.report_html',[
            "request" => $request,
            "sections" => $sections,
            "expenses" => $expenses,
            "item_search" => $keyword
        ]);
    }

    public function ppmpList($expense_id = null, Request $request){

        $section_id = Auth::user()->section;

        if(session::get('admin')) {
            $section_id = session::get('section_id');
        }

        $keyword = "";
        $item_to_filter = "NO_DATA"; //TEMP NO DATA
        if($request->isMethod('post') || isset($request->item_id[0]) ){
            if($request->item_save){ //if ang button ge savedRe
                //return $request->all();
                $item_to_filter = $this->ppmpUpdate($request);
            }
            $keyword = $request->item_search;
            if($keyword){
                $item = Item::
                where("description","like","%$keyword%")
                    ->where(function($q){
                        $q->where('item.status','=','approve')
                            ->orWhere('item.status','=','fixed');
                    })
                    ->pluck('expense_id')->toArray();
                if(!$item){ //if mag add sa new item then wala sa result, search the item_to_filter
                    $keyword = $item_to_filter;
                    $item = Item::where('division','=',Auth::user()->division)
                        ->where("description","like","%$keyword%")
                        ->where(function($q){
                            $q->where('item.status','=','approve')
                                ->orWhere('item.status','=','fixed');
                        })
                        ->pluck('expense_id')->toArray();
                }
                $expenses = Expense::whereIn("id",$item)->get();
            } else {
                $expenses = Expense::where("id","=",$expense_id)->get();
            }

        } else {
            $expenses = Expense::where("id","=",$expense_id)->get();
        }

        $all_item = Item::get();

        $mode_procurement = ModeProcurement::get();
        $end_user_name = strtoupper(Auth::user()->lname.', '.Auth::user()->fname);
        $end_user_designation = Designation::find(Auth::user()->designation)->description;
        $head = Division::select(DB::raw("upper(concat(users.lname,', ',users.fname)) as head_name"),'designation.description as designation')
            ->LeftJoin('dts.users','users.id','=','division.head')
            ->LeftJoin('dts.designation','designation.id','=','users.designation')
            ->where('division.id','=',Auth::user()->division)
            ->first();

        return view('ppmp.ppmp_list',[
            "expenses" => $expenses,
            "all_item" => $all_item,
            "mode_procurement" => $mode_procurement,
            "end_user_name" => $end_user_name,
            "end_user_designation" => $end_user_designation,
            "head" => $head,
            "item_search" => $keyword,
            "expense_id" => $expense_id,
            "request" => $request,
            "section_id" => $section_id
        ]);
    }

    public function ppmpUpdate(Request $request){
        $item_to_filter = "";
        $encoded_by = Auth::user()->username;
        $division_id = Auth::user()->division;
        $section_id = Auth::user()->section;

        if(session::get('admin')) {
            $section_id = session::get('section_id');
        }
        $yearly_reference = Session::get('yearly_reference');   //get yearly_ref
        $ppmp_status = Session::get('ppmp_status');  //get ppmp_status

        foreach($request->get('item_id') as $value){
            $unique_id = $request->get('unique_id'.$value);
            $expense_id = $request->get('expense_id'.$value);
            $tranche = $request->get('tranche'.$value);
            $description = $request->get('description'.$value);
            $unit_measurement = $request->get('unit_measurement'.$value);
            $jan = $request->get('jan'.$value);
            $feb = $request->get('feb'.$value);
            $mar = $request->get('mar'.$value);
            $apr = $request->get('apr'.$value);
            $may = $request->get('may'.$value);
            $jun = $request->get('jun'.$value);
            $jul = $request->get('jul'.$value);
            $aug = $request->get('aug'.$value);
            $sep = $request->get('sep'.$value);
            $oct = $request->get('oct'.$value);
            $nov = $request->get('nov'.$value);
            $dece = $request->get('dece'.$value);

            $unit_cost = $request->get('unit_cost'.$value);
            $mode_procurement = $request->get('mode_procurement'.$value);
            //
            $yearly_ref = $yearly_reference;
            $ppmp_stat = $ppmp_status;

//            if(!$jan && !$feb && !$mar && !$apr && !$may && !$jun && !$jul && !$aug && !$sep && !$oct && !$nov && !$dece)
//                return;

            $item = Item::where("description","=",$description)
                ->where("expense_id","=",$expense_id)
                ->where("tranche","=",$tranche)
                ->first();

            if($encoded_by == "0864" && $expense_id == 1) {
                $item->unit_cost = $unit_cost;
                $item->unit_measurement = $unit_measurement;
                //$item->description = $description;
                $item->mode_procurement = $mode_procurement;
                $item->save();
            }

            if(!$item) {
                $item = new Item();
                $item->expense_id = $expense_id;
                $item->userid = $encoded_by;
                $item->division = $division_id;
                $item->section = $section_id;
                $item->tranche = $tranche;
                $item->description = $description;
                $item->ppmp_status = $ppmp_status;
                $item->yearly_ref_id = $yearly_reference;
                $item->save();
            }

            //if mao siya ang item

            $item_daily = ItemDaily::
                where(function($q) use($value,$unique_id){
                    $q->where("item_id",$value)
                        ->orWhere("unique_id",$unique_id);
                })
                ->where("expense_id",$expense_id)
                ->where("userid",$encoded_by)
                ->where("division_id",$division_id)
                ->where("section_id",$section_id)
                ->where("tranche",$tranche)
                ->where("description",$description)
                ->where("unit_cost",$unit_cost)
                ->where("mode_procurement",$mode_procurement)
                ->where("jan",$jan)
                ->where("feb",$feb)
                ->where("mar",$mar)
                ->where("apr",$apr)
                ->where("may",$may)
                ->where("jun",$jun)
                ->where("jul",$jul)
                ->where("aug",$aug)
                ->where("sep",$sep)
                ->where("oct",$oct)
                ->where("nov",$nov)
                ->where("dece",$dece)
                ->where('yearly_ref_id',$yearly_ref)
                ->where('ppmp_status',$ppmp_stat)
                ->orderBy("id","desc")
                ->first();

            $item_id = $item->id;

            if(!$item_daily)
            {
                $item_daily = new ItemDaily();
                $item_daily->item_id = $item_id;
                $item_daily->unique_id = $unique_id;
                $item_daily->expense_id = $expense_id;
                $item_daily->userid = $encoded_by;
                $item_daily->division_id = $division_id;
                $item_daily->section_id = $section_id;
                $item_daily->tranche = $tranche;
                $item_daily->description = $description;
                $item_daily->unit_measurement = $unit_measurement;
                $item_daily->unit_cost = $unit_cost;
                $item_daily->mode_procurement = $mode_procurement;
                $item_daily->jan = $jan;
                $item_daily->feb = $feb;
                $item_daily->mar = $mar;
                $item_daily->apr = $apr;
                $item_daily->may = $may;
                $item_daily->jun = $jun;
                $item_daily->jul = $jul;
                $item_daily->aug = $aug;
                $item_daily->sep = $sep;
                $item_daily->oct = $oct;
                $item_daily->nov = $nov;
                $item_daily->dece = $dece;
                $item_daily->yearly_ref_id = $yearly_ref;
                $item_daily->ppmp_status = $ppmp_stat;
                $item_daily->save();
            }

            $request->session()->put('success', 'Successfully updated item!');
            $item_to_filter = $request->get("description".$value);
            $item_to_filter = $request->get("description".$value);
        }

        return $item_to_filter;
    }

    public function ppmpProgramUpdate(Request $request){
        $item_to_filter = "";
        $encoded_by = Auth::user()->username;
        $division_id = Auth::user()->division;
        $section_id = Auth::user()->section;

        if(session::get('admin')) {
            $section_id = session::get('section_id');
        }
        //
        $yearly_reference = Session::get('yearly_reference');   //get yearly_ref
        $ppmp_status = Session::get('ppmp_status');  //get ppmp_status

        foreach($request->get('item_id') as $value) {
            $unique_id = $request->get('unique_id'.$value);
            $expense_id = $request->get('expense_id'.$value);
            $tranche = $request->get('tranche'.$value);
            $description = $request->get('description'.$value);
            $unit_measurement = $request->get('unit_measurement'.$value);
            $program_id = $request->get('program_id'.$value);
            $jan = $request->get('jan'.$value);
            $feb = $request->get('feb'.$value);
            $mar = $request->get('mar'.$value);
            $apr = $request->get('apr'.$value);
            $may = $request->get('may'.$value);
            $jun = $request->get('jun'.$value);
            $jul = $request->get('jul'.$value);
            $aug = $request->get('aug'.$value);
            $sep = $request->get('sep'.$value);
            $oct = $request->get('oct'.$value);
            $nov = $request->get('nov'.$value);
            $dece = $request->get('dece'.$value);
            $unit_cost = $request->get('unit_cost'.$value);
            $mode_procurement = $request->get('mode_procurement'.$value);
            //
            $yearly_ref = $yearly_reference;
            $ppmp_stat = $ppmp_status;

            $item = Item::where("description","=",$description)
                ->where("expense_id","=",$expense_id)
                ->where("tranche","=",$tranche)
                ->first();

            if(!$item) {
                $item = new Item();
                $item->expense_id = $expense_id;
                $item->userid = $encoded_by;
                $item->division = $division_id;
                $item->section = $section_id;
                $item->tranche = $tranche;
                $item->description = $description;
                $item->ppmp_status = $ppmp_stat;
                $item->yearly_ref_id = $yearly_ref;
                $item->program_id = $program_id;
                $item->save();
            }

            //if mao siya ang item

            $item_daily = ItemDaily::
            where(function($q) use($value,$unique_id){
                $q->where("item_id",$value)
                    ->orWhere("unique_id",$unique_id);
            })
                ->where("expense_id",$expense_id)
                ->where("userid",$encoded_by)
                ->where("division_id",$division_id)
                ->where("section_id",$section_id)
                ->where("tranche",$tranche)
                ->where("description",$description)
                ->where("unit_cost",$unit_cost)
                ->where("mode_procurement",$mode_procurement)
                ->where("jan",$jan)
                ->where("feb",$feb)
                ->where("mar",$mar)
                ->where("apr",$apr)
                ->where("may",$may)
                ->where("jun",$jun)
                ->where("jul",$jul)
                ->where("aug",$aug)
                ->where("sep",$sep)
                ->where("oct",$oct)
                ->where("nov",$nov)
                ->where("dece",$dece)
                ->where("yearly_ref_id",$yearly_ref)
                ->where("ppmp_status",$ppmp_stat)
                //->where("program_id",$program_id)
                ->orderBy("id","desc")
                ->first();

            $item_id = $item->id;

            if(!$item_daily)
            {
                $item_daily = new ItemDaily();
                $item_daily->item_id = $item_id;
                $item_daily->unique_id = $unique_id;
                $item_daily->expense_id = $expense_id;
                $item_daily->userid = $encoded_by;
                $item_daily->division_id = $division_id;
                $item_daily->section_id = $section_id;
                $item_daily->tranche = $tranche;
                $item_daily->description = $description;
                $item_daily->unit_measurement = $unit_measurement;
                $item_daily->unit_cost = $unit_cost;
                $item_daily->mode_procurement = $mode_procurement;
                $item_daily->jan = $jan;
                $item_daily->feb = $feb;
                $item_daily->mar = $mar;
                $item_daily->apr = $apr;
                $item_daily->may = $may;
                $item_daily->jun = $jun;
                $item_daily->jul = $jul;
                $item_daily->aug = $aug;
                $item_daily->sep = $sep;
                $item_daily->oct = $oct;
                $item_daily->nov = $nov;
                $item_daily->dece = $dece;
                $item_daily->yearly_ref_id = $yearly_ref;
                $item_daily->ppmp_status = $ppmp_stat;
                $item_daily->program_id = $program_id;
                $item_daily->save();
            }

            $request->session()->put('success', 'Successfully updated item!');
            $item_to_filter = $request->get("description".$value);
            $item_to_filter = $request->get("description".$value);
        }

        return $item_to_filter;
    }

    public static function MyPagination($expense_title,$items,$request){
        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        // Create a new Laravel collection from the array data
        $itemCollection = collect($items);

        // Define how many items we want to be visible in each page
        $perPage = 50;

        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

        // set url path for generated links
        $paginatedItems->setPath($request->url());

        return $paginatedItems;
    }


    public function ppmpDelete(Request $request){
        /*$item = Item::find($request->id);
        if($item){
            $item->delete();
            return 'Successfully Delete!';
        } else
            return 'No item found!';*/

        if($request->unique_id){
            ItemDaily::where("unique_id",$request->unique_id)->update([
                "status" => 'deactivate'
            ]);
        }
        elseif($request->item_id){
            ItemDaily::where("id",$request->item_id)->update([
                "status" => 'deactivate'
            ]);
        }

        return 'Successfully Delete!';
    }

    public function ppmpSearch($keyword){
        $item = Item::where('division','=',Auth::user()->division)
            ->where("description","like","%$keyword%")
            ->where(function($q){
                $q->where('item.status','=','approve')
                    ->orWhere('item.status','=','fixed');
            })
            ->pluck('expense_id')->toArray();

        $expenses = Expense::where('division','=',Auth::user()->division)->whereIn("id",$item)->get();

        $all_item = Item::where(function($q){
            $q->where('item.status','=','approve')
                ->orWhere('item.status','=','fixed');
        })->get();

        $encoded = Item::where('userid','=',Auth::user()->username)->where('status','=','approve')->orWhere('status','=','pending')->count();

        $mode_procurement = ModeProcurement::get();
        $end_user_name = strtoupper(Auth::user()->lname.', '.Auth::user()->fname);
        $end_user_designation = Designation::find(Auth::user()->designation)->description;
        $head = Section::select(DB::raw("upper(concat(users.lname,', ',users.fname)) as head_name"),'designation.description as designation')
            ->LeftJoin('dts.users','users.id','=','section.head')
            ->LeftJoin('dts.designation','designation.id','=','users.designation')
            ->where('section.id','=',Auth::user()->section)
            ->first();

        return view('ppmp.ppmp_search',[
            "expenses" => $expenses,
            "all_item" => $all_item,
            "encoded" => $encoded,
            "mode_procurement" => $mode_procurement,
            "end_user_name" => $end_user_name,
            "end_user_designation" => $end_user_designation,
            "head" => $head,
            "keyword" => $keyword
        ]);
    }

    public function ConsolidateSection(){
        $expenses = Expense::where('division','=',Auth::user()->division)->get();
        return view('consolidate.consolidate_section',[
            "expenses" => $expenses
        ]);
    }

    public static function AppendItem($item){
        $division = Qty::
                    select("division.description as division",
                                    "qty.division as division_id",
                                    "qty.section as section_id",
                                    "qty.created_at",
                                    "qty.item_id",
                                    "qty.unique_id"
                            )
                    ->where("qty.item_id","=",$item->id)
                    ->orWhere("qty.unique_id","=",$item->unique_id)
                    ->join('dts.division',"division.id","=","qty.division")
                    ->groupBy("qty.division")
                    ->get();

        return view('consolidate.item_append',[
            "item" => $item,
            "item_id" => $item->id,
            "division" => $division
        ]);
    }


    public function migratingItem(){
        $items = Item::whereBetween("id",["1411","1482"])->get();

        foreach($items as $item){
            ItemDaily::find($item->dece)->update([
               "item_id" => $item->id
            ]);
        }

        return "Successfully Updated!";
    }
}
