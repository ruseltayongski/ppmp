<?php

namespace App\Http\Controllers;

use App\DtsUser;
use App\Item;
use App\PisUser;
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

class PpmpController extends Controller
{
    public function index($status,$expense_id){
        $expenses = Expense::where('division','=',Auth::user()->division)->where("id","=",$expense_id)->paginate(1);

        if($status == 'approve_pending'){
            $all_item = Item::where('status','=','approve')
                        ->orWhere('status','=','pending')->get();
            $encoded = Item::where('userid','=',Auth::user()->username)
                        ->where(function($q){
                            $q->where('item.status','=','approve')
                                ->orWhere('item.status','=','pending');
                        })
                        ->count();
        } else {
            $all_item = Item::where('status','=',$status)->get();
            $encoded = Item::where('userid','=',Auth::user()->username)->where('status','=',$status)->count();
        }

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
            "encoded" => $encoded,
            "mode_procurement" => $mode_procurement,
            "end_user_name" => $end_user_name,
            "end_user_designation" => $end_user_designation,
            "head" => $head,
            "status" => $status
        ]);
    }

    public function ppmpUpdate(Request $request){
        $request->get('item_id');

        foreach($request->get('item_id') as $value){
            $qty = $request->get('jan'.$value)+
                $request->get('feb'.$value)+
                $request->get('mar'.$value)+
                $request->get('apr'.$value)+
                $request->get('may'.$value)+
                $request->get('jun'.$value)+
                $request->get('jul'.$value)+
                $request->get('aug'.$value)+
                $request->get('sep'.$value)+
                $request->get('oct'.$value)+
                $request->get('nov'.$value)+
                $request->get('dec'.$value);
            $estimated_budget = $request->get('unit_cost'.$value) * $qty;
            if($request->get('status'.$value)){
                $status = 'approve';
            } else {
                $status = 'pending';
            }
            Item::updateOrCreate(
                ['id'=>$value],
                [
                    'userid' => $request->get('userid'.$value),
                    'division' => Auth::user()->division,
                    'section' => Auth::user()->section,
                    'expense_id' => $request->get('expense_id'.$value),
                    'tranche' => $request->get('tranche'.$value),
                    'description' => $request->get('description'.$value),
                    'unit_measurement' => $request->get('unit_measurement'.$value),
                    'qty' => $qty,
                    'unit_cost' => $request->get('unit_cost'.$value),
                    'estimated_budget' => $estimated_budget,
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
        $item = Item::find($request->id);
        if($item){
            $item->delete();
            return 'Successfully Delete!';
        } else {
            return 'No item found!';
        }
    }

    public function ppmpSearch($status,$keyword){
        $item = Item::where('division','=',Auth::user()->division)
            ->where("description","like","%$keyword%")
            ->where(function($q){
                $q->where('item.status','=','approve')
                    ->orWhere('item.status','=','pending');
            })
            ->pluck('expense_id')->toArray();

        $expenses = Expense::where('division','=',Auth::user()->division)->whereIn("id",$item)->get();

        $all_item = Item::where('status','=','approve')->orWhere('status','=','pending')->get();
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
            "status" => $status,
            "keyword" => $keyword
        ]);
    }

}
