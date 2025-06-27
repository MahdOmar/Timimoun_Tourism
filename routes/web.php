<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/hotels', function () {
    return view('hotels.index');
});

Route::get('/dashboarde', function () {
    return view('dashboard.index');
});

Route::get('dashboard/accommodation', function () {
    return view('dashboard.accommodation.index');
})->name('accommodation.index');
Route::get('dashboard/accommodation/create', function () {
    return view('dashboard.accommodation.create');
})->name('accommodation.create');

Route::get('dashboard/food&drinks', function () {
    return view('dashboard.food.index');
})->name('food.index');
Route::get('dashboard/food&drinks/create', function () {
    return view('dashboard.food.create');
})->name('food.create');



Route::get('/dashboard/sites', function () {
    return view('dashboard.sites.index');
})->name('site.index');

Route::get('/dashboard/sites/create', function () {
    return view('dashboard.sites.create');
})->name('site.create');

Route::get('/dashboard/events', function () {
    return view('dashboard.events.index');
})->name('event.index');

Route::get('/dashboard/events/create', function () {
    return view('dashboard.events.create');
})->name('events.create');

Route::get('dashboard/dashboard/tours', function () {
    return view('dashboard.tours.index');
})->name('tour.index');

Route::get('dashboard/tours/create', function () {
    return view('dashboard.tours.create');
})->name('tour.create');

Route::get('dashboard/travel_agencies', function () {
    return view('dashboard.travelAgencies.index');
})->name('travel.index');

Route::get('dashboard/travel_agencies/create', function () {
    return view('dashboard.travelAgencies.create');
})->name('travel.create');


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

require __DIR__.'/auth.php';
