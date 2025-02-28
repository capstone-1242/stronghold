<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/memorials', function () {
    return view('memorials');
})->name('memorials');

Route::get('/memorial-single', function () {
    return view('memorial-single');
})->name('memorials-single');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/videos', function () {
    return view('videos');
})->name('videos');

Route::get('/video-single', function () {
    return view('video-single');
})->name('videos-single');

Route::get('/resources', function () {
    return view('resources');
})->name('resources');
