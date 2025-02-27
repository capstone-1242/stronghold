<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/memorials', function () {
    return view('memorials');
});

Route::get('/memorial-single', function () {
    return view('memorial-single');
});

Route::get('/testimonials', function () {
    return view('testimonials');
});

Route::get('/videos', function () {
    return view('videos');
});

Route::get('/video-single', function () {
    return view('video-single');
});

Route::get('/resources', function () {
    return view('resources');
});
