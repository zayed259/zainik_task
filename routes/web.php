<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

// public social media links url generator route 
Route::get('/user_data/{id}', [App\Http\Controllers\HomeController::class, 'user_data'])->name('user_data');


// # Customer panel routes
Route::prefix('/customer')->name('customer.')->middleware(['auth:customer', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

// # Admin panel routes
Route::prefix('/admin')->name('admin.')->middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    # Customer Management
    Route::get('/customer/edit/{id}', [App\Http\Controllers\DashboardController::class, 'customerEdit'])->name('customer.edit');
    Route::post('/customer/update/{id}', [App\Http\Controllers\DashboardController::class, 'customerUpdate'])->name('customer.update');
    Route::get('/customer/delete/{id}', [App\Http\Controllers\DashboardController::class, 'customerDelete'])->name('customer.delete');


});



require __DIR__.'/auth.php';
