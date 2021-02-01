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
    <title>PPMP|DASHBOARD</title>

    <?php
    $section_id = Auth::user()->section;
    $division_id = Auth::user()->division;
    ?>

    <div class="box box-primary">
        <div class="row" style="margin-bottom: 60px;">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="row">
                        <?php
                        $expense_length = \App\Expense::select(DB::raw("length(description) as char_max"))->orderBy(DB::raw("length(description)"),"desc")->first()->char_max; //count the max character para dile maguba ang info-box-content
                        ?>
                        @foreach($expenses as $expense)
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
                                        <span class="info-box-number">{{ count(\DB::connection('mysql')->select("call normal_tranche('$expense->id','$section_id')")) }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection