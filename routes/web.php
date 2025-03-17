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

    Route::get('auth/auth-videos', [VideoController::class, 'authVideos'])->name('auth.auth-videos');
    Route::get('auth/auth-testimonials', [TestimonialVideoController::class, 'authTestimonials'])->name('auth.auth-testimonials');
    Route::get('auth/auth-resources', [ResourceController::class, 'authResources'])->name('auth.auth-resources');
    Route::get('auth/auth-presenters', [AuthorController::class, 'authAuthors'])->name('auth.auth-presenters');
    Route::get('auth/auth-users', [ProfileController::class, 'authUsers'])->name('auth.auth-users');
    Route::get('auth/auth-memorials', [MemorialController::class, 'authMemorials'])->name('auth.auth-memorials');

    Route::get('/auth/create/video', [VideoController::class, 'create'])->name('auth.create.video');
});

