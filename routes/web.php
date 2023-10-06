<?php

use App\Http\Controllers\FileController;
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

Route::group(['prefix' => 'admin',  'middleware' => 'check.role'], function () {
   Route::get('/', [App\Http\Controllers\BackEndController::class, 'index'])->name('backend.index');
});

Route::group(['prefix' => 'user',  'middleware' => 'auth'], function() {
    //User Profile
    Route::get('/' , [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::group(['prefix' => 'restaurants'], function() {
        //Restaurants CRUD
        Route::get('/create', [\App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');
        Route::post('/', [\App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurants.store');
        Route::get('/{restaurant}/edit', [\App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurants.edit');
        Route::put('/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'update'])->name('restaurants.update');
        Route::delete('/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'destroy'])->name('restaurants.destroy');
        Route::get('/{gallery}', [\App\Http\Controllers\RestaurantController::class, 'gallery'])->name('restaurants.gallery');
        Route::get('/{restaurant}/galleries/create', [\App\Http\Controllers\RestaurantController::class, 'createGallery'])->name('restaurants.gallery.create');
        Route::get('/{restaurant}/video/create', [\App\Http\Controllers\RestaurantController::class, 'createVideo'])->name('restaurants.gallery.video.create');
        Route::post('/{restaurant}/galleries', [\App\Http\Controllers\RestaurantController::class, 'storeGallery'])->name('restaurants.gallery.store');
        Route::post('/{restaurant}/video', [\App\Http\Controllers\RestaurantController::class, 'storeVideo'])->name('restaurants.gallery.video.store');
        Route::delete('/galleries/{gallery}', [\App\Http\Controllers\RestaurantController::class, 'destroyGallery'])->name('restaurants.gallery.destroy');
        Route::get('/galleries/{gallery}', [\App\Http\Controllers\RestaurantController::class, 'albumView'])->name('restaurants.album.view');
    });
    Route::group(['prefix' => 'musicians'], function() {
        //Musicians CRUD
        Route::get('/create', [\App\Http\Controllers\MusicianController::class, 'create'])->name('musicians.create');
        Route::post('/', [\App\Http\Controllers\MusicianController::class, 'store'])->name('musicians.store');
        Route::get('/{musician}/edit', [\App\Http\Controllers\MusicianController::class, 'edit'])->name('musicians.edit');
        Route::put('/{musician}', [\App\Http\Controllers\MusicianController::class, 'update'])->name('musicians.update');
        Route::delete('/{musician}', [\App\Http\Controllers\MusicianController::class, 'destroy'])->name('musicians.destroy');
        Route::get('/{gallery}', [\App\Http\Controllers\MusicianController::class, 'gallery'])->name('musicians.gallery');
        Route::get('/{musician}/galleries/create', [\App\Http\Controllers\MusicianController::class, 'createGallery'])->name('musicians.gallery.create');
        Route::get('/{musician}/video/create', [\App\Http\Controllers\MusicianController::class, 'createVideo'])->name('musicians.gallery.video.create');
        Route::post('/{musician}/galleries', [\App\Http\Controllers\MusicianController::class, 'storeGallery'])->name('musicians.gallery.store');
        Route::post('/{musician}/video', [\App\Http\Controllers\MusicianController::class, 'storeVideo'])->name('musicians.gallery.video.store');
        Route::delete('/galleries/{gallery}', [\App\Http\Controllers\MusicianController::class, 'destroyGallery'])->name('musicians.gallery.destroy');
        Route::get('/galleries/{gallery}', [\App\Http\Controllers\MusicianController::class, 'albumView'])->name('musicians.album.view');
    });
    Route::group(['prefix' => 'photographers'], function() {
        //Photographers CRUD
        Route::get('/create', [\App\Http\Controllers\PhotographerController::class, 'create'])->name('photographers.create');
        Route::post('/', [\App\Http\Controllers\PhotographerController::class, 'store'])->name('photographers.store');
        Route::get('/{photographer}/edit', [\App\Http\Controllers\PhotographerController::class, 'edit'])->name('photographers.edit');
        Route::put('/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'update'])->name('photographers.update');
        Route::delete('/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'destroy'])->name('photographers.destroy');
        Route::get('/{gallery}', [\App\Http\Controllers\PhotographerController::class, 'gallery'])->name('photographers.gallery');
        Route::get('/{photographer}/galleries/create', [\App\Http\Controllers\PhotographerController::class, 'createGallery'])->name('photographers.gallery.create');
        Route::get('/{photographer}/video/create', [\App\Http\Controllers\PhotographerController::class, 'createVideo'])->name('photographers.gallery.video.create');
        Route::post('/{photographer}/galleries', [\App\Http\Controllers\PhotographerController::class, 'storeGallery'])->name('photographers.gallery.store');
        Route::post('/{photographer}/video', [\App\Http\Controllers\PhotographerController::class, 'storeVideo'])->name('photographers.gallery.video.store');
        Route::delete('/galleries/{gallery}', [\App\Http\Controllers\PhotographerController::class, 'destroyGallery'])->name('photographers.gallery.destroy');
        Route::get('/galleries/{gallery}', [\App\Http\Controllers\PhotographerController::class, 'albumView'])->name('photographers.album.view');

    });
    //Contacts CRUD
    Route::get('/{slug}/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/{slug}/contacts/create', [\App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
    Route::post('/{slug}/contacts', [\App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{contact}/edit', [\App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{contact}', [\App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');

    //Gallery CRUD
    Route::post('/{slug}/galleries/create', [\App\Http\Controllers\AlbumController::class, 'create'])->name('gallery.create');
    Route::post('/{slug}/gallery', [\App\Http\Controllers\AlbumController::class, 'store'])->name('gallery.store');
    Route::delete('/galleries/{gallery}', [\App\Http\Controllers\AlbumController::class, 'destroy'])->name('gallery.destroy');
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



