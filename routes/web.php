<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public route for homepage
Route::get('/', [PagesController::class, 'index']);

// Admin routes first (to take precedence)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    // Blog Routes (only admins can create/edit/delete blog posts)
    Route::get('/blog/create', [PostsController::class, 'create']);
    Route::post('/blog', [PostsController::class, 'store']);
    Route::get('/blog/{post:slug}/edit', [PostsController::class, 'edit']);
    Route::put('/blog/{post:slug}', [PostsController::class, 'update']);
    Route::delete('/blog/{post:slug}', [PostsController::class, 'destroy']);

    // Community Routes (users can create, edit, delete their community posts)
    Route::get('/community/create', [CommunityController::class, 'create']);
    Route::post('/community', [CommunityController::class, 'store']);
    Route::get('/community/{post:slug}/edit', [CommunityController::class, 'edit']);
    Route::put('/community/{post:slug}', [CommunityController::class, 'update']);
    Route::delete('/community/{post:slug}', [CommunityController::class, 'destroy']);
});

// Public blog routes (view blog posts and individual blog post details)
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/{post:slug}', [PostsController::class, 'show']);

// Public community routes (view community posts and individual community post details)
Route::get('/community', [CommunityController::class, 'index']);
Route::get('/community/{post:slug}', [CommunityController::class, 'show']);

// Like routes for both blog and community posts
Route::post('/like/{post:slug}', [LikeController::class, 'store'])->name('like.store');
Route::delete('/like/{post:slug}', [LikeController::class, 'destroy'])->name('like.destroy');

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
