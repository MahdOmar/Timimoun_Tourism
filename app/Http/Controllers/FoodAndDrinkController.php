<?php

namespace App\Http\Controllers;

use App\Models\FoodAndDrink;
use App\Models\FoodAndDrinkImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FoodAndDrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $foodanddrinks = FoodAndDrink::latest()->get();
        return view('dashboard.food.index', compact('foodanddrinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.food.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'address' => 'required|array',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'website' => 'nullable|url',
        'min_price' => 'nullable|numeric',
        'max_price' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'type' => 'required|in:restaurant,cafe,snack,traditional',
        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

   
    // Handle main image upload
     if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('food', 'public');
        }


       $foodanddrink =  FoodAndDrink::create($data);
        if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('food/gallery', 'public');

            FoodAndDrinkImage::create([
                'food_and_drink_id' => $foodanddrink->id,
                'path' => $path,
            ]);
        }
    }
    return redirect()->route('foodanddrink.index')->with('success', 'Food & Drink place created successfully.');
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
         $foodanddrink = FoodAndDrink::with('gallery')->findOrFail($id);
         return view('dashboard.food.edit', compact('foodanddrink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


         $foodanddrink = FoodAndDrink::findOrFail($id);
        

        $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'address' => 'required|array',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'website' => 'nullable|url',
        'min_price' => 'nullable|numeric',
        'max_price' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'type' => 'required|in:restaurant,cafe,snack,traditional',
        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

   
    // Handle main image upload
    $foodanddrink->fill($request->only(
        'name',
        'description',
        'address',
        'type',
        'phone',
        'email',
        'website',
        'min_price',
        'max_price',
        'latitude',
        'longitude'
    ));
   
    if ($request->hasFile('main_image')) {

        // Delete old image if exists
        if ($foodanddrink->main_image &&  Storage::disk('public')->exists($foodanddrink->main_image)) {
            Storage::disk('public')->delete($foodanddrink->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('food', 'public');
        $foodanddrink->main_image = $mainImagePath;
        
    }

$foodanddrink->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('food/gallery', 'public');

            $foodanddrink->gallery()->create([
                'food_and_drink_id' => $foodanddrink->id,
                'path' => $path
            ]);
        }
    }
    // Handle gallery image uploads
    
        
    
    return redirect()->route('foodanddrink.index')->with('success', 'Food & Drink place created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $foodanddrink = FoodAndDrink::findOrFail($id);

        // Delete main image if exists
        if ($foodanddrink->main_image && Storage::disk('public')->exists($foodanddrink->main_image)) {
            Storage::disk('public')->delete($foodanddrink->main_image);
        }

        // Delete gallery images
        foreach ($foodanddrink->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $foodanddrink->delete();

        return redirect()->route('foodanddrink.index')->with('success', 'Food&Drink deleted successfully.');
    }

    public function removeMainImage($id)
{
    $foodanddrink = FoodAndDrink::findOrFail($id);

    if ($foodanddrink->main_image && Storage::disk('public')->exists($foodanddrink->main_image)) {
        error_log('Removing main image: ' . $foodanddrink->main_image);
        Storage::disk('public')->delete($foodanddrink->main_image);
    }

    $foodanddrink->main_image = null;
    $foodanddrink->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $foodanddrink = FoodAndDrink::findOrFail($id);
    $image = $foodanddrink->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}

public function allFood(){
    $food = FoodAndDrink::latest()->get();
    return view('food.index', compact('food')); 
  }

  public function showFood($id){
   $food = FoodAndDrink::findOrFail($id);
   $related = FoodAndDrink::latest()->get();

    return view('food.details', compact(['food', 'related']));
  }

    public function filterFood($category,$filter)
  {
     $query = FoodAndDrink::query();

   
    
     if ($category === 'All') {
          
            if ($filter === 'Rating') {
            $query->leftJoin('reviews', function ($join) {
                $join->on('food_and_drinks.id', '=', 'reviews.reviewable_id')
                    ->where('reviews.reviewable_type', FoodAndDrink::class);
            })
            ->select('food_and_drinks.*', DB::raw('COALESCE(AVG(reviews.rating), 0 as avg_rating'))
            ->groupBy('food_and_drinks.id')
            ->havingRaw('COALESCE(AVG(reviews.rating), 0) >= 0')
            ->orderByDesc('avg_rating')
            ->get();
            
    error_log($query->get());
 
             
          } elseif ($filter === 'Price: High to Low') {

             
              $query->orderBy('max_price', 'desc');
              
             
          }elseif ($filter === 'Price: Low to High') {
          $query->orderBy('min_price', 'asc');
          }
          else{
             $query->latest();
          }
           
          $food = $query->with('reviews')->get();
            return response()->json($food);

        }

        

          $query->with('reviews')->where('type', strtolower($category));

         
          
        

         if ($filter === 'Rating') {
           
           $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating','desc');
             

            
 
         }elseif ($filter === 'Price: High to Low') {

             
              $query->orderBy('max_price', 'desc');
              
             
          }elseif ($filter === 'Price: Low to High') {
          $query->orderBy('min_price', 'asc');
          }
          else{
             $query->latest();
          }
          
    

    error_log('++');
      $food = $query->get();
      

      return response()->json($food);
  }








}
