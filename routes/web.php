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

// Public route for blog
Route::resource('/blog', PostsController::class)->except(['create', 'store', 'edit', 'update']); // Exclude create/store/edit/update for non-admins

Route::post('/like/{post:slug}', [LikeController::class, 'store'])->name('like.store');
Route::delete('/like/{post:slug}', [LikeController::class, 'destroy'])->name('like.destroy');

// Admin routes (only accessible to admins)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    // Only admins can create, edit, and store blog posts
    Route::get('/blog/create', [PostsController::class, 'create']);
    Route::post('/blog', [PostsController::class, 'store']);
    Route::get('/blog/{post:slug}/edit', [PostsController::class, 'edit']);
    Route::put('/blog/{post:slug}', [PostsController::class, 'update']);
    Route::delete('/blog/{post:slug}', [PostsController::class, 'destroy']);
});

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
