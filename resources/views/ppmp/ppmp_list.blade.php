<?php
    use App\Item;
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
            </tr>";
    }
    function displayItem($item,$expense_title){
        $status = "<span class='label label-success'>".$item->encoded_by_name."</span>";
        if(Auth::user()->username == $item->userid){
            $status = "<span class='badge bg-red' data-id='$item->id' data-item_description='$item->description' style='cursor: pointer;' onclick='deleteItem($(this))'><i class='fa fa-remove'></i> REMOVE</span>";
        }
        if($item->status == 'fixed'){
            $description = [
                "readonly" => "readonly"
            ];
        } else {
            $description = [
                "readonly" => ""
            ];
        }
        $expense_title_display = "<span class='hide' id='expense_description$item->id'>".$expense_title."</span>";
        $data = "<tr class='$item->id'>
                    <input type='hidden' id='no-border' name='item_id[]' value='$item->id'>
                    <input type='hidden' id='no-border' name='qty_unique_id$item->id' value='$item->qty_unique_id'>
                    <input type='hidden' id='no-border' name='userid$item->id' value='$item->userid'>
                    <input type='hidden' id='no-border' name='expense_id$item->id' value='$item->expense_id'>
                    <input type='hidden' id='no-border' name='tranche$item->id' value='$item->tranche'>
                    <input type='hidden' id='no-border' name='status$item->id' value='$item->status'>
                    $expense_title_display
                    <td >".
                        "<div class='tooltip_top' style='width: 100%;'>".
                        "<div style='padding-left: 10%;'>"."<input type='text' name='description$item->id' style='width: 100%' value='$item->description' id='".$description['readonly']."' class='item-description' placeholder='Item Description' ".$description['readonly']." >"."</div>".
                        "<span class='tooltiptext'>Item Description</span>
                        </div>".
                    "</td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='".$description['readonly']."' name='unit_cost$item->id' style='width: 60px' value='$item->unit_cost' placeholder='Unit Cost'>
                        <span class='tooltiptext'>Unit Cost</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='no-border' name='unit_measurement$item->id' style='width: 50px' value='$item->unit_measurement' placeholder='Unit Measurement'>
                        <span class='tooltiptext'>Unit Measurement</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='text' id='no-border' name='qty$item->id' style='width: 20px' value='$item->qty' placeholder='QTY'>
                        <span class='tooltiptext'>QTY</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='jan$item->id' style='width: 40px' value='$item->qty_jan' placeholder='Jan'>
                        <span class='tooltiptext'>January</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='feb$item->id' style='width: 40px' value='$item->qty_feb' placeholder='Feb'>
                        <span class='tooltiptext'>February</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top'>
                        <input type='number' id='no-border' name='mar$item->id' style='width: 40px' value='$item->qty_mar' placeholder='Mar'>
                        <span class='tooltiptext'>March</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='apr$item->id' style='width: 40px' value='$item->qty_apr' placeholder='Apr'>
                        <span class='tooltiptext'>April</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='may$item->id' style='width: 40px' value='$item->qty_may' placeholder='May'>
                        <span class='tooltiptext'>May</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='jun$item->id' style='width: 40px' value='$item->qty_jun' placeholder='Jun'>
                        <span class='tooltiptext'>June</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top'>
                        <input type='number' id='no-border' name='jul$item->id' style='width: 40px' value='$item->qty_jul' placeholder='Jul'>
                        <span class='tooltiptext'>July</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='aug$item->id' style='width: 40px' value='$item->qty_aug' placeholder='Aug'>
                        <span class='tooltiptext'>August</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='sep$item->id' style='width: 40px' value='$item->qty_sep' placeholder='Sep'>
                        <span class='tooltiptext'>September</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top'>
                        <input type='number' id='no-border' name='oct$item->id' style='width: 40px' value='$item->qty_oct' placeholder='Oct'>
                        <span class='tooltiptext'>October</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='nov$item->id' style='width: 40px' value='$item->qty_nov' placeholder='Nov'>
                        <span class='tooltiptext'>November</span>
                        </div>
                    </td>
                    <td>
                        <div class='tooltip_top' >
                        <input type='number' id='no-border' name='dec$item->id' style='width: 40px' value='$item->qty_dec' placeholder='Dec'>
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
                <td colspan='6'>
                    <strong class='pull-right' >
                        Total: <span data-toggle='tooltip' title='haha' class='badge bg-green' data-original-title='$total'>$total</span>
                    </strong>
                </td>
            </tr>";
    }
    function addItem($expense_title,$expense,$tranche,$expense_description){
        return "<tr>
            <td colspan='17'>
                <button type='button' data-id='$expense_title' data-expense='$expense' data-tranche='$tranche' data-expense_description='$expense_description' class='btn btn-block btn-primary btn-xs $expense_title' onclick='addItem($(this))'>Add Item</button>
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
    <form action="{{ asset('ppmp/list/search') }}" method="POST" class="item_submit">
        {{ csrf_field() }}
        <div class="row" style="margin-bottom: 60px;">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">{{ isset($expenses) && count($expenses) > 0 ? 'PPMP' : 'Item not found! please select expense' }}</h3>
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
                    <?php $grand_total = 0; ?>
                    @if(isset($expenses) && count($expenses) > 0 )
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped">
                            <tr>
                                <th>Item Description/General Specification</th>
                                <th>Unit Cost</th>
                                <th>Unit<br>Measu<br>rement</th>
                                <th>QTY</th>
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
                                            $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;
                                            echo displayHeader($title_header_expense.$title_header_first.$title_header_second);
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
                                                ->where('item.division','=',Auth::user()->division);
                                            if(isset($item_search)){
                                                $items = $items->where("item.description","like","%$item_search%");
                                            }
                                            $items = $items->orderBy("item.description","ASC")->get();

                                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second)."'>";
                                            $item_collection = [];
                                            foreach($items as $item){
                                                $item_collection[] = displayItem($item,$title_header_second);
                                                //echo displayItem($item,$title_header_second);
                                                $qty = $item->qty_jan+$item->qty_feb+$item->qty_mar+$item->qty_apr+$item->qty_may+$item->qty_jun+$item->qty_jul+$item->qty_aug+$item->qty_sep+$item->qty_oct+$item->qty_nov+$item->qty_dec;
                                                $estimated_budget = $item->unit_cost * $qty;
                                                $grand_total += $estimated_budget;
                                            }
                                            $item_collection =  \App\Http\Controllers\PpmpController::MyPagination(str_replace([' ','/','.','-',':',','],'HAHA',$display_second),$item_collection,$request); //paginate item
                                            $item_collection->getCollection()->transform(function ($value) {
                                                echo $value;
                                            });
                                            echo "</tbody>";
                                            echo paginateItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_second),$item_collection->links());
                                            //echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_second),$expense->id,$tranche,$display_second);
                                            echo expenseTotal($grand_total);
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
                                                ->where('item.division','=',Auth::user()->division);
                                                if(isset($item_search)){
                                                    $items = $items->where("item.description","like","%$item_search%");
                                                }
                                                $items = $items->get();

                                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first)."'>";
                                            $item_collection = [];
                                            foreach($items as $item){
                                                //echo displayItem($item,$display_first);
                                                $item_collection[] = displayItem($item,$title_header_second);
                                                $expense_total += $item->estimated_budget;
                                                $grand_total += $expense_total;
                                            }
                                            $item_collection =  \App\Http\Controllers\PpmpController::MyPagination(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$item_collection,$request); //paginate item
                                            $item_collection->getCollection()->transform(function ($value) {
                                                echo $value;
                                            });
                                            echo "</tbody>";
                                            echo paginateItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$item_collection->links());
                                            //echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$expense->id,$tranche,$display_first);
                                            if($tranche != "1-B")
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
                                        ->where('item.division','=',Auth::user()->division);
                                        if(isset($item_search)){
                                            $items = $items->where("item.description","like","%$item_search%");
                                        }
                                        $items = $items->get();

                                    echo "<tbody id='".str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description)."'>";
                                    $item_collection = [];
                                    foreach($items as $item){
                                        //echo displayItem($item,$expense->description);
                                        $item_collection[] = displayItem($item,$expense->description);
                                        if(is_numeric($item->estimated_budget)){
                                            $expense_total += $item->estimated_budget;
                                        }
                                        if(is_numeric($expense_total)){
                                            $grand_total += 0;
                                        }
                                    }
                                    $item_collection =  \App\Http\Controllers\PpmpController::MyPagination(str_replace([' ','/','.','-',':',','],'HAHA',$expense->description),$item_collection,$request); //paginate item
                                    $item_collection->getCollection()->transform(function ($value) {
                                        echo $value;
                                    });
                                    echo "</tbody>";
                                    echo paginateItem(str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description),$item_collection->links());
                                    echo addItem(str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description),$expense->id,'',$expense->description);
                                    if($expense_total != 0){
                                        echo expenseTotal($expense_total);
                                    }
                                }
                            }
                            ?>
                        </table>
                    </div>
                    @else
                        <div class="box-body">
                            <div class="row">
                                <?php
                                    $expense_length = \App\Expense::select(DB::raw("length(description) as char_max"))->orderBy(DB::raw("length(description)"),"desc")->first()->char_max; //count the max character para dile maguba ang info-box-content
                                ?>
                                @foreach(\App\Expense::get() as $expense)
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box" onclick="location.href='{{ asset('ppmp/list').'/'.$expense->id }}'" style='cursor: pointer;'>
                                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">
                                                <?php
                                                    $temp = $expense->description;
                                                    $count = 0;
                                                    $string = "";
                                                    for($i=0;$i<$expense_length;$i++){
                                                        if(!isset($temp[$i])){
                                                            $temp .= ".";
                                                        }
                                                        if($count != 23){
                                                            $count++;
                                                            $string .= $temp[$i];
                                                        } else {
                                                            $count = 0;
                                                            $string .= "<br>";
                                                        }
                                                    }
                                                    echo $string;
                                                ?>
                                            </span>
                                            <span class="info-box-number">{{ \App\Item::where("expense_id",$expense->id)->count() }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.box -->
            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Generate PDF</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Items</label>
                            <select class="form-control select2" id="filter_item" multiple="multiple" data-placeholder="Select a items." style="width: 100%;">
                                @foreach($all_item as $item)
                                    <option value="{{ $item->id }}">{{ $item->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <a href="#" onclick="filterItems()" type="button" class="btn btn-primary">Filter Items </a>
                        <a href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&division='.Auth::user()->division.'&userid='.Auth::user()->username }}" target="_blank" type="button" class="btn btn-success">All Items</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal modal-default fade" id="modal-info">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Filter PDF</h4>
                    </div>
                    <div class="modal-body text-center">
                        <a class="btn btn-block btn-social btn-foursquare" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&division='.Auth::user()->division.'&userid='.Auth::user()->username }}" target="_blank">
                            <i class="fa fa-file-pdf-o"></i> Region
                        </a>
                        <a class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-file-pdf-o"></i> Division
                        </a>
                        <a class="btn btn-block btn-social btn-google" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&division='.Auth::user()->division.'&userid='.Auth::user()->username.'&section='.Auth::user()->section }}" target="_blank">
                            <i class="fa fa-file-pdf-o"></i> Section
                        </a>
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
                    <button class="btn btn-app item_save" onclick="itemChecker()" name="item_save" type="submit">
                        <i class="fa fa-save"></i> Save
                    </button>
                    @endif
                    <!--
                    <a type="button" href="{{ url('FPDF/print/report.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&division='.Auth::user()->division.'&userid='.Auth::user()->username }}" target="_blank" class="btn btn-app">
                        <i class="fa fa-file-pdf-o"></i> Generate PDF
                    </a>
                    -->
                    <a type="button" data-toggle="modal" data-target="#modal-info" class="btn btn-app">
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
                @if(isset($expenses) && count($expenses) > 0)
                <div class="col-md-6" >
                    <h1>
                        Grand Total: <span class="badge bg-blue" style="font-size:20pt;"> <i class="fa fa-paypal"></i> {{  \DB::connection('mysql')->select("call grandTotal()")[0]->grand_total }}</span>
                    </h1>
                </div>
                @endif
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
                    console.log(item);
                    return index < 10;
                });
            }
        });

        var item_filter = [];
        var item_description = [];
        $.each(<?php echo $all_item; ?>,function(x,data){
            item_filter.push({ label:data.description, id:data.id });
            item_description.push(data.description);
        });
        $(".item-description").catcomplete({
            delay: 0,
            source: item_filter
        });

        function itemChecker(){
            $('.item_submit').attr('action', "<?php echo asset('ppmp/list')."/".$expense_id ?>");
            $(".item_save").val(true);
            var item_array = [];

            $(".item_submit :input.item-check").each(function(){
                var input = $(this).val();
                item_array.push(input);
            });

            var merge_item = item_description.concat(item_array);

            var sorted_arr = merge_item.slice().sort();
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
                /*Lobibox.window({
                    title: 'Checker',
                    content: result_display
                });*/
                event.preventDefault();
            }

        }

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
            });
        }

        function AddRow(element){
            var expense = element.data('expense');
            var expense_description = element.data('expense_description');
            var tranche = element.data('tranche');
            var userid = "<?php echo Auth::user()->username; ?>";
            var item_unique_row = uuidv4()+userid;
            var encoded_by = "<?php echo Auth::user()->lname.' '.Auth::user()->fname ?>";

            item_status = "<span class='badge bg-red' data-id='"+item_unique_row+"' data-item_description='' style='cursor: pointer;' onclick='deleteItem($(this))'><i class='fa fa-remove'></i> REMOVE</span>";
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
                "<input type='hidden' name='status"+item_unique_row+"' value='approve' ></td>" +
                "<span class='hide' id='expense_description"+item_unique_row+"'>"+expense_description+"</span>" +
                "<td width='35%' style='padding-left: 3%'>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' class='item-description item-check' placeholder='item-description' name='description"+item_unique_row+"' style='width: 100%'>" +
                "<span class='tooltiptext'>Item Description</span>"+
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
                "<input type='text' placeholder='Unit' name='unit_measurement"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>Unit Measurement</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='text' placeholder='QTY' name='qty"+item_unique_row+"' style='width: 20px'>" +
                "<span class='tooltiptext'>QTY</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Jan' name='jan"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>Estimated Budget</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Feb' name='feb"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>February</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Mar' name='mar"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>March</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Apr' name='apr"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>April</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='May' name='may"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>May</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Jun' name='jun"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>June</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Jul' name='jul"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>July</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Aug' name='aug"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>August</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Sep' name='sep"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>September</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Oct' name='oct"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>October</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Nov' name='nov"+item_unique_row+"' style='width: 40px'>" +
                "<span class='tooltiptext'>November</span>"+
                "</div>" +
                "</td>"+
                "<td>" +
                "<div class='tooltip_top' style='width: 100%;'>"+
                "<input type='number' placeholder='Dec' name='dec"+item_unique_row+"' style='width: 40px'>" +
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

        /*$(".div_paginator").each(function(index1){
            var paginator_href = $(this).children()[0].className;
            $("."+$(this).children()[0].className).children().children().each(function(index2){
                var _href = $($(this).children().get(0)).attr('href');
                $($(this).children().get(0)).attr('href',_href+'&type='+paginator_href);
            });
        });*/
    </script>
@endsection