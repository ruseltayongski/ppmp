<style>
    th,thead,td {
        border: thin solid black;
    }

    span {
        text-align: left;
    }
</style>
<?php

$user = Auth::user();
$sections = \App\Section::where('division',"=", $user->division)
    ->get();
$expenses = \App\Expense::all();
//$generate_level = Session::get('generate_level');

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

function queryExpense(){
    $pdo = conn();
    $query = "SELECT * FROM EXPENSE ORDER BY ID ASC";

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

function queryDivision($division_id){
    $pdo = conn();
    $query = "SELECT * FROM dts.division where id = ?";

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($division_id));
        $row = $st->fetch(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}


function queryOriginal($expense_id, $yearly_ref, $ppmp_status,$section_id){
    $pdo = conn();
    //$query = "SELECT * from item_daily where status is NULL and expense_id = ? and program_id = ? and section_id = ? group by item_id DESC order by description ASC";
    $query = "SELECT
                  itd.*
              from
                  item_daily itd
              left join
                item_daily itd1 on
                (
                  itd.unique_id = itd1.unique_id and
                  itd.id < itd1.id and
                  itd.division_id = itd1.division_id and
                  itd.section_id = itd1.section_id
                )
              where
                itd.status is NULL and
                itd.expense_id = ? and
                itd.yearly_ref_id = ? and
                itd.ppmp_status = ? and
                itd.section_id = ? and
                itd1.id is null
              order by
                itd.description ASC";

    try {
        $st = $pdo->prepare($query);
        $st->execute(array($expense_id,$yearly_ref,$ppmp_status,$section_id));
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    } catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }

    return $row;
}

function queryMain($expense_id, $tranche_code, $yearly_reference ,$ppmp_stat, $section_id){
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
                                    itd.tranche = itd1.tranche AND
                                    itd.yearly_ref_id = itd1.yearly_ref_id AND
                                    itd.ppmp_status = itd1.ppmp_status AND
                                    itd.section_id = itd1.section_id
                                    )
              where
                itd.status is NULL and
                itd.expense_id = ? and
                itd.tranche = ? and
                itd.yearly_ref_id = ? and
                itd.ppmp_status = ? and
                itd.section_id = ? and
                itd1.id is null
              group by itd.item_id
              order by itd.description ASC";

    try {
        $st = $pdo->prepare($query);
        $st->execute(array($expense_id,$tranche_code,$yearly_reference, $ppmp_stat, $section_id));
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
            </tr>";
}

function setItem($item,$section_id){

    $yearly_reference = Session::get('yearly_reference');
    $ppmp_status = Session::get('ppmp_status');
    if( $item->expense_id == 1 and ( $item->tranche == "1-A-1" or $item->tranche == "1-A-2" or $item->tranche == "1-A-3" or $item->tranche == "1-B" )){

        $item_daily = \App\ItemDaily::where("item_id",$item->id)
            ->where("expense_id",$item->expense_id)
            ->where("tranche",$item->tranche)
            //->where("section_id",$section_id)
//            ->where("division_id",$item->division_id)
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

function displayItem($item) {

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
                    <td colspan='14' style='text-align: left'><span style='border:solid;'  data-toggle='tooltip' title='haha' class='badge bg-green' data-original-title='$total'>$total</span></td>
                </tr>";
}
function grandTotal($g_total){
    return "<tr>
                    <td colspan='4'>
                        <strong class='pull-right' >
                            Grand Total:
                        </strong>
                    </td>
                    <td colspan='14' style='text-align: left'><span style='border:solid;'  data-toggle='tooltip' title='haha' class='badge bg-green' data-original-title='$g_total'>$g_total</span></td>
                </tr>";
}
?>
<!-- /.box-header -->
<?php
$section_id = Auth::user()->section;
$division_id = Auth::user()->division;
$yearly_reference = Session::get('yearly_reference');
$ppmp_status = Session::get('ppmp_status');

$con = new \App\Http\Controllers\BudgetController();
$fmis = $con->getFMIS_data();
foreach ($fmis as $charge)
?>
<div class="box-body table-responsive no-padding">
    <table class="table table-striped table-fixed-header">
        <thead class='header'>
        <tr><td colspan="18" style="text-align: center">PROJECT PROCUREMENT MANAGEMENT PLAN (PPMP)</td></tr>
        <tr><td colspan="18" style="text-align: left" > {{ $section_desc }}</td></tr>
        <tr><td colspan="18" style="text-align: left"> {{$charge->FundSourceTitle}}</td></tr>
        <tr><td colspan="18" style="text-align: left"> Projects, Programs and Activities (PAPs) </td></tr>
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
        </tr>
        </thead>
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

                        $items = queryMain($expense->id,$tranche,$yearly_reference, $ppmp_status, $section_id);

                        if(count($items) > 0 ) {
                            echo displayHeader("<div style='padding-left: 3%'>".$expense->description."</div>");
                            echo displayHeader("<div style='padding-left: 5%'>".$display_first."</div>");
                            echo displayHeader("<div style='padding-left: 10%'>".$display_second."</div>");

                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_second),''."'>";
                            $item_collection = [];
                            $sub_total = 0;
                            foreach($items as $item){
                                echo displayItem($item);
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

                        $items = queryMain($expense->id,$tranche,$yearly_reference, $ppmp_status, $section_id);

                        if(count($items) > 0 ) {

                            echo displayHeader("<div style='padding-left: 3%'>".$expense->description."</div>");
                            echo displayHeader("<div style='padding-left: 5%'>".$display_first."</div>");

                            echo "<tbody id='".str_replace([' ','/','.','-',':',','],'HAHA',$display_first).""."'>";
                            $item_collection = [];
                            $sub_total = 0;
                            $title_header_second = '';
                            foreach($items as $item){
                                echo displayItem($item);
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
                $items = queryOriginal($expense->id,$yearly_reference,$ppmp_status,$section_id);

                if(count($items) > 0) {

                    echo displayHeader("<div style='padding-left: 3%'>".$expense->description."</div>"); //display expense if no value from first

                    echo "<tbody id='".str_replace([' ','/','.','-',':',',','(',')'],'HAHA',$expense->description).""."'>";
                    $item_collection = [];
                    $sub_total = 0;
                    foreach($items as $item){
                        //$item_collection[] = displayItem($item,$expense->description);
                        echo displayItem($item);
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

        ?>
    </table>
</div>
<footer id="footer">
    <table>
        <tr>
            <td>Total Budget:</td>
            <td colspan="17">Total</td>
        </tr>
        <tr><td colspan="18"></td></tr>
        <tr>
            <td colspan="18">NOTE: Technical Specifications for each Item/Project being proposed shall be submitted as part of the PPMP</td>
        </tr>
        <tr><td colspan="18"></td></tr>
        <tr>
            <td colspan="5">Prepared by:</td>
            <td colspan="5">Evaluated by:</td>
            <td colspan="8">Recommending Approval:</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="5"></td>
            <td colspan="8"></td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="5"></td>
            <td colspan="8"></td>
        </tr>
        <tr>
            <td colspan="5">{{ $sec_head->head_name }}</td>
            <td colspan="5">Leonora A. Aniel</td>
            <td colspan="8">{{ $head->head_name }} </td>
        </tr>
        <tr>
            <td colspan="5">{{ $sec_head->designation }}</td>
            <td colspan="5">Budget III/Administrative Officer V</td>
            <td colspan="8">Chief,Local Health Support Division</td>
        </tr>
    </table>
</footer>

<!-- /.box -->
