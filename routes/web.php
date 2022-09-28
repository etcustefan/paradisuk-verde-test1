<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Html2PdfController;
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
    return view('index');
})->name('/');


Route::get('/confirm', [PaymentController::class, 'checkBooking'])->name('confirm');
Route::get('/delete', [PaymentController::class, 'destroy'])->name('delete');

Route::get('checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('pay', [PaymentController::class, 'pay'])->name('pay');

Route::get('html2pdf' , [Html2PdfController::class , 'generate'])->name('html2pdf');
Route::get('html2pdf' , [Html2PdfController::class , 'generate'])->name('html2pdf');



