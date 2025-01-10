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

Route::get('/movie', function(){
    return view('pages.movie');
})->name('movie');


Route::get('/user/profile', function(){
    return view('pages.user-profile');
})->name('user-profile');

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
