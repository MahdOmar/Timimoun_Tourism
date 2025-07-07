<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\TourImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('dashboard.tours.index', compact('tours')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tours.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         $data = $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'includes' => 'nullable|array',
        'duration' => 'nullable|numeric',
        'price' => 'nullable|numeric',
        'phone' => 'nullable|string',

        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('tours', 'public');
        }


       $tour =  Tour::create($data);
        if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('tours/gallery', 'public');

            TourImage::create([
                'tour_id' => $tour->id,
                'path' => $path,
            ]);
        }
    }


    return redirect()->route('tour.index')->with('success', 'Tour created successfully.');
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
        $tour = Tour::findOrFail($id);
        return view('dashboard.tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tour = Tour::findOrFail($id);
        
        $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'includes' => 'nullable|array',
        'duration' => 'nullable|numeric',
        'price' => 'nullable|numeric',
        'phone' => 'nullable|string',

        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     $tour->fill($request->only(
        'name',
        'description',
        'includes',
        'duration',
        'price',
        'phone',
     
    ));
 // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$tour->main_image);

        // Delete old image if exists
        if ($tour->main_image && Storage::disk('public')->exists($tour->main_image)) {
          
              Storage::disk('public')->delete($tour->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('tours', 'public');
        $tour->main_image = $mainImagePath;
    }

    $tour->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('tours/gallery', 'public');

            $tour->gallery()->create([
                'tour_id' => $tour->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('tour.index', $tour->id)
        ->with('success', 'Tour updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $tour = Tour::findOrFail($id);

        // Delete main image if exists
        if ($tour->main_image && Storage::disk('public')->exists($tour->main_image)) {
            Storage::disk('public')->delete($tour->main_image);
        }

        // Delete gallery images
        foreach ($tour->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $tour->delete();

        return redirect()->route('tour.index')->with('success', 'Tour deleted successfully.');
    }

       public function removeMainImage($id)
{
    $tour = Tour::findOrFail($id);

    if ($tour->main_image && Storage::disk('public')->exists($tour->main_image)) {
        error_log('Removing main image: ' . $tour->main_image);
        Storage::disk('public')->delete($tour->main_image);
    }

    $tour->main_image = null;
    $tour->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $tour = Tour::findOrFail($id);
    $image = $tour->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}
}
