<?php

namespace App\Http\Controllers;

use App\DtsUser;
use App\Item;
use App\ItemDaily;
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
use App\CreatedLogs;

class PpmpController extends Controller
{
    public function index($expense_id = null,Request $request){
        $keyword = "";
        $item_to_filter = "NO_DATA"; //TEMP NO DATA
        if($request->isMethod('post') || $request->item_id[0] ){
            if($request->item_save){ //if ang button ge saved
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
            "request" => $request
        ]);
    }

    public function ppmpUpdate(Request $request){
        $item_to_filter = "";
        $encoded_by = Auth::user()->username;
        $division_id = Auth::user()->division;
        $section_id = Auth::user()->section;

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


            /*if($tranche != "1-A-1" or $tranche != "1-A-2" or $tranche != "1-A-3" or $tranche == "1-B"){

            }*/
            $item = Item::where("description","=",$description)
                ->where("expense_id","=",$expense_id)
                ->where("tranche","=",$tranche)
                ->first();
            if(!$item){
                $item = new Item();
                $item->expense_id = $expense_id;
                $item->userid = $encoded_by;
                $item->division = $division_id;
                $item->section = $section_id;
                $item->tranche = $tranche;
                $item->description = $description;
                $item->status = 'fixed';
                $item->save();
            }



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
                $item_daily->save();
            }

            $request->session()->put('success', 'Successfully updated item!');
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

        ItemDaily::where("unique_id",$request->unique_id)->update([
            "status" => 'deactivate'
        ]);
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
