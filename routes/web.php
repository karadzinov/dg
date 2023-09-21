<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('/guests', \App\Http\Controllers\GuestController::class);
});

Route::group(['prefix' => 'user',  'middleware' => 'auth'], function() {
    Route::get('/' , [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});

Route::prefix('restaurants')->group(function () {
    Route::get('/', [\App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurants.index');
    Route::get('/create', [\App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/', [\App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('/{slug}', [\App\Http\Controllers\RestaurantController::class, 'show'])->name('restaurants.show');
});

Route::get('/', [\App\Http\Controllers\FrontEndController::class, 'index'])->name('frontend');
Route::get('/profile/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profile'])->name('profile');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{link}',  [\App\Http\Controllers\FrontEndController::class, 'link'])->name('bylink');
Route::post('/confirm',  [\App\Http\Controllers\FrontEndController::class, 'confirm'])->name('confirm');
Route::post('/plus_one',  [\App\Http\Controllers\FrontEndController::class, 'plusOne'])->name('plus_one');



