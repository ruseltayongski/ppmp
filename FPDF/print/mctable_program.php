<?php
require('../fpdf.php');


class PDF_MC_Table extends FPDF
{
    var $widths;
    var $aligns;
    public $grand_total;
    public $sub_total = [];
    public $sum;

    // Page header
    function Header()
    {
        $yearly_reference = $_GET['yearly_reference'];

        if($this->PageNo() == 1){
            $this->setXY(10,6);
            $this->Image('../../public/img/doh.png',15,6,30);
            $this->Image('../../public/img/f1.jpg',245,6,30);
            $this->SetFont('Arial','',7);
            $this->setXY(3,6);
            $this->Cell(290,8,'Republic of the Philippines',0,0,'C');
            $this->SetFont('Arial','',8);
            $this->setXY(3,10);
            $this->Cell(290,8,'Department of Health',0,0,'C');
            $this->SetFont('Arial','B',8);
            $this->setXY(3,14);
            $this->Cell(290,8,'CENTRAL VISAYAS CENTER for HEALTH DEVELOPMENT',0,0,'C');

            $this->SetFont('Arial','B',12);
            $this->setXY(3,22);
            $this->Cell(290,8,'PROJECT PROCUREMENT MANAGEMENT PLAN (PPMP)',0,0,'C');
            $this->SetFont('Arial','B',10);
            $this->setXY(3,27);
            if($yearly_reference == 1)
                $this->Cell(290,8,'Revised June 30, 2021',0,0,'C');
            elseif($yearly_reference == 2)
                $this->Cell(290,8,'Revised CY 2022',0,0,'C');
            else
                $this->Cell(290,8,'CY 2023',0,0,'C');
            $this->SetFont('Arial','B',8);
            $this->setXY(3,32);
            if(isset($_GET['section_name']))
                $this->Cell(290,8,$_GET['section_name'],0,0,'C');
            else
                $this->Cell(290,8,'PER'.strtoupper($_GET['generate_level']),0,0,'C');

            $this->ln(10);
        }
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',6);
        // Page number
        $prepared_by = "";
        $this->Cell(0,10,"\t\t\t".$prepared_by."\t\t\t".date("h:i a")."\t\t\t".date('m/d/Y'),0,0,'L');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
    }

    function SetWidths($w)
    {
        //Set the array of column widths
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        //Set the array of column alignments
        $this->aligns=$a;
    }

