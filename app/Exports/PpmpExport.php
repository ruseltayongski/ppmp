<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromView;

class PpmpExport implements FromView
{
    public function view(): View
    {
        return view('ppmp.report_html');
    }
}
