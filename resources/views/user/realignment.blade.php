@extends('layouts.app')

@section('content')
    <title>PPMP|REALIGNMENT</title>

    <div class="box box-primary">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <table class="table table-striped" style="font-size: 7pt;">
                        {{--@if($division_id == "4")--}}

                        <tr>
                            <th>Item Description/General Specification</th>
                            <th>Unit<br>Issue</th>
                            <th>QTY</th>
                            <th>Unit Cost</th>
                            <th width="5%">Estimated Budget</th>
                            <th width="5%">Mode Procurement</th>
                            <th>January</th>
                            <th>February</th>
                            <th>March</th>
                            <th>April</th>
                            <th>May</th>
                            <th>June</th>
                            <th>July</th>
                            <th>August</th>
                            <th>September</th>
                            <th>October</th>
                            <th>November</th>
                            <th>December</th>
                            <th>Updated by:</th>
                        </tr>

           <?php

//                   $description = $item->description;
//                   $user = $item->userid;
//                   $unique = $item->unique_id;
//
//                   $unique_id = \App\ItemDaily::where('unique_id', $unique)->get();
//
//                   $item = json_decode($item->item_id,true)
                   $division = Auth::user()->division;
//
//
//                   $sections = \App\Section::where('division',"=",$division)->get();
//
//                   foreach ($sections as $section)
//                       $section = $section->id;
//
//                   $item_body = \DB::connection('mysql')->select("call get_body_section('$item','$section')")[0];
//
////                   $item_body->qty = $item_body->jan + $item_body->feb + $item_body->mar + $item_body->apr + $item_body->may + $item_body->jun + $item_body->jul + $item_body->aug + $item_body->sep + $item_body->oct + $item_body->nov + $item_body->dece;
////                   $estimated = ((int)$item_body->qty * str_replace(',', '', (float)$item_body->unit_cost));
//
//                   $qty= [];
//
//                   $qty = 0;
//                   if(isset($this->$qty[$section]))
//                      $qty = $this->$qty[$section];
//
//                   $qty = $item_body->jan + $item_body->feb + $item_body->mar + $item_body->apr + $item_body->may + $item_body->jun + $item_body->jul + $item_body->aug + $item_body->sep + $item_body->oct + $item_body->nov + $item_body->dece;
//                   $estimated = ((int)$qty * str_replace(',', '', (float)$item_body->unit_cost));
                function setItem($item,$division){

                    $date = date_create('2021-03-10');
                    $start = date_format($date,'Y-m-d H:i:s');
                    $end = \Carbon\Carbon::now();

                    $item_daily = \App\ItemDaily::where("item_id",$item->id)
                        ->whereBetween('updated_at',[$start, $end])
//                    ->where("expense_id",$item->expense_id)
//                    ->where("tranche",$item->tranche)
                        ->where("division_id",$division)
                        ->orderBy("id","desc")
                        ->first();

                    if($item_daily){
                        $item->qty = $item_daily->qty;
                        $item->jan = $item_daily->jan;
                        $item->feb = $item_daily->feb;
                        $item->apr = $item_daily->apr;
                        $item->may = $item_daily->may;
                        $item->jun = $item_daily->jun;
                        $item->jul = $item_daily->jul;
                        $item->aug = $item_daily->aug;
                        $item->mar = $item_daily->mar;
                        $item->sep = $item_daily->sep;
                        $item->oct = $item_daily->oct;
                        $item->nov = $item_daily->nov;
                        $item->dece = $item_daily->dece;
//                  $item->section = $item_daily->section_id;
                    }


                    $item->qty = $item->jan+$item->feb+$item->mar+$item->apr+$item->may+$item->jun+$item->jul+$item->aug+$item->sep+$item->oct+$item->nov+$item->dece;
                    $item->estimated_budget = (int)$item->qty * str_replace(',', '',(int)$item->unit_cost);

                    //            if($item->qty || $item->estimated_budget == 0)

                    return $item;
                }

                function display($item){

                    if(isset($item->description))
                        echo "<tr>
                         <td>$item->description</td>
                         <td>$item->unit_measurement</td>
                         <td>$item->qty,$item->section_id</td>
                         <td>$item->unit_cost</td>
                         <td>$item->estimated_budget</td>
                         <td>$item->mode_procurement</td>
                         <td>$item->jan</td>
                         <td>$item->feb</td>
                         <td>$item->mar</td>
                         <td>$item->apr</td>
                         <td>$item->may</td>
                         <td>$item->jun</td>
                         <td>$item->jul</td>
                         <td>$item->aug</td>
                         <td>$item->sep</td>
                         <td>$item->oct</td>
                         <td>$item->nov</td>
                         <td>$item->dece</td>
                         <td>$item->userid</td>
                         </tr>";
                }

        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection