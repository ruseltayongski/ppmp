<?php
use App\Item;
function displayHeader($title){
    return "<tr>
            <td></td>
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
function displayItem($item,$mode_procurement,$expense_title){
    $qty = $item->jan+$item->feb+$item->mar+$item->apr+$item->may+$item->jun+$item->jul+$item->aug+$item->sep+$item->oct+$item->nov+$item->dec;
    $estimated_budget = $item->unit_cost * $qty;
    $mode_procurement_display = "<select name='mode_procurement$item->id' id='no-border'";
    $mode_procurement_display .= "<option value='$item->mode_procurement'>$item->mode_pro_desc</option>";
    foreach($mode_procurement as $row){
        if($item->mode_procurement != $row->id){
            $mode_procurement_display .= "<option value='$row->id'>$row->description</option>";
        }
    }
    $mode_procurement_display .= "</select>";
    $checked = '';
    if($item->status == 'approve'){
        $checked = 'checked';
    }
    if(Auth::user()->user_priv){
        $status = "<label class='mytooltip'><span class='mytext'>$item->encoded_by</span><input type='checkbox' name='status$item->id' class='flat-red' style='font-size:7pt;cursor: pointer;' $checked></label>
                   <span class='badge bg-red' data-id='$item->id' data-item_description='$item->description' style='cursor: pointer;font-size: 5pt' onclick='deleteItem($(this))'><i class='fa fa-remove'></i></span>";
    } else {
        if($item->status == 'approve'){
            $status = "<span class='label label-success'>Approve</span>";
        } else{
            $status = "<span class='label label-primary'>Pending</span>";
        }
    }
    $expense_title_display = "<span class='hide' id='expense_description$item->id'>".$expense_title."</span>";
    return "<tr class='$item->id'>
                <input type='hidden' id='no-border' name='item_id[]' value='$item->id'>
                <input type='hidden' id='no-border' name='userid$item->id' value='$item->userid'>
                <input type='hidden' id='no-border' name='expense_id$item->id' value='$item->expense_id'>
                <input type='hidden' id='no-border' name='tranche$item->id' value='$item->tranche'>
                $expense_title_display
                <td style='width: 50px'><div class='tooltip_top'>".$item->code."<span class='tooltiptext'>Code</span></div></td>
                <td >".
                    "<div class='tooltip_top' style='width: 100%;'>".
                    "<div style='padding-left: 10%;'>"."<input type='text' name='description$item->id' style='width: 100%' value='$item->description' id='no-border' class='item-description' placeholder='Item Description'>"."</div>".
                    "<span class='tooltiptext'>Item Description</span>
                    </div>".
                "</td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='unit_measurement$item->id' style='width: 50px' value='$item->unit_measurement' placeholder='Unit Measurement'>
                    <span class='tooltiptext'>Unit Measurement</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='read_only' name='qty$item->id' style='width: 50px' value='$qty' readonly>
                    <span class='tooltiptext'>Quantity</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='unit_cost$item->id' style='width: 50px' value='$item->unit_cost' placeholder='Unit Cost'>
                    <span class='tooltiptext'>Unit Cost</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='read_only' name='estimated_budget$item->id' style='width: 50px' value='$estimated_budget' readonly>
                    <span class='tooltiptext'>Estimated Budget</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top'>
                    $mode_procurement_display
                    <span class='tooltiptext'>Mode of Procurement</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='jan$item->id' style='width: 25px' value='$item->jan' placeholder='Jan'>
                    <span class='tooltiptext'>January</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='feb$item->id' style='width: 25px' value='$item->feb' placeholder='Feb'>
                    <span class='tooltiptext'>February</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top'>
                    <input type='text' id='no-border' name='mar$item->id' style='width: 25px' value='$item->mar' placeholder='Mar'>
                    <span class='tooltiptext'>March</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='apr$item->id' style='width: 25px' value='$item->apr' placeholder='Apr'>
                    <span class='tooltiptext'>April</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='may$item->id' style='width: 25px' value='$item->may' placeholder='May'>
                    <span class='tooltiptext'>May</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='jun$item->id' style='width: 25px' value='$item->jun' placeholder='Jun'>
                    <span class='tooltiptext'>June</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top'>
                    <input type='text' id='no-border' name='jul$item->id' style='width: 25px' value='$item->jul' placeholder='Jul'>
                    <span class='tooltiptext'>July</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='aug$item->id' style='width: 25px' value='$item->aug' placeholder='Aug'>
                    <span class='tooltiptext'>August</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='sep$item->id' style='width: 25px' value='$item->sep' placeholder='Sep'>
                    <span class='tooltiptext'>September</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top'>
                    <input type='text' id='no-border' name='oct$item->id' style='width: 25px' value='$item->oct' placeholder='Oct'>
                    <span class='tooltiptext'>October</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='nov$item->id' style='width: 25px' value='$item->nov' placeholder='Nov'>
                    <span class='tooltiptext'>November</span>
                    </div>
                </td>
                <td>
                    <div class='tooltip_top' >
                    <input type='text' id='no-border' name='dec$item->id' style='width: 25px' value='$item->dec' placeholder='Dec'>
                    <span class='tooltiptext'>December</span>
                    </div>
                </td>
                <td class='text-center'>
                    $status
                </td>
            </tr>";
}
function expenseTotal($total){
    return "<tr>
            <td colspan='6'>
                <strong class='pull-right' >
                    Total: <span data-toggle='tooltip' title='haha' class='badge bg-green' data-original-title='$total'>$total</span>
                </strong>
            </td>
        </tr>";
}
function addItem($expense_title,$expense,$tranche,$expense_description){
    return "<tr>
        <td colspan='20'>
            <button type='button' data-id='$expense_title' data-expense='$expense' data-tranche='$tranche' data-expense_description='$expense_description' class='btn btn-block btn-primary btn-xs $expense_title' onclick='addItem($(this))'>Add Item</button>
        </td>
    </tr>";
}
?>
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
        #read_only {
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

    </style>
    <title>PPMP|LIST</title>
    <form action="{{ asset('ppmp/update') }}" method="POST" class="item_submit">
        {{ csrf_field() }}
        <div class="row" style="margin-bottom: 60px;">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">PPMP</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" style="width: 300px;" name="table_search" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th>Code</th>
                                <th>Item Description/General Specification</th>
                                <th>Unit</th>
                                <th>QTY</th>
                                <th>Unit Cost</th>
                                <th>Estimated<br>Budget</th>
                                <th>Mode of<br>Procurement</th>
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
                                <th>Encoded By/<br>Status</th>
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
                                            $expense_total = 0;
                                            if($status == 'inactivate'){
                                                $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"),"mode_procurement.description as mode_pro_desc")
                                                    ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                                    ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                                    ->where('item.expense_id','=',$expense->id)
                                                    ->where('item.tranche','=',$tranche)
                                                    ->where('item.status','=','inactivate')
                                                    ->where('item.division','=',Auth::user()->division)
                                                    ->get();
                                            } else {
                                                $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"),"mode_procurement.description as mode_pro_desc")
                                                    ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                                    ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                                    ->where('item.expense_id','=',$expense->id)
                                                    ->where('item.tranche','=',$tranche)
                                                    ->where(function($q){
                                                        $q->where('item.status','=','approve')
                                                            ->orWhere('item.status','=','pending');
                                                    })
                                                    ->where('item.division','=',Auth::user()->division)
                                                    ->get();
                                            }
                                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second)."'>";
                                            foreach($items as $item){
                                                echo displayItem($item,$mode_procurement,$title_header_second);
                                                $expense_total += $item->estimated_budget;
                                                $grand_total += $expense_total;
                                            }
                                            echo "</tbody>";
                                            echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_second),$expense->id,$tranche,$display_second);
                                            echo expenseTotal($expense_total);
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
                                            $expense_total = 0;
                                            $tranche = $expense->id."-".$alphabet[$count_first];
                                            echo displayHeader($title_header_expense.$title_header_first);
                                            if($status == 'inactivate'){
                                                $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"),"mode_procurement.description as mode_pro_desc")
                                                    ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                                    ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                                    ->where('item.expense_id','=',$expense->id)
                                                    ->where('item.tranche','=',$tranche)
                                                    ->where('item.status','=','inactivate')
                                                    ->where('item.division','=',Auth::user()->division)
                                                    ->get();
                                            } else {
                                                $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"),"mode_procurement.description as mode_pro_desc")
                                                    ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                                    ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                                    ->where('item.expense_id','=',$expense->id)
                                                    ->where('item.tranche','=',$tranche)
                                                    ->where(function($q){
                                                        $q->where('item.status','=','approve')
                                                            ->orWhere('item.status','=','pending');
                                                    })
                                                    ->where('item.division','=',Auth::user()->division)
                                                    ->get();
                                            }
                                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first)."'>";
                                            foreach($items as $item){
                                                echo displayItem($item,$mode_procurement,$display_first);
                                                $expense_total += $item->estimated_budget;
                                                $grand_total += $expense_total;
                                            }
                                            echo "</tbody>";
                                            echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$expense->id,$tranche,$display_first);
                                            if($expense_total != 0){
                                                echo expenseTotal($expense_total);
                                            }
                                        } // display if first is null
                                        $count_first++;
                                    }
                                } else {
                                    $expense_total = 0;
                                    echo displayHeader($expense->description); //display expense if no value from first
                                    if($status == 'inactivate'){
                                        $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"),"mode_procurement.description as mode_pro_desc")
                                            ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                            ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                            ->where('item.expense_id','=',$expense->id)
                                            ->where('item.status','=','inactivate')
                                            ->where('item.division','=',Auth::user()->division)
                                            ->get();
                                    } else {
                                        $items = Item::select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"),"mode_procurement.description as mode_pro_desc")
                                            ->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')
                                            ->leftJoin('mode_procurement','mode_procurement.id','=','item.mode_procurement')
                                            ->where('expense_id','=',$expense->id)
                                            ->where(function($q){
                                                $q->where('item.status','=','approve')
                                                    ->orWhere('item.status','=','pending');
                                            })
                                            ->where('item.division','=',Auth::user()->division)
                                            ->get();
                                    }
                                    echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$expense->description)."'>";
                                    foreach($items as $item){
                                        echo displayItem($item,$mode_procurement,$expense->description);
                                        $expense_total += $item->estimated_budget;
                                        $grand_total += $expense_total;
                                    }
                                    echo "</tbody>";
                                    echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$expense->description),$expense->id,'',$expense->description);
                                    if($expense_total != 0){
                                        echo expenseTotal($expense_total);
                                    }
                                }
                            }
                            ?>
                        </table>
                    </div>
                {{ $expenses->links() }}
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            {{--<div class="col-md-2">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Budget Allotment</h3>
                    </div>
                    <div class="box-body">
                        @foreach($charge_to as $charge)
                            <strong><i class="fa fa-paypal margin-r-5"></i> {{ $charge->description }}</strong><br>
                            Beginning Balance: <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Beginning Balance">{{ $charge->beginning_balance }}</span><br>
                            Remaining Balance: <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Remaining Balance">{{ $charge->remaining_balance }}</span>
                        @endforeach
                    </div>
                </div>
            </div>--}}
        </div>

        <footer id="footer">
            <div class="container">
                <div class="col-md-6">
                    <button class="btn btn-app" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                    <a href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&status='.$status.'&division='.Auth::user()->division }}" target="_blank" class="btn btn-app">
                        <i class="fa fa-file-pdf-o"></i> Generate PDF
                    </a>
                    <a class="btn btn-app">
                        <span class="badge bg-blue">{{ count($all_item) }}</span>
                        <i class="fa fa-object-group"></i> Items
                    </a>
                    <a class="btn btn-app">
                        <span class="badge bg-green">{{ $encoded }}</span>
                        <i class="fa fa-keyboard-o"></i> Encoded
                    </a>
                </div>
                <div class="col-md-6" >
                    <h1>
                        Grand Total: <span class="badge bg-red" style="font-size:20pt;"> <i class="fa fa-paypal"></i> {{ $grand_total }}</span>
                    </h1>
                </div>
            </div>
        </footer>
    </form>

@endsection

@section('js')

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
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
        $.each(<?php echo $all_item; ?>,function(x,data){
            item_filter.push({ label:data.description, id:data.id });
        });
        $(".item-description").catcomplete({
            delay: 0,
            source: item_filter
        });
        $('.item_submit').submit(function(e){
            var item_array = [];
            var count = 0;
            $(".item_submit :input.item-description").each(function(){
                var expense_title = $("#expense_"+this.name).text();
                var input = $(this).val(); // This is the jquery object of the input, do what you will
                console.log($(this)[0]);
                item_array[count] = input;
                count++;
            });
            var sorted_arr = item_filter.slice().sort();
            var results = [];
            var expense_flag = [];
            var result_display = "Duplicate List:<ul>";
            for (var i = 0; i < sorted_arr.length - 1; i++) {
                if (sorted_arr[i + 1] == sorted_arr[i]) {
                    results.push(sorted_arr[i]);
                    result_display += "<li style='margin-left: 20px;'>"+sorted_arr[i]+"</li>";
                    expense_flag[sorted_arr[i].split('|')[1]] = true;
                }
            }
            result_display += "</ul><div class='alert-danger'> <i class='fa fa-info' style='margin-left:5px;'></i> Please remove the duplicate item..</div>";
            if (results === undefined || results.length == 0) {
                //success
            }
            else {
                /*Lobibox.alert('error',
                    {
                        title: "Checker",
                        msg: result_display
                    });*/
                Lobibox.window({
                    title: 'Checker',
                    content: result_display
                });
                e.preventDefault();
            }
        });
        function uuidv4() {
            return 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16).charCodeAt(0);
            });
        }

        function addItem(element){
            var id = element.data('id');
            var expense = element.data('expense');
            var expense_description = element.data('expense_description');
            var tranche = element.data('tranche');
            var userid = "<?php echo Auth::user()->username; ?>";
            var item_unique_row = uuidv4()+userid;
            Lobibox.confirm({
                title: 'Confirmation',
                msg: "Are you sure you want to add in "+expense_description+" ?",
                callback: function ($this, type, ev) {
                    if(type == 'yes'){
                        var mode_procurement = <?php echo $mode_procurement; ?>;
                        var mode_procurement_display = "<select name='mode_procurement"+item_unique_row+"' style='width: 100%'>";
                        mode_procurement_display += "<option value=''></option>";
                        $.each(mode_procurement,function(x,y){
                            mode_procurement_display += "<option value='"+y.id+"'>"+y.description+"</option>";
                        });
                        mode_procurement_display += "</select>";
                        var new_row = "<tr class='"+item_unique_row+"'>" +
                            "<input type='hidden' name='item_id[]' value='"+item_unique_row+"' ></td>" +
                            "<input type='hidden' name='userid"+item_unique_row+"' value='"+userid+"' ></td>" +
                            "<input type='hidden' name='expense_id"+item_unique_row+"' value='"+expense+"' ></td>" +
                            "<input type='hidden' name='tranche"+item_unique_row+"' value='"+tranche+"' ></td>" +
                            "<span class='hide' id='expense_description"+item_unique_row+"'>"+expense_description+"</span>" +
                            "<td ></td>" +
                            "<td width='35%' style='padding-left: 3.7%'>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' class='item-description' placeholder='item-description' name='description"+item_unique_row+"' style='width: 100%'>" +
                            "<span class='tooltiptext'>Item Description</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Unit' name='unit_measurement"+item_unique_row+"' style='width: 40px'>" +
                            "<span class='tooltiptext'>Unit Measurement</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Qty' name='qty"+item_unique_row+"' style='width: 40px'>" +
                            "<span class='tooltiptext'>Quantity</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Cost' name='unit_cost"+item_unique_row+"' style='width: 50px'>" +
                            "<span class='tooltiptext'>Unit Cost</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' name='estimated_budget"+item_unique_row+"' style='width: 60px'>" +
                            "<span class='tooltiptext'>Estimated Budget</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            mode_procurement_display+
                            "<span class='tooltiptext'>Mode of Procurement</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Jan' name='jan"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>Estimated Budget</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Feb' name='feb"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>February</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Mar' name='mar"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>March</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Apr' name='apr"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>April</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='May' name='may"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>May</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Jun' name='jun"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>June</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Jul' name='jul"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>July</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Aug' name='aug"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>August</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Sep' name='sep"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>September</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Oct' name='oct"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>October</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Nov' name='nov"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>November</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<div class='tooltip_top' style='width: 100%;'>"+
                            "<input type='text' placeholder='Dec' name='dec"+item_unique_row+"' style='width: 25px'>" +
                            "<span class='tooltiptext'>December</span>"+
                            "</div>" +
                            "</td>"+
                            "<td>" +
                            "<span class='label label-primary'>pending</span>" +
                            "<span class='badge bg-red' data-id='"+item_unique_row+"' data-item_description='' style='cursor: pointer;font-size: 5pt' onclick='deleteItem($(this))'><i class='fa fa-remove'></i></span>" +
                            "</td>"+
                            "</tr>";
                        $("#"+id).append(new_row);
                        console.log(id);
                        $(".item-description").catcomplete({
                            delay: 0,
                            source: item_filter
                        });
                    }
                }
            });
        }
        function deleteItem(element){
            Lobibox.confirm({
                title: 'Confirmation',
                msg: "Are you sure you want to delete this "+element.data('item_description')+" ?",
                callback: function ($this, type, ev) {
                    if(type == 'yes'){
                        $("."+element.data('id')).remove();
                        var url = "<?php echo asset('ppmp/delete') ?>";
                        var json = {
                            "id" : element.data('id'),
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
    </script>
@endsection