@extends('layouts.layout')

@section('content')

{{-- 

<div class="bg-gray-100">
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">
      <!-- Product Images -->
      <div class="w-full md:w-1/2 px-4 mb-8 ">
       
         <img src=" {{ asset('storage/'.$accommodation->main_image) }} " alt="Product"
                    class="w-full h-[500px] rounded-lg shadow-md mb-4 object-cover" id="mainImage"  >
            
       
       
        <div class="flex gap-4 py-4 justify-center overflow-x-auto">
          <img src=" {{ asset('storage/'.$accommodation->main_image) }} " alt="Thumbnail 1"
                    class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300 w-full h-auto" onclick="changeImage(this.src)">
           @foreach ($accommodation->gallery as $item)
          <img src="{{ asset('storage/'.$item->path) }}" alt="Thumbnail 1"
                        class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300 w-full h-auto"
                        onclick="changeImage(this.src)">

        @endforeach
        </div>
        
      </div>

      <!-- Hotel Details -->
      <div class="w-full md:w-1/2 px-4 bg-white rounded-lg shadow overflow-hidden py-4">
        <h2 class="text-3xl font-bold mb-2">{{ $accommodation->getTranslation('name', app()->getLocale()) }}</h2>
        <p class="text-gray-600 mb-4">{{ $accommodation->type }}</p>
        <div class="mb-4">
          <span class="text-2xl font-bold mr-2">{{ $accommodation->min_price }} - {{ $accommodation->max_price }} DA </span>
           <span class="text-gray-500 line-through">{{ $accommodation->max_price }}</span> --}}
      {{--  </div>
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <span class="ml-2 text-gray-600">4.5 (120 reviews)</span>
        </div>
        <p class="text-gray-700 mb-6">{{ $accommodation->getTranslation('description', app()->getLocale()) }}</p>

       

       

      
        <div>
          <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
          <ul class="list-disc list-inside text-gray-700">
            @foreach ($accommodation->amenities as $item)
            <li>{{ $item }}</li>
                
            @endforeach
            
            
          </ul>
        </div>
        <!-- Contact Info + Map Below -->
    <div class="grid md:grid-cols-2 gap-6 mt-10">
      
      <!-- Contact Info -->
      <div class="bg-white rounded-lg shadow-lg p-5">
        <h3 class="text-lg font-semibold mb-3 ">Contact Information</h3>
        <ul class="text-gray-700 text-sm space-y-2">
          @if($accommodation->phone)
            <li>📞 <a href="tel:{{ $accommodation->phone }}" class="hover:underline">{{ $accommodation->phone }}</a></li>
          @endif
          @if($accommodation->email)
            <li>📧 <a href="mailto:{{ $accommodation->email }}" class="hover:underline">{{ $accommodation->email }}</a></li>
          @endif
          @if($accommodation->website)
            <li>🌐 <a href="{{ $accommodation->website }}" target="_blank" class="text-indigo-600 hover:underline">Visit Website</a></li>
          @endif
        </ul>
      </div>

      <!-- Map -->
      @if($accommodation->latitude && $accommodation->longitude)
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <h3 class="text-lg font-semibold p-4">Location</h3>
        <iframe 
          width="100%" 
          height="250" 
          frameborder="0" 
          style="border:0"
          src="https://www.google.com/maps?q={{ $accommodation->latitude }},{{ $accommodation->longitude }}&hl=en&z=14&output=embed"
          allowfullscreen>
        </iframe>
      </div>
      @endif

    </div>
  </div>
      </div>
    </div>
  </div>

  <!-- Related Accommodations -->
    @if(isset($relatedAccommodations) && $relatedAccommodations->count() > 0)
    <div class="mt-12 px-6 py-6 bg-white rounded-xl shadow m-4">
      <h2 class="text-2xl font-bold mb-6">Related Accommodations</h2>
      <div class="grid md:grid-cols-3 gap-6">
        @foreach($relatedAccommodations as $related)
          <a href="{{ route('accommodations.show', $related->id) }}" 
             class="block bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
            <img src="{{ asset('storage/'.$related->main_image) }}" 
                 alt="{{ $related->getTranslation('name', app()->getLocale()) }}"
                 class="w-full h-40 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-gray-800">
                {{ $related->getTranslation('name', app()->getLocale()) }}
              </h3>
              <p class="text-sm text-gray-600 capitalize">{{ $related->type }}</p>
              <p class="text-indigo-600 font-bold mt-2">{{ $related->min_price }} - {{ $related->max_price }} DA</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    @endif
  

  <script>
    function changeImage(src) {
     
            document.getElementById('mainImage').src = src;
        }
  </script>
</div> --}}


  <main class="max-w-7xl mx-auto px-4 py-8">
        <!-- Hotel Header -->
        <div class="flex flex-col lg:flex-row gap-8 mb-12">
            <div class="lg:w-full">
                <div class="rounded-2xl overflow-hidden shadow-xl h-96 relative">
                    <img src="{{ asset('storage/'.$accommodation->main_image) }}" 
                         alt="Luxury Heights Hotel" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                    <div class="absolute bottom-8 left-8 text-white">
                        <h1 class="text-4xl md:text-5xl font-bold mb-2 heading-font ">{{ $accommodation->getTranslation('name', app()->getLocale()) }}</h1>
                        <div class="flex items-center space-x-4">
                            <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span>4.9 (1,428 reviews)</span>
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-300 mr-1"></i>
                                <span>Algeria, Timimoun</span>
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-award text-green-400 mr-1"></i>
                                <span>Luxury Collection</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- <div class="lg:w-1/3">
                <div class="bg-white p-8 rounded-2xl shadow-lg h-full">
                    <div class="text-center mb-6">
                        <span class="text-4xl font-bold text-primary">$299</span>
                        <span class="text-gray-600">/ night</span>
                    </div>
                    
                    <form class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Check-in</label>
                                <input type="date" class="w-full p-3 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Check-out</label>
                                <input type="date" class="w-full p-3 border border-gray-300 rounded-lg">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 mb-2">Guests</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg">
                                <option>1 Adult</option>
                                <option>2 Adults</option>
                                <option>2 Adults, 1 Child</option>
                                <option>2 Adults, 2 Children</option>
                                <option>3+ Adults</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 mb-2">Room Type</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg">
                                <option>Ocean View Room</option>
                                <option>Beachfront Villa</option>
                                <option>Presidential Suite</option>
                                <option>Family Suite</option>
                            </select>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">$299 x 5 nights</span>
                                <span class="font-semibold">$1,495</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Service fee</span>
                                <span class="font-semibold">$49</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Taxes</span>
                                <span class="font-semibold">$112</span>
                            </div>
                            <div class="flex justify-between font-bold text-lg pt-2 border-t border-gray-200">
                                <span>Total</span>
                                <span>$1,656</span>
                            </div>
                        </div>
                        
                        <button class="w-full bg-primary hover:bg-blue-800 text-white font-bold py-3 rounded-lg transition duration-300 mt-4">
                            <i class="fas fa-calendar-check mr-2"></i>Book Now
                        </button>
                    </form>
                </div>
            </div> --}}
        </div>

        <!-- Hotel Description -->
        <section class="mb-16">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-orange-500 mb-6 heading-font">About {{ $accommodation->getTranslation('name', app()->getLocale()) }}</h2>
                <p class="text-lg text-gray-700 mb-8">
                   {{ $accommodation->getTranslation('description', app()->getLocale()) }}
                </p>
            </div>
        </section>

        <!-- Key Features -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-orange-500 mb-2 text-center heading-font">Hotel Features</h2>
            <p class="text-gray-600 text-center mb-12">Experience unparalleled luxury and comfort</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              @foreach ($accommodation->amenities as $item)
                  
              @if ($item == 'Pool')
              <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Infinity Pools</h3>
                    <p class="text-gray-600">Three stunning infinity pools with panoramic ocean views</p>
                </div>
                @elseif ($item == 'wifi')
                  <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fine Dining</h3>
                    <p class="text-gray-600">5 restaurants offering international and local cuisine</p>
                </div>

                 @elseif ($item == 'restaurant')

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fine Dining</h3>
                    <p class="text-gray-600">5 restaurants offering international and local cuisine</p>
                </div>

                  @elseif ($item == 'spa')

   
                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-spa"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Luxury Spa</h3>
                    <p class="text-gray-600">Award-winning spa with traditional treatments</p>
                </div>
                

                   @elseif ($item == 'gym')

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fitness Center</h3>
                    <p class="text-gray-600">24/7 fitness center with professional trainers</p>
                </div>

                   @elseif ($item == 'parking')

                   <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Parking</h3>
                    <p class="text-gray-600">24/7 Parking with professional sécurity</p>
                </div>
                
              @endif
                
                
              
             
                
                 @endforeach
            </div>
        </section>

        {{-- <!-- Rooms & Suites -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-dark mb-2 text-center heading-font">Rooms & Suites</h2>
            <p class="text-gray-600 text-center mb-8">Luxurious accommodations for every need</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="room-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aG90ZWwlMjByb29tfGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" 
                             alt="Ocean View Room" class="w-full h-64 object-cover">
                        <div class="price-tag">
                            $299/night
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2">Ocean View Room</h3>
                        <p class="text-gray-600 mb-4">Spacious rooms with stunning views of the Indian Ocean</p>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i class="fas fa-user-friends mr-2"></i>
                            <span class="mr-4">2 Adults</span>
                            <i class="fas fa-bed mr-2"></i>
                            <span>1 King Bed</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <button class="text-primary font-semibold">View Details</button>
                            <button class="bg-primary text-white px-4 py-2 rounded-lg">Book Now</button>
                        </div>
                    </div>
                </div>
                
                <div class="room-card bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGhvdGVsJTIwcm9vbXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=800&q=60" 
                             alt="Beachfront Villa" class="w-full h-64 object-cover">
                        <div class="price-tag">
                            $499/night
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2">Beachfront Villa</h3>
                        <p class="text-gray-600 mb-4">Private villas with direct beach access and personal pools</p>
                        <div class="flex items-center text-gray-500 mb-4">
                            <i class="fas fa-user-friends mr-2"></i>
                            <span class="mr-4">4 Adults</span>
                            <i class="fas fa-bed mr-2"></i>
                            <span>2 King Beds</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <button class="text-primary font-semibold">View Details</button>
                            <button class="bg-primary text-white px-4 py-2 rounded-lg">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Gallery Section -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-orange-500 mb-2 text-center heading-font">Hotel Gallery</h2>
            <p class="text-gray-600 text-center mb-8">Take a visual tour of our luxury resort</p>
            
            <div class="gallery-grid">
              @foreach ($accommodation->gallery as $item)
                  
              @endforeach
                <div class="gallery-item rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/'.$item->path) }}" 
                         alt="Hotel Lobby" class="w-full h-full object-cover">
                </div>
               
            </div>
        </section>

        <!-- Testimonials -->
        {{-- <section class="mb-16">
            <h2 class="text-3xl font-bold text-dark mb-2 text-center heading-font">Guest Reviews</h2>
            <p class="text-gray-600 text-center mb-8">What our guests say about their stay</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card p-6 text-white">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBvcnRyYWl0fGVufDB8fDB8fHww&auto=format&fit=crop&w=200&q=60" 
                             alt="Guest" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Michael Johnson</h4>
                            <p class="text-blue-100">Stayed 5 nights</p>
                        </div>
                    </div>
                    <p class="italic">"The most breathtaking hotel I've ever stayed at. The service was impeccable and the views were absolutely stunning. We'll definitely be returning next year!"</p>
                    <div class="flex text-yellow-300 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHBvcnRyYWl0fGVufDB8fDB8fHww&auto=format&fit=crop&w=200&q=60" 
                             alt="Guest" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Sarah Williams</h4>
                            <p class="text-gray-600">Honeymoon Stay</p>
                        </div>
                    </div>
                    <p class="italic text-gray-700">"Our honeymoon was absolutely perfect thanks to Luxury Heights. The staff went above and beyond to make our stay special. The private dinner on the beach was magical!"</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29ufGVufDB8fDB8fHww&auto=format&fit=crop&w=200&q=60" 
                             alt="Guest" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold">Robert Chen</h4>
                            <p class="text-gray-600">Family Vacation</p>
                        </div>
                    </div>
                    <p class="italic text-gray-700">"We traveled with our two young children and the hotel was extremely accommodating. The family suite was spacious and the kids loved the children's pool and activities."</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Location & Contact -->
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-orange-500 mb-2 text-center heading-font">Location & Contact</h2>
            <p class="text-gray-600 text-center mb-8">Find us and get in touch</p>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <h3 class="text-2xl font-semibold mb-6">Contact Information</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Address</h4>
                                <p class="text-gray-600">{{ $accommodation->getTranslation('address', app()->getLocale()) }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-phone text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Phone</h4>
                                <p class="text-gray-600">{{ $accommodation->phone }}</p>
                               
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <p class="text-gray-600">{{ $accommodation->email }}</p>
                                
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Front Desk</h4>
                                <p class="text-gray-600">Open 24 hours</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-200 rounded-xl shadow-md overflow-hidden">
                    <iframe  src="https://maps.google.com/maps?q={{ $accommodation->latitude }},{{ $accommodation->longitude }}&z=15&output=embed" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>




@endsection