<?php

use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CraftController;
use App\Http\Controllers\EventlController;
use App\Http\Controllers\FoodAndDrinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TravelController;
use App\Models\FoodAndDrink;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class . '@index')->name('home');

// Dashboard routes

Route::get('/dashboarde', function () {
    return view('dashboard.stats.index');

})->name('dashboarde');



Route::group(['prefix' => 'dashboard'], function () {

   Route::resource('accommodation', AccommodationController::class);
   Route::resource('foodanddrink', FoodAndDrinkController::class);
   Route::resource('site', SiteController::class);
   Route::resource('event', EventlController::class);
   Route::resource('tour', TourController::class);
   Route::resource('travelagency', TravelController::class);
   Route::resource('craft', CraftController::class);
   Route::resource('rental', RentalController::class);
   Route::resource('review', ReviewController::class);





});

// accommodations routes

Route::get('/accommodations', [AccommodationController::class, 'allAccommodations'])->name('accommodations.all');


// services routes

Route::get('/services', function () {
    return view('Services.index');
});

// sites routes

Route::get('/sites', [SiteController::class, 'allSites'])->name('sites.all');
Route::get('/sites/{id}', [SiteController::class, 'showSite'])->name('site.show');



// tours routes
Route::get('/tours', [TourController::class, 'allTours'])->name('tours.all');
Route::get('/tours/{id}', [TourController::class, 'showTour'])->name('tour.show');




// Events routes
Route::get('/events', [EventlController::class, 'allEvents'])->name('events.all');
Route::get('/events/{id}', [EventlController::class, 'showEvent'])->name('event.show');

// FoodAndDrinks routes
Route::get('/food', [FoodAndDrinkController::class, 'allFood'])->name('food.all');
Route::get('/food/{id}', [FoodAndDrinkController::class, 'showFood'])->name('food.show');

// Travel Agency routes
Route::get('/travels', [TravelController::class, 'allTravels'])->name('travel.all');
Route::get('/travel/{id}', [TravelController::class, 'showTravel'])->name('travel.show');

//crafts routes
Route::get('/crafts', [CraftController::class, 'allCrafts'])->name('crafts.all');
Route::get('/craft/{id}', [CraftController::class, 'showCraft'])->name('craft.show');

//rentals routes
Route::get('/rentals', [RentalController::class, 'allRentals'])->name('rentals.all');
Route::get('/rental/{id}', [RentalController::class, 'showRental'])->name('rental.show');




Route::get('/details', function () {
    return view('hotels.details');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Middleware for authenticated users

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//      DELETE ROUTES FOR IMAGES

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

Route::delete('/crafts/{id}/remove-main-image', [CraftController::class, 'removeMainImage'])->name('craft.remove-main-image');
Route::delete('/crafts/{id}/gallery/{imageId}/remove', [CraftController::class, 'removeGalleryImage'])->name('craft.remove-gallery-image');

Route::delete('/rentals/{id}/remove-main-image', [RentalController::class, 'removeMainImage'])->name('craft.remove-main-image');
Route::delete('/rentals/{id}/gallery/{imageId}/remove', [RentalController::class, 'removeGalleryImage'])->name('craft.remove-gallery-image');




require __DIR__.'/auth.php';
