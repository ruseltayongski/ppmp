<?php

namespace App\Http\Controllers;

use App\DtsUser;
use App\Item;
use App\PisUser;
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

class PpmpController extends Controller
{
    public function index($expense_id,Request $request){
        $keyword = "";
        $item_to_filter = "";
        if($request->isMethod('post')){
            if($request->item_save){ //if ang button ge saved
                $item_to_filter = $this->ppmpUpdate($request);
            }
            $keyword = $request->item_search;
            if($keyword){
                $item = Item::where('division','=',Auth::user()->division)
                    ->where("description","like","%$keyword%")
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
                $expenses = Expense::where('division','=',Auth::user()->division)->whereIn("id",$item)->get();
            } else {
                $expenses = Expense::where('division','=',Auth::user()->division)->where("id","=",$expense_id)->get();
            }

        } else {
            $expenses = Expense::where('division','=',Auth::user()->division)->where("id","=",$expense_id)->get();
        }

        $all_item = Item::where(function($q){
            $q->where('item.status','=','approve')
                ->orWhere('item.status','=','fixed');
        })->get();
        $encoded = Item::where('userid','=',Auth::user()->username)->where(function($q){
            $q->where('item.status','=','approve')
                ->orWhere('item.status','=','fixed');
        })->count();

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
            "item_search" => $keyword,
            "expense_id" => $expense_id,
            "request" => $request
        ]);
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

    public function ppmpUpdate(Request $request){
        $item_to_filter = "";
        foreach($request->get('item_id') as $value){
            $qty_all = $request->get('jan'.$value)+
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
            $estimated_budget = $request->get('unit_cost'.$value) * $qty_all;
            if(
                $request->get('jan'.$value) != '' ||
                $request->get('feb'.$value) != '' ||
                $request->get('mar'.$value) != '' ||
                $request->get('apr'.$value) != '' ||
                $request->get('may'.$value) != '' ||
                $request->get('jun'.$value) != '' ||
                $request->get('jul'.$value) != '' ||
                $request->get('aug'.$value) != '' ||
                $request->get('sep'.$value) != '' ||
                $request->get('oct'.$value) != '' ||
                $request->get('nov'.$value) != '' ||
                $request->get('dec'.$value)
                )
            {
                $unique_id = $request->get('qty_unique_id'.$value);
                if(
                    $qty =  Qty::where(function($q) use ($value,$unique_id){
                                $q->where('qty.item_id','=',$value)
                                    ->orWhere('qty.unique_id','=',$unique_id);
                                })
                            ->where('created_by','=',Auth::user()->username)
                            ->where('section','=',Auth::user()->section)
                            ->where('division','=',Auth::user()->division)
                            ->first()
                ){
                    $qty->item_id = $value;
                    $qty->jan = $request->get('jan'.$value);
                    $qty->feb = $request->get('feb'.$value);
                    $qty->mar = $request->get('mar'.$value);
                    $qty->apr = $request->get('apr'.$value);
                    $qty->may = $request->get('may'.$value);
                    $qty->jun = $request->get('jun'.$value);
                    $qty->jul = $request->get('jul'.$value);
                    $qty->aug = $request->get('aug'.$value);
                    $qty->sep = $request->get('sep'.$value);
                    $qty->oct = $request->get('oct'.$value);
                    $qty->nov = $request->get('nov'.$value);
                    $qty->dec = $request->get('dec'.$value);
                    $qty->save();
                } else {
                    //ADD NEW
                    $qty = new Qty();
                    $qty->item_id = $value;
                    $qty->unique_id = $value;
                    $qty->created_by = Auth::user()->username;
                    $qty->division = Auth::user()->division;
                    $qty->section = Auth::user()->section;
                    $qty->jan = $request->get('jan'.$value);
                    $qty->feb = $request->get('feb'.$value);
                    $qty->mar = $request->get('mar'.$value);
                    $qty->apr = $request->get('apr'.$value);
                    $qty->may = $request->get('may'.$value);
                    $qty->jun = $request->get('jun'.$value);
                    $qty->jul = $request->get('jul'.$value);
                    $qty->aug = $request->get('aug'.$value);
                    $qty->sep = $request->get('sep'.$value);
                    $qty->oct = $request->get('oct'.$value);
                    $qty->nov = $request->get('nov'.$value);
                    $qty->dec = $request->get('dec'.$value);
                    $qty->save();
                }
            }

            if($item = Item::where("id","=",$value)
                ->orWhere("unique_id","=",$value)
                ->first()){
                $item->unique_id = $value;
                $item->userid = $request->get('userid'.$value);
                $item->division = Auth::user()->division;
                $item->section = Auth::user()->section;
                $item->expense_id = $request->get('expense_id'.$value);
                $item->tranche = $request->get('tranche'.$value);
                $item->description = $request->get('description'.$value);
                $item->unit_measurement = $request->get('unit_measurement'.$value);
                $item->qty = $request->get('qty'.$value);
                $item->unit_cost = $request->get('unit_cost'.$value);
                $item->estimated_budget = $estimated_budget;
                $item->save();
            } else {
                $item = new Item();
                $item->unique_id = $value;
                $item->userid = $request->get('userid'.$value);
                $item->division = Auth::user()->division;
                $item->section = Auth::user()->section;
                $item->expense_id = $request->get('expense_id'.$value);
                $item->tranche = $request->get('tranche'.$value);
                $item->description = $request->get('description'.$value);
                $item->unit_measurement = $request->get('unit_measurement'.$value);
                $item->qty = $request->get('qty'.$value);
                $item->unit_cost = $request->get('unit_cost'.$value);
                $item->estimated_budget = $estimated_budget;
                $item->status = 'approve';
                $item->save();
            }

            $request->session()->put('success', 'Successfully updated item!');
            $item_to_filter = $request->get("description".$value);

        }
        //return Redirect::back()->with('success', 'Successfully updated item!');

        return $item_to_filter;
    }

    public function ppmpDelete(Request $request){
        $item = Item::find($request->id);
        if($item){
            $item->status = 'deactivate';
            $item->save();
            return 'Successfully Delete!';
        } else {
            return 'No item found!';
        }
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

}
