<?php


use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ScanController;
use App\Http\Controllers\AdminPasswordChangeController;
use App\Http\Controllers\CompanyCredentialController;
use App\Http\Controllers\CompanySiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\SiteTagController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::name('admin.')->middleware(['auth', 'administrator'])->group(function (){
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    // Route::get('/users', [UserController::class, 'create']);
    // Route::get('states', [StateController::class, 'index']);
    Route::resource('companies', CompanyController::class);
    Route::resource('sites', SiteController::class);
    Route::resource('users', UserController::class);
    Route::resource('tags', TagController::class);
    Route::resource('scan', ScanController::class);
    Route::resource('attendance', AttendanceController::class);
    Route::resource('admin', AdminController::class);
    Route::prefix('credentials')->name('credentials.')->group(function (){
        Route::patch('password/change/{company}', [CompanyCredentialController::class, 'changePassword'])->name('company.password.change');
        Route::patch('password/change/{admin}/admin', [AdminPasswordChangeController::class, 'changePassword'])->name('admin.password.change');
    });
});

