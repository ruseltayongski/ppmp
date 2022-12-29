<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout', function(){
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});

Route::get('test', function(){
    $excel_expense = Session::get("excel_expense");
    $excel_section = Session::get("excel_section");
    $items = Session::get("items");
    $generate_level = "division";
    $generate_level = Session::put('generate_level',$generate_level);

    $sec_head = \App\Section::select(DB::raw("upper(concat(users.fname,' ',users.lname)) as head_name"),'designation.description as designation')
        ->LeftJoin('dts.users','users.id','=','section.head')
        ->LeftJoin('dts.designation','designation.id','=','users.designation')
        ->where('section.id',Auth::user()->section)
        ->first();

    $head = \App\Division::select(DB::raw("upper(concat(users.fname,' ',users.lname)) as head_name"),'designation.description as designation')
        ->LeftJoin('dts.users','users.id','=','division.head')
        ->LeftJoin('dts.designation','designation.id','=','users.designation')
        ->where('division.id','=',Auth::user()->division)
        ->first();

    $file_name = "joy.xls";
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$file_name");
    header("Pragma: no-cache");
    header("Expires: 0");

    return view('excel.report',[
        "excel_expense" => $excel_expense,
        "excel_section" => $excel_section,
        "generate_level" =>$generate_level,
        "sec_head" => $sec_head,
        "head" => $head
    ]);
});

//login
Route::match(['GET','POST'],'/','LoginController@index');

//admin
Route::get('admin/home','AdminController@home')->name('admin');
Route::get('admin/privileged','MaintenanceController@adminPrivilage');

//user
Route::get('user/home/{section}','PpmpController@index')->name('user');
Route::post('user/home/{section}{charge}','PpmpController@viewExpense')->name('charge');
Route::post('user/division/update','MaintenanceController@updateDivisionPost');
Route::post('user/section/update','MaintenanceController@updateSectionPost');
Route::get('user/privileged','MaintenanceController@userPrivileged');

Route::get('file-export','PpmpController@export')->name('file-export');

//ppmp
Route::match(["GET","POST"],'ppmp/list/{expense_id}{charge}','PpmpController@ppmpList')->name('ppmp_list');
Route::match(["GET","POST"],'program/list/{expense_id}{charge}','PpmpController@ppmpProgram');
Route::match(["GET","POST"],'program/blade','PpmpController@programBlade');
Route::post('ppmp/set_program','PpmpController@setProgram')->name('set_program');
Route::post('ppmp/update','PpmpController@ppmpUpdate');
Route::post('ppmp/delete','PpmpController@ppmpDelete');
Route::get('ppmp/search/{keyword?}','PpmpController@ppmpSearch')->where('keyword', '(.*(?:%2F:)?.*)');

//charge
Route::get('charge/default','ChargeController@chargeDefault');
Route::post('charge/add','ChargeController@chargeAdd');
Route::get('charge/test','ChargeController@test');

//expense
Route::get('expense/list','ExpenseController@expenseList');
Route::get('expense/code','ExpenseController@code');

//excel
Route::get('excel/import','ExcelController@excelImport');
Route::post('expense/import','ExcelController@importExpense');
Route::post('item/import/msd','ExcelController@importItem_MSD');
Route::post('item/import/lhsd','ExcelController@importItem_LHSD');
Route::get('excel/export','ExcelController@excelExport');

//reset user section in ICTU
Route::get('section/reset','AdminController@resetSection');

//NO SECTION OR DIVISION
Route::get('section/division','MaintenanceController@changeSectionDivision');
Route::get('section/update','MaintenanceController@updateSection');
Route::get('division/update','MaintenanceController@updateDivision');

//consolidated
Route::get('consolidate/section','PpmpController@ConsolidateSection');

//PAP
Route::get('pap/home','PapController@Pap');
Route::post('pap/add','PapController@PapAdd');
Route::post('pap/edit','PapController@PapEdit');
Route::post('pap/delete','PapController@PapDelete');
Route::post('pap/edit_save','PapController@PapEditSave');

//
Route::get('migrating/item','PpmpController@migratingItem');
Route::get('FPDF/print/report','PpmpController@query');
Route::get('division/check','PpmpController@divisionCheck');
Route::get('division/check1','PpmpController@divisionCheck');

//realignment
Route::get('user/realignment','RealignmentController@index')->name('test');
Route::patch('user/realignment','RealignmentController@realignment')->name('realignment');
Route::get('user/realignment_view','RealignmentController@viewRealignment');

//programs
Route::get('program/home','AdminController@viewProgram');
Route::post('program/add','AdminController@addProgram');
Route::post('program/edit','AdminController@editProgram');
Route::post('program/update','AdminController@updateProgram');
Route::post('program/delete','AdminController@deleteProgram');
Route::any('program/search', 'AdminController@searchProgram');

//login as
Route::get('admin/login','AdminController@loginAs');
Route::post('admin/login','AdminController@assignLogin');
Route::get('admin/account/return','AdminController@returnToAdmin');

//Items
Route::get('ppmp/viewItems','PpmpController@viewItemDaily');

//Budget Allotment
Route::get('budget/home','BudgetController@index');
Route::post('budget/add','BudgetController@addBudget');
Route::post('budget/updateExpense','BudgetController@editProgram');
Route::post('budget/update','BudgetController@updateBal');

//Route::post('section/allocate_section','BudgetController@edit');
Route::get('section/allocate_section','BudgetController@sectionIndex');
Route::post('budget/addProgram','BudgetController@addProgram');
Route::post('budget/updateExpense','BudgetController@editProgram');
Route::post('budget/updateS','BudgetController@expense');

Route::get('admin/excel','AdminController@excel');
