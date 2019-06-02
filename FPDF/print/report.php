<?php
function conn()
{
    $server = 'localhost';
    try{
        $pdo = new PDO("mysql:host=$server; dbname=ppmp",'root','');
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
$pdf->SetFont('Arial','',10);
$pdf->SetWidths(array(290));
$pdf->Row(array("END-USER/UNIT : "));
$pdf->Row(array("Charged to : "));
$pdf->Row(array("Project, Programs and Activities(PAPs)"));

$pdf->SetFont('Arial','B',7);
$pdf->SetWidths(array(290));
$pdf->Row(array("TEST"));
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
    "CODE", //1
    "DESC", //2
    "UNIT", //3
    "SIZE", //4
    "COST", //5
    "BUDGET", //6
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
]);

$expenses = queryExpense();
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
                $expense_total = 0;
                $items = queryItem("SELECT * FROM ITEM where tranche = '$tranche'");
                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item);
                    $expense_total += $item->estimated_budget;
                }
                $pdf->SetFont('Arial','B',7);
                $pdf->expenseTotal($expense_total);
            } //display if first have value
            if(!isset($flag[$display_first])){
                $expense_total = 0;
                $pdf->SetFont('Arial','B',7);
                $tranche = $expense->id."-".$alphabet[$count_first];
                $pdf->displayExpense($display_first);
                $items = queryItem("SELECT * FROM ITEM where tranche = '$tranche'");
                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item);
                    $expense_total += $item->estimated_budget;
                }
                if($expense_total != 0){
                    $pdf->SetFont('Arial','B',7);
                    $pdf->expenseTotal($expense_total);
                }

            } // display if first is null
            $count_first++;
        }
    } else {
        $expense_total = 0;
        $pdf->SetFont('Arial','B',7);
        $pdf->displayExpense($expense->description); //display expense if no value from first
        $items = queryItem("SELECT * FROM ITEM where expense_id = '$expense->id'");
        foreach($items as $item){
            $pdf->SetFont('Arial','',7);
            $pdf->displayItem($item);
            $expense_total += $item->estimated_budget;
        }
        if($expense_total != 0){
            $pdf->SetFont('Arial','B',7);
            $pdf->expenseTotal($expense_total);
        }

    }
}

/*$pdf->SetFont('Arial','',7);
$pdf->Item([
    "2019-00008",
    "Data Filer/Magazine Holder Box, 15 3/4 x 4 1/2 x 9 - Blue",
    "pcs",
    "24",
    "2000",
    "20000",
    "small value",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
    "500",
]);*/

$pdf->Output();
?>