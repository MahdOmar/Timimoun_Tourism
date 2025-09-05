<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\CraftImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CraftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $crafts = Craft::latest()->get();
        return view('dashboard.crafts.index', compact('crafts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return view('dashboard.crafts.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'category' => 'required|in:textiles,pottery,jewelry,woodwork,leather,metalwork,other',
            'name' => 'required|array',
            'description' => 'required|array',
            'location' => 'nullable|array',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

      
        // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('crafts', 'public');
        }

     
       $craft =  Craft::create($data);
        if ($request->hasFile('gallery_images')) {
            error_log('Gallery images found: ' . count($request->file('gallery_images')));
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('crafts/gallery', 'public');

            CraftImage::create([
                'craft_id' => $craft->id,
                'path' => $path,
            ]);
        }
    }

        return redirect()->route('craft.index')->with('success', 'Craft created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Craft $craft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Craft $craft)
    {
        $craft = Craft::with('gallery')->findOrFail($craft->id);
        return view('dashboard.crafts.edit', compact('craft'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $craft = Craft::findOrFail($id);

    // Validate request
    $request->validate([
           'category' => 'required|in:textiles,pottery,jewelry,woodwork,leather,metalwork,other',
            'name' => 'required|array',
            'description' => 'required|array',
            'location' => 'nullable|array',
            'min_price' => 'nullable|numeric',
            'max_price' => 'nullable|numeric',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

    // Update fields
    $craft->fill($request->only(
        'name',
        'description',
        'location',
        'category',
        'min_price',
        'max_price',
        'main_image' ,
        'phone' ,
        'email' ,
        'latitude',
        'longitude' ,    
    ));    


    // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$craft->main_image);

        // Delete old image if exists
        if ($craft->main_image && Storage::disk('public')->exists($craft->main_image)) {
          
              Storage::disk('public')->delete($craft->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('crafts', 'public');
        $craft->main_image = $mainImagePath;
    }

    $craft->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('crafts/gallery', 'public');

            $craft->gallery()->create([
                'craft_id' => $craft->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('craft.index', $craft->id)
        ->with('success', 'Craft updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $craft = Craft::findOrFail($id);

        // Delete main image if exists
        if ($craft->main_image && Storage::disk('public')->exists($craft->main_image)) {
            Storage::disk('public')->delete($craft->main_image);
        }

        // Delete gallery images
        foreach ($craft->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $craft->delete();

        return redirect()->route('craft.index')->with('success', 'Craft deleted successfully.');
    }


        public function removeMainImage($id)
{
    $craft = Craft::findOrFail($id);

    if ($craft->main_image && Storage::disk('public')->exists($craft->main_image)) {
        error_log('Removing main image: ' . $craft->main_image);
        Storage::disk('public')->delete($craft->main_image);
    }

    $craft->main_image = null;
    $craft->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $craft = Craft::findOrFail($id);
    $image = $craft->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}

public function allCrafts()
 {
    $crafts = Craft::all();
    return view('Craftsmanship.index', compact('crafts'));
    
 }

   public function showCraft($id){
   $craft = Craft::findOrFail($id);
   $related = Craft::where('category', $craft->category)
       ->where('id', '!=', $craft->id)
       ->take(4)
       ->get();
    return view('Craftsmanship.details', compact([  'craft', 'related' ]));
  }


  public function filterCrafts($category,$filter)
  {
     $query = Craft::query();

   
    
     if ($category === 'All') {
          
            if ($filter === 'Rating') {
            $query->leftJoin('reviews', function ($join) {
                $join->on('crafts.id', '=', 'reviews.reviewable_id')
                    ->where('reviews.reviewable_type', Craft::class);
            })
            ->select('crafts.*', DB::raw('COALESCE(AVG(reviews.rating), 0) as avg_rating'))
            ->groupBy('crafts.id')
            ->havingRaw('COALESCE(AVG(reviews.rating), 0) >= 0')
            ->orderByDesc('avg_rating')
            ->get();
            
    error_log($query->get());
 
             
          } elseif ($filter === 'Newest') {
            $query->orderBy('created_at','desc');
          } 
          elseif ($filter === 'Price') {
              $query->orderBy('price', 'desc');
          }

          else{
             $query->latest();
          }
            $crafts = $query->with('reviews')->get();
            return response()->json($crafts);

        }

     
            $query->with('reviews')->where('category',strtolower($category) );

        



         
          
        

         if ($filter === 'Rating') {
           
           $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating','desc');
             

             
          } elseif ($filter === 'Price') {
              $query->orderBy('min_price', 'asc');
          }
          
    

    error_log('++');
      $crafts = $query->get();
     

      return response()->json($crafts);
  }







}
