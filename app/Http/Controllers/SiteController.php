<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::latest()->get();
        return view('dashboard.sites.index', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sites.create');
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
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',

        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('sites', 'public');
        }


       $site =  Site::create($data);
        if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('sites/gallery', 'public');

            SiteImage::create([
                'site_id' => $site->id,
                'path' => $path,
            ]);
        }
    }


    return redirect()->route('site.index')->with('success', 'Site created successfully.');
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
        $site = Site::with('gallery')->findOrFail($id);
        return view('dashboard.sites.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $site = Site::findOrFail($id);
         $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'address' => 'nullable|array',
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',

        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    $site->fill($request->only(
        'name',
        'description',
        'address',
        'latitude',
        'longitude'
    ));

    // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$site->main_image);

        // Delete old image if exists
        if ($site->main_image && Storage::disk('public')->exists($site->main_image)) {
          
              Storage::disk('public')->delete($site->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('sites', 'public');
        $site->main_image = $mainImagePath;
    }

    $site->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('sites/gallery', 'public');

            $site->gallery()->create([
                'site_id' => $site->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('site.index', $site->id)
        ->with('success', 'Site updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $site = Site::findOrFail($id);

        // Delete main image if exists
        if ($site->main_image && Storage::disk('public')->exists($site->main_image)) {
            Storage::disk('public')->delete($site->main_image);
        }

        // Delete gallery images
        foreach ($site->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $site->delete();

        return redirect()->route('site.index')->with('success', 'site deleted successfully.');
    }

    public function removeMainImage($id)
{
    $site = Site::findOrFail($id);

    if ($site->main_image && Storage::disk('public')->exists($site->main_image)) {
        error_log('Removing main image: ' . $site->main_image);
        Storage::disk('public')->delete($site->main_image);
    }

    $site->main_image = null;
    $site->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $site = Site::findOrFail($id);
    $image = $site->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}
}
