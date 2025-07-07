<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class EventlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('dashboard.events.index', compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return(view('dashboard.events.create'));
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
            'start_date'=> 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('events', 'public');
        }


       $accommodation =  Event::create($data);
        if ($request->hasFile('gallery_images')) {
            error_log('Gallery images found: ' . count($request->file('gallery_images')));
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('events/gallery', 'public');

            EventImage::create([
                'event_id' => $accommodation->id,
                'path' => $path,
            ]);
        }
    }

        return redirect()->route('event.index')->with('success', 'Event created successfully.');
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
        $event = Event::findOrFail($id);
        error_log('Editing event with ID: ' . $event);
        return view('dashboard.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
         $request->validate([
            
            'name' => 'required|array',
            'description' => 'required|array',
            'address' => 'nullable|array',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'start_date'=> 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

         $event->fill($request->only(
        'name',
        'description',
        'address',
        'start_date',
        'end_date',
        'lat',
        'lng',
    ));

    // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$event->main_image);

        // Delete old image if exists
        if ($event->main_image && Storage::disk('public')->exists($event->main_image)) {
          
              Storage::disk('public')->delete($event->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('events', 'public');
        $event->main_image = $mainImagePath;
    }

    $event->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('events/gallery', 'public');

            $event->gallery()->create([
                'event_id' => $event->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('event.index', $event->id)
        ->with('success', 'Accommodation updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        // Delete main image if exists
        if ($event->main_image && Storage::disk('public')->exists($event->main_image)) {
            Storage::disk('public')->delete($event->main_image);
        }

        // Delete gallery images
        foreach ($event->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
     public function removeMainImage($id)
{
    $event = Event::findOrFail($id);

    if ($event->main_image && Storage::disk('public')->exists($event->main_image)) {
        error_log('Removing main image: ' . $event->main_image);
        Storage::disk('public')->delete($event->main_image);
    }

    $event->main_image = null;
    $event->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $event = Event::findOrFail($id);
    $image = $event->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}
}
