<?php

namespace App\Http\Controllers;

use App\Division;
use App\DtsUser;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MaintenanceController extends Controller
{
    public function adminPrivileged()
    {
        return view('admin.privileged');
    }

    public function userPrivileged()
    {
        return view('user.privileged');
    }

    public function changeSectionDivision(){
        $division = Division::get();
        $section = Section::get();
        return view('user.change_section_division',[
            "division" => $division,
            "section" => $section
        ]);
    }

    public function updateSection(){
        $section = Section::where("division",Auth::user()->division)->get();
        return view('user.updateSection',[
            "section" => $section
        ]);
    }

    public function updateDivision(){
        $division = Division::get();
        return view('user.updateDivision',[
            "division" => $division
        ]);
    }

    public function updateSectionPost(Request $request){
        DtsUser::where("id",Auth::user()->id)->update([
            "section" => $request->section
        ]);
        return Redirect::to('/');
    }

    public function updateDivisionPost(Request $request){
        DtsUser::where("id",Auth::user()->id)->update([
            "division" => $request->division
        ]);
        return Redirect::to('/');
    }

}
