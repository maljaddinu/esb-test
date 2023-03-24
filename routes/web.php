<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;

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

Route::get('/', [InvoiceController::class, 'index']);
Route::get('/create-invoice', [InvoiceController::class, 'create']);
Route::post('/save-invoice', [InvoiceController::class, 'store']);
Route::post('/delete-invoice/{id?}', [InvoiceController::class, 'destroy']);

