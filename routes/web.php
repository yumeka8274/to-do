<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Posts;




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

//todoリストの投稿機能
Route::post('/posts/post', [App\Http\Controllers\PostController::class,'store'])->name('posts.store');

//フォルダの作成機能
Route::get('/folder/post', [App\Http\Controllers\FolderController::class, 'index'])->name('folders.post');
Route::post('/folder/post', [App\Http\Controllers\FolderController::class,'store'])->name('folders.store');


//フォルダ内の詳細表示
Route::get('/folder/mypage/{id}',[App\Http\Controllers\FolderController::class,'show'])->name('folder.show');


//マイページ画像
Route::get('/folder/mypage',[App\Http\Controllers\MypageController::class,'index'])->name('posts.mypage');


// Route::get('/posts/mypage',[App\Http\Controllers\MypageController::class,'index'])->name('posts.mypage');

// Route::get('/posts/mypage',[App\Http\Controllers\MypageController::class,'index'])->name('posts.mypage');

//投稿の詳細画面表示
Route::get('/posts/mypage/{id}',[App\Http\Controllers\MypageController::class,'show'])->name('posts.show');

//削除機能
Route::delete('/posts/mypage/{id}',[App\Http\Controllers\MypageController::class,'destroy'])->name('posts.destroy');
Route::delete('/posts/folder/{id}',[App\Http\Controllers\FolderController::class,'destroy'])->name('folder.destroy');

//投稿の編集機能
Route::get('/edit/{id}',[App\Http\Controllers\MypageController::class,'edit'])->name('posts.edit');

//フォルダの編集機能
Route::get('/edit/folder/{id}',[App\Http\Controllers\FolderController::class,'edit'])->name('folder.edit');
Route::post('/folder/update/{id}',[App\Http\Controllers\FolderController::class,'update'])->name('folder.update');

Route::post('/update/{id}', [App\Http\Controllers\MypageController::class,'update'])->name('posts.update');



// Route::get('/posts/mypage/{id}', function () {
//     return view('welcome');
// });


//カレンダーの表示
Route::get('/calender', function () {
    return view('calender.index');
})->name('calender.index');
//カレンダーにtodoを追加するルート情報
Route::get('/events', [EventController::class, 'index']);