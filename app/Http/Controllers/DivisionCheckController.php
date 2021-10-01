<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisionCheckController extends Controller
{
    function displayHeader($title)
    {
        return "<tr class='text-green'>
                    <td width='30%'>
                        <strong>
                            " . $title . "
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
                    <td></td>
                    <td></td>
                </tr>";
    }

    function setItem($item, $division_id)
    {
        if ($item->expense_id == 1 and ($item->tranche == "1-A-1" or $item->tranche == "1-A-2" or $item->tranche == "1-A-3" or $item->tranche == "1-B")) {
            $item_daily = \App\ItemDaily::where("item_id", $item->id)
//                    ->where("expense_id",$item->expense_id)
//                    ->where("tranche",$item->tranche)
                ->where("division_id", $division_id)
                ->orderBy("id", "desc")
                ->first();

            if ($item_daily) {
                $item->qty = $item_daily->qty;
                $item->jan = $item_daily->jan;
                $item->feb = $item_daily->feb;
                $item->apr = $item_daily->apr;
                $item->may = $item_daily->may;
                $item->jun = $item_daily->jun;
                $item->jul = $item_daily->jul;
                $item->aug = $item_daily->aug;
                $item->mar = $item_daily->mar;
                $item->sep = $item_daily->sep;
                $item->oct = $item_daily->oct;
                $item->nov = $item_daily->nov;
                $item->dece = $item_daily->dece;
//                  $item->section = $item_daily->section_id;
            }
        }

        $item->qty = $item->jan + $item->feb + $item->mar + $item->apr + $item->may + $item->jun + $item->jul + $item->aug + $item->sep + $item->oct + $item->nov + $item->dece;
        $item->estimated_budget = (int)$item->qty * str_replace(',', '', (int)$item->unit_cost);

//            if($item->qty || $item->estimated_budget == 0)

        return $item;

    }

    function displayItem($item, $expense_title, $encoded_by, $section, $status)
    {
        $user = Auth::user();
//            $sec = \App\Section::all();
//            $section_id = $sec->pluck('id');
        setItem($item, $user->section);

        $encoded = \App\PisUser::select(DB::raw('CONCAT(fname, " ", lname) AS full_name'))
            ->where('userid', $encoded_by)
            ->pluck('full_name')
            ->first();

        if(empty($encoded_by)){
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
                        <td>$item->id</td>
                        <td>$section</td>
                        <td><span data-toggle='tooltip' title='haha' class= 'badge bg-green' data-original-title='$status'>$status</span></td>
                    <tr>";
        }elseif($encoded)
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
                        <td>$item->id</td>
                        <td>$section</td>
                        <td><span data-toggle='tooltip' title='haha' class= 'badge bg-green' data-original-title='$encoded_by'>$encoded</span></td>
                    </tr>";
        else
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
                        <td>$item->id</td>
                        <td>$section</td>
                        <td><span data-toggle='tooltip' title='haha' class= 'badge bg-green' data-original-title='$encoded_by'>$encoded_by</span></td>
                    </tr>";
        if($item->qty >= 0 && $item->unit_cost != 0)
            return $data;


    }

    function expenseTotal($total)
    {
        return "<tr>
                    <td colspan='4'>
                        <strong class='pull-right' >
                            Sub Total:
                        </strong>
                    </td>
                    <td><span data-toggle='tooltip' title='haha' class='badge bg-green' data-original-title='$total'>$total</span></td>
                </tr>";
    }

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
}
