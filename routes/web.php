<?php

use App\Http\Controllers\AttendanceAnalyticsController;
use App\Http\Controllers\Company\RegionController;
use App\Http\Controllers\Company\SiteController;
use App\Http\Controllers\Company\TagController;
use App\Http\Controllers\Company\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScanAnalyticsController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SiteCredentialController;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Support\Facades\Mail;
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
    $faqs = FrequentlyAskedQuestion::query()->get();
    return view('welcome', compact('faqs'));
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name("about");

Route::get('/faq', function () {
    $faqs = FrequentlyAskedQuestion::query()
        ->when(request()->input('search'), function ($query, $search) {
            $query->where('question', 'LIKE', '%' . $search . '%')
                ->orWhere('answer', 'LIKE', '%' . $search . '%');
        })
        ->get();
    return view('faq', compact('faqs'));
})->name('faq');

Route::post('/contact/us', function () {
    try {
        Mail::to(config('app.contact_us_mail'))->send(new \App\Mail\ContactUsMail(
            request()->input('first_name'),
            request()->input('last_name'),
            request()->input('email'),
            request()->input('message')
        ));
    }catch (\Exception $exception){
        logger($exception);
    }

    return redirect(\route('welcome'))->with('success', 'We have received your message and we will get back to you as soon as possible.');
})->name("contact-us");


Route::middleware(['auth'])->name('common.')->group(function () {
    Route::prefix('credentials')->name('credentials.')->group(function () {
        Route::patch('password/change/{site}', [SiteCredentialController::class, 'changeSitePassword'])->name('password.change');
        Route::patch('logout/pin/change/{site}', [SiteCredentialController::class, 'changeSiteLogoutPin'])->name('logout.pin.change');
    });
});

Route::middleware(['auth'])->name('common.')->group(function () {
    Route::prefix('credentials')->name('credentials.')->group(function () {
        Route::patch('password/change/{site}', [SiteCredentialController::class, 'changeSitePassword'])->name('password.change');
        Route::patch('logout/pin/change/{site}', [SiteCredentialController::class, 'changeSiteLogoutPin'])->name('logout.pin.change');
    });
});


Route::prefix('company')->middleware(['auth', 'company_owner', 'is_banned'])->name('company.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'company'])->name('dashboard');
    Route::prefix('attendance')->name('attendance.')->group(function () {
        Route::get('analytics', AttendanceAnalyticsController::class)->name('analytics');
        Route::get('transactions', [AttendanceController::class, 'index'])->name('transactions');
    });
    Route::prefix('scans')->name('scans.')->group(function () {
        Route::get('analytics', ScanAnalyticsController::class)->name('analytics');
        Route::get('transactions', [ScanController::class, 'index'])->name('transactions');
    });

    Route::resource('users', UserController::class);
    Route::resource('tags', TagController::class);
    Route::resource('sites', SiteController::class);
    Route::resource('regions', RegionController::class);
});

Route::middleware(['auth', 'is_banned'])->group(function () {
    Route::resource('incidents', \App\Http\Controllers\IncidentController::class);
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
