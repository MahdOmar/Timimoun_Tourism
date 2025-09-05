<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\RentalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::latest()->get();
        return view('dashboard.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('dashboard.rentals.create', );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:light_car,4x4_car,quad,apartment,house',
            'name' => 'required|array',
            'description' => 'nullable|array',
            'price' => 'nullable|numeric',
            'unit' => 'required|in:day,hour',
            'address' => 'nullable|array',
            'amenities' => 'nullable|array',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

         $data['amenities'] = $request->has('amenities') ? $request->amenities : [];
        // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('rentals', 'public');
        }

         $rental =  Rental::create($data);
        if ($request->hasFile('gallery_images')) {
            error_log('Gallery images found: ' . count($request->file('gallery_images')));
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('rentals/gallery', 'public');

            RentalImage::create([
                'rental_id' => $rental->id,
                'path' => $path,
            ]);
        }
    }

        return redirect()->route('rental.index')->with('success', 'Rental created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rental = Rental::with('gallery')->findOrFail($id);
        return view('dashboard.rentals.edit', compact('rental'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rental = Rental::findOrFail($id);
        $request->validate([
            'type' => 'required|in:light_car,4x4_car,quad,apartment,house',
            'name' => 'required|array',
            'description' => 'nullable|array',
            'price' => 'nullable|numeric',
            'unit' => 'required|in:day,hour',
            'address' => 'nullable|array',
            'amenities' => 'nullable|array',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $rental->fill($request->only(
        'name',
        'description',
        'address',
        'type',
        'price',
        'unit',
        'main_image' ,
        'phone' ,
        'email' ,
        'latitude',
        'longitude',    
    ));    

    $rental->amenities = $request->has('amenities') ? $request->amenities : [];

    // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$rental->main_image);

        // Delete old image if exists
        if ($rental->main_image && Storage::disk('public')->exists($rental->main_image)) {
          
              Storage::disk('public')->delete($rental->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('rentals', 'public');
        $rental->main_image = $mainImagePath;
    }

    $rental->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('rentals/gallery', 'public');

            $rental->gallery()->create([
                'rental_id' => $rental->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('rental.index', $rental->id)
        ->with('success', 'Rental updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $rental = Rental::findOrFail($id);

        // Delete main image if exists
        if ($rental->main_image && Storage::disk('public')->exists($rental->main_image)) {
            Storage::disk('public')->delete($rental->main_image);
        }

        // Delete gallery images
        foreach ($rental->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $rental->delete();

        return redirect()->route('rental.index')->with('success', 'Rental deleted successfully.');
    }

      public function removeMainImage($id)
{
    $craft = Rental::findOrFail($id);

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
    $craft = Rental::findOrFail($id);
    $image = $craft->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}

public function allRentals()
 {
    $rentals = Rental::all();
    return view('rentals.index', compact('rentals'));
    
 }

   public function showRental($id){
   $rental = Rental::findOrFail($id);
   $related = Rental::where('type', $rental->type)
       ->where('id', '!=', $rental->id)
       ->take(4)
       ->get();
    return view('rentals.details', compact([  'rental', 'related' ]));
  }

public function filterRentals($category,$filter)
  {
     $query = Rental::query();

   
    
     if ($category === 'All') {
          
            if ($filter === 'Rating') {
            $query->leftJoin('reviews', function ($join) {
                $join->on('rentals.id', '=', 'reviews.reviewable_id')
                    ->where('reviews.reviewable_type', Rental::class);
            })
            ->select('rentals.*', DB::raw('COALESCE(AVG(reviews.rating), 0) as avg_rating'))
            ->groupBy('rentals.id')
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
            $rentals = $query->with('reviews')->get();
            return response()->json($rentals);

        }

        if(strtolower($category) == "cars")
        {
          $query->with('reviews')->where('type', 'light_car')->orWhere('type', '4x4_car');

        }
        else{
            $query->with('reviews')->where('type',strtolower($category) );
        }



         
          
        

         if ($filter === 'Rating') {
           
           $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating','desc');
             

             
          } elseif ($filter === 'Price') {
              $query->orderBy('price', 'desc');
          }
          
    

    error_log('++');
      $rentals = $query->get();
      

      return response()->json($rentals);
  }





}
