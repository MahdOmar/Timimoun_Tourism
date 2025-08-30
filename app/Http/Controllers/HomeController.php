<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Craft;
use App\Models\Event;
use App\Models\FoodAndDrink;
use App\Models\Site;
use App\Models\Tour;
use App\Models\TravelAgency;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::all();
        $accommodations = Accommodation::all();
        $foodAndDrinks = FoodAndDrink::all();
        $tours = Tour::all();
        $events = Event::orderBy('start_date')->get();
        $travels =  TravelAgency::all();
        $crafts = Craft::all();
        return view('home', compact(['sites', 'accommodations','foodAndDrinks', 'tours', 'events', 'travels','crafts']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
