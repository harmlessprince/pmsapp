<?php

use App\Http\Controllers\Mobile\Attendancecontroller;
use App\Http\Controllers\Mobile\AuthenticationController;
use App\Http\Controllers\Mobile\DashboardController;
use App\Http\Controllers\Mobile\ScanController;
use App\Http\Controllers\Mobile\SecurityGuardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('auth')->group(function (){
    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('logout', [AuthenticationController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function (){
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::get('scans', [ScanController::class, 'index']);
    Route::post('scans', [ScanController::class, 'store']);
    Route::get('attendances', [Attendancecontroller::class, 'index']);
    Route::post('attendances', [Attendancecontroller::class, 'store']);

    Route::get('guards', [SecurityGuardController::class, 'index']);
    Route::post('guards', [SecurityGuardController::class, 'store']);
});
