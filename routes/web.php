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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Route::post('/like/{post:slug}', [LikeController::class, 'store'])->name('like.store');
Route::delete('/like/{post:slug}', [LikeController::class, 'destroy'])->name('like.destroy');

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin routes
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
