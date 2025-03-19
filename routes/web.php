<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
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

// Public route for contact us
Route::get('/contact', [PagesController::class, 'contact'])->name('contact.index');

// Admin routes (only admins can create/edit/delete blog posts)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('/admin', 'admin.dashboard');

    Route::get('/blog/create', [PostsController::class, 'create']);
    Route::post('/blog', [PostsController::class, 'store']);
    Route::get('/blog/{post:slug}/edit', [PostsController::class, 'edit']);
    Route::put('/blog/{post:slug}', [PostsController::class, 'update']);
    Route::delete('/blog/{post:slug}', [PostsController::class, 'destroy']);
});

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Like routes for blog posts
    Route::post('/like/{post:slug}', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/like/{post:slug}', [LikeController::class, 'destroy'])->name('like.destroy');
});

// Public routes (viewing blog posts)
Route::get('/blog', [PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [PostsController::class, 'show'])->name('blog.show');

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
