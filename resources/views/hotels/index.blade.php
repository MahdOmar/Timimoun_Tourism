@extends('layouts.layout')

@section('content')



  <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl relative">
            <div class="relative h-96">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8aG90ZWwlMjBsb2JieXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=1200&q=80" 
                     alt="Luxury Hotels" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent opacity-80"></div>
                <div class="absolute bottom-8 left-8 text-white max-w-2xl">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('messages.accommodation_index_title') }}</h1>
                    <p class="text-xl mb-6">{{ __('messages.accommodation_index_subtitle') }}</p>
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
        <h2 class="text-xl font-bold mb-6 text-dark">{{ __('messages.accommodation_index_filter') }}</h2>

        <!-- Price Range -->
        <div class="mb-8">
            <h3 class="font-semibold mb-4">{{ __('messages.accommodation_index_price_range') }}</h3>
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
            <h3 class="font-semibold mb-4">{{ __('messages.accommodation_index_star') }}</h3>
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
            <h3 class="font-semibold mb-4">{{ __('messages.accommodation_index_type') }}</h3>
            @foreach (['hotel', 'campiste', 'villa', 'guest_house'] as $type)
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
            <h3 class="font-semibold mb-4">{{ __('messages.accommodation_index_amenities') }}</h3>
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
           {{ __('messages.accommodation_index_apply_filter') }}
        </button>
        <a href="{{ route('accommodations.all') }}" 
           class="block w-full mt-3 border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold text-center hover:bg-gray-100">
           {{ __('messages.accommodation_index_reset_filter') }}
        </a> 
   
</div>


            <!-- Hotel Listings -->
            <div class="w-full lg:w-3/4" id="app" data-locale="{{ app()->getLocale() }}">
                <div class="flex justify-between items-center mb-6">
                    <h2 id="total" class="text-2xl font-bold text-dark">{{ count($accommodations) }}  {{ __('messages.accommodation_index_found') }}</h2>
                    <div class="flex items-center">
                        <span class="text-gray-600 mr-3">  {{ __('messages.accommodation_index_sort') }}</span>
                        <select class="border border-gray-300 rounded-lg px-4 py-2" id="sort-select" >
                            <option value="default" selected>  {{ __('messages.accommodation_index_default') }}</option>
                            <option value="lowtohigh">  {{ __('messages.accommodation_index_low') }}</option>
                            <option value="hightolow"> {{ __('messages.accommodation_index_high') }}</option>
                            <option value="rating">  {{ __('messages.accommodation_index_rating') }}</option>
                           
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
            <a href="/accommodation/${accommodation.id}">
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
