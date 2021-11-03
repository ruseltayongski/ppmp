<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Item;
use Illuminate\Support\Facades\DB;
use App\Division;
use App\User;
use App\Program;
use App\Section;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('AdminPriv');
    }

    public function home()
    {
        $information = PisUser::select("personal_information.*","section.description as section")->leftJoin("dts.section","section.id","=","personal_information.section_id")->where("userid","=",Auth::user()->username)->first();

        $item_qty = Item::select(
                        \DB::raw("SUM(COALESCE(qty.jan,0)) as jan"),
                        \DB::raw("SUM(COALESCE(qty.feb,0)) as feb"),
                        \DB::raw("SUM(COALESCE(qty.mar,0)) as mar"),
                        \DB::raw("SUM(COALESCE(qty.apr,0)) as apr"),
                        \DB::raw("SUM(COALESCE(qty.may,0)) as may"),
                        \DB::raw("SUM(COALESCE(qty.jun,0)) as jun"),
                        \DB::raw("SUM(COALESCE(qty.jul,0)) as jul"),
                        \DB::raw("SUM(COALESCE(qty.aug,0)) as aug"),
                        \DB::raw("SUM(COALESCE(qty.sep,0)) as sep"),
                        \DB::raw("SUM(COALESCE(qty.oct,0)) as oct"),
                        \DB::raw("SUM(COALESCE(qty.nov,0)) as nov"),
                        \DB::raw("SUM(COALESCE(qty.dece,0)) as dece")
                    )
                    ->join('ppmpv2.qty',function($join){
                        $join->on("qty.item_id","=","item.id");
                        $join->on("qty.unique_id","=","item.unique_id");
                    })
                    ->first();

        return view('admin.home',[
            "information" => $information,
            "item_qty" => $item_qty
        ]);
    }

    public function resetSection(){

    }

    /****************************************************************************/
    //                  PROGRAM CRUD FOR ADMIN                                  //
    /****************************************************************************/
    public function viewProgram(){
        $div_id = Auth::user()->division;
        $div_desc = Division::find($div_id)->description;
        $programs = Program::Where('division_id', $div_id)->OrderBy('acronym', 'asc')->get();
        $sections = Section::Where('division', $div_id)->get();
        return view('programs.program', [
            "programs" => $programs,
            "div_id" => $div_id,
            "div_desc" => $div_desc,
            "sections" => $sections
        ]);
    }

    public function addProgram(Request $request){
        if(Auth::user()->user_priv){
            $prog = new Program();
            $prog->description = $request->description;
            $prog->acronym = $request->acronym;
            $prog->division_id = $request->division_id;
            $prog->section_id = $request->section_id;
            $prog->budget_allotment = $request->budget;
            $prog->fund_source = $request->fund_source;
            $prog->expense_id = $request->expense_id;
            $prog->save();
        }
        return Redirect::back()->with('program_notif', 'Program successfully added!');
    }

    public function editProgram(Request $request){
        $div_id = Auth::user()->division;
        $program = Program::find($request->program_id);        
        $div_desc = Division::find($div_id)->description;
        $sections = Section::Where('division', $div_id)->get();
        return view('programs.update',[
            "program" => $program,
            "div_id" => $div_id,
            "div_desc" => $div_desc,
            "sections" => $sections
        ]);
    }

    public function updateProgram(Request $request){
        if(Auth::user()->user_priv){
            $updated = Program::where('id', $request->program_id)
                        ->update(['description' => $request->description,
                                  'acronym' => $request->acronym,
                                  'section_id' => $request->section_id,
                                  'budget_allotment' => $request->budget,
                                  'fund_source' => $request->fund_source,
                                  'expense_id' => $request->expense_id]);
        }
        return Redirect::back()->with('program_notif', 'Program successfully updated!');
    }

    public function deleteProgram(Request $request){
        if(Auth::user()->user_priv){
            Program::where('id','=',$request->program_id_delete)->delete();
        }
        return Redirect::back()->with('program_notif', 'Program successfully deleted!');
    }

}
