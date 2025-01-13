<?php

use App\Http\Requests\AdminUpdateRequest;
use Illuminate\Support\Facades\Route;

Route::post('movie-test', function (AdminUpdateRequest $request ) {
    return $request->validated();
});
