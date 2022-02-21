<?php
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

function queryItem($sql){
    $pdo = conn();
    $query = $sql;

    try {
        $st = $pdo->prepare($query);
        $st->execute();
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


require('mc_table.php');

$expenses = queryExpense();

$generate_level = $_GET['generate_level'];
$division_id = $_GET['division_id'];
$section_id = $_GET['section_id'];

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

//test
    //$start = microtime(true);
//

$yearly_reference = $_GET['yearly_reference'];
$ppmp_status = $_GET['ppmp_status'];

foreach($expenses as $expense) {
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
                    $title_header_first = "\n\t\t\t\t\t\t\t".$display_first."\n";
                    $flag[$display_first] = true;
                }
                if(isset($flag[$display_second])){
                    $title_header_second = "";
                } else {
                    $title_header_second = "\t\t\t\t\t\t\t\t\t\t\t\t\t".$display_second;
                    $flag[$display_second] = true;
                }
                $pdf->SetFont('Arial','B',7);

                $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;

                $items = queryItem("CALL main_tranche('$expense->id','$tranche')");


                if(count($items) > 0)
                    $pdf->displayExpense($title_header_expense.$title_header_first.$title_header_second);

                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item,$generate_level,$division_id,$section_id);
                }
                $pdf->SetFont('Arial','B',7);

                $difference = 0;
                $sub_total = number_format((float)$pdf->sub_total[$expense->id.$tranche], 2, '.', ',');
                //$difference = $expense->chief_lhsd - $pdf->sub_total[$expense->id.$tranche];
                $pdf->expenseTotal($sub_total,number_format((float)$difference, 2, '.', ','));
            } //display if first have value

            if(!isset($flag[$display_first])){
                $pdf->SetFont('Arial','B',7);
                $title_header_expense1 = '';
                if(!isset($flag[$expense->description])){
                    $title_header_expense1 = $expense->description;
                    $flag[$expense->description] = true;
                }

                $flag[$display_first] = true;
                $title_header_expense1 .= "\t\t\t\t\t\t\t".$display_first;
                $tranche = $expense->id."-".$alphabet[$count_first];


                $expense_total = 0;

                //$items = $pdf->query($tranche,$expense);

                $items = queryItem("call main_tranche('$expense->id','$tranche')");

                if(count($items) > 0)
                    $pdf->displayExpense($title_header_expense1);

                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item,$generate_level,$division_id,$section_id);
                    $expense_total += (int)$item->estimated_budget;
                }
                $pdf->SetFont('Arial','B',7);

                $sum = 0;
                $sub_total = 0;

                if(isset($pdf->sub_total[$expense->id.$tranche])){

                    if($expense->id.$tranche == "11-C"){
                        $sub_total = number_format((float)$pdf->sub_total[$expense->id.$tranche], 2, '.', ',');
                        $sum = $pdf->sub_total["11-A-1"] + $pdf->sub_total["11-A-2"] + $pdf->sub_total["11-A-3"] + $pdf->sub_total["11-B"]+ $pdf->sub_total[$expense->id.$tranche];

                        if($division_id == 4)
                        $difference = $expense->chief_lhsd - $sum;
                         else if($division_id == 6){
                             $difference = $expense->chief_msd - $sum;
                         }
                         else{
                             $difference = 0;
                         }
                    }
                    else{
                        $difference= 0;
                        $sub_total = number_format((float)$pdf->sub_total[$expense->id.$tranche], 2, '.', ',');
                    }

                }
                $pdf->expenseTotal($sub_total,number_format((float)$difference, 2, '.', ','));

            }

            $count_first++;
        }
    } else {
        $expense_total = 0;
        $pdf->SetFont('Arial','B',7);

       // $items = $pdf->query($tranche,$expense);
        $items = queryItem("call normal_tranche_region('$expense->id','$ppmp_status','$yearly_reference')");

//      if(count($items)>0)

        if(!($expense->id == 16 || $expense->id == 17 || $expense->id == 18 || $expense->id == 19 || $expense->id == 45 || $expense->id == 44 || $expense->id == 42  || $expense->id == 32  || $expense->id == 5 ))
            $pdf->displayExpense($expense->description); //display expense if no value from first

        foreach($items as $item) {
            if(empty($item->description) && ($item->expense_id == 16 || $item->expense_id == 17 || $item->expense_id == 18 || $item->expense_id == 19 || $item->expense_id == 45 || $item->expense_id == 44 || $item->expense_id == 42 || $item->expense_id == 32 || $item->expense_id == 5)){
                $pdf->SetFont('Arial','',7);
                $item->description = $expense->description;

            } else {
                $pdf->SetFont('Arial','',7);
            }

            $pdf->displayItem($item,$generate_level,$division_id,$section_id);
            if($item->estimated_budget){
                $expense_total += $item->estimated_budget;
            }
        }

        $pdf->SetFont('Arial','B',7);
        $sub_total = 0;
        $qty = 0;

        if(isset($pdf->sub_total[$expense->id])) {
            $sub_total = number_format((float)$pdf->sub_total[$expense->id], 2, '.', ',');

            if($division_id == 4)
                $difference = $expense->chief_lhsd - $pdf->sub_total[$expense->id];
            else if($division_id == 6){
                $difference = $expense->chief_msd - $pdf->sub_total[$expense->id];
            }
            else{
                $difference = 0;
            }
        }
        $pdf->expenseTotal($sub_total,number_format((float)$difference, 2, '.', ','));
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
        $pdf->TableFooter(array("",$_GET['end_user_name'],"Guy R. Perez MD,RPT,FPSMS,MBAHA,CESE"));
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
        $pdf->SetWidths(array(20,70,76,73,70));
        $pdf->TableFooter(array("","Division Chief:","Evaluated By:","Recommending Approval:","Approved:"));
        $pdf->Ln(2);
        $pdf->SetWidths(array(3,84,65,70,70));
        $pdf->SetFont('Arial','B',7);
        $pdf->TableFooter(array("",$division_chief_name,"Leonora A. Aniel","Guy R. Perez MD,RPT,FPSMS,MBAHA,CESE","Jaime S. Bernadaz MD,MGM,CESO III"));

        $pdf->SetWidths(array(3,73,98,66,70));
        $pdf->SetFont('Arial','',7);
        $pdf->TableFooter(array("","Chief, ".$division_name,"Administrative Officer V, Budget Section","Director III","Director IV"));
    }
}

$pdf->Output();
?>