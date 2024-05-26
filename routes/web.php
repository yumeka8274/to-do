<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/posts/post', [App\Http\Controllers\PostController::class, 'index'])->name('posts.post');

Route::post('/posts/post', [App\Http\Controllers\PostController::class,'store'])->name('posts.store');

// Route::get('/posts/mypage',[App\Http\Controllers\MypageController::class,'index'])->name('posts.mypage');

Route::get('/posts/mypage',[App\Http\Controllers\MypageController::class,'index'])->name('posts.mypage');

Route::get('/posts/{id}',[App\Http\Controllers\MypageController::class,'show'])->name('posts.show');

