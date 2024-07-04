<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;





Route::get('/', [BlogController::class, 'welcome'])->name('welcome');
Route::get('/welcome/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/about', function () {return view('about');})->name('about.show');
Route::get('/search', [BlogController::class, 'search'])->name('search');

Route::get('/users', [DashboardController::class, 'show'])->name('users.show');
Route::post('/user/{id}/enable', [UserController::class, 'enable'])->name('user.enable');
Route::post('/user/{id}/disable', [UserController::class, 'disable'])->name('user.disable');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {return view('contact');})->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {
    Route::get('/post', [PostController::class, 'show'])->name('post.show');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'delete'])->name('post.delete');

    // Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    // Route::post('login', [LoginController::class, 'login']);

    Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
