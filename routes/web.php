<?php

use App\Http\Controllers\admin\BookingController as AdminBookingController;
use App\Http\Controllers\admin\TimeController as AdminTimeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TemplateController;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TemplateController::class, 'index'])->name('home');

Auth::routes();
Route::get('/available-times', [BookingController::class, 'availableTimes']);
Route::get('/booking', [BookingController::class, 'create'])->name('user.form');
Route::post('/booking/add', [BookingController::class, 'store'])->name('booking.store');

Route::prefix('admin')->name('admin.')->middleware(['role:admin'])->group(function() {
    //api booking
    Route::get('/bookings', function() {
        return response()->json(Booking::with('time')->latest()->get());
    });
    // Route::get('/bookings/refresh', [AdminBookingController::class, 'refresh'])->name('booking.refresh');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/booking-order', [AdminBookingController::class, 'index'])->name('booking.order.get');
    Route::get('/schedule', [AdminTimeController::class, 'index'])->name('time.index');
    Route::post('/schedule/add', [AdminTimeController::class, 'store'])->name('time.store');
    Route::delete('/schedule/delete/{id}', [AdminTimeController::class, 'destroy'])->name('time.destroy');

});

