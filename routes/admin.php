<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\CatchSupportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExchangeSupportController;
use App\Http\Controllers\InvoiceSupplerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplerController;
use App\Http\Controllers\testcontroller;
use App\Models\InvoiceSuppler;
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
Route::group(['namespace'=>'Admin','middleware'=>'auth:admin'],function(){
    Route::get('home',[DashboardController::class,'index'])->name('dashoard');
    Route::get('logout',[loginController::class,'logout'])->name('logout');

Route::get('Suppler.index',[SupplerController::class,'index'])->name('Suppler.index');
Route::get('Suppler.create',[SupplerController::class,'create'])->name('Suppler.create');
Route::post('Suppler.store',[SupplerController::class,'store'])->name('Suppler.store');
Route::get('Suppler.edit/{id}',[SupplerController::class,'edit'])->name('Suppler.edit');
Route::get('Suppler.check/{id}',[SupplerController::class,'check'])->name('Suppler.check');
Route::post('Suppler.update',[SupplerController::class,'update'])->name('Suppler.update');
Route::post('Suppler.delete/{id}',[SupplerController::class,'delete'])->name('Suppler.delete');

Route::get('report-customer',[ReportsController::class,'getCustomer'])->name('report-customer');
Route::post('report-customerAjax',[ReportsController::class,'getCustomerAjax'])->name('report-customerAjax');
Route::get('report-suppler',[ReportsController::class,'getsuppler'])->name('report-suppler');
Route::post('report-supplerAjax',[ReportsController::class,'getsupplerAjax'])->name('report-supplerAjax');
Route::get('exportCustomer',[ReportsController::class,'exportCustomer'])->name('exportCustomer');

Route::get('Setting.index',[SettingController::class,'index'])->name('Setting.index');
Route::get('Setting.create',[SettingController::class,'create'])->name('Setting.create');
Route::post('Setting.store',[SettingController::class,'store'])->name('Setting.store');
Route::get('Setting.edit/{id}',[SettingController::class,'edit'])->name('Setting.edit');
Route::get('Setting.check/{id}',[SettingController::class,'check'])->name('Setting.check');
Route::post('Setting.update',[SettingController::class,'update'])->name('Setting.update');
Route::post('Setting.delete/{id}',[SettingController::class,'delete'])->name('Setting.delete');

Route::get('customer.index',[CustomerController::class,'index'])->name('customer.index');
Route::get('customer.create',[CustomerController::class,'create'])->name('customer.create');
Route::post('customer.store',[CustomerController::class,'store'])->name('customer.store');
Route::get('customer.edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('customer.update',[CustomerController::class,'update'])->name('customer.update');
Route::get('customer.check/{id}',[CustomerController::class,'check'])->name('customer.check');
Route::get('customer.print/{id}',[CustomerController::class,'print'])->name('customer.print');
Route::post('customer.delete/{id}',[CustomerController ::class,'delete'])->name('customer.delete');
Route::post('customer.addAjaxCustomer',[CustomerController ::class,'addAjaxCustomer'])->name('customer.addAjaxCustomer');


Route::get('Product.index',[ProductController::class,'index'])->name('Product.index');
Route::get('Product.create',[ProductController::class,'create'])->name('Product.create');
Route::post('Product.store',[ProductController::class,'store'])->name('Product.store');
Route::get('Product.edit/{id}',[ProductController::class,'edit'])->name('Product.edit');
Route::post('Product.update',[ProductController::class,'update'])->name('Product.update');
Route::post('Product.delete/{id}',[ProductController ::class,'delete'])->name('Product.delete');


Route::get('CatchSupport.index',[CatchSupportController::class,'index'])->name('CatchSupport.index');
Route::get('CatchSupport.create',[CatchSupportController::class,'create'])->name('CatchSupport.create');
Route::post('CatchSupport.store',[CatchSupportController::class,'store'])->name('CatchSupport.store');
Route::get('CatchSupport.edit/{id}',[CatchSupportController::class,'edit'])->name('CatchSupport.edit');
Route::post('CatchSupport.update',[CatchSupportController::class,'update'])->name('CatchSupport.update');
Route::post('CatchSupport.delete/{id}',[CatchSupportController ::class,'delete'])->name('CatchSupport.delete');
Route::post('CatchSupport.ajavSearch',[CatchSupportController ::class,'ajavSearch'])->name('CatchSupport.ajavSearch');


Route::get('Exchanges.index',[ExchangeSupportController::class,'index'])->name('Exchanges.index');
Route::get('Exchanges.create',[ExchangeSupportController::class,'create'])->name('Exchanges.create');
Route::post('Exchanges.store',[ExchangeSupportController::class,'store'])->name('Exchanges.store');
Route::get('Exchanges.edit/{id}',[ExchangeSupportController::class,'edit'])->name('Exchanges.edit');
Route::post('Exchanges.update',[ExchangeSupportController::class,'update'])->name('Exchanges.update');
Route::post('Exchanges.delete/{id}',[ExchangeSupportController ::class,'delete'])->name('Exchanges.delete');
Route::post('Exchanges.ajavSearch',[ExchangeSupportController ::class,'ajavSearch'])->name('Exchanges.ajavSearch');


Route::get('user.index',[AdminController::class,'index'])->name('user.index');
Route::get('user.create',[AdminController::class,'create'])->name('user.create');
Route::post('user.store',[AdminController::class,'store'])->name('user.store');
Route::get('user.edit/{id}',[AdminController::class,'edit'])->name('user.edit');
Route::post('user.update',[AdminController::class,'update'])->name('user.update');
Route::post('user.delete/{id}',[AdminController ::class,'delete'])->name('user.delete');

Route::get('invoiceSuppler.index',[InvoiceSupplerController::class,'index'])->name('invoiceSuppler.index');
Route::get('invoiceSuppler.create',[InvoiceSupplerController::class,'create'])->name('invoiceSuppler.create');
Route::post('invoiceSuppler.store',[InvoiceSupplerController::class,'store'])->name('invoiceSuppler.store');
Route::get('invoiceSuppler.edit/{id}',[InvoiceSupplerController::class,'edit'])->name('invoiceSuppler.edit');
Route::post('invoiceSuppler.update',[InvoiceSupplerController::class,'update'])->name('invoiceSuppler.update');
Route::post('invoiceSuppler.delete/{id}',[InvoiceSupplerController ::class,'delete'])->name('invoiceSuppler.delete');
Route::post('invoiceSuppler.addCustomerAjax',[InvoiceSupplerController ::class,'addCustomerAjax'])->name('invoiceSuppler.addCustomerAjax');



});
Route::group(['namespace'=>'Admin','middleware'=>'guest:admin'],function(){
    Route::get('login',[loginController::class,'index'])->name('login');
    Route::post('login',[loginController::class,'login'])->name('login.login');



Route::get('/', function () {
    return view('auth.login');
});
Route::get('show',[testcontroller::class,'showdata']);
Route::get('show1',[testcontroller::class,'showdata1']);
Route::get('print_invoices',[testcontroller::class,'printInvoices']);


});
