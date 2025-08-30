<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
         $request->validate([
        'name'            => 'required|string|max:255',
        'email'           => 'required|email|max:255',
        'reviewable_type' => 'required|string',
        'reviewable_id'   => 'required|integer',
        'rating'          => 'required|integer|min:1|max:5',
        'comment'         => 'nullable|string'
    ]);

    Review::create([
        'name'            => $request->name,
        'email'           => $request->email,
        'reviewable_type' => $request->reviewable_type,
        'reviewable_id'   => $request->reviewable_id,
        'rating'          => $request->rating,
        'comment'         => $request->comment,
    ]);

    return back()->with('success', 'Review submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
