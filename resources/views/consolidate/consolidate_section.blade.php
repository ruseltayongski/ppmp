<?php
use App\Item;
function displayHeader($title){
    return "<tr>
                <td>
                    <strong>
                        ".$title."
                    </strong>
                </td>
            </tr>";
}
function displayItem($item){
    $item_append = \App\Http\Controllers\PpmpController::AppendItem($item);
    return "<tr class='$item->id'>
                <td>
                    $item_append
                </td>
            </tr>";
}
?>
@extends('layouts.app')

@section('content')
    <title>consolidate|section</title>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Consolidate by section</h3> <br><label for="">Legend:  <span class='badge bg-blue'>Unit</span> <span class='badge bg-yellow'>Price</span> <span class='badge bg-green'>QTY</span></label>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-striped">
                <tr>
                    <th>Item Description/General Specification</th>
                </tr>
                <?php
                    $grand_total = 0;
                    foreach($expenses as $expense)
                    {
                        $count_first = 0;
                        $count_second = 0;
                        $alphabet = range('A', 'Z');
                        $expense_code = json_decode($expense->code,true);
                        if(isset($expense_code)){
                            foreach($expense_code as $display_first => $first){
                                foreach($first as $display_second){
                                    $count_second++;
                                    if(isset($flag[$expense->description])){
                                        $title_header_expense = "";
                                    } else {
                                        $title_header_expense = $expense->description;
                                        $flag[$expense->description] = true;
                                    }
                                    if(isset($flag[$display_first])){
                                        $title_header_first = "";
                                    } else {
                                        $title_header_first = "<div style='padding-left: 5%'>".$display_first."</div>";
                                        $flag[$display_first] = true;
                                    }
                                    if(isset($flag[$display_second])){
                                        $title_header_second = "";
                                    } else {
                                        $title_header_second = "<div style='padding-left: 10%'>".$display_second."</div>";
                                        $flag[$display_second] = true;
                                    }
                                    echo displayHeader($title_header_expense.$title_header_first.$title_header_second);
                                    $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;

                                    $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by_name"),"mode_procurement.description as mode_pro_desc",
                                        "qty.unique_id as qty_unique_id",
                                        "qty.jan as qty_jan",
                                        "qty.feb as qty_feb",
                                        "qty.mar as qty_mar",
                                        "qty.apr as qty_apr",
                                        "qty.may as qty_may",
                                        "qty.jun as qty_jun",
                                        "qty.jul as qty_jul",
                                        "qty.aug as qty_aug",
                                        "qty.sep as qty_sep",
                                        "qty.oct as qty_oct",
                                        "qty.nov as qty_nov",
                                        "qty.dec as qty_dec")
                                        ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                        ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                        ->leftJoin('qty',function($join){
                                            $join->on('qty.created_by','=',DB::raw("'".Auth::user()->username."'"));
                                            $join->on(function($join2){
                                                $join2->on('qty.item_id','=','item.id');
                                                $join2->orOn('qty.unique_id','=','item.unique_id');
                                            });
                                        })
                                        ->where('item.expense_id','=',$expense->id)
                                        ->where('item.tranche','=',$tranche)
                                        ->where(function($q){
                                            $q->where('item.status','=','approve')
                                                ->orWhere('item.status','=','fixed');
                                        })
                                        ->where('item.division','=',Auth::user()->division)
                                        ->get();

                                    echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second)."'>";
                                    foreach($items as $item){
                                        echo displayItem($item);
                                        $qty = $item->qty_jan+$item->qty_feb+$item->qty_mar+$item->qty_apr+$item->qty_may+$item->qty_jun+$item->qty_jul+$item->qty_aug+$item->qty_sep+$item->qty_oct+$item->qty_nov+$item->qty_dec;
                                        $estimated_budget = $item->unit_cost * $qty;
                                        $grand_total += $estimated_budget;
                                    }
                                    echo "</tbody>";
                                } //display if first have value
                                if(!isset($flag[$display_first])){
                                    if(isset($flag[$expense->description])){
                                        $title_header_expense = "";
                                    } else {
                                        $title_header_expense = $expense->description;
                                        $flag[$expense->description] = true;
                                    }
                                    if(isset($flag[$display_first])){
                                        $title_header_first = "";
                                    } else {
                                        $title_header_first = "<div style='padding-left: 5%'>".$display_first."</div>";
                                        $flag[$display_first] = true;
                                    }
                                    $tranche = $expense->id."-".$alphabet[$count_first];
                                    echo displayHeader($title_header_expense.$title_header_first);

                                    $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by_name"),"mode_procurement.description as mode_pro_desc",
                                        "qty.unique_id as qty_unique_id",
                                        "qty.jan as qty_jan",
                                        "qty.feb as qty_feb",
                                        "qty.mar as qty_mar",
                                        "qty.apr as qty_apr",
                                        "qty.may as qty_may",
                                        "qty.jun as qty_jun",
                                        "qty.jul as qty_jul",
                                        "qty.aug as qty_aug",
                                        "qty.sep as qty_sep",
                                        "qty.oct as qty_oct",
                                        "qty.nov as qty_nov",
                                        "qty.dec as qty_dec")
                                        ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                        ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                        ->leftJoin('qty',function($join){
                                            $join->on('qty.created_by','=',DB::raw("'".Auth::user()->username."'"));
                                            $join->on(function($join2){
                                                $join2->on('qty.item_id','=','item.id');
                                                $join2->orOn('qty.unique_id','=','item.unique_id');
                                            });
                                        })
                                        ->where('item.expense_id','=',$expense->id)
                                        ->where('item.tranche','=',$tranche)
                                        ->where(function($q){
                                            $q->where('item.status','=','approve')
                                                ->orWhere('item.status','=','fixed');
                                        })
                                        ->where('item.division','=',Auth::user()->division)
                                        ->get();

                                    echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first)."'>";
                                    foreach($items as $item){
                                        echo displayItem($item);
                                    }
                                    echo "</tbody>";
                                } // display if first is null
                                $count_first++;
                            }
                        } else {
                            echo displayHeader($expense->description); //display expense if no value from first

                            $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by_name"),"mode_procurement.description as mode_pro_desc",
                                "qty.unique_id as qty_unique_id",
                                "qty.jan as qty_jan",
                                "qty.feb as qty_feb",
                                "qty.mar as qty_mar",
                                "qty.apr as qty_apr",
                                "qty.may as qty_may",
                                "qty.jun as qty_jun",
                                "qty.jul as qty_jul",
                                "qty.aug as qty_aug",
                                "qty.sep as qty_sep",
                                "qty.oct as qty_oct",
                                "qty.nov as qty_nov",
                                "qty.dec as qty_dec")
                                ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                ->leftJoin('qty',function($join){
                                    $join->on('qty.created_by','=',DB::raw("'".Auth::user()->username."'"));
                                    $join->on(function($join2){
                                        $join2->on('qty.item_id','=','item.id');
                                        $join2->orOn('qty.unique_id','=','item.unique_id');
                                    });
                                })
                                ->where('item.expense_id','=',$expense->id)
                                ->where(function($q){
                                    $q->where('item.status','=','approve')
                                        ->orWhere('item.status','=','fixed');
                                })
                                ->where('item.division','=',Auth::user()->division)
                                ->get();

                            echo "<tbody id='".str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description)."'>";
                            foreach($items as $item){
                                echo displayItem($item);
                            }
                            echo "</tbody>";
                        }
                    }
                ?>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        jQuery.ready();
    </script>
@endsection


