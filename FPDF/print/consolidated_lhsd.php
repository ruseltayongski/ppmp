<?php
/**
 * Created by PhpStorm.
 * User: DOH
 * Date: 24/12/2021
 * Time: 9:55 AM
 */
date_default_timezone_set('Asia/Manila');

function conn()
{
    $server = '192.168.110.31';
    try{
        $pdo = new PDO("mysql:host=$server; dbname=ppmpv2",'rtayong_31','rtayong_31');
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


require('mctable_program.php');

$generate_level = $_GET['generate_level'];
$division_id = $_GET['division_id'];
$section_id = $_GET['section_id'];
$yearly_reference = $_GET['yearly_reference'];
//$program_id = $_GET['program_id'];


$sections = querySection($division_id);
$expenses = queryExpense();
$programs = queryProgram($section_id,$yearly_reference);


if($division_id == 6){
    $charge_to = "SUPPORT TO OPERATION - OPERATION OF REGIONAL OFFICES";
} else {
    $charge_to = "Public Health Management";
}

$division_name = queryDivision($division_id)->description;
if($division_id == 6){
    $division_chief_name = "Elizabeth P. Tabasa CPA,MBA,CEO VI";
}
else{
    $division_chief_name = "Jonathan Neil V. Erasmo, MD,MPH,FPSMS";
}


$pdf=new PDF_MC_Table('L','mm','a4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(3);
$pdf->setX(3);
$pdf->SetFont('Arial','',7);
$pdf->SetWidths(array(290));
$pdf->Row(array("END-USER/UNIT : ".$division_name));

$pdf->Row(array("Charged to : ".$charge_to));
$pdf->Row(array("Project, Programs and Activities/(PAPs)"));

$pdf->SetFont('Arial','B',7);
$pdf->SetWidths(array(
    10, //1
    105.6, //2
    12, //3
    13, //4
    17.2, //5
    17.2, //6
    19, //7
    95 //8
));
$pdf->TableTitle([
    "CODE", //1
    "General Description", //2
    "Unit", //3
    "Qty /", //4
    "Unit Cost", //5
    "Estimated", //6
    "Mode", //7
    "SCHEDULE / MILESTONE OF ACTIVITIES", //8
],'TLR');
$pdf->SetWidths(array(
    10, //1
    105.6, //2
    12, //3
    13, //4
    17.2, //5
    17.2, //6
    19, //7
    13, //8
    12, //9
    7, //10
    7, //11
    7, //12
    7, //13
    7, //14
    7, //15
    7, //16
    7, //17
    7, //18
    7 //19
));
$pdf->TableTitle([
    "", //1
    "", //2
    "", //3
    "Size", //4
    "Cost", //5
    "Budget", //6
    "Procurement", //7
    "Jan", //8
    "Feb", //9
    "Mar", //10
    "Apr", //11
    "May", //12
    "Jun", //13
    "Jul", //14
    "Aug", //15
    "Sep", //16
    "Oct", //17
    "Nov", //18
    "Dec", //19
],'BLR');

$yearly_reference = $_GET['yearly_reference'];
$ppmp_status = $_GET['ppmp_status'];

foreach($sections as $section) {
    $pdf->displayExpense($section->description);
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

                            $pdf->SetFont('Arial', 'B', 7);

                            $tranche = $expense->id . "-" . $alphabet[$count_first] . "-" . $count_second;

                            $items = queryMainTranche($expense->id, $program->id, $section->id, $tranche, $yearly_reference);

                            if (count($items) > 0 && $expense->id == $program->expense_id && $tranche == $tranche) {
                                $pdf->displayExpense("\t\t\t\t" . $program->description);
                                $pdf->displayExpense("\t\t\t\t" . "\t\t\t\t" . $expense->description);
                                $pdf->displayExpense("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_first);
                                $pdf->displayExpense("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_second);
                                foreach ($items as $item) {
                                    $pdf->SetFont('Arial', '', 7);
                                    $pdf->displayItem($item, $generate_level, $division_id, $section_id, $program->id, $expense->id, $tranche);
                                }
                                $difference = 0;
                                $pdf->SetFont('Arial', 'B', 7);
                                if (isset($pdf->sub_total[$expense->id . $program->id . $tranche . $section->id])) {
                                    $sub_total = number_format((float)$pdf->sub_total[$expense->id . $program->id . $tranche . $section->id], 2, '.', ',');
                                }if(count($items) > 0 )
                                    $pdf->expenseTotal($sub_total, number_format((float)$difference, 2, '.', ','));
                            }
                        } //display if first have value

//                        if (!isset($flag[$display_first])) {
//                            $pdf->SetFont('Arial', 'B', 7);
//                            $title_header_expense1 = '';
//                            if (!isset($flag[$expense->description])) {
//                                $title_header_expense1 = $expense->description;
//                                $flag[$expense->description] = true;
//                            }

                        $flag[$display_first] = true;
                        //$title_header_expense1 .= "\t\t\t\t\t\t\t" . $display_first;
                        $tranche = $expense->id . "-" . $alphabet[$count_first];


                        $expense_total = 0;
                        $items = queryMainTranche($expense->id, $program->id, $section->id, $tranche, $yearly_reference);

                        if (count($items) > 0  && $expense->id == $program->expense_id && $tranche == $tranche) {
                            $pdf->displayExpense("\t\t\t\t\t\t\t\t" .$program->description);
                            $pdf->displayExpense("\t\t\t\t\t\t\t\t\t\t" .$expense->description);
                            $pdf->displayExpense("\t\t\t\t\t\t\t\t\t\t\t\t" . $display_first);
                            foreach ($items as $item) {
                                $pdf->SetFont('Arial', '', 7);
                                $pdf->displayItem($item, $generate_level, $division_id, $section_id, $program->id, $expense->id, $tranche);
                            }
                            $difference = 0;
                            $pdf->SetFont('Arial', 'B', 7);

                            if (isset($pdf->sub_total[$expense->id . $program->id . $tranche. $section->id])) {
                                $sub_total = number_format((float)$pdf->sub_total[$expense->id . $program->id . $tranche . $section->id], 2, '.', ',');
                            }
                            $pdf->expenseTotal($sub_total, number_format((float)$difference, 2, '.', ','));
                        }
                        //}
                        $count_first++;
                    }
                } else {
                    $expense_total = 0;
                    $pdf->SetFont('Arial', 'B', 7);

                    $items = queryItem($expense->id, $program->id, $section->id, $yearly_reference);

                    if ($expense->id == $program->expense_id && count($items) > 0) {
                        $pdf->displayExpense("\t\t\t\t\t\t\t\t" . $program->description);
                        $pdf->displayExpense("\t\t\t\t\t\t\t\t\t\t\t\t\t" . $expense->description);
                        foreach ($items as $item) {
                            $pdf->SetFont('Arial', '', 7);
                            $pdf->displayItem($item, $generate_level, $division_id, $section_id, $program->id, $expense->id);

                            if ($item->estimated_budget) {
                                $expense_total += $item->estimated_budget;
                            }
                        }
                        $pdf->SetFont('Arial', 'B', 7);
                        $sub_total = 0;
                        $difference = 0;

                        if (isset($pdf->sub_total[$expense->id . $program->id . $section->id])) {
                            $sub_total = number_format((float)$pdf->sub_total[$expense->id . $program->id . $section->id], 2, '.', ',');
                        }
                        $pdf->expenseTotal($sub_total, number_format((float)$difference, 2, '.', ','));
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

                        $pdf->SetFont('Arial', 'B', 7);
                        $tranche = $expense->id . "-" . $alphabet[$count_first] . "-" . $count_second;

                        $items = queryTranche($expense->id, $section->id, $tranche, $yearly_reference, $ppmp_status);
                        if ($section->id == 28 || $section->id == 29 || $section->id == 32) {
                        } else
                            if (count($items) > 0) {
                                $pdf->displayExpense("\t\t\t\t\t\t\t\t" . $expense->description);
                                $pdf->displayExpense("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_first);
                                $pdf->displayExpense("\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . "\t\t\t\t" . $display_second);

                                foreach ($items as $item) {
                                    $pdf->SetFont('Arial', '', 7);
                                    if ($item->program_id == null)
                                        $pdf->displayItem($item, $generate_level, $section_id, $expense->id, $yearly_reference, "");

                                    if ($item->estimated_budget) {
                                        $expense_total += $item->estimated_budget;
                                    }
                                }
                                $pdf->SetFont('Arial', 'B', 7);
                                if (isset($pdf->sub_total[$expense->id . $tranche . $section->id])) {
                                    $sub_total = number_format((float)$pdf->sub_total[$expense->id . $tranche . $section->id], 2, '.', ',');
                                }
                                if (count($items) > 0)
                                    $pdf->expenseTotal($sub_total, number_format((float)$difference, 2, '.', ','));
                            }
                    }
//                    if (!isset($flag[$display_first])) {
//                        $pdf->SetFont('Arial', 'B', 7);
//                        $title_header_expense1 = '';
//                        if (!isset($flag[$expense->description])) {
//                            $title_header_expense1 = $expense->description;
//                            $flag[$expense->description] = true;
//                        }

                    $flag[$display_first] = true;
//                        $title_header_expense1 .= "\t\t\t\t\t\t\t" . $display_first;
                    $tranche = $expense->id . "-" . $alphabet[$count_first];

                    $expense_total = 0;
                    $items = queryTranche($expense->id, $section->id, $tranche, $yearly_reference, $ppmp_status);

                    if (count($items) > 0) {
                        $pdf->displayExpense("\t\t\t\t\t\t\t\t" . $expense->description);
                        $pdf->displayExpense("\t\t\t\t\t\t\t\t\t\t\t\t" . $display_first);
                        foreach ($items as $item) {
                            $pdf->SetFont('Arial', '', 7);
                            if ($item->program_id == null)
                                $pdf->displayItem($item, $generate_level, $division_id, $section_id, "", $expense->id, $tranche);
                        }
                        $difference = 0;
                        $pdf->SetFont('Arial', 'B', 7);
                        if (isset($pdf->sub_total[$expense->id . $tranche . $section->id])) {
                            $sub_total = number_format((float)$pdf->sub_total[$expense->id . $tranche . $section->id], 2, '.', ',');
                        }
                        $pdf->expenseTotal($sub_total, number_format((float)$difference, 2, '.', ','));
                    }
                    //}
                    $count_first++;
                }
            } else {
                $expense_total = 0;
                $pdf->SetFont('Arial', 'B', 7);

                $items = queryOriginal($expense->id, $section->id, $yearly_reference, $ppmp_status);
                if ($section->id == 28 || $section->id == 29 || $section->id == 32) {
                } else
                    if (count($items) > 0)
                        $pdf->displayExpense("\t\t\t\t\t\t\t\t" . $expense->description);

                foreach ($items as $item) {
                    $pdf->SetFont('Arial', '', 7);
                    if($item->program_id == null)
                        $pdf->displayItem($item, $generate_level, $section_id, $expense->id, $yearly_reference, "");

//                    if ($item->estimated_budget) {
//                        $expense_total += $item->estimated_budget;
                    //}
                }
                $pdf->SetFont('Arial', 'B', 7);
                if (isset($pdf->sub_total[$expense->id . $section->id])) {
                    $sub_total = number_format((float)$pdf->sub_total[$expense->id . $section->id], 2, '.', ',');
                }
                if (count($items) > 0)
                    $pdf->expenseTotal($sub_total, number_format((float)$difference, 2, '.', ','));
            }
        }
    }
}

$pdf->Ln(3);
$pdf->SetFont('Arial','BU',7);
$pdf->SetX(30);
$pdf->SetWidths(array(134,100));
$pdf->TableFooter(array("GRAND TOTAL",number_format((float)$pdf->grand_total, 2, '.', ',')));
$pdf->Ln(3);
$pdf->SetFont('Arial','',6);
$pdf->SetWidths(array(12,160));
$pdf->TableFooter(array("NOTE:","Technical Specification for each Item/Project being proposed shall be submitted as part of the PPMP"));

if($generate_level == 'section' || $generate_level == 'select_section'){
    $pdf->Ln(3);
    $pdf->SetWidths(array(160,100));
    $pdf->TableFooter(array("Prepared By:","Submitted By:"));
    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetWidths(array(15,160,100));
    if($division_id == 9 || $division_id == 10)
        $pdf->TableFooter(array("",$_GET['end_user_name'],"Sophia M. Mancao, MD, DPSP, RN-MAN"));
    // joy
    else if ($division_id == 6)
        $pdf->TableFooter(array("",$_GET['end_user_name'],"Elizabeth P. Tabasa CPA,MBA,CEO VI"));
    // joy
    else
        $pdf->TableFooter(array("",$_GET['end_user_name'],"Jonathan Neil V. Erasmo, MD,MPH,FPSMS"));

    $pdf->SetWidths(array(12,165,100));
    $pdf->SetFont('Arial','',7);
    if($division_id == 9 || $division_id == 10)
        $pdf->TableFooter(array("",$_GET['end_user_designation'],"Director III"));
    else
        $pdf->TableFooter(array("",$_GET['end_user_designation'],$_GET['head_designation']));
}
else {
    $pdf->Ln(3);
    if($division_id == 9 || $division_id == 10){
        $pdf->SetWidths(array(40,68,77,70));
        $pdf->TableFooter(array("","Division Head:","Evaluated By:","Approved:"));
        $pdf->Ln(2);
        $pdf->SetWidths(array(20,84,65,70));
        $pdf->SetFont('Arial','B',7);
        $pdf->TableFooter(array("","Guy R. Perez MD,RPT,FPSMS,MBAHA,CESE","Leonora A. Aniel","Jaime S. Bernadaz MD,MGM,CESO III"));

        $pdf->SetWidths(array(40,52,92,70));
        $pdf->SetFont('Arial','',7);
        $pdf->TableFooter(array("","Director III","Administrative Officer V, Budget Section","Director IV"));
    }
    else {
        $pdf->SetWidths(array(3,84,65,70,70));
        $pdf->TableFooter(array("","Prepared by:","Evaluated By:","Approved:"));
        $pdf->Ln(2);
        $pdf->SetWidths(array(3,84,65,70,70));
        $pdf->SetFont('Arial','B',7);
        $pdf->TableFooter(array("","STEPHEN CINCOFLORES","Leonora A. Aniel",$division_chief_name));

        $pdf->SetWidths(array(3,84,65,70,70));
        $pdf->SetFont('Arial','',7);
        $pdf->TableFooter(array("","Administrative Assistant II","Administrative Officer V","Medical Officer V"));
        $pdf->SetWidths(array(3,84,65,70,70));
        $pdf->TableFooter(array("","Local Health Support Division","Budget Section","Chief,Local Health Support Division"));
    }
}

$pdf->Output();
?>
