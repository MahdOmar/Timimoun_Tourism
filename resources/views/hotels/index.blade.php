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
    {{-- <form action="{{ route('accommodations.filter') }}" method="GET" class="bg-white p-6 rounded-xl shadow-lg sticky top-4"> --}}
        <h2 class="text-xl font-bold mb-6 text-dark">Filters</h2>

        <!-- Price Range -->
        <div class="mb-8">
            <h3 class="font-semibold mb-4">Price Range</h3>
            <input type="range" 
                   name="price" 
                   id="price-range"
                   min="{{ round($accommodations->isNotEmpty() ? $accommodations->min('min_price') : 3000 ) }}"
                   max="{{ round($accommodations->isNotEmpty() ? $accommodations->max('max_price') : 15000) }}"
                   value="{{ request('price', $accommodations->isNotEmpty() ? $accommodations->max('max_price') : 1000) }}"
                   class="price-range w-full mb-4"
                   onchange="document.getElementById('price-value').textContent = 'Up to ' + this.value + ' DA'">
            <div class="flex justify-between text-gray-600">
                <span>{{ round($accommodations->isNotEmpty() ? $accommodations->min('min_price') : 3000 ) }}</span>
                <span>{{ round($accommodations->isNotEmpty() ? $accommodations->max('max_price') : 15000) }}</span>
            </div>
            <div class="mt-2 text-center font-medium text-primary" id="price-value">
                Up to {{ request('price', round($accommodations->max('max_price'))) }} DA
            </div>
        </div>

        <!-- Star Rating -->
        <div class="mb-8">
            <h3 class="font-semibold mb-4">Star Rating</h3>
            <div class="space-y-2 star-rating">
                @for ($i = 5; $i >= 3; $i--)
                    <div class="flex items-center">
                        <input type="checkbox" 
                               name="stars[]" 
                               value="{{ $i }}" 
                               id="rating{{ $i }}" 
                               class="checkbox h-5 w-5 text-primary rounded"
                               {{ in_array($i, request()->get('stars', [])) ? 'checked' : '' }}>
                        <label for="rating{{ $i }}" class="ml-2 flex text-yellow-400">
                            @for ($j = 1; $j <= 5; $j++)
                                <i class="{{ $j <= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                            @endfor
                        </label>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Property Type -->
        <div class="mb-8">
            <h3 class="font-semibold mb-4">Property Type</h3>
            @foreach (['hotel', 'resort', 'villa', 'apartment'] as $type)
                <div class="flex items-center">
                    <input type="checkbox" 
                           name="type[]" 
                           value="{{ $type }}" 
                           id="{{ $type }}" 
                           class="checkbox h-5 w-5 text-primary rounded"
                           {{ in_array($type, request()->get('type', [])) ? 'checked' : '' }}>
                    <label for="{{ $type }}" class="ml-2 text-gray-700 capitalize">{{ $type }}</label>
                </div>
            @endforeach
        </div>

        <!-- Amenities -->
        <div class="mb-8">
            <h3 class="font-semibold mb-4">Amenities</h3>
            @foreach (['wifi' => 'Free WiFi', 'pool' => 'Swimming Pool', 'spa' => 'Spa', 'breakfast' => 'Breakfast Included', 'gym' => 'Fitness Center'] as $key => $label)
                <div class="flex items-center">
                    <input type="checkbox" 
                           name="amenities[]" 
                           value="{{ $key }}" 
                           id="{{ $key }}" 
                           class="checkbox h-5 w-5 text-primary rounded"
                           {{ in_array($key, request()->get('amenities', [])) ? 'checked' : '' }}>
                    <label for="{{ $key }}" class="ml-2 text-gray-700">{{ $label }}</label>
                </div>
            @endforeach
        </div>

         <button type="button" class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-blue-700" onclick="sort()">
            Apply Filters
        </button>
        <a href="{{ route('accommodations.all') }}" 
           class="block w-full mt-3 border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold text-center hover:bg-gray-100">
            Reset Filters
        </a> 
   
