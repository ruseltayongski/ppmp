<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Item;
use Illuminate\Support\Facades\DB;
use App\User;
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

}
