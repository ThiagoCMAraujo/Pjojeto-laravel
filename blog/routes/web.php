<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name('user.posts');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/allposts/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/allposts', [PostController::class, 'postsall'])->name('postsall');
Route::post('/allposts', [PostController::class, 'store'])->name('register_post');
Route::delete('/allposts/{post}', [PostController::class, 'destroy'])->name('delete_post');

Route::post('/allposts{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

Route::delete('/allposts{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');
