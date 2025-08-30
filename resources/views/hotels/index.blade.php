@extends('layouts.layout')

@section('content')

{{-- <div>
<!-- Hotel Listings Page -->
<div class="max-w-9xl mx-auto px-4 py-10">
    <form method="GET" action="" class="flex flex-col lg:flex-row gap-8">
      @csrf

        <!-- Sidebar Filters -->
        <aside class="w-full lg:w-1/4 bg-white border rounded-lg p-5 shadow">
            <h2 class="text-xl font-semibold mb-4 text-indigo-700">Filter Your Stay</h2>

           <!-- Category Filter -->
    <div class="mb-6">
        <h3 class="font-medium text-gray-800 mb-3">Category</h3>
        <div class="space-y-2 text-sm text-gray-600">
            @foreach(['hotel', 'guest-house', 'mini-villa', 'campsite'] as $category)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" 
                           name="categories[]" 
                           value="{{ $category }}" 
                           {{ in_array($category, request()->categories ?? []) ? 'checked' : '' }}
                           class="accent-indigo-600 rounded">
                    <span class="capitalize">{{ str_replace('-', ' ', $category) }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <!-- Price Filter -->
    <div>
        <h3 class="font-medium text-gray-800 mb-3">Price Range</h3>
        <div class="space-y-2 text-sm text-gray-600">
            @foreach([
                'under_5000' => 'Under 5000 DA',
                '5000_10000' => '5000 - 10000 DA',
                '10000_20000' => '10000 - 20000 DA',
            ] as $value => $label)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" 
                           name="prices[]" 
                           value="{{ $value }}" 
                           {{ in_array($value, request()->prices ?? []) ? 'checked' : '' }}
                           class="accent-indigo-600 rounded">
                    <span>{{ $label }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <button type="submit" class="mt-6 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
        Apply Filters
    </button>
        </aside>

        <!-- Main Content -->
        <main class="w-full lg:w-3/4">
            <!-- Sort Bar -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Where to Stay</h2>
                <div class="flex items-center space-x-2">
                    <label for="sort" class="text-sm text-gray-600">Sort by:</label>
                    <select id="sort" name="sort" class="border-gray-300 rounded-md text-sm">
                        <option value="">Default</option>
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="rating">Top Rated</option>
                    </select>
                    <button type="submit" class="text-sm text-indigo-600 hover:underline">Apply</button>
                </div>
            </div>

            <!-- Hotel Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
             
                
                @foreach ($accommodations as $item)
                <div class="bg-white border rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                        <img src="{{ asset('storage/'.$item->main_image) }}" alt="" class="w-full h-96 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
                            <p class="text-sm text-gray-500 mt-1"><span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-medium px-3 py-1 rounded-full">
          <i class="fas fa-map-marker-alt mr-1"></i> {{ $item->type }}
        </span>  • ${{  $item->price_range}}/night</p>
                            <a href="{{ route("accommodation.show",$item->id) }}" class="mt-3 inline-block text-sm text-indigo-600 hover:underline">View Details</a>
                        </div>
                    </div>
                    
                @endforeach



            </div>
        </main>
    </form>
</div> --}}

  <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl relative">
            <div class="relative h-96">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjBsb2JieXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=1200&q=80" 
                     alt="Luxury Hotels" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-80"></div>
                <div class="absolute bottom-8 left-8 text-white max-w-2xl">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Find Your Perfect Stay</h1>
                    <p class="text-xl mb-6">Discover the best hotels around the world with our curated selection</p>
                    <div class="flex">
                        <input type="text" placeholder="Search by city, hotel, or destination" class="px-6 py-3 rounded-l-lg w-full text-gray-800">
                        <button class="bg-primary hover:bg-blue-700 px-6 py-3 rounded-r-lg text-white font-semibold">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white p-6 rounded-xl shadow-lg sticky top-4">
                    <h2 class="text-xl font-bold mb-6 text-dark">Filters</h2>
                    
                    <!-- Price Range -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Price Range</h3>
                        <input type="range" min="50" max="1000" value="500" class="price-range w-full mb-4">
                        <div class="flex justify-between text-gray-600">
                            <span>$50</span>
                            <span>$1000</span>
                        </div>
                        <div class="mt-2 text-center font-medium text-primary">Up to $500</div>
                    </div>
                    
                    <!-- Star Rating -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Star Rating</h3>
                        <div class="space-y-2 star-rating">
                            <div class="flex items-center">
                                <input type="checkbox" id="rating5" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="rating5" class="ml-2">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="rating4" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="rating4" class="ml-2">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="rating3" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="rating3" class="ml-2">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Property Type -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Property Type</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="hotel" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="hotel" class="ml-2 text-gray-700">Hotel</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="resort" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="resort" class="ml-2 text-gray-700">Resort</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="villa" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="villa" class="ml-2 text-gray-700">Villa</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="apartment" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="apartment" class="ml-2 text-gray-700">Apartment</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Amenities -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Amenities</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="wifi" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="wifi" class="ml-2 text-gray-700">Free WiFi</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="pool" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="pool" class="ml-2 text-gray-700">Swimming Pool</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="spa" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="spa" class="ml-2 text-gray-700">Spa</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="breakfast" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="breakfast" class="ml-2 text-gray-700">Breakfast Included</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="gym" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="gym" class="ml-2 text-gray-700">Fitness Center</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                        Apply Filters
                    </button>
                    <button class="w-full mt-3 border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-100">
                        Reset Filters
                    </button>
                </div>
            </div>

            <!-- Hotel Listings -->
            <div class="w-full lg:w-3/4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-dark">{{ count($accommodations) }} Hotels Found</h2>
                    <div class="flex items-center">
                        <span class="text-gray-600 mr-3">Sort by:</span>
                        <select class="border border-gray-300 rounded-lg px-4 py-2">
                            <option>Recommended</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Rating</option>
                            <option>Distance</option>
                        </select>
                    </div>
                </div>

                <!-- Hotel Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                   @foreach ($accommodations as $accommodation)
                       
                   
                    <a href="{{ route('accommodation.show',$accommodation->id) }}"><div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('storage/'.$accommodation->main_image) }}" 
                                 alt="Grand Plaza Hotel" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold px-3 py-1 rounded-full">
                                {{ round($accommodation->averageRating()) }}
                            </div>
                            <div class="absolute top-4 left-4 bg-white text-primary text-sm font-semibold px-3 py-1 rounded-full">
                                <i class="fas fa-map-marker-alt mr-1"></i> Timimoun
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold"> {{ $accommodation->getTranslation('name', app()->getLocale()) }}</h3>
                                <div class="flex text-yellow-400">
                                   @for ($i = 0; $i < $accommodation->stars; $i++)
                                    <i class="fas fa-star"></i>
                                   
                                    @endfor
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4">{{ $accommodation->getTranslation('description', app()->getLocale()) }}</p>
                            <div class="flex flex-wrap items-center text-gray-500 mb-4">
                              @foreach ($accommodation->amenities as $item)
                                   <span class="tag tag-beach ">{{ $item }}</span>
                              @endforeach
                                
                               
                               
                                
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-2xl font-bold text-primary">{{ $accommodation->min_price }}</span>
                                    <span class="text-gray-600">/night</span>
                                </div>
                               
                            </div>
                        </div>
                    </div></a>
                @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav class="flex items-center space-x-2">
                        <a href="#" class="px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-4 py-2 text-white bg-primary rounded-lg font-semibold">1</a>
                        <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">2</a>
                        <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">3</a>
                        <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">4</a>
                        <span class="px-2 py-2 text-gray-500">...</span>
                        <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">10</a>
                        <a href="#" class="px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    <!-- Newsletter Section -->
    <section class="bg-primary text-white py-12 mt-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Get Exclusive Hotel Deals</h2>
            <p class="text-blue-100 mb-8 max-w-2xl mx-auto">Subscribe to our newsletter and receive special offers, discounts, and updates on the best hotels around the world.</p>
            <div class="flex flex-col sm:flex-row justify-center max-w-2xl mx-auto">
                <input type="email" placeholder="Your email address" class="px-6 py-3 rounded-l-lg sm:rounded-r-none rounded-r-lg sm:w-2/3 text-gray-800">
                <button class="bg-secondary hover:bg-green-600 px-6 py-3 rounded-r-lg sm:rounded-l-none rounded-l-lg mt-2 sm:mt-0 sm:w-1/3 font-semibold">
                    Subscribe
                </button>
            </div>
        </div>
    </section>
 


</div>

@endsection