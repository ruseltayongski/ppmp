<?php

namespace App\Http\Controllers;

use App\Pap;
use App\PapSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PapController extends Controller
{
    public function Pap(){
        return  view('pap.pap');
    }
    public function PapAdd(Request $request){
        $pap = new Pap();
        $pap->pap = $request->pap;
        $pap->description = $request->description;
        $pap->code = $request->code;
        $pap->amount = $request->amount;
        $pap->save();
        $section_amount_count = 0;
        foreach($request->section_id as $id){
            $papsection = new PapSection();
            $papsection->amount = $request->section_amount[$section_amount_count];
            $papsection->section_id = $id;
            $papsection->pap_id = $pap->id;
            $papsection->save();
            $section_amount_count++;
        }

        return Redirect::back()->with('pap_add', 'Successfully added pap!');
    }

    public function PapEdit(Request $request){
        $pap = Pap::find($request->pap_id);
        return view("pap.pap_edit",[
            "pap" => $pap
        ]);
    }

    public function PapEditSave(Request $request){
        $pap = Pap::find($request->pap_id);
        $pap->pap = $request->pap;
        $pap->description = $request->description;
        $pap->code = $request->code;
        $pap->amount = $request->amount;
        $pap->save();
        PapSection::where('pap_id','=',$request->pap_id)->delete();
        $section_amount_count = 0;
        foreach($request->section_id as $id){
            $papsection = new PapSection();
            $papsection->amount = $request->section_amount[$section_amount_count];
            $papsection->section_id = $id;
            $papsection->pap_id = $pap->id;
            $papsection->save();
            $section_amount_count++;
        }

        return Redirect::back()->with('pap_add', 'Successfully updated pap!');
    }
}
