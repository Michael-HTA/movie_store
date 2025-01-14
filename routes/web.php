<?php

use App\Http\Controllers\WebControllers\ActorController;
use App\Http\Controllers\WebControllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/logout', function () {
    return view('dashboard.index');
})->name('logout');

Route::get('/users',[AdminController::class, 'index'])->name('user');
Route::post('users/update',[AdminController::class, 'update'])->name('user.update');
Route::post('users/delete',[AdminController::class, 'destroy'])->name('user.delete');
Route::get('users/register',[AdminController::class, 'create'])->name('user.register');
Route::post('users/store',[AdminController::class, 'store'])->name('user.store');
Route::get('/users/{id}',[AdminController::class, 'show'])->name('user.show');
Route::get('/users/{id}/edit',[AdminController::class, 'edit'])->name('user.edit');


Route::get('/movie', function(){
    return view('pages.movie');
})->name('movie');


Route::get('/movie/detail', function(){
    return view('pages.movie-detail');
})->name('movie-detail');


Route::get('/login', function(){
    return view('pages.login');
})->name('login');


Route::get('/register', function(){
    return 'register';
})->name('register');

Route::get('/verify', function(){
    return 'verify';
})->name('verify');

Route::get('/test',[ActorController::class,'index']);
