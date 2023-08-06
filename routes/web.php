<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookingController::class, 'index'])->name('index');
Route::get('/bookedDates', [BookingController::class, 'getBookedDates']);

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{id}', [BookingController::class, 'delete'])->name('booking.delete');

