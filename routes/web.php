<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('layouts.main');
});

// Route::get('/home', function () {
//     return view('layouts.home');
// });

Route::get('home', [MovieController::class,'home1'])->name('home');
Route::resource('movies', MovieController::class)->middleware('auth');


Route::resource('categories', CategoryController::class);

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail'])->name('movie.detail');


 Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

 Route::post('/login', [AuthController::class, 'login']);

 Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

