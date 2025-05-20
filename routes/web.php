<?php

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
Route::resource('movies', MovieController::class);

Route::resource('categories', CategoryController::class);


