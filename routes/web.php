<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Product search route
Route::get('/search', [WelcomeController::class, 'search'])->name('products.search');

// Newsletter subscription route
Route::post('/subscribe', [WelcomeController::class, 'subscribe'])->name('newsletter.subscribe');

// Contact form route
Route::post('/contact', [WelcomeController::class, 'contact'])->name('contact.submit');

// Public content routes
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{id}/helpful', [App\Http\Controllers\ArticleController::class, 'markHelpful'])->name('articles.helpful');
Route::post('/articles/{id}/share', [App\Http\Controllers\ArticleController::class, 'recordShare'])->name('articles.share');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{slug}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::post('/books/{id}/helpful', [App\Http\Controllers\BookController::class, 'markHelpful'])->name('books.helpful');
Route::post('/books/{id}/share', [App\Http\Controllers\BookController::class, 'recordShare'])->name('books.share');
Route::get('/consultation', [App\Http\Controllers\ConsultationController::class, 'index'])->name('consultation.index');
Route::post('/consultation', [App\Http\Controllers\ConsultationController::class, 'store'])->name('consultation.store');

// Public testimonial routes
Route::get('/testimonials', [App\Http\Controllers\TestimonialController::class, 'all'])->name('testimonials.all');
Route::get('/testimonials/create', [App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/api/testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonials.api');

// Comment routes
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

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
    Route::post('promotions/{promotion}/toggle-status', [App\Http\Controllers\Admin\PromotionController::class, 'toggleStatus'])->name('promotions.toggle-status');
    Route::resource('social-media', App\Http\Controllers\Admin\SocialMediaController::class);
    Route::post('social-media/{socialMedia}/toggle-status', [App\Http\Controllers\Admin\SocialMediaController::class, 'toggleStatus'])->name('social-media.toggle-status');
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    Route::post('testimonials/{testimonial}/toggle-status', [App\Http\Controllers\Admin\TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');
    Route::post('testimonials/{testimonial}/toggle-featured', [App\Http\Controllers\Admin\TestimonialController::class, 'toggleFeatured'])->name('testimonials.toggle-featured');
    Route::resource('subscribers', App\Http\Controllers\Admin\SubscriberController::class)->only(['index', 'destroy']);
    Route::resource('contacts', App\Http\Controllers\Admin\ContactController::class);
    Route::post('contacts/{contact}/read', [App\Http\Controllers\Admin\ContactController::class, 'markAsRead'])->name('contacts.read');
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class)->only(['index', 'update']);
});
