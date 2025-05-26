<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PhotographerController;
use MartinK\ChatGptSiteAssistant\Http\Controllers\ChatGptController;
use App\Http\Controllers\Api\BirthdayInvitationController;

Route::post('chat', [ChatGptController::class, 'chat']);

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('birthday',
        BirthdayInvitationController::class)->middleware('throttle:200,1')
        ->names('api.birthdays');

    Route::apiResource('users',
        UserController::class
    )->names('api.users');
    Route::apiResource('blog',
        BlogController::class
    )->names('api.blogs');
    Route::apiResource('photographers',
        PhotographerController::class
    )->names('api.photographers');

    Route::apiResource('photographers',
        \App\Http\Controllers\Api\PhotographerController::class)
    ->names('api.photographers');


    Route::apiResource('musicians', App\Http\Controllers\Api\MusicianController::class);
    Route::apiResource('restaurants', App\Http\Controllers\Api\RestaurantController::class);
    Route::apiResource('ai-content', App\Http\Controllers\Api\WebsiteContentController::class);
    Route::apiResource('profiles', App\Http\Controllers\Api\ProfileController::class);

    Route::post('/ai-submit-invitation', [\App\Http\Controllers\AIInvitationController::class, 'submit']);

});
