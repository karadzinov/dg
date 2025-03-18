<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BlogController;

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('users', UserController::class)->names('api.users');
    Route::apiResource('blog', BlogController::class)->names('api.blogs');
});

