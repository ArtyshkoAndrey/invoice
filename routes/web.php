<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Spa\SpaController;

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
Route::get('/pdf', [SpaController::class, 'pdf']);
Route::get('pdf/invoice/{id}', [SpaController::class, 'invoice'])->name('invoice.pdf');

Route::get('v2/pdf/invoice/{id}', [SpaController::class, 'v2_invoice'])->name('v2_invoice.pdf');
Route::get('v2/pdf/voucher/{id}', [SpaController::class, 'v2_invoice_no_cost'])->name('v2_invoice_no_cost.pdf');

Route::get('{path}', [SpaController::class, 'index'])->where('path', '(.*)')->name('index');

