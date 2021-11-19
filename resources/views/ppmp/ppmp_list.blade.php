@extends('layouts.app')

@section('content')
    <style>
        .ui-autocomplete
        {
            font-weight: bold;
            background-color: white;
            width: 20%;
        }
        .ui-menu-item {
            cursor: pointer;
            margin-top: 2%;
        }
        .mytooltip .mytext {
            visibility: hidden;
            width: 140px;
            background-color: #00CC99;
            color: #fff;
            z-index: 1;
            top: -5px;
            right: 110%;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
        }
        .mytooltip {
            position: relative;
            display: inline-block;
        }
        .mytooltip:hover .mytext {
            visibility: visible;
        }
        #no-border{
            border: none;
        }
        #readonly {
            border:1px solid #00CC99;
        }
        /* TOOLTIP TOP */
        .tooltip_top {
            position: relative;
            display: inline-block;
        }
        .tooltip_top .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #00CC99;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
        }
        .tooltip_top:hover .tooltiptext {
            visibility: visible;
        }
        .pagination{
            margin: 0;
            padding: 0;
            margin-left: 2%;
        }

    </style>
    <title>PPMP|LIST</title>
    <?php

    function displayHeader($title){
        return "<tr>
                <td>
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
            </tr>";
    }

    function setItem($item,$section_id){

        $yearly_reference = Session::get('yearly_reference');
        $ppmp_status = Session::get('ppmp_status');
        if( $item->expense_id == 1 and ( $item->tranche == "1-A-1" or $item->tranche == "1-A-2" or $item->tranche == "1-A-3" or $item->tranche == "1-B" )){

            $item_daily = \App\ItemDaily::where("item_id",$item->id)
                ->where("expense_id",$item->expense_id)
                ->where("tranche",$item->tranche)
                ->where("section_id",$section_id)
                ->where("yearly_ref_id",$yearly_reference)
                ->where('ppmp_status',$ppmp_status)
                ->orderBy("id","desc")
                ->first();
            if($item_daily){
                $item->qty = $item_daily->qty;
                $item->jan = $item_daily->jan;
                $item->feb = $item_daily->feb;
                $item->mar = $item_daily->mar;
                $item->apr = $item_daily->apr;
                $item->may = $item_daily->may;
                $item->jun = $item_daily->jun;
                $item->jul = $item_daily->jul;
                $item->aug = $item_daily->aug;
                $item->sep = $item_daily->sep;
                $item->oct = $item_daily->oct;
                $item->nov = $item_daily->nov;
                $item->dece = $item_daily->dece;
            }
        }

        $item->qty = $item->jan+$item->feb+$item->mar+$item->apr+$item->may+$item->jun+$item->jul+$item->aug+$item->sep+$item->oct+$item->nov+$item->dece;
        $item->estimated_budget = (int)$item->qty * str_replace(',', '',(float)$item->unit_cost);

        return $item;
    }

    function displayItem($item,$expense_title) {

        $user = Auth::user();
        setItem($item,$user->section);
        if(($item->status == 'fixed') && $user->section != 45 && $user->username != "0864") {
            $description = [
                "readonly" => "readonly"
            ];
            $status = "<span class='badge bg-green'> Fixed Item</span>";
        } else {
            $description = [
                "readonly" => ""
            ];
            $status = "<span class='badge bg-red' data-unique_id='$item->unique_id' data-item_id='$item->id' data-item_description='$item->description' style='cursor: pointer;' onclick='deleteItem($(this))'><i class='fa fa-remove'></i> REMOVE</span>";
        }

        $user->section == "45" || $user->username == "0864" ? $unit_cost_lock = '' : $unit_cost_lock = 'readonly';
        $expense_title_display = "<span class='hide' id='expense_description$item->id'>".$expense_title."</span>";

        $data = "<tr class='$item->unique_id $item->id'>
                    <input type='hidden' id='no-border' name='item_id[]' value='$item->id'>
                    <input type='hidden' id='no-border' name='unique_id$item->id' value='$item->unique_id'>
                    <input type='hidden' id='no-border' name='userid$item->id' value='$item->userid'>
                    <input type='hidden' id='no-border' name='expense_id$item->id' value='$item->expense_id'>
                    <input type='hidden' id='no-border' name='tranche$item->id' value='$item->tranche'>
                    <input type='hidden' id='no-border' name='status$item->id' value='$item->status'>
                    <input type='hidden' id='no-border' name='program$item->id' value='$item->ppmp_status'>
                    $expense_title_display
                    <td >".
                        "<div class='tooltip_top' style='width: 100%;'>".
                            "<div style='padding-left: 10%;'>"."<input type='text' name='description$item->id' style='width: 100%' value='".htmlspecialchars($item->description, ENT_QUOTES)."' id='".$description['readonly']."' class='item-description item-check' placeholder='Item Description' ".$description['readonly']." >"."</div>".
                            "<span class='tooltiptext'>Item Description</span>
                         </div>".
                    "</td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='".$description['readonly']."' name='unit_measurement$item->id' style='width: 50px' value='$item->unit_measurement' ".$description['readonly']." >
                        <span class='tooltiptext'>Unit of Issue</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='readonly' name='qty$item->id' style='width: 60px' placeholder='qty' value='$item->qty' readonly>
                        <span class='tooltiptext'>QTY</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='".$description['readonly']."' name='unit_cost$item->id' style='width: 60px' value='$item->unit_cost' ".$description['readonly']." >
                        <span class='tooltiptext'>Unit Cost</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='readonly' name='estimated_budget$item->id' style='width: 60px' value='$item->estimated_budget' readonly>
                        <span class='tooltiptext'>Estimated Budget</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='".$description['readonly']."' name='mode_procurement$item->id' style='width: 90px;font-size: 8pt;' value='$item->mode_procurement' placeholder='Mode Procurement' ".$description['readonly'].">
                        <span class='tooltiptext'>Mode Procurement</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='jan$item->id' style='width: 40px' value='$item->jan' placeholder='Jan'>
                        <span class='tooltiptext'>January</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='feb$item->id' style='width: 40px' value='$item->feb' placeholder='Feb'>
                        <span class='tooltiptext'>February</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top'>
                        <input type='number' id='no-border' name='mar$item->id' style='width: 40px' value='$item->mar' placeholder='Mar'>
                        <span class='tooltiptext'>March</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='apr$item->id' style='width: 40px' value='$item->apr' placeholder='Apr'>
                        <span class='tooltiptext'>April</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='may$item->id' style='width: 40px' value='$item->may' placeholder='May'>
                        <span class='tooltiptext'>May</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='jun$item->id' style='width: 40px' value='$item->jun' placeholder='Jun'>
                        <span class='tooltiptext'>June</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top'>
                        <input type='number' id='no-border' name='jul$item->id' style='width: 40px' value='$item->jul' placeholder='Jul'>
                        <span class='tooltiptext'>July</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='aug$item->id' style='width: 40px' value='$item->aug' placeholder='Aug'>
                        <span class='tooltiptext'>August</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='sep$item->id' style='width: 40px' value='$item->sep' placeholder='Sep'>
                        <span class='tooltiptext'>September</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top'>
                        <input type='number' id='no-border' name='oct$item->id' style='width: 40px' value='$item->oct' placeholder='Oct'>
                        <span class='tooltiptext'>October</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='nov$item->id' style='width: 40px' value='$item->nov' placeholder='Nov'>
                        <span class='tooltiptext'>November</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='dece$item->id' style='width: 40px' value='$item->dece' placeholder='Dec'>
                        <span class='tooltiptext'>December</span>
                        </div>
                    </td>
                    <td>
                        $status
                    </td>
                </tr>";

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
    function addItem($expense_title,$expense,$tranche,$expense_description){
        return "<tr>
            <td colspan='19'>
                <button type='button' data-id='$expense_title'  data-expense='$expense' data-tranche='$tranche' data-expense_description='$expense_description' class='btn btn-block btn-primary btn-xs $expense_title' onclick='addItem($(this))'>Add Item</button>
            </td>
        </tr>";
    }
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

    <form action="{{ asset('ppmp/list/search') }}" method="POST" class="item_submit">
        {{ csrf_field() }}
        <input type="hidden" class="item_save" name="item_save">
        <div class="row" style="margin-bottom: 60px;">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">PPMP</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" style="width: 300px;" id="item_search" name="item_search" value="{{ $item_search }}" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <?php
                        $section_id = Auth::user()->section;
                        $division_id = Auth::user()->division;
                        $yearly_reference = Session::get('yearly_reference');
                        $ppmp_status = Session::get('ppmp_status');
                    ?>
                    @if(isset($expenses) && count($expenses) > 0 )
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th>Item Description/General Specification</th>
                                <th>Unit<br>Issue</th>
                                <th>QTY</th>
                                <th>Unit Cost</th>
                                <th width="5%">Estimated Budget</th>
                                <th width="5%">Mode Procurement</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>July</th>
                                <th>Aug</th>
                                <th>Sept</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                                <th></th>
                            </tr>
                            <?php
                                foreach($expenses as $expense)
                                {
                                    $count_first = 0;
                                    $count_second = 0;
                                    $alphabet = range('A', 'Z');
                                    $expense_code = json_decode($expense->code,true);
                                    if(isset($expense_code)){
                                        foreach($expense_code as $display_first => $first){
                                            foreach($first as $display_second){ //main tranche expense
                                                $count_second++;
                                                if(isset($flag[$expense->description])){
                                                    $title_header_expense = "";
                                                } else {
                                                    $title_header_expense = $expense->description; //Office Supplies
                                                    $flag[$expense->description] = true;           //mga naay tranche
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
                                                    echo displayItem($item,$title_header_second);
                                                    $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                                    $sub_total += $estimated_budget;
                                                }

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
                                                if($tranche == '1-C' or $tranche == '49-A' or $tranche == '49-B' or $tranche == '49-C' or $tranche == '49-D'){
                                                    $items = \DB::connection('mysql')->select("call tranche_one_c('$expense->id','$tranche','$section_id','$yearly_reference','$ppmp_status')");
                                                }
                                                else{
                                                    $items = \DB::connection('mysql')->select("call main_tranche('$expense->id','$tranche')");
                                                }

                                                echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first)."'>";
                                                $item_collection = [];
                                                $sub_total = 0;
                                                $title_header_second = '';
                                                foreach($items as $item){
                                                    echo displayItem($item,$title_header_second);
                                                    $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                                    $sub_total += $estimated_budget;
                                                }
                                                echo "</tbody>";
                                                echo expenseTotal($sub_total);
                                                if($tranche != "1-B")
                                                    echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$expense->id,$tranche,$display_first);
                                            } // display if first is null
                                            $count_first++;
                                        } // end sub tranche expense
                                    }
                                    else
                                    { // normal expense
                                        $expense_total = 0;
                                        echo displayHeader($expense->description); //display expense if no value from first

                                        $items = \DB::connection('mysql')->select("call normal_tranche('$expense->id','$section_id','$yearly_reference','$ppmp_status')");

                                        echo "<tbody id='".str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description)."'>";
                                        $item_collection = [];
                                        $sub_total = 0;
                                        foreach($items as $item){
                                            //$item_collection[] = displayItem($item,$expense->description);
                                            echo displayItem($item,$expense->description);
                                            $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                            $sub_total += $estimated_budget;
                                        }
                                        echo "</tbody>";
                                        echo expenseTotal($sub_total);
                                        echo addItem(str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description),$expense->id,'',$expense->description);
                                        if($expense_total != 0){
                                            echo expenseTotal($expense_total);
                                        }
                                    }// end normal expense
                                }

                            ?>
                        </table>
                    </div>
                    @endif
                </div>
                <!-- /.box -->
            </div>
        </div>


        <div class="modal modal-default fade" id="modal-info">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Filter PDF</h4>
                    </div>
                    <div class="modal-body text-center">
                        <a class="btn btn-block btn-social btn-foursquare" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&generate_level=region&division_id='.Auth::user()->division.'&section_id='.Auth::user()->section.'&ppmp_status='.$ppmp_status.'&yearly_reference='.$yearly_reference }}" target="_blank">
                            <i class="fa fa-file-pdf-o"></i> Per Region
                        </a>
                        <a class="btn btn-block btn-social btn-facebook" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&generate_level=division&division_id='.Auth::user()->division.'&section_id='.Auth::user()->section.'&ppmp_status='.$ppmp_status.'&yearly_reference='.$yearly_reference }}" target="_blank">
                            <i class="fa fa-file-pdf-o"></i> Per Division
                        </a>
                        <!--
                        <a class="btn btn-block btn-social btn-google" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&generate_level=section&division_id='.Auth::user()->division.'&section_id='.Auth::user()->section.'&ppmp_status='.$ppmp_status.'&yearly_reference='.$yearly_reference }}" target="_blank">
                            <i class="fa fa-file-pdf-o"></i> Per Section
                        </a>

                        -->
                        <?php $section = \App\Section::where("division",Auth::user()->division)->orderBy("description","asc")->get() ?>
                        @foreach($section as $sec)
                            <a class="btn btn-block btn-social btn-google" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&generate_level=select_section&division_id='.Auth::user()->division.'&section_id='.$sec->id.'&section_name='.$sec->description.'&ppmp_status='.$ppmp_status.'&yearly_reference='.$yearly_reference }}" target="_blank">
                                <i class="fa fa-file-pdf-o"></i> {{ $sec->description }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <footer id="footer">
            <div class="container">
                <div class="col-md-6">
                    @if(isset($expenses) && count($expenses) > 0)
                        <button class="btn btn-app" id="ppmp_saved" type="submit">
                            <i class="fa fa-save"></i> Save
                        </button>
                    @endif
                    <a type="button" data-toggle="modal" data-target="#modal-info" class="btn btn-app">
                        <i class="fa fa-file-pdf-o"></i> Generate PDF
                    </a>
                </div>

                {{--<div class="col-md-6" >--}}
                    {{--<h1>--}}
                        {{--Grand Total: <span class="badge bg-blue" style="font-size:20pt;"> <i class="fa fa-paypal"></i> {{ \DB::connection('mysql')->select("call grandTotal()")[0]->grand_total }}</span>--}}
                    {{--</h1>--}}
                {{--</div>--}}

            </div>
        </footer>
    </form>
@endsection

@section('js')
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        //Initialize Select2 Elements
        $('.select2').select2();
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        });
        //custom autocomplete (category selection)
        $.widget( "custom.catcomplete", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
            },
            _renderMenu: function( ul, items ) {
                var that = this,
                    currentCategory = "";
                $.each( items, function( index, item ) {
                    that._renderItemData( ul, item );
                    return index < 10;
                });
            }
        });

        var item_filter = [];
        var item_description = [];
        var item_fixed = [];
        $.each(<?php echo $all_item; ?>,function(x,data){
            item_filter.push({ label:data.description, id:data.id });
            item_description.push(data.description);
            if(data.expense_id == 1 && ( data.tranche == "1-A-1" || data.tranche == "1-A-2" || data.tranche == "1-A-3" || data.tranche == "1-B")) {
                item_fixed.push(data.description);
            }
        });

        $(".item-description").catcomplete({
            delay: 0,
            source: item_filter
        });



        $(document).ready(function () {
            $(".item_submit").submit(function () {
                $("#ppmp_saved").attr("disabled", true);


                var expense_id = "<?php echo $expense_id; ?>";
                $('.item_submit').attr('action', "<?php echo asset('ppmp/list')."/" ?>"+expense_id);
                $(".item_save").val(true);

                var item_array = [];
                var item_fixed_checker = false;
                var item_expense_check = false;

                $("#ppmp_saved").attr("disabled", true);

                var result_display = "<div class=''> THIS ITEM: </div>";
                $(".item_submit :input.item-check").each(function() {
                    console.log(input);
                    var input = $(this).val();
                    item_array.push(input);
                    if(item_fixed.includes(input)){
                        result_display += "<li style='margin-left: 20px;'>"+input+"</li>";
                        item_fixed_checker = true;
                    }
                });

                if(item_fixed_checker && expense_id != 1){ //first error trapping
                    console.log("item_fixed_checker");
                    result_display += "<div class=''> cannot be saved here, Please go to OFFICE SUPPLIES A OR B</div>";
                    Lobibox.alert('error',
                        {
                            title: "ERROR",
                            msg: result_display
                        });
                    event.preventDefault();
                    $("#ppmp_saved").attr("disabled", false);
                }

                for (var i = 0; i < item_array.length - 1; i++) {
                    if (item_array[i + 1] == item_array[i]) {
                        item_expense_check = true;
                        result_display += "<li style='margin-left: 20px;'>"+item_array[i]+"</li>";
                    }
                }

                if(item_expense_check) { //2nd error trapping
                    console.log("item_expense_checker");
                    result_display += "<div class=''> already existed on this EXPENSE</div>";
                    Lobibox.alert('error',
                        {
                            title: "ERROR",
                            msg: result_display
                        });
                    event.preventDefault();
                    $("#ppmp_saved").attr("disabled", false);
                }

                return true;

                /*var merge_item = item_description.concat(item_array);

                var sorted_arr = merge_item.slice().sort();
                console.log(sorted_arr);
                var results = [];
                var result_display = "Duplicate List:<ul>";
                for (var i = 0; i < sorted_arr.length - 1; i++) {
                    if (sorted_arr[i + 1] == sorted_arr[i]) {
                        results.push(sorted_arr[i]);
                        result_display += "<li style='margin-left: 20px;'>"+sorted_arr[i]+"</li>";
                    }
                }

                result_display += "</ul><div class='alert-danger'> <i class='fa fa-info' style='margin-left:5px;'></i> Please remove the duplicate item..</div>";
                if (results === undefined || results.length == 0) {
                    //success
                }
                else {
                    Lobibox.alert('error',
                    {
                        title: "Checker",
                        msg: result_display
                    });
                    event.preventDefault();
                }*/

            });
        });

        function filterItems(){
            var select_val = $("#filter_item").select2("val");
            var url = "<?php echo url('FPDF/print/report_filter.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&division='.Auth::user()->division."&select_val="; ?>"+select_val;
            var win = window.open(url, '_blank');
            win.focus();
        }

        function uuidv4() {
            return 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16).charCodeAt(0);
            })+"<?php echo date('Y-').Auth::user()->id.date('mdHis'); ?>";
        }

        function AddRow(element){
            var expense = element.data('expense');
            var expense_description = element.data('expense_description');
            var tranche = element.data('tranche');
            var userid = "<?php echo Auth::user()->username; ?>";
            var item_unique_row = uuidv4()+userid;
            var encoded_by = "<?php echo Auth::user()->lname.' '.Auth::user()->fname ?>";
            var program = element.data('program');

            item_status = "<span class='badge bg-red' data-unique_id='"+item_unique_row+"' data-item_description='' style='cursor: pointer;' onclick='deleteItem($(this))'><i class='fa fa-remove'></i> REMOVE</span>";
            var mode_procurement = <?php echo $mode_procurement; ?>;
            var mode_procurement_display = "<select name='mode_procurement"+item_unique_row+"' style='width: 100%'>";
            mode_procurement_display += "<option value=''></option>";
            $.each(mode_procurement,function(x,y){
                mode_procurement_display += "<option value='"+y.id+"'>"+y.description+"</option>";
            });
            mode_procurement_display += "</select>";
            var new_row = "<tr class='"+item_unique_row+"'>" +
                "<input type='hidden' name='item_id[]' value='"+item_unique_row+"' ></td>" +
                "<input type='hidden' name='unique_id"+item_unique_row+"' value='"+item_unique_row+"' ></td>" +
                "<input type='hidden' name='userid"+item_unique_row+"' value='"+userid+"' ></td>" +
                "<input type='hidden' name='expense_id"+item_unique_row+"' value='"+expense+"' ></td>" +
                "<input type='hidden' name='tranche"+item_unique_row+"' value='"+tranche+"' ></td>" +
                "<input type='hidden' name='status"+item_unique_row+"' value='approve' ></td>" +
                "<input type='hidden' name='program"+item_unique_row+"' value='"+program+"' ></td>" +
                "<span class='hide' id='expense_description"+item_unique_row+"'>"+expense_description+"</span>" +
                "<td width='35%' style='padding-left: 4%'>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' class='item-description item-check' placeholder='item-description' name='description"+item_unique_row+"' style='width: 100%'>" +
                "<span class='tooltiptext'>Item Description</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' name='unit_measurement"+item_unique_row+"' style='width: 50px'>" +
                "<span class='tooltiptext'>Unit Measurement</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' placeholder='qty' id='readonly' name='qty"+item_unique_row+"' style='width: 60px' readonly>" +
                "<span class='tooltiptext'>QTY</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' placeholder='Unit Cost' name='unit_cost"+item_unique_row+"' style='width: 60px'>" +
                "<span class='tooltiptext'>Unit Cost</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' id='readonly' placeholder='Estimated Budget' name='estimated_budget"+item_unique_row+"' style='width: 60px' readonly>" +
                "<span class='tooltiptext'>Estimated Budget</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' placeholder='Mode Procurement' name='mode_procurement"+item_unique_row+"' style='width: 90px;font-size: 8pt;'>" +
                "<span class='tooltiptext'>Mode Procurement</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Jan' name='jan"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>Estimated Budget</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Feb' name='feb"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>February</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Mar' name='mar"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>March</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Apr' name='apr"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>April</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='May' name='may"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>May</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Jun' name='jun"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>June</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Jul' name='jul"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>July</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Aug' name='aug"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>August</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Sep' name='sep"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>September</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Oct' name='oct"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>October</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Nov' name='nov"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>November</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Dec' name='dece"+item_unique_row+"' step='.01' style='width: 40px'>" +
                "<span class='tooltiptext'>December</span>"+
                "</div>" +
                "</td>"+
                "<td>"+
                item_status+
                "</td>"+
                "</tr>";

            return new_row;
        }

        function addItem(element){
            $(".number_of_row").focus();
            var id = element.data('id');
            var expense_description = element.data('expense_description');
            console.log(id);
            Lobibox.confirm({
                title: 'Confirmation',
                msg: "Are you sure you want to add in "+expense_description+" ? "+"<input type='number' class='form-control number_of_row' placeholder='Type the number of rows' >",
                callback: function ($this, type, ev) {
                    if(type == 'yes'){
                        var number_of_row = $(".number_of_row").val();
                        if(number_of_row){
                            var row_setter;
                            if(number_of_row > 20){
                                row_setter = 20;
                            } else {
                                row_setter = number_of_row;
                            }
                            for(var i=0;i<row_setter;i++){
                                var new_row = AddRow(element);
                                $("#"+id).append(new_row);
                            }
                        } else {
                            var new_row = AddRow(element);
                            $("#"+id).append(new_row);
                        }

                        console.log("#"+id);

                        $(".item-description").catcomplete({
                            delay: 0,
                            source: item_filter
                        });
                    }
                }
            });
        }

        function deleteItem(element){
            console.log(element.data('unique_id'));
            console.log(element.data('item_id'));
            Lobibox.confirm({
                title: 'Confirmation',
                msg: "Are you sure you want to delete this "+element.data('item_description')+" ?",
                callback: function ($this, type, ev) {
                    if(type == 'yes'){
                        if(element.data('unique_id'))
                            $("."+element.data('unique_id')).remove();
                        else if(element.data('item_id'))
                            $("."+element.data('item_id')).remove();

                        var url = "<?php echo asset('ppmp/delete') ?>";
                        var json = {
                            "unique_id" : element.data('unique_id'),
                            "item_id" : element.data('item_id'),
                            "_token" : "<?php echo csrf_token(); ?>",
                        };
                        $.post(url,json,function(result){
                            console.log(result);
                        });
                        Lobibox.notify('error', {
                            title: '',
                            msg: "Successfully Deleted!",
                            size: 'mini',
                            rounded: true
                        });
                    }
                }
            });
        }

        /*$(".div_paginator").each(function(index1){
            var paginator_href = $(this).children()[0].className;
            $("."+$(this).children()[0].className).children().children().each(function(index2){
                var _href = $($(this).children().get(0)).attr('href');
                $($(this).children().get(0)).attr('href',_href+'&type='+paginator_href);
            });
        });*/
    </script>
@endsection