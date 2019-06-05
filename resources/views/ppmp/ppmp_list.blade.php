<?php
use App\Item;
function displayHeader($title){
    return "<tr>
            <td></td>
            <td width='35%'>
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
function displayItem($item){
    return "<tr>
                <td>".$item->code."</td>
                <td width='35%'>"
                ."<div style='padding-left: 10%'>"."<input type='text' style='width: 310px' value='$item->description' id='item_description$item->id' class='item-description' >"."</div>".
                "</td>
                <td><input type='text' style='width: 40px' value='$item->unit_measurement'></td>
                <td><input type='text' style='width: 40px' value='$item->qty'></td>
                <td><input type='text' style='width: 50px' value='$item->unit_cost'></td>
                <td><input type='text' style='width: 60px' value='$item->estimated_budget'></td>
                <td><input type='text' style='width: 80px' value='$item->mode_procurement'></td>
                <td><input type='text' style='width: 30px' value='$item->jan'></td>
                <td><input type='text' style='width: 30px' value='$item->feb'></td>
                <td><input type='text' style='width: 30px' value='$item->mar'></td>
                <td><input type='text' style='width: 30px' value='$item->apr'></td>
                <td><input type='text' style='width: 30px' value='$item->may'></td>
                <td><input type='text' style='width: 30px' value='$item->jun'></td>
                <td><input type='text' style='width: 30px' value='$item->jul'></td>
                <td><input type='text' style='width: 30px' value='$item->aug'></td>
                <td><input type='text' style='width: 30px' value='$item->sep'></td>
                <td><input type='text' style='width: 30px' value='$item->oct'></td>
                <td><input type='text' style='width: 30px' value='$item->nov'></td>
                <td><input type='text' style='width: 30px' value='$item->dec'></td>
                <td class='text-center'><label class='mytooltip'><span class='mytext'>$item->encoded_by</span><input type='checkbox' class='flat-red' style='font-size:7pt;cursor: pointer;' checked></label></td>
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
        li {
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

    </style>
    <title>PPMP|LIST</title>
    <div class="row" style="margin-bottom: 60px;">
        <div class="col-md-10">
            <div class="box">
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
                    <table class="table table-hover" style="font-size:8pt">
                        <tr>
                            <th width="5.5%">Code</th>
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
                            <th>Encoded By/Status</th>
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
                                            $items = Item::where('tranche','=',$tranche)->select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"))->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')->get();
                                            foreach($items as $item){
                                                echo displayItem($item);
                                                $expense_total += $item->estimated_budget;
                                                $grand_total += $expense_total;
                                            }
                                            echo expenseTotal($expense_total);
                                        } //display if first have value
                                        if(!isset($flag[$display_first])){
                                            $expense_total = 0;
                                            echo displayHeader($display_first);
                                            $tranche = $expense->id."-".$alphabet[$count_first];
                                            $items = Item::where('tranche','=',$tranche)->select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"))->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')->get();
                                            foreach($items as $item){
                                                echo displayItem($item);
                                                $expense_total += $item->estimated_budget;
                                                $grand_total += $expense_total;
                                            }
                                            if($expense_total != 0)
                                                echo expenseTotal($expense_total);

                                        } // display if first is null
                                        $count_first++;
                                    }
                                } else {
                                    $expense_total = 0;
                                    echo displayHeader($expense->description); //display expense if no value from first
                                    $items = Item::where('expense_id','=',$expense->id)->select('item.*',DB::raw("upper(concat(personal_information.lname,' ',personal_information.fname)) as encoded_by"))->leftJoin('pis.personal_information','personal_information.userid','=','item.userid')->get();
                                    foreach($items as $item){
                                        echo displayItem($item);
                                        $expense_total += $item->estimated_budget;
                                        $grand_total += $expense_total;
                                    }
                                    if($expense_total != 0)
                                        echo expenseTotal($expense_total);
                                }
                            }
                        ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-2">
            <div class="box">
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                SAA # 9999999999
                                <small>DOH-99999</small>
                            </h1>
                        </section><br>
                        <div class="col-lg-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>1000000</h3>

                                    <p>Beginning Balance</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">SA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>1000000</h3>

                                    <p>Remaining Balance</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">SA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <!-- Content Header (Page header) -->
                        <section class="content-header">
                            <h1>
                                SAA # 9999999999
                                <small>DOH-99999</small>
                            </h1>
                        </section><br>
                        <div class="col-lg-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>1000000</h3>

                                    <p>Beginning Balance</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">SAA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-12 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>1000000</h3>

                                    <p>Remaining Balance</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">SAA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="col-md-6">
                <button class="btn btn-app" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
                <a href="{{ url('FPDF/print/report.php') }}" target="_blank" class="btn btn-app">
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
@endsection

@section('js')

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
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
            $(".item-description").each(function(){
                $("#"+this.id).catcomplete({
                    delay: 0,
                    source: item_filter
                });
            })

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })
        });
    </script>
@endsection