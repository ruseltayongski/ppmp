<?php

namespace App\Http\Controllers;

use App\BudgetAllotment;
use Illuminate\Http\Request;
use Excel;
use App\Item;
use App\Qty;
use App\Expense;
use Illuminate\Support\Facades\Redirect;

class ExcelController extends Controller
{
    public function excelImport(){
        return view('excel.expense_import');
    }
    public function importExpense(Request $request)
    {

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();

        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['description' => $value->description];
            }
            Expense::insert($arr);
        }
    }
    public function importItem_MSD(Request $request)
    {

        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();


        /*$pdo = \DB::connection()->getPdo();
        $qty_query = "INSERT INTO ppmpv2.qty(item_id,created_by,division,section,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dece,created_at, updated_at) VALUES";*/

        if($data->count()){
            foreach ($data as $key => $value) {

                $item = new Item();
                $item->expense_id = $value->expense_id;
                $item->tranche = $value->tranche;
                $item->description = $value->description;
                $item->mode_procurement = $value->mode_procurement;
                $item->unit_measurement = $value->unit_of_issue;
                $item->unit_cost = $value->unit_cost;
                $item->status = 'fixed';
                $item->save();

                /*if(!empty($value->msd_chief)){
                    $item_id = $item->id; $created_by = "0864"; $division = "6"; $section = "39"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->accounting)){
                    //ACCOUNTING
                    $item_id = $item->id; $created_by = "0623"; $division = "6"; $section = "5"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->budget)){
                    //BUDGET
                    $item_id = $item->id; $created_by = "201400182"; $division = "6"; $section = "6"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->cashier)){
                    //CASHIER
                    $item_id = $item->id; $created_by = "201700263"; $division = "6"; $section = "7"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->hr)){
                    //HR
                    $item_id = $item->id; $created_by = "0770"; $division = "6"; $section = "9"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }


                if(!empty($value->pu)){
                    //PU
                    $item_id = $item->id; $created_by = "0008"; $division = "6"; $section = "45"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }


                if(!empty($value->supply)){
                    //SUPPLY //almendaris

                    $item_id = $item->id; $created_by = "0135"; $division = "6"; $section = "12"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }


                if(!empty($value->cold_chain)){
                    //COLD CHAIN //arnulfo lavarez
                    $item_id = $item->id; $created_by = "199400078"; $division = "6"; $section = "65"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->ictu)){
                    //ICTU //flora mae joy
                    $item_id = $item->id; $created_by = "0881"; $division = "6"; $section = "42"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->records)){
                    //RECORDS // maria christina
                    $item_id = $item->id; $created_by = "0069"; $division = "6"; $section = "11"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->transport)){
                    //TRANSPORT //migs sadorma
                    $item_id = $item->id; $created_by = "201900282"; $division = "6"; $section = "14"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->hms)){
                    //HMS // saysip
                    $item_id = $item->id; $created_by = "0596"; $division = "6"; $section = "37"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->library)){
                    //LIBRARY // ailyn luana
                    $item_id = $item->id; $created_by = "201400177"; $division = "6"; $section = "43"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->dormitory)){
                    //DORMITORY //ivory jaguros
                    $item_id = $item->id; $created_by = "0093"; $division = "6"; $section = "55"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }


                if(!empty($value->legal)){
                    //LEGAL // irene cañedo
                    $item_id = $item->id; $created_by = "0860"; $division = "6"; $section = "13"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->coa)){
                    //COA // rina jane salloman
                    $item_id = $item->id; $created_by = "0775"; $division = "6"; $section = "56"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }

                if(!empty($value->planning)){
                    //PLANNING // bethel pielago
                    $item_id = $item->id; $created_by = "201800276"; $division = "6"; $section = "38"; $jan = $value->jan; $feb = $value->feb; $mar = $value->mar; $apr = $value->apr; $may = $value->may; $jun = $value->jun; $jul = $value->jul; $aug = $value->aug; $sep = $value->sep; $oct = $value->oct; $nov = $value->nov; $dec = $value->dec;
                    $qty_query .= "('" . $item_id . "','" . $created_by . "','" . $division . "','" . $section . "','" . $jan . "','" . $feb . "','" . $mar . "','" . $apr . "','" . $may . "','" . $jun . "','" . $jul . "','" . $aug . "','" . $sep . "','" . $oct . "','" . $nov . "','" . $dec . "',NOW(),NOW()),";
                }*/

            }

            /*$qty_query .= "('','','','','','','','','','','','','','','','',NOW(),NOW())";
            $st = $pdo->prepare($qty_query);
            $st->execute();*/

        }
        return Redirect::back()->with('itemAdd', 'Successfully added item!');
    }

    public function excelExport(){
        $users = BudgetAllotment::select("Beginning_balance")->get();
        $Info = array();
        array_push($Info, ['Beginning_balance']);
        foreach ($users as $user) {
            array_push($Info, $user->toArray());
        }
        \Excel::create('Filename', function($excel) use ($Info) {

            $excel->setTitle('Filename');
            $excel->setCreator('milad')->setCompany('Test');
            $excel->setDescription('users file');
            $excel->sheet('sheet1', function ($sheet) use ($Info) {
                $sheet->setRightToLeft(true);
                $sheet->fromArray($Info, null, 'A1', false, false);
            });
        })->download('xls');

        //Excel::download/Excel::store()
    }

}
