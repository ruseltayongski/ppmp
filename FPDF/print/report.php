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

function queryExpense($division){
    $pdo = conn();
    $query = "SELECT * FROM EXPENSE where division = ? ORDER BY ID ASC";

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($division));
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

$grand_total = 0;
$expenses = queryExpense($_GET['division']);
$userid = $_GET['userid'];
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
                if($_GET['status'] == 'inactivate'){
                    $items = queryItem("SELECT item.*,mode_procurement.description as mode_procurement_description FROM ITEM left join mode_procurement on mode_procurement.id = item.mode_procurement where item.tranche = '$tranche' and item.status = 'inactivate' and item.expense_id = '$expense->id' order by item.description asc");
                } else {
                    $items = queryItem("SELECT 
                                              item.*,
                                              qty.unique_id as qty_unique_id,
                                              qty.jan as qty_jan,
                                              qty.feb as qty_feb,
                                              qty.mar as qty_mar,
                                              qty.apr as qty_apr,
                                              qty.may as qty_may,
                                              qty.jun as qty_jun,
                                              qty.jul as qty_jul,
                                              qty.aug as qty_aug,
                                              qty.sep as qty_sep,
                                              qty.oct as qty_oct,
                                              qty.nov as qty_nov,
                                              qty.dec as qty_dec,
                                              mode_procurement.description as mode_procurement_description 
                                              FROM ITEM 
                                              left join mode_procurement on mode_procurement.id = item.mode_procurement 
                                              left join qty on qty.created_by = '$userid' and (qty.item_id = item.id or qty.unique_id = item.unique_id) 
                                              where item.tranche = '$tranche' 
                                              and item.expense_id = '$expense->id' 
                                              and (item.status = 'approve' or item.status = 'fixed') 
                                              order by item.description asc");
                }
                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item);
                    $expense_total += $item->estimated_budget;
                    $grand_total += $expense_total;
                }
                $pdf->SetFont('Arial','B',7);
                $pdf->expenseTotal($expense_total);
            } //display if first have value
            if(!isset($flag[$display_first])){
                $expense_total = 0;
                $pdf->SetFont('Arial','B',7);
                $tranche = $expense->id."-".$alphabet[$count_first];
                $pdf->displayExpense($display_first);
                if($_GET['status'] == 'inactivate') {
                    $items = queryItem("SELECT item.*,mode_procurement.description as mode_procurement_description FROM ITEM left join mode_procurement on mode_procurement.id = item.mode_procurement where item.tranche = '$tranche' and item.status = 'inactivate' and item.expense_id = '$item->expense_id' order by item.description asc");
                } else {
                    $items = queryItem("SELECT
                                            item.*,
                                            qty.unique_id as qty_unique_id,
                                            qty.jan as qty_jan,
                                            qty.feb as qty_feb,
                                            qty.mar as qty_mar,
                                            qty.apr as qty_apr,
                                            qty.may as qty_may,
                                            qty.jun as qty_jun,
                                            qty.jul as qty_jul,
                                            qty.aug as qty_aug,
                                            qty.sep as qty_sep,
                                            qty.oct as qty_oct,
                                            qty.nov as qty_nov,
                                            qty.dec as qty_dec,
                                            mode_procurement.description as mode_procurement_description 
                                            FROM ITEM 
                                            left join mode_procurement on mode_procurement.id = item.mode_procurement 
                                            left join qty on qty.created_by = '$userid' and (qty.item_id = item.id or qty.unique_id = item.unique_id)
                                            where item.tranche = '$tranche' 
                                            and item.expense_id = '$expense->id' 
                                            and (item.status = 'approve' or item.status = 'fixed') 
                                            order by item.description asc");
                }
                foreach($items as $item){
                    $pdf->SetFont('Arial','',7);
                    $pdf->displayItem($item);
                    $expense_total += $item->estimated_budget;
                    $grand_total += $expense_total;
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
        if($_GET['status'] == 'inactivate') {
            $items = queryItem("SELECT item.*,mode_procurement.description as mode_procurement_description FROM ITEM left join mode_procurement on mode_procurement.id = item.mode_procurement where item.expense_id = '$expense->id' and item.status = 'inactivate' order by item.description asc");
        } else {
            $items = queryItem("SELECT
                                    item.*,
                                    qty.unique_id as qty_unique_id,
                                    qty.jan as qty_jan,
                                    qty.feb as qty_feb,
                                    qty.mar as qty_mar,
                                    qty.apr as qty_apr,
                                    qty.may as qty_may,
                                    qty.jun as qty_jun,
                                    qty.jul as qty_jul,
                                    qty.aug as qty_aug,
                                    qty.sep as qty_sep,
                                    qty.oct as qty_oct,
                                    qty.nov as qty_nov,
                                    qty.dec as qty_dec,
                                    mode_procurement.description as mode_procurement_description 
                                    FROM ITEM 
                                    left join mode_procurement on mode_procurement.id = item.mode_procurement
                                    left join qty on qty.created_by = '$userid' and (qty.item_id = item.id or qty.unique_id = item.unique_id)
                                    where item.expense_id = '$expense->id' 
                                    and (item.status = 'approve' or item.status = 'fixed') 
                                    order by item.description asc");
        }
        foreach($items as $item){
            $pdf->SetFont('Arial','',7);
            $pdf->displayItem($item);
            $expense_total += $item->estimated_budget;
            $grand_total += $expense_total;
        }
        if($expense_total != 0){
            $pdf->SetFont('Arial','B',7);
            $pdf->expenseTotal($expense_total);
        }

    }
}

$pdf->Ln(3);
$pdf->SetFont('Arial','BU',7);
$pdf->SetWidths(array(160,20));
$pdf->TableFooter(array("TOTAL BUDGET",$grand_total));
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
$pdf->TableFooter(array("",$_GET['end_user_name'],"ELIZABETH TABASA, CPA,MBA,CEO VI"));

$pdf->SetWidths(array(12,165,100));
$pdf->SetFont('Arial','',7);
$pdf->TableFooter(array("",$_GET['end_user_designation'],$_GET['head_designation']));

$pdf->Output();
?>