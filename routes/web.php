<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin/')->group(function(){
// Admin Login Routes
Route::get('login',[AdminController::class,'login']);
Route::post('login',[AdminController::class,'login']);
    Route::group(['middleware' => ['disable-back-btn']],function(){
        Route::group(['middleware'=>['admin']] , function(){
        //Admin Dashboard Route
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

        // Admin Logout Route
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
        });
    });
//Company Routes
Route::get('company-index',[CompanyController::class,'index'])->name('company');
Route::get('company-create',[CompanyController::class,'create'])->name('company.create');
Route::post('company-store',[CompanyController::class,'store'])->name('company.store');
Route::get('company-edit/{id}',[CompanyController::class,'edit'])->name('company.edit');
Route::post('company-update/{id}',[CompanyController::class,'update'])->name('company.update');
Route::get('company-delete/{id}',[CompanyController::class,'delete'])->name('company.delete');

//Employee Routes
Route::get('employee-index',[EmployeeController::class,'index'])->name('employee');
Route::get('employee-create',[EmployeeController::class,'create'])->name('employee.create');
Route::post('employee-store',[EmployeeController::class,'store'])->name('employee.store');
Route::get('employee-edit/{id}',[EmployeeController::class,'edit'])->name('employee.edit');
Route::post('employee-update/{id}',[EmployeeController::class,'update'])->name('employee.update');
Route::get('employee-delete/{id}',[EmployeeController::class,'delete'])->name('employee.delete');

//Stripe gateway intergration Route

});
Route::get('stripe', [StripeController::class,'stripe'])->name('stripe');
Route::post('stripe', [StripeController::class,'stripePost'])->name('stripe.post');

