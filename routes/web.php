<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\TestimonialVideoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Video Routes
Route::get('/videos', [VideoController::class, 'index'])->name('videos');
Route::get('/author/{author_id}/videos', [VideoController::class, 'authorVideos'])->name('author.videos');
Route::get('/video/{video}', [VideoController::class, 'show'])->name('video');

// Memorial Routes
Route::get('/memorials', [MemorialController::class, 'index'])->name('memorials');
Route::get('/memorials/{id}', [MemorialController::class, 'show'])->name('memorial');

// Testimonial Routes
Route::get('/testimonials', [TestimonialVideoController::class, 'index'])->name('testimonials');

// Resource Routes
Route::get('/resources', function () {
    return view('resources');
})->name('resources');

// Authentication Routes
Route::get('/auth/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/auth/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/auth/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Overall Data Views
    Route::get('auth/auth-videos', [VideoController::class, 'authVideos'])->name('auth.auth-videos');
    Route::get('auth/auth-testimonials', [TestimonialVideoController::class, 'authTestimonials'])->name('auth.auth-testimonials');
    Route::get('auth/auth-resources', [ResourceController::class, 'authResources'])->name('auth.auth-resources');
    Route::get('auth/auth-presenters', [AuthorController::class, 'authAuthors'])->name('auth.auth-presenters');
    Route::get('auth/auth-users', [ProfileController::class, 'authUsers'])->name('auth.auth-users');
    Route::get('auth/auth-memorials', [MemorialController::class, 'authMemorials'])->name('auth.auth-memorials');

    // Video Views
    Route::get('/auth/create/video', [VideoController::class, 'create'])->name('auth.create.video');
    Route::post('/auth/create/video', [VideoController::class, 'store'])->name('video.store');
    Route::get('/auth/edit/video', [VideoController::class, 'edit'])->name('auth.edit.video');
    Route::put('/auth/edit/video/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::get('/auth/destroy/video', [VideoController::class, 'destroyPage'])->name('auth.destroy.video');
    Route::delete('/auth/destroy/video/{id}', [VideoController::class, 'destroy'])->name('auth.destroy.video.delete');

    // Presenters (Authors) Views
    Route::get('/auth/create/presenters', [AuthorController::class, 'create'])->name('auth.create.presenters');
    Route::post('/auth/create/presenters', [AuthorController::class, 'store'])->name('presenters.store');
    Route::get('/auth/edit/presenters', [AuthorController::class, 'edit'])->name('auth.edit.presenters');
    Route::put('/auth/edit/presenters/{id}', [AuthorController::class, 'update'])->name('presenters.update');
    Route::get('/auth/destroy/presenters', [AuthorController::class, 'destroyPage'])->name('auth.destroy.presenters');
    Route::delete('/auth/destroy/presenters/{id}', [AuthorController::class, 'destroy'])->name('auth.destroy.presenters.delete');

    // Testimonial Views
    Route::get('/auth/create/testimonial', [TestimonialVideoController::class, 'create'])->name('auth.create.testimonial');
    Route::post('/auth/create/testimonial', [TestimonialVideoController::class, 'store'])->name('testimonial.store');
    Route::get('/auth/edit/testimonial', [TestimonialVideoController::class, 'edit'])->name('auth.edit.testimonial');
    Route::put('/auth/edit/testimonial/{id}', [TestimonialVideoController::class, 'update'])->name('testimonial.update');
    Route::get('/auth/destroy/testimonial', [TestimonialVideoController::class, 'destroyPage'])->name('auth.destroy.testimonial');
    Route::delete('/auth/destroy/testimonial/{id}', [TestimonialVideoController::class, 'destroy'])->name('auth.destroy.testimonial.delete');
});

