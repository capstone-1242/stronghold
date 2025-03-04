<?php 

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Resources
Breadcrumbs::for('resources', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Resources', route('resources'));
});

// Home > About
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('About Us', route('about'));
});

// Home > Testimonails
Breadcrumbs::for('testimonials', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Testimonials', route('testimonials'));
});

// Home > Memorials
Breadcrumbs::for('memorials', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Memorials', route('memorials'));
});

Breadcrumbs::for('memorials-single', function (BreadcrumbTrail $trail) {
    $trail->parent('memorials');
    $trail->push('Memorial Name', route('memorials-single'));
});

// Home > Videos
Breadcrumbs::for('videos', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('All Videos', route('videos'));
});

Breadcrumbs::for('video-category', function (BreadcrumbTrail $trail) {
    $trail->parent('videos');
    $trail->push('Category Name', route('video-category'));
});

Breadcrumbs::for('videos-single', function (BreadcrumbTrail $trail) {
    $trail->parent('videos');
    $trail->push('Video Name', route('videos-single'));
});