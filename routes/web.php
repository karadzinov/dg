<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropzoneController;


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
    Route::get('/guests/create/{invitation}', [\App\Http\Controllers\GuestController::class, 'create'])->name('guests.create');
    Route::get('/guests/{invitation}', [\App\Http\Controllers\GuestController::class, 'index'])->name('guests.index');
    Route::post('/guests/{invitation}', [\App\Http\Controllers\GuestController::class, 'store'])->name('guests.store');
    Route::delete('/guests/{guest}', [\App\Http\Controllers\GuestController::class, 'destroy'])->name('guests.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    Route::post('users/login', [\App\Http\Controllers\Admin\UserController::class, 'loginAs'])->name('admin.users.login');
    Route::resource('restaurants', \App\Http\Controllers\Admin\RestaurantsController::class)->names('admin.restaurants');
    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');
    Route::post('/categories/order/update', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategoryOrder'])->name('admin.categories.order');
    Route::post('/restaurants/position', [App\Http\Controllers\Admin\RestaurantsController::class, 'position'])->name('admin.restaurants.position');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    //User Profile
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');


    Route::group(['prefix' => 'restaurants'], function () {
        //Restaurants CRUD
        Route::get('/create', [\App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');
        Route::post('/', [\App\Http\Controllers\RestaurantController::class, 'store'])->name('restaurants.store');
        Route::get('/{restaurant}/edit', [\App\Http\Controllers\RestaurantController::class, 'edit'])->name('restaurants.edit');
        Route::put('/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'update'])->name('restaurants.update');
        Route::delete('/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'destroy'])->name('restaurants.destroy');
       // Route::get('/{gallery}', [\App\Http\Controllers\RestaurantController::class, 'gallery'])->name('restaurants.gallery');
      //  Route::get('/{restaurant}/galleries/create', [\App\Http\Controllers\RestaurantController::class, 'createGallery'])->name('restaurants.gallery.create');
        Route::get('/{restaurant}/video/create', [\App\Http\Controllers\RestaurantController::class, 'createVideo'])->name('restaurants.gallery.video.create');
      //  Route::post('/{restaurant}/galleries', [\App\Http\Controllers\RestaurantController::class, 'storeGallery'])->name('restaurants.gallery.store');
        Route::post('/{restaurant}/video', [\App\Http\Controllers\RestaurantController::class, 'storeVideo'])->name('restaurants.gallery.video.store');
      //  Route::delete('/galleries/{gallery}', [\App\Http\Controllers\RestaurantController::class, 'destroyGallery'])->name('restaurants.gallery.destroy');
        Route::get('/gallery/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'gallery'])->name('restaurant.gallery');
        Route::post('/gallery/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'galleryStore'])->name('restaurant.gallery.store');
        Route::delete('/gallery/{restaurant}', [\App\Http\Controllers\RestaurantController::class, 'galleryDestroy'])->name('restaurant.gallery.destroy');
        Route::post('/gallery/position/{restaurant}', [App\Http\Controllers\RestaurantController::class, 'galleryPosition'])->name('restaurant.gallery.position');

    });
    Route::group(['prefix' => 'musicians'], function () {
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

    });
    Route::group(['prefix' => 'photographers'], function () {
        //Photographers CRUD
        Route::get('/create', [\App\Http\Controllers\PhotographerController::class, 'create'])->name('photographers.create');
        Route::post('/', [\App\Http\Controllers\PhotographerController::class, 'store'])->name('photographers.store');
        Route::get('/{photographer}/edit', [\App\Http\Controllers\PhotographerController::class, 'edit'])->name('photographers.edit');
        Route::put('/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'update'])->name('photographers.update');
        Route::delete('/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'destroy'])->name('photographers.destroy');
       # Route::get('/{gallery}', [\App\Http\Controllers\PhotographerController::class, 'gallery'])->name('photographers.gallery');
        Route::get('/{photographer}/galleries/create', [\App\Http\Controllers\PhotographerController::class, 'createGallery'])->name('photographers.gallery.create');
        Route::get('/{photographer}/video/create', [\App\Http\Controllers\PhotographerController::class, 'createVideo'])->name('photographers.gallery.video.create');
      #  Route::post('/{photographer}/galleries', [\App\Http\Controllers\PhotographerController::class, 'storeGallery'])->name('photographers.gallery.store');
        Route::post('/{photographer}/video', [\App\Http\Controllers\PhotographerController::class, 'storeVideo'])->name('photographers.gallery.video.store');
      #  Route::delete('/galleries/{gallery}', [\App\Http\Controllers\PhotographerController::class, 'destroyGallery'])->name('photographers.gallery.destroy');
      #  Route::get('/galleries/{gallery}', [\App\Http\Controllers\PhotographerController::class, 'albumView'])->name('photographers.album.view');
        Route::get('/gallery/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'gallery'])->name('photographer.gallery');
        Route::post('/gallery/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'galleryStore'])->name('photographer.gallery.store');
        Route::delete('/gallery/{photographer}', [\App\Http\Controllers\PhotographerController::class, 'galleryDestroy'])->name('photographer.gallery.destroy');
        Route::post('/gallery/position/{photographer}', [App\Http\Controllers\PhotographerController::class, 'galleryPosition'])->name('photographer.gallery.position');
    });


    //Profile CRUD
    Route::resource('profile', \App\Http\Controllers\ProfileController::class);
    Route::get('profile/gallery/{profile}', [\App\Http\Controllers\ProfileController::class, 'gallery'])->name('profile.gallery');
    Route::post('profile/gallery/{profile}', [\App\Http\Controllers\ProfileController::class, 'galleryStore'])->name('profile.gallery.store');
    Route::delete('profile/gallery/{gallery}', [\App\Http\Controllers\ProfileController::class, 'galleryDestroy'])->name('profile.gallery.destroy');
    Route::post('profile/gallery/position/{profile}', [App\Http\Controllers\ProfileController::class, 'galleryPosition'])->name('profile.gallery.position');

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

    //Invitations CRUD
    Route::get('/invitations', [\App\Http\Controllers\InvitationController::class, 'invitations'])->name('frontend.invitations');
    Route::delete('/invitations/{invitation}', [App\Http\Controllers\InvitationController::class, 'destroy'])->name('invitation.destroy');
});


Route::any('/ckfinder/connector', [\CKSource\CKFinderBridge\Controller\CKFinderController::class, 'requestAction'])->name('ckfinder_connector')->middleware('ckfinder');
Route::any('/ckfinder/browser', [\CKSource\CKFinderBridge\Controller\CKFinderController::class, 'browserAction'])->name('ckfinder_browser')->middleware('ckfinder');


Route::middleware(['web'])->group(function () {


    Route::get('/chatbot', [App\Http\Controllers\AssistantController::class, 'index']);
    Route::post('api/assistant-chat', [App\Http\Controllers\AssistantController::class, 'chat']);

    Route::get('/chat', [\App\Http\Controllers\FrontEndController::class, 'chat'])->name('frontend.chat');;
    // Frontend routes
    Route::get('/', [\App\Http\Controllers\FrontEndController::class, 'index'])->name('frontend.index');
    Route::get('/simon', [\App\Http\Controllers\FrontEndController::class, 'simon'])->name('frontend.simon');
    Route::get('/privacy', [\App\Http\Controllers\FrontEndController::class, 'privacy'])->name('privacy');
    Route::get('/terms', [\App\Http\Controllers\FrontEndController::class, 'terms'])->name('terms');
    Route::get('/restaurants', [\App\Http\Controllers\FrontEndController::class, 'restaurants'])->name('frontend.restaurants');
    Route::get('/profile', [\App\Http\Controllers\FrontEndController::class, 'profiles'])->name('frontend.profiles');
    Route::get('/profile/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profile'])->name('profile.profile');
    Route::get('/category/{slug}', [\App\Http\Controllers\FrontEndController::class, 'category'])->name('frontend.category');
    Route::post('/get-restaurants', [\App\Http\Controllers\FrontEndController::class, 'getRestaurant'])->name('frontend.getRestaurant');
    Route::post('/remove-restaurants', [\App\Http\Controllers\FrontEndController::class, 'removeRestaurant'])->name('frontend.removeRestaurant');
    Route::post('/get-photographer', [\App\Http\Controllers\FrontEndController::class, 'getPhotographer'])->name('frontend.getPhotographer');
    Route::post('/remove-photographer', [\App\Http\Controllers\FrontEndController::class, 'removePhotographer'])->name('frontend.removePhotographer');

    Route::post('/get-musician', [\App\Http\Controllers\FrontEndController::class, 'getMusician'])->name('frontend.getMusician');
    Route::post('/remove-musician', [\App\Http\Controllers\FrontEndController::class, 'removeMusician'])->name('frontend.removeMusician');


    Route::get('/restaurants/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profileRestaurants'])->name('restaurants.profile');
    Route::get('/galleries/{gallery}', [\App\Http\Controllers\RestaurantController::class, 'albumView'])->name('restaurants.album.view');
    Route::get('/musicians', [\App\Http\Controllers\FrontEndController::class, 'musicians'])->name('frontend.musicians');
    Route::get('/musicians/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profileMusician'])->name('musicians.profile');
    Route::get('/musicians/galleries/{gallery}', [\App\Http\Controllers\MusicianController::class, 'albumView'])->name('musicians.album.view');
    Route::get('/photographers', [\App\Http\Controllers\FrontEndController::class, 'photographers'])->name('frontend.photographers');
    Route::get('/photographers/{slug}', [\App\Http\Controllers\FrontEndController::class, 'profilePhotographer'])->name('photographers.profile');
    Route::get('/contact', [\App\Http\Controllers\FrontEndController::class, 'contact'])->name('frontend.contact');
    Route::post('/contact', [\App\Http\Controllers\FrontEndController::class, 'question'])->name('frontend.question')->middleware('throttle:5,1');;
    Route::post('/contact-main', [\App\Http\Controllers\FrontEndController::class, 'mainContact'])->name('main.contact')->middleware('throttle:5,1');
    Route::get('/template-a', [\App\Http\Controllers\InvitationController::class, 'template_a'])->name('invitations.template_a');
    Route::post('/messages/{message}', [App\Http\Controllers\MessageController::class, 'store'])->name('messages.store')->middleware('throttle:5,1');;
    Route::get('/sitemap', [App\Http\Controllers\FrontEndController::class, 'sitemap'])->name('sitemap');

    Route::get('auth/facebook', [App\Http\Controllers\SocialController::class, 'facebookRedirect'])->name('login.facebook');
    Route::get('auth/facebook/callback', [App\Http\Controllers\SocialController::class, 'facebookCallback']);

    //Payment routes

    Route::get('paypal', [\App\Http\Controllers\PaypalController::class, 'index'])->name('paypal');
    Route::get('paypal/payment', [\App\Http\Controllers\PaypalController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success', [\App\Http\Controllers\PaypalController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [\App\Http\Controllers\PaypalController::class, 'paymentCancel'])->name('paypal.payment/cancel');

    //Invitation routes
    Route::post('/invitation/store/{invitation}', [\App\Http\Controllers\InvitationController::class, 'storeUser'])->name('invitation.store.user');
    Route::get('/invitation/create', [\App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
    Route::get('/invitation/create/birthday', [\App\Http\Controllers\InvitationController::class, 'createBirthday'])->name('invitations.create.birthday');
    Route::get('/invitation/package', [\App\Http\Controllers\InvitationController::class, 'package'])->name('invitations.package');
    Route::post('/invitations', [\App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
    Route::post('/invitations/birthday', [\App\Http\Controllers\InvitationController::class, 'storeBirthday'])->name('invitations.store.birthday');
    Route::post('/invitations/{invitation}/save', [\App\Http\Controllers\InvitationController::class, 'saveRestaurantToInvitations'])->name('invitations.saveRestaurant');
    Route::get('/{invitation}', [\App\Http\Controllers\InvitationController::class, 'show'])->name('invitation.show');
    Route::post('/invitations/{invitation}/update', [\App\Http\Controllers\InvitationController::class, 'update'])->name('invitations.update');
    Route::get('/invitations/{invitation}/edit', [\App\Http\Controllers\InvitationController::class, 'editText'])->name('invitation.editText');
    Route::put('/invitations/{invitation}', [\App\Http\Controllers\InvitationController::class, 'updateRestaurantToInvitations'])->name('invitations.updateRestaurant');
    Route::get('/{invitation}/{link}', [\App\Http\Controllers\FrontEndController::class, 'link'])->name('invitations.link');

    Route::get('/{invitation}/email/{hash}', [\App\Http\Controllers\InvitationController::class, 'checkHash'])->name('invitations.checkHash');

    //AJAX routes
    Route::get('dropzone', [\App\Http\Controllers\DropzoneController::class, 'index']);
    Route::post('dropzone/store', [\App\Http\Controllers\DropzoneController::class, 'store'])->name('dropzone.store');
    Route::post('dropzone/delete', [\App\Http\Controllers\DropzoneController::class, 'destroy'])->name('dropzone.destroy');

    Route::put('/invitation/text/store', [\App\Http\Controllers\InvitationController::class, 'textStore'])->name('text.store');
    Route::post('/invitations/checkUrl', [\App\Http\Controllers\InvitationController::class, 'checkUrl'])->name('invitations.checkUrl');


    Route::post('/confirm', [\App\Http\Controllers\FrontEndController::class, 'confirm'])->name('confirm');
    Route::post('/plus_one', [\App\Http\Controllers\FrontEndController::class, 'plusOne'])->name('plus_one');

});




