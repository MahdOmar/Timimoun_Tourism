<?php

namespace App\Http\Controllers;

use App\Models\FoodAndDrink;
use App\Models\TraditionalDish;
use App\Models\TraditionalDishImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TraditionalDishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = FoodAndDrink::where('type', 'restaurant')->orWhere('type', 'traditional')->get();
        $dishes = TraditionalDish::with('restaurants')->get();
        return view('dashboard.dishes.index',compact([  'dishes','restaurants' ])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $data = $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('traditional_dishes', 'public');
        }


       $tour =  TraditionalDish::create($data);
        if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('traditional_dishes/gallery', 'public');

            TraditionalDishImage::create([
                'traditional_dish_id' => $tour->id,
                'path' => $path,
            ]);
        }
    }


    return redirect()->route('traditionaldish.index')->with('success', 'Traditional Dish created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TraditionalDish $traditionalDish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $traditionalDish = TraditionalDish::findOrFail($id);
        return view('dashboard.dishes.edit', compact('traditionalDish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $dish = TraditionalDish::findOrFail($id);
        
        $request->validate([
         'name' => 'required|array',
        'description' => 'required|array',
        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     $dish->fill($request->only(
        'name',
        'description',
       
     
    ));
 // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$dish->main_image);

        // Delete old image if exists
        if ($dish->main_image && Storage::disk('public')->exists($dish->main_image)) {
          
              Storage::disk('public')->delete($dish->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('tours', 'public');
        $dish->main_image = $mainImagePath;
    }

    $dish->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('traditional_dishes/gallery', 'public');

            $dish->gallery()->create([
                'traditional_dish_id' => $dish->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('traditionaldish.index', $dish->id)
        ->with('success', 'Traditional Dish updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $dish = TraditionalDish::findOrFail($id);

        // Delete main image if exists
        if ($dish->main_image && Storage::disk('public')->exists($dish->main_image)) {
            Storage::disk('public')->delete($dish->main_image);
        }

        // Delete gallery images
        foreach ($dish->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $dish->delete();

        return redirect()->route('traditionaldish.index')->with('success', 'Traditional Dish deleted successfully.');
    }


    public function removeMainImage($id)
{
    $dish = TraditionalDish::findOrFail($id);

    if ($dish->main_image && Storage::disk('public')->exists($dish->main_image)) {
        error_log('Removing main image: ' . $dish->main_image);
        Storage::disk('public')->delete($dish->main_image);
    }

    $dish->main_image = null;
    $dish->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $dish = TraditionalDish::findOrFail($id);
    $image = $dish->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}


public function link(Request $request)
{
    $request->validate([
        'traditional_dish_id' => 'required|exists:traditional_dishes,id',
        'food_and_drink_id' => 'required|exists:food_and_drinks,id',
        'price' => 'required|numeric|min:0',
        'includes' => 'nullable|array',
    ]);

    $dish = TraditionalDish::findOrFail($request->traditional_dish_id);
   $dish->restaurants()->syncWithoutDetaching([
    $request->food_and_drink_id => [
        'price' => $request->price,
        'includes' => $request->includes,
        'created_at' => now(),
        'updated_at' => now(),
    ]
]);

    return redirect()->back()->with('success', 'Dish linked successfully!');
}

public function delink($dishId, $restaurantId)
{
    $dish = TraditionalDish::findOrFail($dishId);
    $dish->restaurants()->detach($restaurantId);

    return back()->with('success', 'Restaurant unlinked successfully.');
}


public function allDishes(){
    $food = TraditionalDish::latest()->get();
    return view('Dishes.index', compact('food')); 
  }

  public function showDish($id){
   $food = TraditionalDish::with('restaurants')->findOrFail($id);
   $related = TraditionalDish::latest()->get();

    return view('Dishes.details', compact(['food', 'related']));
  }





}
