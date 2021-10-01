<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Item;
use App\ItemDaily;
use App\Realignment;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RealignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division_id = Auth::user()->division;

        $expenses = Expense::all();

        return view('user.realignment',[
            "expenses" => $expenses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function realignment(Request $request)
    {

        $division_id = Auth::user()->division;
        $user = Auth::user()->username;
        $section = Auth::user()->section;

        if (Auth::user()->user_priv) {

            $realignment = New Realignment([
                'expense_from' => $request->input('select_from'),
                'expense_to' => $request->input('select_to'),
                'amount' => $request->input('amount'),
                'userid' => $user,
                'division_id' => $division_id,
                'section_id' => $section
            ]);


            $realignment->save();
            //another way hehe
            $last_id = $realignment->id;
            $check = Realignment::find($last_id);

            $expense_from = $check->expense_from;
            $expense_to = $check->expense_to;
            $amount = $check->amount;


            $arr = [$expense_from, $expense_to];

            if ($division_id == "4")

                for ($key = 0; $key <= 1; $key++) {
                    if ($key == 0) {
                        //from
                        $expense_f = Expense::find($arr[$key]);
                        $from = $expense_f->chief_lhsd;
                        if ($from > 0) {
                            $ans = $from - $amount;
                            $expense_f->chief_lhsd = $ans;
                            $expense_f->save();
                        } else
                            return redirect('user/realignment')->with('error', 'Transaction is not available, the chosen budget line dont have enough budget');
                        $key = +1;
                    }
                        //to
                        $expense_f = Expense::find($arr[$key]);
                        if ($from != 0) {
                            $to = $expense_f->chief_lhsd;
                            $ans = $to + $amount;
                            $expense_f->chief_lhsd = $ans;
                            $expense_f->save();
                        } else
                        return redirect('user/realignment')->with('error', 'Transaction is not available, the chosen budget line dont have enough budget');

                }

            else
                for ($key = 0; $key <= 1; $key++) {
                    if ($key == 0) {
                        //from
                        $expense_f = Expense::find($arr[$key]);
                        $from = $expense_f->chief_msd;
                        if ($from > 0) {
                            $ans = $from - $amount;
                            $expense_f->chief_msd = $ans;
                            $expense_f->save();
                        } else
                            return redirect('user/realignment')->with('error', 'Transaction is not available, the chosen budget line dont have enough budget');
                        $key = +1;
                    }
                    //to
                    $expense_f = Expense::find($arr[$key]);
                    if ($from != 0) {
                        $to = $expense_f->chief_msd;
                        $ans = $to + $amount;
                        $expense_f->chief_msd = $ans;
                        $expense_f->save();
                    } else
                        return redirect('user/realignment')->with('error', 'Transaction is not available, the chosen budget line dont have enough budget');
                }

                    if($request->session()->has('success'))
////
                    $check = Realignment::find($last_id);
                    $check->status = "1";
                    $check->save();

            return redirect('user/realignment')->with('success', 'Successfully Realigned!');
        }
        return redirect('user/realignment')->with('error', 'Not available pls contact IT Administrator');
    }


    public function viewRealignment (){

        $realignment = Realignment::where('status','=',1)->get();

        if(Auth::user()->user_priv)
        return view('user/realignment_view',[
            "realignments" => $realignment
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function displaySection($item)
    {

        $itemDaily = ItemDaily::all();
        $section = Section::all();
        $division_id = Auth::user()->division;

        $items = \DB::connection('mysql')->select("call get_body_section('$item->id','$section->id')");
        foreach ($items as $item) {

            if ($item) {
                $item->qty = $itemDaily->qty;
                $item->jan = $itemDaily->jan;
                $item->feb = $itemDaily->feb;
                $item->apr = $itemDaily->apr;
                $item->may = $itemDaily->may;
                $item->jun = $itemDaily->jun;
                $item->jul = $itemDaily->jul;
                $item->aug = $itemDaily->aug;
                $item->mar = $itemDaily->mar;
                $item->sep = $itemDaily->sep;
                $item->oct = $itemDaily->oct;
                $item->nov = $itemDaily->nov;
                $item->dece = $itemDaily->dece;

            }

            $item->qty = $item->jan+$item->feb+$item->mar+$item->apr+$item->may+$item->jun+$item->jul+$item->aug+$item->sep+$item->oct+$item->nov+$item->dece;
            $item->estimated_budget = (int)$item->qty * str_replace(',', '',(int)$item->unit_cost);
        }

    }


}
