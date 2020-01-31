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
use App\CreatedLogs;

class PpmpController extends Controller
{
    public function index($expense_id,Request $request){
        $created_by = Auth::user()->username;
        $section = Auth::user()->section;
        $division = Auth::user()->division;
        $keyword = "";
        $item_to_filter = "NO_DATA"; //TEMP NO DATA
        if($request->isMethod('post')){
            if($request->item_save){ //if ang button ge saved
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
                    $item = Item::where('division','=',$division)
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

        $all_item = Item::where(function($q){
            $q->where('item.status','=','approve')
                ->orWhere('item.status','=','fixed');
        })->get();
        $encoded = Item::where('userid','=',$created_by)->where(function($q){
            $q->where('item.status','=','approve')
                ->orWhere('item.status','=','fixed');
        })->count();

        $mode_procurement = ModeProcurement::get();
        $end_user_name = strtoupper(Auth::user()->lname.', '.Auth::user()->fname);
        $end_user_designation = Designation::find(Auth::user()->designation)->description;
        $head = Division::select(DB::raw("upper(concat(users.lname,', ',users.fname)) as head_name"),'designation.description as designation')
            ->LeftJoin('dts.users','users.id','=','division.head')
            ->LeftJoin('dts.designation','designation.id','=','users.designation')
            ->where('division.id','=',$division)
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
        $created_by = Auth::user()->username;
        $section = Auth::user()->section;
        $division = Auth::user()->division;
        $now = date('Y-m-d');

        $qty_query_add_ok = false;
        $qty_query_add = "INSERT INTO ppmpv2.qty(item_id,unique_id,created_by,division,section,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,created_at) VALUES";

        foreach($request->get('item_id') as $value){

            $jan=$request->get('jan'.$value);
            $feb=$request->get('feb'.$value);
            $mar=$request->get('mar'.$value);
            $apr=$request->get('apr'.$value);
            $may=$request->get('may'.$value);
            $jun=$request->get('jun'.$value);
            $jul=$request->get('jul'.$value);
            $aug=$request->get('aug'.$value);
            $sep=$request->get('sep'.$value);
            $oct=$request->get('oct'.$value);
            $nov=$request->get('nov'.$value);
            $dece=$request->get('dece'.$value);
            $qty_all = $jan+$feb+$mar+$apr+$may+$jun+$jul+$aug+$sep+$oct+$nov+$dece;
            $estimated_budget = $request->get('unit_cost'.$value) * $qty_all;

            if($item = Item::where("id","=",$value)
                    ->first()){
                $item->unique_id = $value;
                $item->userid = $request->get('userid'.$value);
                $item->division = $division;
                $item->section = $section;
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
                $item->division = $division;
                $item->section = $section;
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

            if(
                $jan != '' ||
                $feb != '' ||
                $mar != '' ||
                $apr != '' ||
                $may != '' ||
                $jun != '' ||
                $jul != '' ||
                $aug != '' ||
                $sep != '' ||
                $oct != '' ||
                $nov != '' ||
                $dece != ''
                )
            {
                $unique_id = $request->get('qty_unique_id'.$value);
                $item_id = $item->id;
                if(
                    $qty = Qty::
                                where('item_id','=',$item_id)
                                ->where('section','=',$section)
                                ->where('division','=',$division)
                                ->first()

                ){ //update
                    $created_logs = new CreatedLogs();
                    $created_logs->item_id = $item_id;
                    $created_logs->created_by = $created_by;
                    $created_logs->description = "UPDATE";
                    $created_logs->save();

                    $qty->item_id = $item_id;
                    $qty->created_by = $created_by;
                    $qty->division = $division;
                    $qty->section = $section;
                    $qty->jan = $jan;
                    $qty->feb = $feb;
                    $qty->mar = $mar;
                    $qty->apr = $apr;
                    $qty->may = $may;
                    $qty->jun = $jun;
                    $qty->jul = $jul;
                    $qty->aug = $aug;
                    $qty->sep = $sep;
                    $qty->oct = $oct;
                    $qty->nov = $nov;
                    $qty->dece = $dece;
                    $qty->updated_at = $now;
                    $qty->save();


                } else {
                    //ADD NEW
                    $created_logs = new CreatedLogs();
                    $created_logs->item_id = $item_id;
                    $created_logs->unique_id = $value;
                    $created_logs->created_by = $created_by;
                    $created_logs->description = "ADD";
                    $created_logs->save();

                    $qty_query_add .= "(
                                          '$item_id',
                                          '$unique_id',
                                          '$created_by',
                                          '$division',
                                          '$section',
                                          '$jan',
                                          '$feb',
                                          '$mar',
                                          '$apr',
                                          '$may',
                                          '$jun',
                                          '$jul',
                                          '$aug',
                                          '$sep',
                                          '$oct',
                                          '$nov',
                                          '$dece',
                                          '$now'
                                      ),";

                    $qty_query_add_ok = true;

                }

            } //end check if month is not empty


            $request->session()->put('success', 'Successfully updated item!');
            $item_to_filter = $request->get("description".$value);


        }

        if($qty_query_add_ok)
            \DB::select(substr_replace($qty_query_add ,"",-1));

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
