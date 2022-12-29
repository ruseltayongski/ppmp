@extends('layouts.app')

@section('content')
    <title>PPMP|CHECK</title>
    <?php
        $section_id = Auth::user()->section;
        $division_id = Auth::user()->division;
        $yearly_reference = Session::get('yearly_reference');

        class SubTotal {
            public $sub_total;

            public function incrementSubTotal($sub_total) {
                $this->sub_total += $sub_total;
            }

            public function resetSubTotal() {
                $this->sub_total = 0;
            }
        }

        $sub_total = new SubTotal();
        $sub_total->resetSubTotal();

        function displayHeader($title) {
            return "<tr class='text-green'>
                    <td colspan='25'>
                        <strong>
                            ".$title."
                        </strong>
                    </td>
                </tr>";
        }

        function displayItem($item, $sub_total, $expense_id){
            $yearly_reference = Session::get('yearly_reference');
            $ppmp_status = Session::get('ppmp_status');

            $data_qty = "";

            foreach(Session::get("sections") as $section) {


                if(isset($item->item_id)) {
                    $section_report = \DB::connection('mysql')->select("call get_body_section('$item->item_id','$section->id','$yearly_reference','$ppmp_status')");
                }
                else {
                    $section_report = \DB::connection('mysql')->select("call get_body_section('$item->id','$section->id','$yearly_reference','$ppmp_status')");
                }

                if($section_report[0]->userid) {
                    $encoded_by = \App\DtsUser::where("username",$section_report[0]->userid)->first();
                    $encoded_by = $encoded_by->lname;
                }
                else {
                    $encoded_by = "";
                }

                $qty = $section_report[0]->qty;

                $item->qty = (int)$item->qty + (int)$qty;
                $item->estimated_budget = (int)$item->qty * str_replace(',', '',(float)$item->unit_cost);

                $data_qty .= "<td>".$qty."<br>"."<small style='font-size: 7pt;' class='text-green'>$encoded_by</small>"."</td>";
            }

            $sub_total->incrementSubTotal($item->estimated_budget);
            $data = "<tr>
                        <td style='padding-left: 2%;'>".htmlspecialchars($item->description, ENT_QUOTES)."</td>
                        <td>$item->unit_measurement</td>
                        <td>$item->qty</td>
                        <td>$item->unit_cost</td>
                        <td>$item->estimated_budget</td>
                        <td>$item->mode_procurement</td>

                    ".$data_qty;

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
                    <td><span class='text-blue' style='font-size: 13pt;'>$total</span></td>
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
                <!--im jojoy-->
                <div class="box-body table-responsive">
                    <table class="table table-striped table-fixed-header">
                        <thead class='header'>
                        <tr>
                            <th>Item Description/General Specification</th>
                            <th>Unit<br>Issue</th>
                            <th>QTY</th>
                            <th>Unit Cost</th>
                            <th style="width: 15px;">Estimated Budget</th>
                            <th style="width: 15px;">Mode Procurement</th>
                            @foreach($sections as $section)
                                <th>{{ $section->description }}</th>
                            @endforeach
                        </tr>
                        </thead>

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
                                            $title_header_first = "<div style='padding-left: 15px;'>".$display_first."</div>";
                                            $flag[$display_first] = true;
                                        }
                                        if(isset($flag[$display_second])){
                                            $title_header_second = "";
                                        } else {
                                            $title_header_second = "<div style='padding-left: 30px;'>".$display_second."</div>";
                                            $flag[$display_second] = true;
                                        }
                                        $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;
                                        echo displayHeader($title_header_expense.$title_header_first.$title_header_second);
                                        $items = \DB::connection('mysql')->select("call main_tranche('$expense->id','$tranche')");

                                        echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second)."'>";
                                        $item_collection = [];
                                        $sub_total = new SubTotal();
                                        $sub_total->resetSubTotal();
                                        foreach($items as $item) {
                                            $section= $item->section;
                                            $encoded_by=$item->userid;

                                            $status = $item->status;
                                            echo displayItem($item,$sub_total,$expense->id);
                                        }
                                        echo "</tbody>";
                                        echo expenseTotal($sub_total->sub_total);
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
//                                        $expense_total = 0;
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
                                        $title_header_second = '';
                                        $sub_total = new SubTotal();
                                        $sub_total->resetSubTotal();
                                        foreach($items as $item){
                                            //$item_collection[] = displayItem($item,$title_header_second);
                                            //$section = $item->section_id;
                                            $encoded_by=$item->userid;
                                            $status = $item->status;

                                            echo displayItem($item,$sub_total,$expense->id);
                                        }
                                        /*$item_collection =  \App\Http\Controllers\PpmpController::MyPagination(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$item_collection,$request); //paginate item
                                        $item_collection->getCollection()->transform(function ($value) {
                                            echo $value;
                                        });
                                        echo paginateItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$item_collection->links());*/
                                        echo "</tbody>";
                                        echo expenseTotal($sub_total->sub_total);
                                    } // display if first is null
                                    $count_first++;
                                } // end sub tranche expense
                            ?>
                        @else
                            <?php
                                echo displayHeader($expense->description); //display expense if no value from first
                                $items = \DB::connection('mysql')->select("call normal_tranche_division('$expense->id','$division_id')");
                                $sub_total = new SubTotal();
                                $sub_total->resetSubTotal();
                                foreach($items as $item){
                                    $section= $item->section_id;
                                    $encoded_by = $item->encoded_by;

                                    if(empty($encoded_by))
                                        $encoded_by = $item->userid;
                                    echo displayItem($item,$sub_total,$expense->id);
                                }
                                echo expenseTotal($sub_total->sub_total);

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
    <script>
        $(document).ready(function(){
            $('.table-fixed-header').fixedHeader();
        });
    </script>
@endsection