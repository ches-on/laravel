<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProfileController,ContactController,BlogController,CommentController,AboutController,DashboardController,UserController,LoginController,HomeController,};
use App\Http\Controllers\admin\{AuthController,FilterController,InquiryController,AdminProfileController,UsermanageController,RegisteredUserController,PostController};





Route::get('/home', [BlogController::class, 'welcome'])->name('welcome');
Route::get('/welcome/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/about', function () {return view('about');})->name('about.show');
Route::get('/search', [BlogController::class, 'search'])->name('search');

Route::get('/users', [DashboardController::class, 'show'])->name('users.show');
Route::post('/user/{id}/enable', [UserController::class, 'enable'])->name('user.enable');
Route::post('/user/{id}/disable', [UserController::class, 'disable'])->name('user.disable');

//users....
Route::get('/userdashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('userdashboard');

Route::get('/contact', function () {return view('contact');})->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware('auth')->group(function () {


// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);

Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//users...

//admin

Route::get('/admin/dashboard', [AdminProfileController::class, 'dashboard'])->name('dashboard');
Route::get('/', [AuthController::class,'getlogin'])->name('getlogin');
Route::post('/admin/login', [AuthController::class,'postlogin'])->name('postlogin');
Route::get('/admin/logout', [AdminProfileController::class,'logout'])->name('logout');
Route::get('/admin/users', [UsermanageController::class,'index'])->name('users.index');
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
Route::get('/admin/post', [PostController::class, 'show'])->name('post.show');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/{id}', [PostController::class, 'update'])->name('post.update');
Route::post('/post/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('/post/{id}/more', [PostController::class, 'more'])->name('post.more');
Route::get('/post/{id}', [PostController::class, 'delete'])->name('post.delete');
Route::get('/adsearch', [BlogController::class, 'adsearch'])->name('adsearch');
Route::get('/inquiry', [InquiryController::class, 'show'])->name('inquiry.show');
Route::get('/filter',[FilterController::class, 'index'])->name('filter');
Route::get('/filterinRange',[FilterController::class, 'filter'])->name('filter.show');

Route::get('/api/posts/{id}', [PostController::class, 'getPost'])->name('api.posts.getPost');
Route::post('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//admin

