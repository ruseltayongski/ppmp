<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function adminPrivilage()
    {
        return view('admin.privileged');
    }
}
