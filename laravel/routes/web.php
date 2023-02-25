<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [EmployeeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);

Route::get('/company/find', [CompanyController::class, 'find'])->name('company.find');
Route::get('/employee/cetakPDF', [EmployeeController::class, 'cetak_pdf'])->name('employee.cetak_pdf');
Route::get('/company/cetakPDF', [CompanyController::class, 'cetak_pdf'])->name('company.cetak_pdf');
Route::post('/employee/import_employee', [EmployeeController::class, 'import_employee'])->name('employee.import_employee');