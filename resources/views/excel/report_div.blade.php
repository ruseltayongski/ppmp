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
//$expenses = \App\Expense::all();
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

function querySection($division_id){
    $pdo = conn();
    //$query = "SELECT sec.id,sec.description FROM dts.SECTION sec JOIN program_settings setting ON setting.section_id = sec.id group by sec.id ORDER BY ID ASC";
    $query = "SELECT * FROM dts.section WHERE division=?";

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($division_id));
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

function queryProgram($section_id, $yearly){
    $pdo = conn();
    $query = "SELECT prog.id,prog.description,setting.expense_id,setting.section_id, setting.yearly_ref_id FROM program_settings setting join programs prog on prog.id = setting.program_id where setting.section_id = ? and setting.yearly_ref_id = ? ORDER BY ID ASC";

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($section_id, $yearly));
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}


function queryExpense(){
    $pdo = conn();
    //$query = "SELECT exp.* FROM EXPENSE exp join program_settings setting on setting.expense_id = exp.id where setting.program_id = ? ORDER BY ID ASC";
    $query = "SELECT * FROM expense order by id asc";

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

function queryItem($expense_id, $program_id, $section, $yearly_ref){
    $pdo = conn();
    //$query = "SELECT * from item_daily where status is NULL and expense_id = ? and program_id = ? and section_id = ? group by item_id DESC order by description ASC";
    $query = "SELECT
                itd.*
              from
                item_daily itd
              left join
                item_daily itd1 on (
                                    itd.unique_id = itd1.unique_id and
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
              order by itd.description ASC";

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

function queryOriginal($expense_id, $section, $yearly_ref, $ppmp_stat){
    $pdo = conn();
    //$query = "SELECT * from item_daily where status is NULL and expense_id = ? and program_id = ? and section_id = ? group by item_id DESC order by description ASC";
    $query = "SELECT
                itd.*
              from
                item_daily itd
              left join
                item_daily itd1 on (
                                    itd.unique_id = itd1.unique_id AND
                                    itd.id < itd1.id AND
                                    itd.expense_id = itd1.expense_id AND
                                    itd.section_id = itd1.section_id AND
                                    itd.yearly_ref_id = itd1.yearly_ref_id AND
                                    itd.ppmp_status = itd1.ppmp_status
                                    )
              where
                itd.status is NULL and
                itd.expense_id = ? and
                itd.section_id = ? and
                itd.yearly_ref_id = ? and
                itd.ppmp_status = ? and
                itd1.id is null
              order by itd.description ASC";

    try {
        $st = $pdo->prepare($query);
        $st->execute(array($expense_id,$section,$yearly_ref,$ppmp_stat));
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    } catch(PDOException $ex){
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
              group by itd.item_id
              order by itd.description ASC";

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

function queryTranche($expense_id,$section, $tranche_code, $yearly_ref, $ppmp_stat){
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
                                    itd.section_id = itd1.section_id AND
                                    itd.tranche = itd1.tranche AND
                                    itd.yearly_ref_id = itd1.yearly_ref_id AND
                                    itd.ppmp_status = itd1.ppmp_status
                                    )
              where
                itd.status is NULL and
                itd.expense_id = ? and
                itd.section_id = ? and
                itd.tranche = ? and
                itd.yearly_ref_id = ? and
                itd.ppmp_status = ? and
                itd1.id is null
              group by itd.item_id
              order by itd.description ASC";

    try {
        $st = $pdo->prepare($query);
        $st->execute(array($expense_id,$section, $tranche_code, $yearly_ref, $ppmp_stat));
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    } catch(PDOException $ex){
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

$section_id = Auth::user()->section;
$division_id = Auth::user()->division;
$yearly_reference = Session::get('yearly_reference');
$ppmp_status = Session::get('ppmp_status');

$sections = querySection($division_id);
$expenses = queryExpense();
$programs = queryProgram($section_id,$yearly_reference);

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

function setItem($item,$section_id,$program_setting,$tranche){

    $yearly_reference = Session::get('yearly_reference');
    $ppmp_status = Session::get('ppmp_status');
    if( $item->expense_id == 1 and ( $item->tranche == "1-A-1" or $item->tranche == "1-A-2" or $item->tranche == "1-A-3" or $item->tranche == "1-B" )){

        $item_daily = \App\ItemDaily::where("item_id",$item->id)
            ->where("expense_id",$item->expense_id)
            ->where("tranche",$item->tranche)
            ->where("section_id",$section_id)
            ->where("division_id",$item->division_id)
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

function displayItem($item,$expense_title,$program_id, $section_id,$test ) {

    $user = Auth::user();
    setItem($item,$user->section, $program_id,$test);

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
?>
<!-- /.box-header -->

<div class="box-body table-responsive no-padding">
    <table class="table table-striped table-fixed-header">
        <thead class='header'>
        <tr><td colspan="18" style="text-align: center">PROJECT PROCUREMENT MANAGEMENT PLAN (PPMP)</td></tr>
        <tr><td colspan="18" style="text-align: left" > {{ $section_id }}</td></tr>
        <tr><td colspan="18" style="text-align: left"> {{ $section_id}}</td></tr>
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
        foreach($sections as $section) {
            echo displayHeader($section->description);
            $programs = queryProgram($section->id,$yearly_reference);
            if ($section->id == 28 || $section->id == 29 || $section->id == 32) {
                foreach ($programs as $program) {
                    $expenses = queryExpense();
                    foreach ($expenses as $expense) {
                        $count_first = 0;
                        $count_second = 0;
                        $alphabet = range('A', 'Z');
                        $expense_code = json_decode($expense->code, true);
                        if (isset($expense_code)) {
                            foreach ($expense_code as $display_first => $first) {
                                foreach ($first as $display_second) {
                                    $count_second++;

                                    $tranche = $expense->id . "-" . $alphabet[$count_first] . "-" . $count_second;

                                    $items = queryMainTranche($expense->id, $program->id, $section->id, $tranche, $yearly_reference);

                                    $difference = 0;
                                    $sub_total = 0;
                                    $expense_amount = 0;

                                    if (count($items) > 0 && $expense->id == $program->expense_id && $tranche == $tranche) {
                                        echo displayHeader("\t\t\t\t" . $program->description);
                                        echo displayHeader("\t\t\t\t" . "\t\t\t\t" . $expense->description);
                                        echo displayHeader("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_first);
                                        echo displayHeader("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_second);
                                        foreach ($items as $item) {
                                            echo displayItem($item, $division_id, $section_id, $program->id, $expense->id);
                                            $estimated_budget = setItem($item,$section_id,$program->id,$item->tranche)->estimated_budget;
                                            $sub_total += $estimated_budget;
                                            //$expense_amount = $expense_amount-$estimated_budget;
                                        }
                                        if(count($items) > 0) {
                                            echo expenseTotal($sub_total);
                                        }
                                    }
                                }
                                $flag[$display_first] = true;
                                //$title_header_expense1 .= "\t\t\t\t\t\t\t" . $display_first;
                                $tranche = $expense->id . "-" . $alphabet[$count_first];

                                $difference = 0;
                                $sub_total = 0;
                                $expense_total = 0;
                                $items = queryMainTranche($expense->id, $program->id, $section->id, $tranche, $yearly_reference);

                                if (count($items) > 0  && $expense->id == $program->expense_id && $tranche == $tranche) {
                                    echo displayHeader("\t\t\t\t\t\t\t\t" .$program->description);
                                    echo displayHeader("\t\t\t\t\t\t\t\t\t\t" .$expense->description);
                                    echo displayHeader("\t\t\t\t\t\t\t\t\t\t\t\t" . $display_first);
                                    foreach ($items as $item) {
                                        echo displayItem($item,$division_id, $section_id, $program->id, $expense->id);
                                        $estimated_budget = setItem($item,$section_id,$program->id,$item->tranche)->estimated_budget;
                                        $sub_total += $estimated_budget;
                                        //$expense_amount = $expense_amount-$estimated_budget;
                                    }
                                    if(count($items) > 0) {
                                        echo expenseTotal($sub_total);
                                    }
                                }
                                $count_first++;
                            }
                        }
                         else {
                            $expense_total = 0;

                            $items = queryItem($expense->id, $program->id, $section->id, $yearly_reference);

                            $difference = 0;
                            $sub_total = 0;
                            $expense_total = 0;
                            $expense_amount = 0;
                            if ($expense->id == $program->expense_id && count($items) > 0) {
                                echo displayHeader("\t\t\t\t\t\t\t\t" . $program->description);
                                echo displayHeader("\t\t\t\t\t\t\t\t\t\t\t\t\t" . $expense->description);
                                foreach ($items as $item) {
                                    echo displayItem($item, $division_id, $section_id, $program->id, $expense->id);
                                    $estimated_budget = setItem($item,$section_id,$program->id, $item->tranche)->estimated_budget;
                                    $sub_total += $estimated_budget;
                                    //$expense_amount = $expense_amount-$estimated_budget;
                                }
                                if(count($items) > 0) {
                                    echo expenseTotal($sub_total);
                                }
                            }
                        }
                    }
                }
            }
            if ($section->id != 28 || $section->id != 29 || $section->id != 32 && $ppmp_status != "program") {
                foreach ($expenses as $expense) {
                    $expense_total = 0;
                    $count_first = 0;
                    $count_second = 0;
                    $difference = 0;
                    $alphabet = range('A', 'Z');

                    $expense_code = json_decode($expense->code, true);
                    if (isset($expense_code)) {
                        foreach ($expense_code as $display_first => $first) {
                            foreach ($first as $display_second) {
                                $count_second++;

                                $tranche = $expense->id . "-" . $alphabet[$count_first] . "-" . $count_second;

                                $items = queryTranche($expense->id, $section->id, $tranche, $yearly_reference, $ppmp_status);

                                $sub_total = 0;
                                if ($section->id == 28 || $section->id == 29 || $section->id == 32) {
                                } else
                                    if (count($items) > 0 && $tranche == $tranche) {
                                        echo displayHeader("\t\t\t\t\t\t\t\t" . $expense->description);
                                        echo displayHeader("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_first);
                                        echo displayHeader("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_second);

                                        foreach ($items as $item) {
                                            if ($item->program_id == null)
                                                echo displayItem($item,$section_id, $expense->id, $yearly_reference, "");
                                                $estimated_budget = setItem($item,$section_id,"","")->estimated_budget;
                                                $sub_total += $estimated_budget;
                                            }
                                        if(count($items) > 0) {
                                            echo expenseTotal($sub_total);
                                        }
                                        }
                                    }
                            $flag[$display_first] = true;
//                        $title_header_expense1 .= "\t\t\t\t\t\t\t" . $display_first;
                            $tranche = $expense->id . "-" . $alphabet[$count_first];

                            $expense_total = 0;
                            $items = queryTranche($expense->id, $section->id, $tranche, $yearly_reference, $ppmp_status);
                            $sub_total = 0;
                            if (count($items) > 0 && $tranche == $tranche) {
                                echo displayHeader("\t\t\t\t\t\t\t\t" . $expense->description);
                                echo displayHeader("\t\t\t\t\t\t\t\t\t\t\t\t" . $display_first);
                                foreach ($items as $item) {
                                    if ($item->program_id == null)
                                        echo displayItem($item, $division_id, $section_id, "", $expense->id);
                                        $estimated_budget = setItem($item,$section_id,"","")->estimated_budget;
                                        $sub_total += $estimated_budget;
                                    }
                                if(count($items) > 0) {
                                    echo expenseTotal($sub_total);
                                }
                                }
                            //}
                            $count_first++;
                        }
                    } else {
                        $expense_total = 0;

                        $items = queryOriginal($expense->id, $section->id, $yearly_reference, $ppmp_status);
                        $sub_total = 0;
                        if ($section->id == 28 || $section->id == 29 || $section->id == 32) {
                        } else
                            if (count($items) > 0)
                                echo displayHeader("\t\t\t\t\t\t\t\t" . $expense->description);

                        foreach ($items as $item) {
                            if($item->program_id == null)
                                echo displayItem($item, $section_id, $expense->id, $yearly_reference, "");
                                $estimated_budget = setItem($item,$section_id,"","")->estimated_budget;
                                $sub_total += $estimated_budget;
                            }
                        if(count($items) > 0) {
                            echo expenseTotal($sub_total);
                        }
                        }
                    }
                }
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
    </table>
</footer>

<!-- /.box -->

