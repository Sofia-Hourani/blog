<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostManagement;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

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



Route::get('/home_page',[HomeController::class,'index'])->name('home_page');

Route::get('/login',function(){
    return view('login');
})->name('login');

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', function() {
    return view('profile');
})->name('user')->middleware('auth');

Route::get('/users', [PostManagement::class,'index'])->name('posts');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::resource('posts', PostManagement::class)->except(['show']);
    });

    Route::resource('posts', PostManagement::class)->only(['index', 'show']);
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');


});

