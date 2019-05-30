<?php
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
        </tr>";
}
function displayItem($item){
    return "<tr>
                <td>".$item->code."</td>
                <td width='35%'>"
                ."<div style='padding-left: 10%'>".$item->description."</div>".
                "</td>
                <td>".$item->qty."</td>
                <td>".$item->unit_cost."</td>
                <td>".$item->estimated_budget."</td>
                <td>".$item->mode_procurement."</td>
                <td>".$item->jan."</td>
                <td>".$item->feb."</td>
                <td>".$item->mar."</td>
                <td>".$item->apr."</td>
                <td>".$item->may."</td>
                <td>".$item->jun."</td>
                <td>".$item->jul."</td>
                <td>".$item->aug."</td>
                <td>".$item->sep."</td>
                <td>".$item->oct."</td>
                <td>".$item->nov."</td>
                <td>".$item->dec."</td>
                <td><span class='label label-primary'>Approved</span></td>
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
            margin-top: 1.5%;
        }
    </style>
    <title>PPMP|LIST</title>
    <div class="row">
        <div class="col-md-10">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">PPMP</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th width="5.5%">Code</th>
                            <th>Item Description/General Specification</th>
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
                            <th>Status</th>
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
                                            echo displayHeader($title_header_expense.$title_header_first.$title_header_second);
                                            $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;
                                            foreach(\App\Item::where('tranche','=',$tranche)->get() as $item){
                                                echo displayItem($item);
                                            }
                                        }
                                        $count_first++;
                                    }
                                } else {
                                    //echo displayHeader($expense->description);
                                }
                            }
                        ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="row">
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
    </div>
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
                        var li;
                        if ( item.category != currentCategory ) {
                            ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                            currentCategory = item.category;
                        }
                        li = that._renderItemData( ul, item );
                        if ( item.category ) {
                            li.attr( "aria-label", item.category + " : " + item.label );
                        }
                    });
                }
            });

            var data = [
                { label: "anders", category: "" },
                { label: "andreas", category: "" },
                { label: "antal", category: "" },
                { label: "annhhx10", category: "Products" },
                { label: "annk K12", category: "Products" },
                { label: "annttop C13", category: "Products" },
                { label: "anders andersson", category: "People" },
                { label: "andreas andersson", category: "People" },
                { label: "andreas johnson", category: "People" }
            ];
            $( "#search" ).catcomplete({
                delay: 0,
                source: data
            });



        });
    </script>
@endsection