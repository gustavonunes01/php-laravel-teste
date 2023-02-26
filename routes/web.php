<?php

use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\SaveController;

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

Route::get('/', [ViewController::class, 'index']);
Route::get('/new/cliente', [ViewController::class, 'viewNewCustomers']);
Route::get('/list/clientes', [ListController::class, 'listCustomers']);

Route::post('/save_customer', [SaveController::class, 'saveCustomer']);
Route::post('/search/customer', [ListController::class, 'searchCustomer']);
Route::post('/edit/customer', [SaveController::class, 'editCustomer']);
Route::post('/delete/customer/{id}', [SaveController::class, 'deleteCustomer']);



//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
