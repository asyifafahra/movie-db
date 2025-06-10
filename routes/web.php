<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
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
Route::resource('movies', MovieController::class)->middleware(['auth', RoleAdmin::class]);



Route::resource('categories', CategoryController::class);

Route::get('/movie/{id}/{slug}', [MovieController::class, 'detail'])->name('movie.detail');


 Route::get('/login', [AuthController::class, 'loginForm'])->name('login');

 Route::post('/login', [AuthController::class, 'login']);

 Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

 Route::get('/movies', [MovieController::class, 'index'])->middleware('auth')->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->middleware('auth')->name('movies.show');


Route::get('/movies/create', [MovieController::class, 'create'])->middleware(['auth', RoleAdmin::class])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->middleware(['auth', RoleAdmin::class])->name('movies.store');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->middleware(['auth', RoleAdmin::class])->name('movies.edit');
Route::put('/movies/{movie}', [MovieController::class, 'update'])->middleware(['auth', RoleAdmin::class])->name('movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->middleware(['auth', RoleAdmin::class])->name('movies.destroy');
