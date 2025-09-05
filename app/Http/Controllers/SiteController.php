<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\SiteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

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
        'type' => 'nullable|string|in:monument,museum,natural,historical,religious,other',
        'opening_hours' => 'nullable|array',
        'amenities' => 'nullable|array',
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',

        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);
          $data['amenities'] = $request->has('amenities') ? $request->amenities : [];
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
        $site = Site::with('gallery')->findOrFail($id);
        return view('sites.details', compact('site'));
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
        'type' => 'nullable|string|in:monument,museum,natural,historical,religious,other',
        'opening_hours' => 'nullable|array',
        'amenities' => 'nullable|array',
        'latitude' => 'nullable|numeric|between:-90,90',
        'longitude' => 'nullable|numeric|between:-180,180',

        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    $site->fill($request->only(
        'name',
        'description',
        'address',
        'opening_hours',
        'amenities',
        'type',
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

 public function allSites()
 {
    $sites = Site::all();
    return view('sites.index', compact('sites'));
    
 }

 public function showSite($id){
   $site = Site::findOrFail($id);
    $relatedSites = Site::where('id', '!=', $site->id)
        ->inRandomOrder()
        ->take(3)
        ->get();

    return view('sites.details', compact(['site', 'relatedSites']));
  }

  public function filterSites($category,$filter)
  {
     $query = Site::query();

   
    
     if ($category === 'All') {
          
            if ($filter === 'Rating') {
            $query->leftJoin('reviews', function ($join) {
                $join->on('sites.id', '=', 'reviews.reviewable_id')
                    ->where('reviews.reviewable_type', Site::class);
            })
            ->select('sites.*', DB::raw('COALESCE(AVG(reviews.rating), 0) as avg_rating'))
            ->groupBy('sites.id')
            ->havingRaw('COALESCE(AVG(reviews.rating), 0) >= 0')
            ->orderByDesc('avg_rating')
            ->get();
            
    error_log($query->get());
 
             
          } elseif ($filter === 'Recommended') {
              
             $query->leftJoin('reviews', function ($join) {
                $join->on('sites.id', '=', 'reviews.reviewable_id')
                    ->where('reviews.reviewable_type', Site::class);
            })
            ->select('sites.*', DB::raw('COUNT(reviews.rating) as avg_rating'))
            ->groupBy('sites.id')
            ->havingRaw('COUNT(reviews.rating) >= 1')
            ->orderByDesc('avg_rating')
            ->get();
          }elseif ($filter === 'New') {
            $query->orderBy('created_at','desc');
          }
          else{
             $query->latest();
          }
            $sites = $query->with('reviews')->get();
            return response()->json($sites);

        }


          $query->with('reviews')->where('type', strtolower($category));

         
          
        

         if ($filter === 'Rating') {
           
           $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating','desc');
             

            
 
             
          } elseif ($filter === 'High to low') {
              $query->orderBy('price', 'desc');
          }
          
    

    error_log('++');
      $sites = $query->get();
      

      return response()->json($sites);
  }






}
