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

//login
Route::match(['GET','POST'],'/','LoginController@index');

//admin
Route::get('admin/home','AdminController@home');
Route::get('admin/privileged','MaintenanceController@adminPrivilage');

//user
Route::get('user/home','UserController@home');
Route::post('user/division/update','MaintenanceController@updateDivisionPost');
Route::post('user/section/update','MaintenanceController@updateSectionPost');
Route::get('user/privileged','MaintenanceController@userPrivileged');

//ppmp
Route::get('ppmp/list/{expense_id}','PpmpController@index');
Route::post('ppmp/import','ExcelController@importItem');
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
Route::post('item/import','ExcelController@importItem');

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
Route::post('pap/edit_save','PapController@PapEditSave');

