<?php

use App\Http\Controllers\AttendanceAnalyticsController;
use App\Http\Controllers\Company\SiteController;
use App\Http\Controllers\Company\TagController;
use App\Http\Controllers\Company\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Attendancecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanAnalyticsController;
use App\Http\Controllers\ScanController;
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

Route::get('/', function () {
    return view('welcome');
});







Route::prefix('company')->middleware('auth')->name('company.')->group(function (){
    Route::get('dashboard', [DashboardController::class, 'company'])->name('dashboard');
    Route::prefix('attendance')->name('attendance.')->group(function (){
        Route::get('analytics', AttendanceAnalyticsController::class)->name('analytics');
        Route::get('transactions', [Attendancecontroller::class, 'index'])->name('transactions');
    });
    Route::prefix('scans')->name('scans.')->group(function (){
        Route::get('analytics', ScanAnalyticsController::class)->name('analytics');
        Route::get('transactions', [ScanController::class, 'index'])->name('transactions');
    });
    Route::resource('users', UserController::class);
    Route::resource('tags', TagController::class);
    Route::resource('sites', SiteController::class);

});

Route::get('admin/dashboard', [DashboardController::class, 'admin'])->middleware(['auth', 'verified'])->name('admin-dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
