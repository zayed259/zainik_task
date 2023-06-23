<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/user_data/{id}', [HomeController::class, 'user_data'])->name('user_data');

# Customer panel routes
Route::prefix('/customer')->name('customer.')->middleware(['auth:customer', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

# Admin panel routes
Route::prefix('/admin')->name('admin.')->middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    # Customer Management
    Route::get('/customer/edit/{id}', [DashboardController::class, 'customerEdit'])->name('customer.edit');
    Route::post('/customer/update/{id}', [DashboardController::class, 'customerUpdate'])->name('customer.update');
    Route::get('/customer/delete/{id}', [DashboardController::class, 'customerDelete'])->name('customer.delete');

});

require __DIR__.'/auth.php';
