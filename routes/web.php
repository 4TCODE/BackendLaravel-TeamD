<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//dashboard routes
Route::middleware(['check.role'])->prefix('dashdoard')->name('dashboard.')->group(function () {

    Route::get('check/', [DashboardController::class, 'index'])->name('index');

     //userRoutes
    Route::resource('users',UserController::class)->except('show');
});


//student routes
Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('check/', [StudentController::class, 'index'])->name('index');
   
    }); 




require __DIR__.'/auth.php';
