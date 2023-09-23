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
    //User Profile
    Route::get('/' , [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    //Restaurants CRUD
    Route::get('/restaurants/create', [\App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/restaurants/', [\App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurants.store');
    Route::get('/restaurants/{slug}', [\App\Http\Controllers\RestaurantController::class, 'show'])->name('restaurants.show');
    Route::get('/restaurants/{restaurant}/edit', [\App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'update'])->name('restaurants.update');
    Route::delete('/restaurants /{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'destroy'])->name('restaurants.destroy');

    //Contacts CRUD
    Route::get('/{slug}/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/{slug}/contacts/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
    Route::post('/{slug}/contacts', [\App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');
});


Route::get('/', [\App\Http\Controllers\FrontEndController::class, 'index'])->name('frontend');
Route::get('/restaurants', [\App\Http\Controllers\FrontEndController::class, 'restaurants'])->name('frontend.restaurants');
Route::get('/profile/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profile'])->name('profile');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{link}',  [\App\Http\Controllers\FrontEndController::class, 'link'])->name('bylink');
Route::post('/confirm',  [\App\Http\Controllers\FrontEndController::class, 'confirm'])->name('confirm');
Route::post('/plus_one',  [\App\Http\Controllers\FrontEndController::class, 'plusOne'])->name('plus_one');



