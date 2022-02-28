<?php

use Illuminate\Support\Facades\Route;

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
});


Route::post('/logout',[App\Http\Controllers\LogoutController::class,'store']);
Route::get('/login',[App\Http\Controllers\Logincontroller::class,'index'])->name('login');
Route::post('/login',[App\Http\Controllers\Logincontroller::class,'store']);
Route::get('/posts',[App\Http\Controllers\PostController::class,'index'])->name('posts');
Route::post('/post',[App\Http\Controllers\PostController::class,'store']);


Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
Route::get('/register',[App\Http\Controllers\RegistertController::class,'index'])->name('register');
Route::post('/register',[\App\Http\Controllers\RegistertController::class,'store']);
Route::post('/posts/{id}/likes',[App\Http\Controllers\PostLikeController::class,'store']);
Route::delete('/posts/{post}/likes',[App\Http\Controllers\PostLikeController::class,'destroy'])->name('posts.likes');
