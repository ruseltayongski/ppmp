@extends('layouts.app')

@section('content')
    <title>PPMP|CHECK</title>

    <?php
    $section_id = Auth::user()->section;
    $division_id = Auth::user()->division;

    function displayHeader($title){
        return "<tr class='text-green'>
                    <td width='30%'>
                        <strong>
                            ".$title."
                        </strong>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";
    }

    function setItem($item,$division_id){
        if( $item->expense_id == 1 and ( $item->tranche == "1-A-1" or $item->tranche == "1-A-2" or $item->tranche == "1-A-3" or $item->tranche == "1-B" )){
            $item_daily = \App\ItemDaily::where("item_id",$item->id)
                ->where("expense_id",$item->expense_id)
                ->where("tranche",$item->tranche)
                ->where("division_id",$division_id)
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
                $item->section = $item_daily->section_id;
            }
        }

        $item->qty = $item->jan+$item->feb+$item->mar+$item->apr+$item->may+$item->jun+$item->jul+$item->aug+$item->sep+$item->oct+$item->nov+$item->dece;
        $item->estimated_budget = (int)$item->qty * str_replace(',', '',(int)$item->unit_cost);

//            if($item->qty || $item->estimated_budget == 0)

        return $item;

    }

    function displayItem($item,$expense_title,$encoded_by,$section,$status,$division_id){
        $user = Auth::user();
        setItem($item,$user->section);
        $data = "<tr>
                        <td style='padding-left: 2%;'>".htmlspecialchars($item->description, ENT_QUOTES)."</td>
                        <td>$item->unit_measurement</td>
                        <td>$item->qty</td>
                        <td>$item->unit_cost</td>
                        <td>$item->estimated_budget</td>
                        <td>$item->mode_procurement</td>
                    ";

        foreach(Session::get("sections") as $section){
            $section_report = \DB::connection('mysql')->select("call get_body_section('$item->id','$section->id')");
            if($section_report[0]->userid) {
                $encoded_by = \App\DtsUser::where("username",$section_report[0]->userid)->first();
                $encoded_by = $encoded_by->lname;
            }
            else {
                $encoded_by = "NO NAME";
            }
            $qty = $section_report[0]->qty;

            $data .= "<td>".$qty."<br>"."<small style='font-size: 7pt;' class='text-green'>$encoded_by</small>"."</td>";
        }

        $data .= "</tr>";
        return $data;
    }

    function expenseTotal($total){
        return "<tr>
                    <td colspan='4'>
                        <strong class='pull-right' >
                            Sub Total:
                        </strong>
                    </td>
                    <td><span data-toggle='tooltip' title='haha' class='badge bg-green' data-original-title='$total'>$total</span></td>
                </tr>";
    }


    //        function addItem($expense_title,$expense,$tranche,$expense_description){
    //            return "<tr>
    //                <td colspan='19'>
    //                    <button type='button' data-id='$expense_title' data-expense='$expense' data-tranche='$tranche' data-expense_description='$expense_description' class='btn btn-block btn-primary btn-xs $expense_title' onclick='addItem($(this))'>Add Item</button>
    //                </td>
    //            </tr>";
    //        }

    function paginateItem($expense_title,$item){
        return "<tr>
                <td colspan='17'>
                    <div class='div_paginator'>
                        <div class='pagination_$expense_title'>
                            $item
                        </div>
                    </div>
                </td>
            </tr>";
    }

    ?>
    <div class="box box-primary">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body table-responsive">
                    <table class="table table-striped" role="grid" aria-describedby="example1_info" style="font-size: 8pt;">
                        <tr>
                            <th>Item Description/General Specification</th>
                            <th>Unit<br>Issue</th>
                            <th>QTY</th>
                            <th>Unit Cost</th>
                            <th width="5%">Estimated Budget</th>
                            <th width="5%">Mode Procurement</th>
                            @foreach($sections as $section)
                                <th>{{ $section->description }}</th>
                            @endforeach
                        </tr>

                        @foreach($expenses as $expense)
                            <?php
                            $count_first = 0;
                            $count_second = 0;
                            $alphabet = range('A', 'Z');
                            $expense_code = json_decode($expense->code,true);
                            ?>
                            @if(isset($expense_code))
                                <?php
                                foreach($expense_code as $display_first => $first){
                                    foreach($first as $display_second){ //main tranche expense
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
                                        $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;
                                        echo displayHeader($title_header_expense.$title_header_first.$title_header_second);
                                        $items = \DB::connection('mysql')->select("call main_tranche('$expense->id','$tranche')");

                                        echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second)."'>";
                                        $item_collection = [];
                                        $sub_total = 0;
                                        foreach($items as $item){
                                            //$item_collection[] = displayItem($item,$title_header_second);
                                            $section= $item->section;
                                            $encoded_by=$item->userid;

                                            $status = $item->status;
                                            echo displayItem($item,$title_header_second,$encoded_by,$section,$status,$division_id);
                                            $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                            $sub_total += (int)$estimated_budget;
                                        }
                                        /*$item_collection =  \App\Http\Controllers\PpmpController::MyPagination(str_replace([' ','/','.','-',':',','],'HAHA',$display_second),$item_collection,$request); //paginate item
                                        $item_collection->getCollection()->transform(function ($value) {
                                            echo $value;
                                        });
                                        echo paginateItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_second),$item_collection->links());*/
                                        echo "</tbody>";
                                        echo expenseTotal($sub_total);
                                    } // end of maine tranche expense
                                    if(!isset($flag[$display_first])){ // sub tranche expense
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
                                        $expense_total = 0;
                                        $tranche = $expense->id."-".$alphabet[$count_first];
                                        echo displayHeader($title_header_expense.$title_header_first);
                                        if($tranche == '1-C' or $tranche == '48-A' or $tranche == '48-B' or $tranche == '48-C' or $tranche == '48-D'){
                                            $items = \DB::connection('mysql')->select("call tranche_one_c_division('$expense->id','$tranche','$division_id')");
                                        }
                                        else{
                                            $items = \DB::connection('mysql')->select("call main_tranche('$expense->id','$tranche')");
                                        }

                                        echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first)."'>";
                                        $item_collection = [];
                                        $sub_total = 0;
                                        $title_header_second = '';
                                        foreach($items as $item){
                                            //$item_collection[] = displayItem($item,$title_header_second);
                                            //$section = $item->section_id;
                                            $encoded_by=$item->userid;
                                            $status = $item->status;

                                            echo displayItem($item,$title_header_second,$encoded_by,$section,$status,$division_id);
                                            $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                            $sub_total += $estimated_budget;

//                                            joy
                                        }
                                        /*$item_collection =  \App\Http\Controllers\PpmpController::MyPagination(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$item_collection,$request); //paginate item
                                        $item_collection->getCollection()->transform(function ($value) {
                                            echo $value;
                                        });
                                        echo paginateItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$item_collection->links());*/
                                        echo "</tbody>";
                                        echo expenseTotal($sub_total);
//                                        if($tranche != "1-B")
//                                            echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$expense->id,$tranche,$display_first);

                                    } // display if first is null
                                    $count_first++;
                                } // end sub tranche expense
                                ?>
                            @else
                                <?php
                                echo displayHeader($expense->description); //display expense if no value from first
                                $items = \DB::connection('mysql')->select("call normal_tranche_division('$expense->id','$division_id')");
                                foreach($items as $item){
                                    $section= $item->section_id;
                                    $encoded_by = $item->encoded_by;
                                    if(empty($encoded_by))
                                        $encoded_by = $item->userid;
                                    echo displayItem($item,$expense->description,$encoded_by,$section,$status,$division_id);
                                }

                                ?>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection