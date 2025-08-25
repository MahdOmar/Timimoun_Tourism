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
            'stars' => 'nullable|integer',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'amenities' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data['amenities'] = $request->has('amenities') ? $request->amenities : [];
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
        $accommodation = Accommodation::with('gallery')->findOrFail($id);
         $relatedAccommodations = Accommodation::where('type', $accommodation->type)
        ->where('id', '!=', $accommodation->id)
        ->inRandomOrder()
        ->take(3)
        ->get();
        
        return view('hotels.details', compact([ 'accommodation', 'relatedAccommodations' ]));
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
            'stars' => 'nullable|integer',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'amenities' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    // Update fields
    $accommodation->fill($request->only(
        'name',
        'description',
        'address',
        'stars',
        'type',
        'min_price',
        'max_price',
        'main_image' ,
        'phone' ,
        'email' ,
        'website',
        'latitude',
        'longitude' ,    
    ));    

    $accommodation->amenities = $request->has('amenities') ? $request->amenities : [];

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

 public function allAccommodations()
 {
    $accommodations = Accommodation::all();
    return view('hotels.index', compact('accommodations'));
    
 }

  public function Filter(Request $request)
 {
    $accommodations = Accommodation::all();

    // Apply filters if any
    if ($request->has('type')) {
        $accommodations = $accommodations->where('type', $request->input('type'));
    }

    if ($request->has('prices')) {
        $prices = $request->input('prices');
        if (in_array('under_5000', $prices)) {
            $accommodations = $accommodations->where('price_range', '<', 5000);
        }
        if (in_array('5000_10000', $prices)) {
            $accommodations = $accommodations->whereBetween('price_range', [5000, 10000]);
        }
        if (in_array('10000_20000', $prices)) {
            $accommodations = $accommodations->whereBetween('price_range', [10000, 20000]);
        }
    }

    return view('hotels.index', compact('accommodations'));
    
 }

}
