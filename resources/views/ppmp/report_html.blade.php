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
    <title>PROGRAM | CHECK </title>
    <?php

    $user = Auth::user();

    $sections = \App\Section::where('division',"=", $user->division)
                            ->get();
    $expenses = \App\Expense::all();

    function conn()
    {
        $server = 'localhost';
        try{
            $pdo = new PDO("mysql:host=$server; dbname=ppmpv2",'root','adm1n');
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch (PDOException $err) {
            echo "<h3>Can't connect to database server address $server</h3>";
            exit();
        }
        return $pdo;
    }

    function querySection(){
        $pdo = conn();
        $query = "SELECT sec.id,sec.description FROM dts.SECTION sec JOIN program_settings setting ON setting.section_id = sec.id group by sec.id ORDER BY ID ASC";

        try
        {
            $st = $pdo->prepare($query);
            $st->execute();
            $row = $st->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $ex){
            echo $ex->getMessage();
            exit();
        }
        return $row;
    }

    function queryMainTranche($expense_id, $program_id, $section, $tranche_code, $yearly_reference){
        $pdo = conn();
        $query = "SELECT
                itd.*
              from
                item_daily itd
              left join
                item_daily itd1 on (
                                    itd.item_id = itd1.item_id and
                                    itd.id < itd1.id AND
                                    itd.expense_id = itd1.expense_id AND
                                    itd.program_id = itd1.program_id AND
                                    itd.section_id = itd1.section_id AND
                                    itd.tranche = itd1.tranche AND
                                    itd.yearly_ref_id = itd1.yearly_ref_id
                                    )
              where
                itd.status is NULL and
                itd.expense_id = ? and
                itd.program_id = ? and
                itd.section_id = ? and
                itd.tranche = ? and
                itd.yearly_ref_id = ? AND
                itd1.id is null
              group by item_id DESC
              order by description ASC";

        try {
            $st = $pdo->prepare($query);
            $st->execute(array($expense_id,$program_id,$section, $tranche_code,$yearly_reference));
            $row = $st->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $ex){
            echo $ex->getMessage();
            exit();
        }

        return $row;
    }

    function queryItem($expense_id, $program_id, $section, $yearly_ref){
        $pdo = conn();
        //$query = "SELECT * from item_daily where status is NULL and expense_id = ? and program_id = ? and section_id = ? group by item_id DESC order by description ASC";
        $query = "SELECT
                itd.*
              from
                item_daily itd
              left join
                item_daily itd1 on (
                                    itd.item_id = itd1.item_id and
                                    itd.id < itd1.id AND
                                    itd.expense_id = itd1.expense_id AND
                                    itd.program_id = itd1.program_id AND
                                    itd.section_id = itd1.section_id AND
                                    itd.yearly_ref_id = itd1.yearly_ref_id
                                    )
              where
                itd.status is NULL and
                itd.expense_id = ? and
                itd.program_id = ? and
                itd.section_id = ? and
                itd.yearly_ref_id = ? AND
                itd1.id is null
              group by item_id DESC
              order by description ASC";

        try {
            $st = $pdo->prepare($query);
            $st->execute(array($expense_id,$program_id,$section, $yearly_ref));
            $row = $st->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $ex){
            echo $ex->getMessage();
            exit();
        }

        return $row;
    }

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
        $item->estimated_budget = (int)$item->qty * str_replace(',', '',(int)$item->unit_cost);

        return $item;
    }

    function displayItem($item,$expense_title,$program_id, $section_id) {

        $user = Auth::user();
        setItem($item,$user->section);

        if ((int)$item->qty > 0) {
            $data = "<tr>
                    <td style='padding-left: 2%;'>".htmlspecialchars($item->description, ENT_QUOTES)."</td>
                    <td>$item->unit_measurement</td>
                    <td>$item->qty</td>
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
                </tr>";

            return $data;
        }
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
//    function addItem($expense_title,$expense,$tranche,$expense_description,$program_id){
//        return "<tr>
//            <td colspan='19'>
//                <button type='button' data-id='$expense_title' data-program_id='$program_id' data-expense='$expense' data-tranche='$tranche' data-expense_description='$expense_description' class='btn btn-block btn-primary btn-xs $expense_title' onclick='addItem($(this))'>Add Item</button>
//            </td>
//        </tr>";
//    }
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
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" style="width: 300px;" id="item_search" name="item_search" value="" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <?php
                    $section_id = Auth::user()->section;
                    $division_id = Auth::user()->division;
                    $yearly_reference = Session::get('yearly_reference');
                    $ppmp_status = Session::get('ppmp_status');
                    $sections = querySection();
                    ?>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped table-fixed-header">
                            <thead class='header'>
                            <tr class="bg-black">
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
                            </thead>
                            <?php
                            foreach($sections as $section) {
                                echo displayHeader("<div style='color:#00CC99; font-size: 20px;' >".$section->description."</div>");
                                if($section->id == 28 || $section->id == 29 || $section->id == 32) {
                                    $settings = \App\ProgramSetting::select("programs.id","programs.description","program_settings.expense_id","program_settings.section_id")
                                        ->where('program_settings.section_id',"=",$section->id)
                                        ->Join("programs","programs.id","=","program_settings.program_id")
                                        ->get();
                                    foreach($settings as $setting) {
//                                        $expenses = \App\ItemDaily::select("expense.*")
//                                            ->join("expense","expense.id","=","item_daily.expense_id")
//                                            ->where("item_daily.program_id",$setting->program_id)
//                                            ->groupBy("expense.id")
//                                            ->get();
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
                                                        //$items = \DB::connection('mysql')->select("call main_tranche('$expense->id','$tranche')");
                                                        $items = queryMainTranche($expense->id, $setting->id, $section->id, $tranche, $yearly_reference);

                                                        if(count($items) > 0 and $expense->id == $setting->expense_id ) {
                                                            if(!($setting->id)) {
                                                                echo displayHeader($setting->description);
                                                            }
                                                            echo displayHeader("<mark style='padding-left: 1%'>".$setting->description."</mark>");
                                                            echo displayHeader("<div style='padding-left: 3%'>".$expense->description."</div>");
                                                            echo displayHeader("<div style='padding-left: 5%'>".$display_first."</div>");
                                                            echo displayHeader("<div style='padding-left: 10%'>".$display_second."</div>");

                                                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second).$setting->id."'>";
                                                            $item_collection = [];
                                                            $sub_total = 0;
                                                            foreach($items as $item){
                                                                echo displayItem($item,$title_header_second,$setting->id, $section_id);
                                                                $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                                                $sub_total += $estimated_budget;
                                                            }
                                                            echo "</tbody>";
                                                            if(count($items) > 0) {
                                                                echo expenseTotal($sub_total);
                                                            }
                                                        }
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

//                                                        if($tranche == '1-C' or $tranche == '49-A' or $tranche == '49-B' or $tranche == '49-C' or $tranche == '49-D'){
//                                                            $items = \DB::connection('mysql')->select("call tranche_one_c('$expense->id','$tranche','$section_id','$yearly_reference','$ppmp_status')");
//                                                        }
//                                                        else{
//                                                            $items = \DB::connection('mysql')->select("call main_tranche('$expense->id','$tranche')");
//                                                        }
                                                        $items = queryMainTranche($expense->id, $setting->id, $section->id, $tranche, $yearly_reference);

                                                        if(count($items) > 0 and $expense->id == $setting->expense_id) {
                                                            if(!($setting->id)) {
                                                                echo displayHeader($setting->description);
                                                            }
                                                            echo displayHeader("<mark style='padding-left: 1%'>".$setting->description."</mark>");
                                                            echo displayHeader("<div style='padding-left: 3%'>".$expense->description."</div>");
                                                            echo displayHeader("<div style='padding-left: 5%'>".$display_first."</div>");

                                                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first).$setting->id."'>";
                                                            $item_collection = [];
                                                            $sub_total = 0;
                                                            $title_header_second = '';
                                                                foreach($items as $item){
                                                                    echo displayItem($item,$title_header_second,$setting->id, $section_id);
                                                                    $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                                                    $sub_total += $estimated_budget;
                                                                }
                                                            echo "</tbody>";
                                                            if(count($items) > 0) {
                                                                echo expenseTotal($sub_total);
                                                            }
                                                        }
//                                                    if($tranche != "1-B")
//                                                        echo addItem(str_replace([' ','/','.','-',':',','],'HAHA',$display_first),$expense->id,$tranche,$display_first,$setting->id);
                                                    } // display if first is null
                                                    $count_first++;
                                                } // end sub tranche expense
                                            }
                                            else
                                            { // normal expense
                                                $expense_total = 0;

                                                //$items = \DB::connection('mysql')->select("call normal_tranche_program('$expense->id','$section_id','$yearly_reference','$ppmp_status','$setting->id')");
                                                $items = queryItem($expense->id, $setting->id, $section->id, $yearly_reference);

                                                if(count($items) > 0 and $expense->id == $setting->expense_id) {
                                                    if(!($setting->id)) {
                                                        echo displayHeader($setting->description);
                                                    }
                                                    echo displayHeader("<mark style='padding-left: 1%'>".$setting->description."</mark>");
                                                    echo displayHeader("<div style='padding-left: 3%'>".$expense->description."</div>"); //display expense if no value from first

                                                echo "<tbody id='".str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description).$setting->id."'>";
                                                $item_collection = [];
                                                    $sub_total = 0;
                                                foreach($items as $item){
                                                    //$item_collection[] = displayItem($item,$expense->description);
                                                    echo displayItem($item,$expense->description,$setting->id, $section_id);
                                                    $estimated_budget = setItem($item,$section_id)->estimated_budget;
                                                    $sub_total += $estimated_budget;
                                                    }
                                                    echo "</tbody>";
                                                    if(count($items) > 0) {
                                                        echo expenseTotal($sub_total);
                                                    }
                                                }
                                                //echo addItem(str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description).$setting->id,$expense->id,'',$expense->description,$setting->id);
                                                if($expense_total != 0 and count($items) > 0 ){
                                                    echo expenseTotal($expense_total);
                                                }
                                            }// end normal expense
                                        }
                                    }
                                }
                            }

                            ?>
                        </table>
                    </div>
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
            <!--
                <div class="col-md-6" >
                    <h1>
                        Grand Total: <span class="badge bg-blue" style="font-size:20pt;"> <i class="fa fa-paypal"></i> {{ \DB::connection('mysql')->select("call grandTotal()")[0]->grand_total }}</span>
                    </h1>
                </div>
                -->
            </div>
        </footer>
    </form>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.table-fixed-header').fixedHeader();
        });
    </script>
@endsection