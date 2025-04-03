<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MemorialController;
use App\Http\Controllers\MemorialImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LinkController;
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
Route::get('/resources', [ResourceController::class, 'index'])->name('resources');

// Authentication Routes
Route::get('/auth/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/auth/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/auth/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


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
    Route::get('auth/auth-links', [LinkController::class, 'authLinks'])->name('auth.auth-links');
    Route::get('auth/auth-users', [ProfileController::class, 'authUsers'])->name('auth.auth-users');
    Route::get('auth/auth-memorials', [MemorialController::class, 'authMemorials'])->name('auth.auth-memorials');
    Route::get('auth/auth-memorial-images', [MemorialImageController::class, 'authMemorialImages'])->name('auth.auth-memorial-images');

    // Video Data Views
    Route::get('/auth/create/video', [VideoController::class, 'create'])->name('auth.create.video');
    Route::post('/auth/create/video', [VideoController::class, 'store'])->name('video.store');
    Route::get('/auth/edit/video', [VideoController::class, 'edit'])->name('auth.edit.video');
    Route::put('/auth/edit/video/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::get('/auth/destroy/video', [VideoController::class, 'destroyPage'])->name('auth.destroy.video');
    Route::delete('/auth/destroy/video/{id}', [VideoController::class, 'destroy'])->name('auth.destroy.video.delete');

    // Presenters (Authors) Data Views
    Route::get('/auth/create/presenters', [AuthorController::class, 'create'])->name('auth.create.presenters');
    Route::post('/auth/create/presenters', [AuthorController::class, 'store'])->name('presenters.store');
    Route::get('/auth/edit/presenters', [AuthorController::class, 'edit'])->name('auth.edit.presenters');
    Route::put('/auth/edit/presenters/{id}', [AuthorController::class, 'update'])->name('presenters.update');
    Route::get('/auth/destroy/presenters', [AuthorController::class, 'destroyPage'])->name('auth.destroy.presenters');
    Route::delete('/auth/destroy/presenters/{id}', [AuthorController::class, 'destroy'])->name('auth.destroy.presenters.delete');

    // Links Data Views
    Route::get('/auth/create/links', [LinkController::class, 'create'])->name('auth.create.links');
    Route::post('/auth/create/links', [LinkController::class, 'store'])->name('links.store');
    Route::get('/auth/edit/links', [LinkController::class, 'edit'])->name('auth.edit.links');
    Route::put('/auth/edit/links/{id}', [LinkController::class, 'update'])->name('links.update');
    Route::get('/auth/destroy/links', [LinkController::class, 'destroyPage'])->name('auth.destroy.links');
    Route::delete('/auth/destroy/links/{id}', [LinkController::class, 'destroy'])->name('auth.destroy.links.delete');

    // Testimonial Data Views
    Route::get('/auth/create/testimonial', [TestimonialVideoController::class, 'create'])->name('auth.create.testimonial');
    Route::post('/auth/create/testimonial', [TestimonialVideoController::class, 'store'])->name('testimonial.store');
    Route::get('/auth/edit/testimonial', [TestimonialVideoController::class, 'edit'])->name('auth.edit.testimonial');
    Route::put('/auth/edit/testimonial/{id}', [TestimonialVideoController::class, 'update'])->name('testimonial.update');
    Route::get('/auth/destroy/testimonial', [TestimonialVideoController::class, 'destroyPage'])->name('auth.destroy.testimonial');
    Route::delete('/auth/destroy/testimonial/{id}', [TestimonialVideoController::class, 'destroy'])->name('auth.destroy.testimonial.delete');

    // Resources Data Views
    Route::get('/auth/create/resource', [ResourceController::class, 'create'])->name('auth.create.resource');
    Route::post('/auth/create/resource', [ResourceController::class, 'store'])->name('resource.store');
    Route::get('/auth/edit/resource', [ResourceController::class, 'edit'])->name('auth.edit.resource');
    Route::put('/auth/edit/resource/{id}', [ResourceController::class, 'update'])->name('resource.update');
    Route::get('/auth/destroy/resource', [ResourceController::class, 'destroyPage'])->name('auth.destroy.resource');
    Route::delete('/auth/destroy/resource/{id}', [ResourceController::class, 'destroy'])->name('auth.destroy.resource.delete');

    // User Data Views
    Route::get('/auth/create/user', [RegisteredUserController::class, 'create'])->name('auth.create.user');
    Route::post('/auth/create/user', [RegisteredUserController::class, 'store'])->name('user.store');
    Route::get('/auth/edit/user', [RegisteredUserController::class, 'edit'])->name('auth.edit.user');
    Route::put('/auth/edit/user/{id}', [RegisteredUserController::class, 'update'])->name('user.update');
    Route::get('/auth/destroy/user', [RegisteredUserController::class, 'destroyPage'])->name('auth.destroy.user');
    Route::delete('/auth/destroy/user/{id}', [RegisteredUserController::class, 'destroy'])->name('auth.destroy.user.delete');

    // Memorial Data Views
    Route::get('/auth/create/memorial', [MemorialController::class, 'create'])->name('auth.create.memorial');
    Route::post('/auth/create/memorial', [MemorialController::class, 'store'])->name('memorial.store');
    Route::get('/auth/edit/memorial', [MemorialController::class, 'edit'])->name('auth.edit.memorial');
    Route::put('/auth/edit/memorial/{id}', [MemorialController::class, 'update'])->name('memorial.update');
    Route::get('/auth/destroy/memorial', [MemorialController::class, 'destroyPage'])->name('auth.destroy.memorial');
    Route::delete('/auth/destroy/memorial/{id}', [MemorialController::class, 'destroy'])->name('auth.destroy.memorial.delete');

    // Memorial Images Data Views
    Route::get('/auth/create/memorial-images', [MemorialImageController::class, 'create'])->name('auth.create.memorial-images');
    Route::post('/auth/create/memorial-images', [MemorialImageController::class, 'store'])->name('memorial-images.store');
    Route::get('/auth/edit/memorial-images', [MemorialImageController::class, 'edit'])->name('auth.edit.memorial-images');
    Route::put('/auth/edit/memorial-images/{id}', [MemorialImageController::class, 'update'])->name('memorial-images.update');
    Route::get('/auth/destroy/memorial-images', [MemorialImageController::class, 'destroyPage'])->name('auth.destroy.memorial-images');
    Route::delete('/auth/destroy/memorial-images/{id}', [MemorialImageController::class, 'destroy'])->name('auth.destroy.memorial-images.delete');
});

