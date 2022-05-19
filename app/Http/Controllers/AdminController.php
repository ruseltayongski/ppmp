<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Item;
use Illuminate\Support\Facades\DB;
use App\Division;
use App\Expense;
use App\Program;
use App\Section;
use App\User;
use Illuminate\Support\Facades\Session;

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
        $programs = Program::OrderBy('acronym', 'asc')->paginate(20);
        $sections = Section::Where('division', $div_id)->get();
        $divisions = Division::OrderBy("description")->get();
        // $expense = Expense::OrderBy("description")->get();
        return view('programs.program', [
            "programs" => $programs,
            "div_id" => $div_id,
            "div_desc" => $div_desc,
            "sections" => $sections,
            "divisions" => $divisions
            // "expense" => $expense
        ]);
    }

    public function addProgram(Request $request){
        if(Auth::user()->user_priv){
            $prog = new Program();
            $prog->description = $request->description;
            $prog->acronym = $request->acronym;
            $prog->division_id = $request->division_id;
            $prog->section_id = $request->section_id;
            $prog->save();
        }
        return Redirect::action('AdminController@viewProgram')->with('program_notif', 'Program successfully added!');
    }

    public function editProgram(Request $request){
        $program = Program::find($request->program_id);
        $div_id = Auth::user()->division;
        $div_desc = Division::find($program->division_id)->description;
        $sections = Section::Where('division', $program->division_id)->get();
        return view('programs.update',[
            "program" => $program,
            "div_desc" => $div_desc,
            "div_id" => $div_id,
            "sections" => $sections
        ]);
    }

    public function updateProgram(Request $request){
        if(Auth::user()->user_priv){
            $updated = Program::where('id', $request->program_id)
                        ->update(['description' => $request->description,
                                  'acronym' => $request->acronym,
                                  'section_id' => $request->section_id]);
        }
        return Redirect::action('AdminController@viewProgram')->with('program_notif', 'Program successfully updated!');
    }

    public function deleteProgram(Request $request){
        if(Auth::user()->user_priv){
            Program::where('id','=',$request->program_id_delete)->delete();
        }
        return Redirect::action('AdminController@viewProgram')->with('program_notif', 'Program successfully deleted!');
    }

    public function searchProgram(Request $request){
        if(isset($request->keyword)){
            $keyword = $request->keyword;
            $programs = Program::where('description', 'like', '%'.$keyword.'%')
                            ->orWhere('acronym', 'like', '%'.$keyword.'%')->OrderBy('acronym', 'asc')->paginate(20)
                            ->appends(["keyword" => $request->keyword]);
        }else if(isset($request->div_id) && $request->div_id != 0){
            $div_id = $request->div_id;
            $programs = Program::where('division_id', $div_id)->OrderBy('acronym', 'asc')->paginate(20)
                            ->appends(["div_id" => $request->div_id]);
        }else{
            $programs = Program::OrderBy('acronym', 'asc')->paginate(20);
        }

        $div_id = Auth::user()->division;
        $div_desc = Division::find($div_id)->description;
        $sections = Section::Where('division', $div_id)->get();
        $divisions = Division::OrderBy("description")->get();
        // $expense = Expense::OrderBy("description")->get();
        return view('programs.program', [
            "programs" => $programs,
            "div_id" => $div_id,
            "div_desc" => $div_desc,
            "sections" => $sections,
            "divisions" => $divisions
            // "expense" => $expense
        ]);
    }

    //loginAs
    public function loginAs()
    {
        return view('admin.loginAs',[
            'title' => 'LOGIN AS'
        ]);
    }

    public function assignLogin(Request $req)
    {
        $user = Session::get('auth');

        $user->section = $req->section_id;
        $section = $user->section;

        Session::put('auth',$user);
        Session::put('admin',true);
        Session::put('section_id',$section);

        return redirect()->route('user', [
            'section' => $section
        ]);
    }

    public function returnToAdmin()
    {
        Session::forget('admin');
        $user = Session::get('auth');
        Session::put('auth',$user);
        print_r($user);
        return redirect()->route('admin');
    }
}