    function Row($data)
    {
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
//            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function TableTitle($data,$border){
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            //$this->Rect($x,$y,$w,$h,'R');
            //Print the text
            if($data[$i] == 'Jan')
                $border = 1;
            $this->MultiCell($w,5,$data[$i],$border,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function TableFooter($data){
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            //$this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function Expense($data){
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function displayExpense($description){

        $this->Expense([
            "",
            $description,
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
        ]);
    }


    function Item($data){
        //Calculate the height of the row
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h);
        //Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            //Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            //Draw the border
            $this->Rect($x,$y,$w,$h);
            //Print the text
            if(is_numeric($data[$i])){
                $this->SetFont('Arial','',6);
            }
            $this->MultiCell($w,5,$data[$i],0,$a);
            //Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function displayItem($item,$generate_level,$division_id,$section_id, $program_id,$expense_id)
    {
        $yearly_reference = $_GET['yearly_reference'];
        $ppmp_status = $_GET['ppmp_status'];

//        if(isset($item->item_id)) {
//            if ($generate_level == 'region')
//                $item_body = queryItem("call get_body_region('$item->item_id','$yearly_reference','$ppmp_status')")[0];
//            elseif ($generate_level == 'division')
//                $item_body = queryItem("call get_body_division('$item->item_id','$division_id','$yearly_reference','$ppmp_status')")[0];
//            elseif ($generate_level == 'section' || $generate_level == 'select_section')
//                $item_body = queryItem("call get_body_section('$item->item_id','$section_id','$yearly_reference','$ppmp_status')")[0];
//        }else {
//            if ($generate_level == 'region')
//                $item_body = queryItem("call get_body_region('$item->id','$yearly_reference','$ppmp_status')")[0];
//            elseif ($generate_level == 'division')
//                $item_body = queryItem("call get_body_division('$item->id','$division_id','$yearly_reference','$ppmp_status')")[0];
//            elseif ($generate_level == 'section' || $generate_level == 'select_section')
//                $item_body = queryItem("call get_body_section('$item->id','$section_id','$yearly_reference','$ppmp_status')")[0];
//        }
        $item->qty = $item->jan + $item->feb + $item->mar + $item->apr + $item->may + $item->jun + $item->jul + $item->aug + $item->sep + $item->oct + $item->nov + $item->dece;
        $item->estimated_budget = ((int)$item->qty * str_replace(',', '', (float)$item->unit_cost));

        //INPUT AMOUT IN MILESTONES
//        $item_body->estimated_budget = $item_body->jan + $item_body->feb + $item_body->mar + $item_body->apr + $item_body->may + $item_body->jun + $item_body->jul + $item_body->aug + $item_body->sep + $item_body->oct + $item_body->nov + $item_body->dece;
//        $item_body->qty == 0 ? 0 : ($item_body->estimated_budget / str_replace(',', '', (float)$item_body->unit_cost));

        $sum = 0;
        if($item->expense_id == "1")
            $sum += $item->estimated_budget;

        $sub_total = "0";
            if(isset($this->sub_total[$item->expense_id.$item->program_id.$item->tranche.$item->section_id]))
                $sub_total = $this->sub_total[$item->expense_id.$item->program_id.$item->tranche.$item->section_id];

                $this->sub_total[$item->expense_id.$item->program_id.$item->tranche.$item->section_id] = $item->estimated_budget + $sub_total;
                $this->grand_total += $item->estimated_budget;


        if ($item->expense_id == 16 || $item->expense_id == 17 || $item->expense_id == 18 || $item->expense_id == 19 || $item->expense_id == 45 || $item->expense_id == 44 || $item->expense_id == 32 || $item->expense_id == 42 || $item->expense_id == 5)
            $item->description = $item->description;
        else
            $item->description = "\t\t\t\t\t\t\t\t\t\t\t\t\t" . $item->description;

        if($item->expense_id == 1 and $item->tranche != "1-B" and $item->tranche != "1-A-3" and $yearly_reference == 3 and (empty($item->mode_procurement) or $item->mode_procurement == "Public Bidding")) {
            $item->mode_procurement = "NP 53.5";
        }else
            if($item->expense_id == 1 and $item->tranche == "1-B" and $yearly_reference == 3 and (empty($item->mode_procurement) or $item->mode_procurement == "Public Bidding")) {
                $item->mode_procurement = "NP 53.9";
            }else
                if($item->expense_id == 1 and $item->tranche == "1-A-3" and $yearly_reference == 3 and (empty($item->mode_procurement) or $item->mode_procurement == "Public Bidding")) {
                    $item->mode_procurement = "Public Bidding";
                }

        if ((int)$item->qty > 0)
            $this->Item([
                $item->code,
                "\t\t\t\t\t\t\t\t".$item->description,
                $item->unit_measurement,
                $item->qty,
                number_format((float)$item->unit_cost, 2, '.', ','),
                number_format((float)$item->estimated_budget, 2, '.', ','),
                $item->mode_procurement,
                $item->jan,
                $item->feb,
                $item->mar,
                $item->apr,
                $item->may,
                $item->jun,
                $item->jul,
                $item->aug,
                $item->sep,
                $item->oct,
                $item->nov,
                $item->dece,
            ]);

    }

    function expenseTotal($sub_total){

        $this->Expense([
            "",
            "",
            "",
            "",
            "Sub Total:",
            $sub_total,
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
        ]);
    }

    function CheckPageBreak($h)
    {
        //If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt)
    {
        //Computes the number of lines a MultiCell of width w will take
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}
?>