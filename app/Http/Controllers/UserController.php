<?php

namespace App\Http\Controllers;

use App\Division;
use App\Item;
use App\Section;
use Illuminate\Http\Request;
use App\PisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Charge;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserPriv');
    }

    public function home()
    {
        $information = PisUser::select("personal_information.*","section.description as section")->leftJoin("dts.section","section.id","=","personal_information.section_id")->where("userid","=",Auth::user()->username)->first();
        $item_qty = Item::select(
                        DB::raw("sum(item.jan) as jan"),
                        DB::raw("sum(item.feb) as feb"),
                        DB::raw("sum(item.mar) as mar"),
                        DB::raw("sum(item.apr) as apr"),
                        DB::raw("sum(item.may) as may"),
                        DB::raw("sum(item.jun) as jun"),
                        DB::raw("sum(item.jul) as jul"),
                        DB::raw("sum(item.aug) as aug"),
                        DB::raw("sum(item.sep) as sep"),
                        DB::raw("sum(item.oct) as oct"),
                        DB::raw("sum(item.nov) as nov"),
                        DB::raw("sum(item.dec) as dece"))
            ->where('division','=',Auth::user()->division)
            ->first();

        return view('user.home',[
            "information" => $information,
            "item_qty" => $item_qty
        ]);
    }
}
