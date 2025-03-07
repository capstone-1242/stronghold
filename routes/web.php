<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\TestimonialVideoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/memorials', [MemorialController::class, 'index'])->name('memorials');
Route::get('/memorials/{id}', [MemorialController::class, 'show'])->name('memorial');

Route::get('/testimonials', [TestimonialVideoController::class, 'index'])->name('testimonials');

Route::get('/videos', function () {
    return view('videos');
})->name('videos');

Route::get('/video-single', function () {
    return view('video-single');
})->name('videos-single');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');
