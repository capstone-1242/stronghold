<?php 

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Memorial;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Resources
Breadcrumbs::for('resources', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Local Resources', route('resources'));
});

// Home > About
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('About/Contact Us', route('about'));
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

Breadcrumbs::for('memorial', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('memorials');
    $memorial = Memorial::find($id);
    $trail->push($memorial->first_name . ' ' . $memorial->last_name, route('memorial', ['id' => $id]));
});

// Home > Videos
Breadcrumbs::for('videos', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Insightful Videos', route('videos'));
});

Breadcrumbs::for('video-author', function (BreadcrumbTrail $trail, $authorId) {
    $trail->parent('videos');
    $author = \App\Models\Author::find($authorId);
    $trail->push($author->first_name . ' ' . $author->last_name, route('author.videos', ['author_id' => $authorId]));
});

Breadcrumbs::for('video-single', function (BreadcrumbTrail $trail, $videoId) {
    $trail->parent('videos');
    $video = \App\Models\Video::find($videoId);
    $author = $video->author;
    
    $trail->push($author->first_name . ' ' . $author->last_name, route('author.videos', ['author_id' => $author->id]));
    $trail->push($video->title, route('video', ['video' => $video->id]));
});