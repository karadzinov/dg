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
    Route::get('/restaurants/{restaurant}/edit', [\App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/restaurants/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'update'])->name('restaurants.update');
    Route::delete('/restaurants /{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'destroy'])->name('restaurants.destroy');

    //Musicians CRUD
    Route::get('/musicians/create', [\App\Http\Controllers\MusicianController::class, 'create'])->name('musicians.create');
    Route::post('/musicians/', [\App\Http\Controllers\MusicianController::class, 'store'])->name('musicians.store');
    Route::get('/musicians/{musician}/edit', [\App\Http\Controllers\MusicianController::class, 'edit'])->name('musicians.edit');
    Route::put('/musicians/{musician}', [\App\Http\Controllers\MusicianController::class, 'update'])->name('musicians.update');
    Route::delete('/musicians/{musician}', [\App\Http\Controllers\MusicianController::class, 'destroy'])->name('musicians.destroy');

    //Photographers CRUD
    Route::get('/photographers/create', [\App\Http\Controllers\PhotographerController::class, 'create'])->name('photographers.create');
    Route::post('/photographers/', [\App\Http\Controllers\PhotographerController::class, 'store'])->name('photographers.store');
    Route::get('/photographers/{photographer}/edit', [\App\Http\Controllers\PhotographerController::class, 'edit'])->name('photographers.edit');
    Route::put('/photographers/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'update'])->name('photographers.update');
    Route::delete('/photographers/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'destroy'])->name('photographers.destroy');

    //Contacts CRUD
    Route::get('/{slug}/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/{slug}/contacts/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
    Route::post('/{slug}/contacts', [\App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');
});


Route::get('/', [\App\Http\Controllers\FrontEndController::class, 'index'])->name('frontend.index');
Route::get('/restaurants', [\App\Http\Controllers\FrontEndController::class, 'restaurants'])->name('frontend.restaurants');
Route::get('/restaurants/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profileRestaurants'])->name('restaurants.profile');
Route::get('/musicians', [\App\Http\Controllers\FrontEndController::class, 'musicians'])->name('frontend.musicians');
Route::get('/musicians/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profileMusician'])->name('musicians.profile');
Route::get('/photographers', [\App\Http\Controllers\FrontEndController::class, 'photographers'])->name('frontend.photographers');
Route::get('/photographers/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profilePhotographer'])->name('photographers.profile');

Route::post('/messages/{message}', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');



Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{link}',  [\App\Http\Controllers\FrontEndController::class, 'link'])->name('bylink');
Route::post('/confirm',  [\App\Http\Controllers\FrontEndController::class, 'confirm'])->name('confirm');
Route::post('/plus_one',  [\App\Http\Controllers\FrontEndController::class, 'plusOne'])->name('plus_one');



