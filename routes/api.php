<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\PhotographerController;
use MartinK\ChatGptSiteAssistant\Http\Controllers\ChatGptController;

Route::post('chat', [ChatGptController::class, 'chat']);

Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::apiResource('users',
        UserController::class
    )->names('api.users');
    Route::apiResource('blog',
        BlogController::class
    )->names('api.blogs');
    Route::apiResource('photographers',
        PhotographerController::class
    )->names('api.photographers');
    Route::apiResource('albums', \App\Http\Controllers\Api\AlbumController::class)->names('api.albums');
    Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class)->names('api.categories');
    Route::apiResource('cities', \App\Http\Controllers\Api\CityController::class)->names('api.cities');
    Route::apiResource('contacts', \App\Http\Controllers\Api\ContactController::class)->names('api.contacts');
    Route::apiResource('galleries', \App\Http\Controllers\Api\GalleryController::class)->names('api.galleries');
    Route::apiResource('guests', \App\Http\Controllers\Api\GuestsController::class)->names('api.guests');
    Route::apiResource('invitations', \App\Http\Controllers\Api\InvitationController::class)->names('api.invitations');
    Route::apiResource('links', \App\Http\Controllers\Api\LinkController::class)->names('api.links');
    Route::apiResource('messages', \App\Http\Controllers\Api\MessageController::class)->names('api.messages');
    Route::apiResource('musicians', \App\Http\Controllers\Api\MusicianController::class)->names('api.musicians');
    Route::apiResource('photographers', \App\Http\Controllers\Api\PhotographerController::class)->names('api.photographers');
    Route::apiResource('pictures', \App\Http\Controllers\Api\PictureController::class)->names('api.pictures');
    Route::apiResource('profiles', \App\Http\Controllers\Api\ProfileController::class)->names('api.profiles');
    Route::apiResource('restaurants', \App\Http\Controllers\Api\RestaurantController::class)->names('api.restaurants');
    Route::apiResource('roles', \App\Http\Controllers\Api\RoleController::class)->names('api.roles');
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class)->names('api.users');
    Route::apiResource('blogs', \App\Http\Controllers\Api\BlogController::class)->names('api.blogs');
});





