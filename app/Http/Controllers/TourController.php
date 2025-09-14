<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\TourImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\error;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('dashboard.tours.index', compact('tours')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.tours.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         $data = $request->validate([
        'name' => 'required|array',
        'description' => 'required|array',
        'includes' => 'nullable|array',
        'duration_days' => 'nullable|numeric',
        'duration_nights' => 'nullable|numeric',
        'price' => 'nullable|numeric',
        'stops' => 'nullable|integer',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'start_latitude' => 'nullable|numeric',
        'start_longitude' => 'nullable|numeric',
        'end_latitude' => 'nullable|numeric',
        'end_longitude' => 'nullable|numeric',
        'category' => 'nullable|in:cars,quads,camels',
        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     // Handle image
        if ($request->hasFile('main_image')) {
            $data['main_image'] = $request->file('main_image')->store('tours', 'public');
        }


       $tour =  Tour::create($data);
        if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('tours/gallery', 'public');

            TourImage::create([
                'tour_id' => $tour->id,
                'path' => $path,
            ]);
        }
    }


    return redirect()->route('tour.index')->with('success', 'Tour created successfully.');
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
        $tour = Tour::findOrFail($id);
        return view('dashboard.tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tour = Tour::findOrFail($id);
        
        $request->validate([
         'name' => 'required|array',
        'description' => 'required|array',
        'includes' => 'nullable|array',
        'duration_days' => 'nullable|numeric',
        'duration_nights' => 'nullable|numeric',
        'price' => 'nullable|numeric',
        'stops' => 'nullable|integer',
        'phone' => 'nullable|string',
        'email' => 'nullable|email',
        'start_latitude' => 'nullable|numeric',
        'start_longitude' => 'nullable|numeric',
        'end_latitude' => 'nullable|numeric',
        'end_longitude' => 'nullable|numeric',
        'category' => 'nullable|in:cars,quads,camels',
        'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
    ]);

     $tour->fill($request->only(
        'name',
        'description',
        'includes',
        'duration_days',
        'duration_nights',
        'price',
        'stops',
        'phone',
        'email',
        'start_latitude',
        'start_longitude',
        'end_latitude',
        'end_longitude',
        'category'
     
    ));
 // Handle main image upload
    if ($request->hasFile('main_image')) {

        error_log(message: 'main image'.$tour->main_image);

        // Delete old image if exists
        if ($tour->main_image && Storage::disk('public')->exists($tour->main_image)) {
          
              Storage::disk('public')->delete($tour->main_image);
        }

        $mainImagePath = $request->file('main_image')->store('tours', 'public');
        $tour->main_image = $mainImagePath;
    }

    $tour->save();

    // Handle gallery image uploads
    if ($request->hasFile('gallery_images')) {
        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('tours/gallery', 'public');

            $tour->gallery()->create([
                'tour_id' => $tour->id,
                'path' => $path
            ]);
        }
    }

    return redirect()->route('tour.index', $tour->id)
        ->with('success', 'Tour updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $tour = Tour::findOrFail($id);

        // Delete main image if exists
        if ($tour->main_image && Storage::disk('public')->exists($tour->main_image)) {
            Storage::disk('public')->delete($tour->main_image);
        }

        // Delete gallery images
        foreach ($tour->gallery as $image) {
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
            $image->delete();
        }

        $tour->delete();

        return redirect()->route('tour.index')->with('success', 'Tour deleted successfully.');
    }

       public function removeMainImage($id)
{
    $tour = Tour::findOrFail($id);

    if ($tour->main_image && Storage::disk('public')->exists($tour->main_image)) {
        error_log('Removing main image: ' . $tour->main_image);
        Storage::disk('public')->delete($tour->main_image);
    }

    $tour->main_image = null;
    $tour->save();

    return response()->json(['message' => 'Main image removed']);
}

public function removeGalleryImage($id, $imageId)
{
    $tour = Tour::findOrFail($id);
    $image = $tour->gallery()->findOrFail($imageId);

    if (Storage::disk('public')->exists($image->path)) {
        Storage::disk('public')->delete($image->path);
    }

    $image->delete();

    return response()->json(['message' => 'Gallery image removed']);
}


  public function allTours(){
    $tours = Tour::latest()->get();
    return view('tours.index', compact('tours')); 
  }

  public function showTour($id){
   $tour = Tour::with('reviews')->findOrFail($id);
    return view('tours.details', compact('tour'));
  }

  public function filterTour(Request $request)
  {
   $query = Tour::query();

    if ($request->category =="all") {
        
        $query->withAvg('reviews', 'rating')->latest();
    }
    else{
         $query->withAvg('reviews', 'rating')->where('category',$request->category);
    }
    if($request->duration ==">3"){
        $query->where('duration_days','>=', 4);

    }
    elseif($request->duration !="any"){
        $query->where('duration_days',$request->duration);

    }
   

           

  

    if ($request->price == "10000") {
        

        $query->where('price' ,'<=',10000);
    }
    elseif($request->price == "10000-15000")
    {
        $query->whereBetween('price',[10000,15000]);
    }
    elseif($request->price == "15000-20000")
    {
        $query->whereBetween('price',[15000,20000]);
    }
    elseif($request->price == ">20000")
    {
        $query->where('price','>',20000);
    }
 
     

    if ($request->sort == "Newest") {
        
        $query->orderBy('created_at', "desc");
        
        
    }
    elseif($request->sort == "Rating")
    {
          $query->leftJoin('reviews', function ($join) {
                $join->on('tours.id', '=', 'reviews.reviewable_id')
                    ->where('reviews.reviewable_type', Tour::class);
            })
            ->select('tours.*', DB::raw('COALESCE(AVG(reviews.rating), 0) as avg_rating'))
            ->groupBy('tours.id')
            ->havingRaw('COALESCE(AVG(reviews.rating), 0) >= 0')
            ->orderByDesc('avg_rating')
            ->get();

    }
     

    $tours = $query->with('reviews')->get();

    return response()->json([
     
        'tours' => $tours
    ]);









  } 

   public function reservation(Request $request)
  {
    $data = $request->validate([
            'tour_email' => 'required|email',
            'name'        => 'required|string|max:255',
            'tour_name'        => 'required|string|max:255',
            'email'       => 'required|email',
            'phone'       => 'nullable|string',
            'date'    => 'required|date|after:today',
            'guests'      => 'required|integer|min:1',
            'message'     => 'nullable|string',
        ]);


      
        // Send email directly to hotel
          Mail::send([], [], function ($message) use ($data) {
            $message->to($data['tour_email'])
                ->subject('New Reservation Request')
                ->from(config('mail.from.address'), config('mail.from.name'))
                ->html("
            <h2>New Reservation Request for {$data['tour_name']} </h2>
            <p><strong>Name:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
             <p><strong>Phone:</strong> {$data['phone']}</p>
            <p><strong>Guests:</strong> {$data['guests']}</p>
            <p><strong>Date:</strong> {$data['date']}</p>
            <p><strong>Message:</strong> {$data['message']}</p>
        ");
        });

        return back()->with('success', 'Your reservation request has been sent!');
    }
}
