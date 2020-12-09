<?php
date_default_timezone_set('Asia/Manila');
function conn()
{
    $server = 'localhost';
    try{
        $pdo = new PDO("mysql:host=$server; dbname=ppmpv2",'root','');
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


require('mc_table.php');
$pdf=new PDF_MC_Table('L','mm','a4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(3);
$pdf->setX(3);
$pdf->SetFont('Arial','',7);
$pdf->SetWidths(array(290));
$pdf->Row(array("END-USER/UNIT : "));
$pdf->Row(array("Charged to : "));
$pdf->Row(array("Project, Programs and Activities(PAPs)"));

$pdf->SetFont('Arial','B',7);
$pdf->SetWidths(array(
    17, //1
    107.6, //2
    10, //3
    10, //4
    15.2, //5
    15.2, //6
    19, //7
    96 //8
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
    17, //1
    107.6, //2
    10, //3
    10, //4
    15.2, //5
    15.2, //6
    19, //7
    8, //8
    8, //9
    8, //10
    8, //11
    8, //12
    8, //13
    8, //14
    8, //15
    8, //16
    8, //17
    8, //18
    8 //19
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

$expenses = queryExpense();

$generate_level = $_GET['generate_level'];
$division_id = $_GET['division_id'];
$section_id = $_GET['section_id'];

foreach($expenses as $expense){
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
                    $title_header_first = "\n\t\t\t\t\t\t\t".$display_first;
                    $flag[$display_first] = true;
                }
                if(isset($flag[$display_second])){
                    $title_header_second = "";
                } else {
                    $title_header_second = "\n\t\t\t\t\t\t\t\t\t\t\t\t\t".$display_second;
                    $flag[$display_second] = true;
                }
                $pdf->SetFont('Arial','B',7);
                $pdf->displayExpense($title_header_expense.$title_header_first.$title_header_second);
                $tranche = $expense->id."-".$alphabet[$count_first]."-".$count_second;
                $items = queryItem("CALL main_tranche('$expense->id','$tranche')");

                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item,$generate_level,$division_id,$section_id);
                }
                $pdf->SetFont('Arial','B',7);
                $pdf->expenseTotal(number_format((float)$pdf->sub_total[$expense->id.$tranche], 2, '.', ','));
            } //display if first have value

            if(!isset($flag[$display_first])){
                $pdf->SetFont('Arial','B',7);
                $title_header_expense1 = '';
                if(!isset($flag[$expense->description])){
                    $title_header_expense1 = $expense->description;
                    $flag[$expense->description] = true;
                }

                $flag[$display_first] = true;
                $title_header_expense1 .= "\n\t\t\t\t\t\t\t".$display_first;
                $pdf->displayExpense($title_header_expense1);

                $expense_total = 0;
                $tranche = $expense->id."-".$alphabet[$count_first];
                $items = queryItem("call main_tranche('$expense->id','$tranche')");

                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item,$generate_level,$division_id,$section_id);
                    $expense_total += $item->estimated_budget;
                }
                $pdf->SetFont('Arial','B',7);
                $sub_total = 0;
                if(isset($pdf->sub_total[$expense->id.$tranche]))
                    $sub_total = $pdf->sub_total[$expense->id.$tranche];
                $pdf->expenseTotal(number_format((float)$sub_total, 2, '.', ','));
            }

            $count_first++;
        }
    } else {
        $expense_total = 0;
        $pdf->SetFont('Arial','B',7);
        $pdf->displayExpense($expense->description); //display expense if no value from first

        $items = queryItem("call normal_tranche_region('$expense->id')");

        foreach($items as $item){
            $pdf->SetFont('Arial','',7);
            $pdf->displayItem($item,$generate_level,$division_id,$section_id);
            if($item->estimated_budget){
                $expense_total += $item->estimated_budget;
            }
        }
        $pdf->SetFont('Arial','B',7);
        $sub_total = 0;
        if(isset($pdf->sub_total[$expense->id]))
            $sub_total = $pdf->sub_total[$expense->id];
        $pdf->expenseTotal(number_format((float)$sub_total, 2, '.', ','));

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
$pdf->Ln(3);
$pdf->SetWidths(array(160,100));
$pdf->TableFooter(array("Prepared By:","Submitted By:"));
$pdf->Ln(3);
$pdf->SetFont('Arial','B',7);
$pdf->SetWidths(array(15,160,100));
$pdf->TableFooter(array("",$_GET['end_user_name'],"Jonathan Neil V. Erasmo, MD,MPH,FPSMS"));

$pdf->SetWidths(array(12,165,100));
$pdf->SetFont('Arial','',7);
$pdf->TableFooter(array("",$_GET['end_user_designation'],$_GET['head_designation']));

$pdf->Output();
?>