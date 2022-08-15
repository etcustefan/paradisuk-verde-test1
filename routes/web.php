<?php

use App\Http\Controllers\PaymentController;
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
    return view('index');
})->name('/');


Route::get('checkBooking', [PaymentController::class, 'checkBooking'])->name('checkBooking');
Route::get('test', [PaymentController::class, 'test'])->name('test');
Route::get('checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('pay', [PaymentController::class, 'pay'])->name('pay');




Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
