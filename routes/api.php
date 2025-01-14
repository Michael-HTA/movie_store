<?php

use App\Http\Controllers\ApiControllers\UsersController;
use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Support\Facades\Route;

Route::post('movie-test', function (AdminUpdateRequest $request ) {
    return $request->validated();
});

Route::post('user/login',[UsersController::class,'login']);
Route::post('user/register',[UsersController::class,'register']);
Route::get('user/logout',[UsersController::class,'logout']);
