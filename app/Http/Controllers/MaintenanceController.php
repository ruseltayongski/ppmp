<?php

namespace App\Http\Controllers;

use App\Division;
use App\Section;
use Illuminate\Http\Request;

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
}
