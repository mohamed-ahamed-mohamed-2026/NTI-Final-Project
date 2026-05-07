<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return redirect()->route('home');
    // view('welcome');
});


Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('home')->group(function(){
    Route::get('/', [HomeController::class,'dashboard'])->name('home');
    Route::get('/{user}/my-profile', [UserController::class,'index'])->name('my-profile');
    Route::post('/my-profile', [UserController::class,'update'])->name('my-profile.update');
    Route::get('/doctors',[DoctorController::class,'index'])->name('doctors.index');

    Route::get('/doctors/search',[DoctorController::class,'search'])->name('doctors.search');
    Route::get('/doctors/{doctor}/show',[DoctorController::class,'showSingleDr'])->name('doctors.show');
    Route::get('/appointments/register',[DoctorController::class,'showSingleDr'])->name('appointments.register');
    Route::get('/contact',[ContactController::class,'index'])->name('contact');
    Route::post('/contact/send',[ContactController::class,'sendMail'])->name('contact.send');
});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/booking/{id}/{clinic_id}/{offset}', [AppointmentController::class, 'showBookingForm'])
        ->name('booking.show');
    Route::post('/appointments/book', [AppointmentController::class, 'store'])
        ->name('appointments.store');
    Route::get('/appointments/confirm/{slot}', [AppointmentController::class, 'confirmBooking'])
        ->name('appointments.confirm');
});
// Admin Panel for Doctors
Route::prefix('admin')->group(function () {
    Route::get('/doctors', [AdminController::class,'index'])->name('admin.doctors.index');
    Route::get('/doctors/create', [AdminController::class, 'create'])->name('admin.doctors.create');
    Route::post('/doctors', [AdminController::class, 'store'])->name('admin.doctors.store');
    Route::get('/doctors/{doctor}/edit', [AdminController::class, 'edit'])->name('admin.doctors.edit');
    Route::post('/doctors/{doctor}/update', [AdminController::class, 'update'])->name('admin.doctors.update');
    Route::delete('/doctors/{doctor}/delete', [AdminController::class, 'destroy'])->name('admin.doctors.delete');
});
