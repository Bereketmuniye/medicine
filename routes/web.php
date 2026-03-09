<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::middleware(['custom_throttle:5,1'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password reset routes
Route::middleware(['custom_throttle:6,1'])->group(function () {
    Route::get('/forgot-password', [LoginController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [LoginController::class, 'sendPasswordResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('password.update');
});

// Registration route
Route::middleware(['custom_throttle:3,60'])->group(function () {
    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.post');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth']);

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
    Route::resource('plants', App\Http\Controllers\Admin\PlantController::class);
    Route::resource('videos', App\Http\Controllers\Admin\VideoController::class);
    Route::resource('books', App\Http\Controllers\Admin\BookController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('promotions', App\Http\Controllers\Admin\PromotionController::class);
    Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class)->only(['index', 'destroy']);
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class)->only(['index', 'update']);
});
