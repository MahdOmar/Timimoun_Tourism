<?php

namespace App\Http\Controllers;

use App\Models\TravelAgency;
use App\Models\TravelAgencyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $travelAgencies = TravelAgency::latest()->get();
        return view('dashboard.travelAgencies.index', compact('travelAgencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.travelAgencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
           
            'name' => 'required|array',
            'description' => 'required|array',
            'address' => 'nullable|array',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
         if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('travelagencies', 'public');
        }


       $travel =  TravelAgency::create($data);
        if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('travelagencies/gallery', 'public');

            TravelAgencyImage::create([
                'travel_agency_id' => $travel->id,
                'path' => $path,
            ]);
        }
    }


    return redirect()->route('travelagency.index')->with('success', 'Travel Agency created successfully.');
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
        $travelagency = TravelAgency::findOrFail($id);
        return view('dashboard.travelAgencies.edit', compact('travelagency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $travelagency = TravelAgency::findOrFail($id);
          $request->validate([
           
            'name' => 'required|array',
            'description' => 'required|array',
            'address' => 'nullable|array',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
     $travelagency->fill($request->only(
        'name',
        'description',
        'address',
        'phone',
        'website',
        'email',

     
    ));
 // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$travelagency->main_image);

        // Delete old image if exists
        if ($travelagency->main_image && Storage::disk('public')->exists($travelagency->main_image)) {
          
              Storage::disk('public')->delete($travelagency->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('travelagencies', 'public');
        $travelagency->main_image = $mainImagePath;
    }

    $travelagency->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('travelagencies/gallery', 'public');

            $travelagency->gallery()->create([
                'travel_agency_id' => $travelagency->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('travelagency.index', $travelagency->id)
        ->with('success', 'Travel Agency updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $travelagency = TravelAgency::findOrFail($id);

        // Delete main image if exists
        if ($travelagency->main_image && Storage::disk('public')->exists($travelagency->main_image)) {
            Storage::disk('public')->delete($travelagency->main_image);
        }

        // Delete gallery images
        foreach ($travelagency->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $travelagency->delete();

        return redirect()->route('travelagency.index')->with('success', 'Travel Agency deleted successfully.');
    }

     public function removeMainImage($id)
{
    $travelagency = TravelAgency::findOrFail($id);

    if ($travelagency->main_image && Storage::disk('public')->exists($travelagency->main_image)) {
        error_log('Removing main image: ' . $travelagency->main_image);
        Storage::disk('public')->delete($travelagency->main_image);
    }

    $travelagency->main_image = null;
    $travelagency->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $travelagency = TravelAgency::findOrFail($id);
    $image = $travelagency->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}



}
