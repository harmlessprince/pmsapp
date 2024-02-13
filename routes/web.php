<?php

use App\Http\Controllers\AttendanceAnalyticsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Attendancecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanAnalyticsController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StateController;
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


Route::get('/users', [\App\Http\Controllers\UserController::class, 'create']);

Route::get('states', [StateController::class, 'index']);


Route::get('admin/dashboard', [DashboardController::class, 'admin'])->middleware(['auth', 'verified'])->name('admin-dashboard');
Route::get('company/dashboard', [DashboardController::class, 'company'])->middleware(['auth', 'verified'])->name('company-dashboard');
Route::prefix('scans')->middleware('auth')->name('scans.')->group(function (){
    Route::get('analytics', ScanAnalyticsController::class)->name('analytics');
    Route::get('transactions', [ScanController::class, 'index'])->name('transactions');
});
Route::prefix('attendance')->middleware('auth')->name('attendance.')->group(function (){
    Route::get('analytics', AttendanceAnalyticsController::class)->name('analytics');
    Route::get('transactions', [Attendancecontroller::class, 'index'])->name('transactions');
});
Route::resource('companies', CompanyController::class);
Route::resource('sites', SiteController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
