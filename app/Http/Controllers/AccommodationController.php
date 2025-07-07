<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\AccommodationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $accommodations = Accommodation::latest()->get();
        return view('dashboard.accommodation.index', compact('accommodations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.accommodation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:hotel,villa,guest_house,campsite',
            'name' => 'required|array',
            'description' => 'required|array',
            'address' => 'nullable|array',
            'price_range' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
             'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('accommodations', 'public');
        }


       $accommodation =  Accommodation::create($data);
        if ($request->hasFile('gallery_images')) {
            error_log('Gallery images found: ' . count($request->file('gallery_images')));
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('accommodations/gallery', 'public');

            AccommodationImage::create([
                'accommodation_id' => $accommodation->id,
                'path' => $path,
            ]);
        }
    }

        return redirect()->route('accommodation.index')->with('success', 'Accommodation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $accommodation = Accommodation::with('gallery')->findOrFail($id);
         return view('dashboard.accommodation.edit', compact('accommodation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $accommodation = Accommodation::findOrFail($id);

    // Validate request
    $request->validate([
            'type' => 'required|in:hotel,villa,guest_house,campsite',
            'name' => 'required|array',
            'description' => 'required|array',
            'address' => 'nullable|array',
            'price_range' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
             'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    // Update fields
    $accommodation->fill($request->only(
        'name',
        'description',
        'address',
        'type',
        'price_range'
    ));

    // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$accommodation->main_image);

        // Delete old image if exists
        if ($accommodation->main_image && Storage::disk('public')->exists($accommodation->main_image)) {
          
              Storage::disk('public')->delete($accommodation->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('accommodations', 'public');
        $accommodation->main_image = $mainImagePath;
    }

    $accommodation->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('accommodations/gallery', 'public');

            $accommodation->gallery()->create([
                'accommodation_id' => $accommodation->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('accommodation.index', $accommodation->id)
        ->with('success', 'Accommodation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accommodation = Accommodation::findOrFail($id);

        // Delete main image if exists
        if ($accommodation->main_image && Storage::disk('public')->exists($accommodation->main_image)) {
            Storage::disk('public')->delete($accommodation->main_image);
        }

        // Delete gallery images
        foreach ($accommodation->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $accommodation->delete();

        return redirect()->route('accommodation.index')->with('success', 'Accommodation deleted successfully.');
    }

    public function removeMainImage($id)
{
    $accommodation = Accommodation::findOrFail($id);

    if ($accommodation->main_image && Storage::disk('public')->exists($accommodation->main_image)) {
        error_log('Removing main image: ' . $accommodation->main_image);
        Storage::disk('public')->delete($accommodation->main_image);
    }

    $accommodation->main_image = null;
    $accommodation->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $accommodation = Accommodation::findOrFail($id);
    $image = $accommodation->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}
}
