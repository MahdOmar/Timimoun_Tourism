<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventlController;
use App\Http\Controllers\FoodAndDrinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TravelController;
use App\Models\FoodAndDrink;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class . '@index')->name('home');

Route::get('/hotels', function () {
    return view('hotels.index');
});

Route::get('/dashboarde', function () {
    return view('dashboard.index');
});

Route::group(['prefix' => 'dashboard'], function () {

   Route::resource('accommodation', AccommodationController::class);
   Route::resource('foodanddrink', FoodAndDrinkController::class);
   Route::resource('site', SiteController::class);
   Route::resource('event', EventlController::class);
   Route::resource('tour', TourController::class);
   Route::resource('travelagency', TravelController::class);




});















Route::get('/sites/details', function () {
    return view('sites.details');
});




Route::get('/details', function () {
    return view('hotels.details');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/accommodations/{id}/remove-main-image', [AccommodationController::class, 'removeMainImage'])->name('accommodations.remove-main-image');
Route::delete('/accommodations/{id}/gallery/{imageId}/remove', [AccommodationController::class, 'removeGalleryImage'])->name('accommodations.remove-gallery-image');

Route::delete('/foodanddrinks/{id}/remove-main-image', [FoodAndDrinkController::class, 'removeMainImage'])->name('foodanddrinks.remove-main-image');
Route::delete('/foodanddrinks/{id}/gallery/{imageId}/remove', [FoodAndDrinkController::class, 'removeGalleryImage'])->name('foodanddrinks.remove-gallery-image');

Route::delete('/sites/{id}/remove-main-image', [SiteController::class, 'removeMainImage'])->name('sites.remove-main-image');
Route::delete('/sites/{id}/gallery/{imageId}/remove', [SiteController::class, 'removeGalleryImage'])->name('sites.remove-gallery-image');

Route::delete('/events/{id}/remove-main-image', [EventlController::class, 'removeMainImage'])->name('events.remove-main-image');
Route::delete('/events/{id}/gallery/{imageId}/remove', [EventlController::class, 'removeGalleryImage'])->name('events.remove-gallery-image');


Route::delete('/tours/{id}/remove-main-image', [TourController::class, 'removeMainImage'])->name('tours.remove-main-image');
Route::delete('/tours/{id}/gallery/{imageId}/remove', [TourController::class, 'removeGalleryImage'])->name('tours.remove-gallery-image');


Route::delete('/travelagency/{id}/remove-main-image', [TravelController::class, 'removeMainImage'])->name('travelagency.remove-main-image');
Route::delete('/travelagency/{id}/gallery/{imageId}/remove', [TravelController::class, 'removeGalleryImage'])->name('travelagency.remove-gallery-image');




require __DIR__.'/auth.php';