</div>


            <!-- Hotel Listings -->
            <div class="w-full lg:w-3/4" id="app" data-locale="{{ app()->getLocale() }}">
                <div class="flex justify-between items-center mb-6">
                    <h2 id="total" class="text-2xl font-bold text-dark">{{ count($accommodations) }} Hotels Found</h2>
                    <div class="flex items-center">
                        <span class="text-gray-600 mr-3">Sort by:</span>
                        <select class="border border-gray-300 rounded-lg px-4 py-2" id="sort-select" >
                            <option value="default" selected>Default</option>
                            <option value="lowtohigh">Price: Low to High</option>
                            <option value="hightolow">Price: High to Low</option>
                            <option value="rating">Rating</option>
                           
                        </select>
                    </div>
                </div>
 </form>
                <!-- Hotel Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6" id="accommodations-list">
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
@verbatim
<script>
    async function sort(){

     const filters = document.querySelectorAll(".checkbox, #price-range, #sort-select");
    const container = document.getElementById("accommodations-list");

  
     
        let price = document.getElementById("price-range").value;
        let sort = document.getElementById("sort-select").value;

        // collect stars, type, amenities
        let stars = Array.from(document.querySelectorAll('input[name="stars[]"]:checked')).map(el => el.value);
        let types = Array.from(document.querySelectorAll('input[name="type[]"]:checked')).map(el => el.value);
        let amenities = Array.from(document.querySelectorAll('input[name="amenities[]"]:checked')).map(el => el.value);

        // build query
        let params = new URLSearchParams({
            price: price,
            sort: sort,
            stars: stars,
            type: types,
            amenities: amenities,
        });
stars.forEach(s => params.append('stars[]', s));
types.forEach(s => params.append('type[]', s));
amenities.forEach(s => params.append('amenities[]', s));

        console.log(params.toString());
        console.log(params.toString());



      
        
         const response = await fetch(`/accommodations/filter?${params.toString()}`, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
            const container = document.getElementById('accommodations-list');
            const total = document.getElementById('total');
            total.textContent = data.accommodations.length + ' Hotels Found';
            console.log(data);
           const locale = document.getElementById('app').dataset.locale;
            console.log(locale);
            container.innerHTML = '';
            

           data.accommodations.forEach(accommodation => {
             // Generate stars
        let stars = "";
        for (let i = 0; i < accommodation.stars; i++) {
            stars += `<i class="fas fa-star text-yellow-400"></i>`;
        }

        // Generate amenities
        let amenities = "";
        if (accommodation.amenities) {
            accommodation.amenities.forEach(item => {
                amenities += `<span class="tag tag-beach">${item}</span>`;
            });
        }

        container.innerHTML += `
            <a href="/dashboard/accommodation/${accommodation.id}">
                <div class="hotel-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="/storage/${accommodation.main_image}" 
                             alt="${accommodation.name}" class="w-full h-48 object-cover">
                        <div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold px-3 py-1 rounded-full">
                            ${Math.round(accommodation.reviews_avg_rating ?? 0)}
                        </div>
                        <div class="absolute top-4 left-4 bg-white text-primary text-sm font-semibold px-3 py-1 rounded-full">
                            <i class="fas fa-map-marker-alt mr-1"></i> Timimoun
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold">${accommodation.name[locale]}</h3>
                            <div class="flex">${stars}</div>
                        </div>
                        <p class="text-gray-600 mb-4">${accommodation.description[locale] ?? ""}</p>
                        <div class="flex flex-wrap items-center text-gray-500 mb-4">
                            ${amenities}
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-2xl font-bold text-primary">${accommodation.min_price}</span>
                                <span class="text-gray-600">/night</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        `;

                
           });
           
            
            // console.log(data);
            // Update the accommodations list in the DOM
            // You would typically re-render the accommodations here
           
            
        } else {
            alert('Failed ');
        }
         
  
    }

       
   

</script>
@endverbatim
