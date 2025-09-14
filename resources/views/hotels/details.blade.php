@extends('layouts.layout')

@section('content')


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
                                <span>{{ round($accommodation->averageRating()) }} ({{ count($accommodation->reviews) }} reviews)</span>
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
                  
              @if ($item == 'pool')
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
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Free Wifi</h3>
                    <p class="text-gray-600">High speed Wifi Available 24/7</p>
                </div>

                 @elseif ($item == 'restaurant')

                <div class="bg-white p-6 rounded-xl shadow-md text-center">
                    <div class="amenity-icon mx-auto mb-4">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Fine Dining</h3>
                    <p class="text-gray-600"> restaurant offering international and local cuisine</p>
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
                        <i class="fas fa-square-parking"></i>
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
                <div class="gallery-item rounded-xl overflow-hidden">
                    <img src="{{ asset('storage/'.$item->path) }}" 
                         alt="Hotel Lobby" class="w-full h-full object-cover">
                </div>
                  
              @endforeach
              
               
            </div>
        </section>


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
                     <!-- Modal -->
<div x-data="{ open: false }">
    <!-- Reservation Button -->
    <button class="w-full bg-primary hover:bg-blue-800 text-white font-bold py-3 rounded-lg transition duration-300 mt-4" @click="open = true" class="px-4 py-2 bg-blue-600 text-white rounded-lg"">
                            <i class="fas fa-calendar-check mr-2"></i>Book Now
                        </button>

    <!-- Reservation Modal -->
    <div x-show="open"
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
         x-cloak>
        <div @click.away="open = false"
             class="bg-white rounded-lg shadow-lg w-full max-w-5xl p-6">

            <div class="bg-gradient-to-r from-primary to-secondary p-6 text-white relative">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold flex items-center">
                        <i class="fas fa-hotel mr-3"></i>
                        Hotel Reservation Request
                    </h2>
                    <button class="text-white hover:text-gray-200 transition-colors "@click="open = false">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <p class="text-sm text-blue-100 mt-2">Book your stay at {{  $accommodation->getTranslation('name', app()->getLocale()) }}</p>
                
              
            </div>
            
            <!-- Modal Body -->
            <form action="{{ route('accommodations.reservation')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="p-6">
              
              <input type="text" name="hotel_email" value="{{ $accommodation->email }}" hidden>

              <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-primary"></i>
                            Name
                        </label>
                        <div class="relative">
                            <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your name" required>
                        </div>
                    </div>
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fa-solid fa-envelope mr-2 text-primary"></i>
                            Email
                        </label>
                        <div class="relative">
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your email" required>
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-phone mr-2 text-primary"></i>
                            Phone
                        </label>
                        <div class="relative">
                            <input type="text" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your phone" required>
                        </div>
                    </div>
                     <div class="mb-6">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-users mr-2 text-primary"></i>
                        Guests
                    </label>
                  
                    <input type="number" name="guests" min="1" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 2" required>

                    
                </div>
                </div>



                <!-- Dates Selection -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-primary"></i>
                            Check-in
                        </label>
                        <div class="relative">
                            <input type="date" name="checkin" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" id="checkin" required>
                        </div>
                    </div>
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-calendar-check mr-2 text-primary"></i>
                            Check-out
                        </label>
                        <div class="relative">
                            <input type="date" name="checkout" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition"  id="checkout" required>
                        </div>
                    </div>
                </div>
                
                <!-- Guests Selection -->
               
                
                <!-- Room Type -->
                <div class="mb-6">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-bed mr-2 text-primary"></i>
                        Room Type
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition appearance-none" name="room_type">
                            <option selected value="Standard Room">Standard Room</option>
                            <option value="Deluxe Room">Deluxe Room</option>
                            <option value="Suite">Suite</option>
                           
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Special Requests -->
                <div class="mb-4">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-concierge-bell mr-2 text-primary"></i>
                        Special Requests
                    </label>
                    <textarea class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" name="message" rows="2" placeholder="Any special requests?"></textarea>
                </div>
              
            </div>
            
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between">
                 <button type="button" @click="open = false"
                            class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                        Cancel
                    </button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-primary text-white hover:bg-blue-700 transition-colors flex items-center">
                    <i class="fas fa-check mr-2"></i>
                    Confirm Booking
                </button>
            </div>
            </form>
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
 
@if ($accommodation->reviews->count() > 0)
    

<section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">Customer Reviews</h2>
            @foreach ($accommodation->reviews as $item)
                 
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-neutral">By {{ $item->name }}</h3>

                        <div class="flex text-yellow-400 mt-1">
                          @for( $i=0; $i < $item->rating; $i++ )
                            <i class="fas fa-star"></i>
                           
                            @endfor
                        </div>
                    </div>
                    <span class="text-gray-500 text-sm mt-2 md:mt-0">On {{ $item->created_at->format('d-M-Y') }}</span>
                </div>
                <p class="text-gray-700">
                    {{ $item->comment }}
                </p>
            </div>
            @endforeach
           
            
           
            <div class="text-center mt-8">
                <button class="px-6 py-3 border-2 border-primary text-primary rounded-full font-medium hover:bg-primary hover:text-white transition">
                    Load More Reviews
                </button>
            </div>
        </div>
    </section>

    @endif

  
    

<section class="py-16 bg-gray-50">
  <div class="max-w-3xl mx-auto px-6">
    <h2 class="text-3xl font-extrabold text-center text-orange-500 mb-10">Leave a Review</h2>

    <form action="{{ route('review.store') }}" method="POST" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
      @csrf

       <input type="hidden" name="reviewable_type" value="{{ get_class($accommodation) }}">
      <input type="hidden" name="reviewable_id" value="{{ $accommodation->id }}">
      
      <!-- Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
        <input type="text" id="name" name="name" required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" 
          placeholder="John Doe">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
        <input type="email" id="email" name="email" required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" 
          placeholder="johndoe@email.com">
      </div>

      <!-- Star Rating -->
      <div>
        <label class="block text-sm font-medium text-gray-700">Your Rating</label>
        <div class="flex items-center mt-2 space-x-2" id="starRating">
          <!-- Stars will be interactive -->
          <button type="button" class="star text-gray-300 hover:text-orange-500 transition">
            ★
          </button>
          <button type="button" class="star text-gray-300 hover:text-orange-500 transition">
            ★
          </button>
          <button type="button" class="star text-gray-300 hover:text-orange-500 transition">
            ★
          </button>
          <button type="button" class="star text-gray-300 hover:text-orange-500 transition">
            ★
          </button>
          <button type="button" class="star text-gray-300 hover:text-orange-500 transition">
            ★
          </button>
        </div>
        <!-- Hidden field to store rating -->
        <input type="hidden" id="rating" name="rating" value="0">
      </div>

      <!-- Review -->
      <div>
        <label for="review" class="block text-sm font-medium text-gray-700">Your Review</label>
        <textarea id="review" name="comment" rows="4" required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" 
          placeholder="Share your experience..."></textarea>
      </div>

      <!-- Submit -->
      <div class="text-center">
        <button type="submit"
          class="w-full bg-orange-500 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-orange-600 transition">
          Submit Review
        </button>
      </div>
    </form>
  </div>
</section>





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>
  // ⭐ Star Rating Script
  const stars = document.querySelectorAll('#starRating .star');
  const ratingInput = document.getElementById('rating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      ratingInput.value = index + 1;
      stars.forEach((s, i) => {
        s.classList.toggle('text-orange-500', i <= index);
        s.classList.toggle('text-gray-300', i > index);
      });
    });
  });



  function openLinkModal(dishId) {

  
    const modal = document.getElementById('linkModal');
    document.getElementById('dish_id').value = dishId;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeLinkModal() {
    const modal = document.getElementById('linkModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

$( document ).ready(function() {
    const checkin = document.getElementById('checkin');
  const checkout = document.getElementById('checkout');

  // Set today's date as minimum for check-in
  const today = new Date().toISOString().split('T')[0];
  checkin.setAttribute('min', today);

  // When check-in changes, update check-out's min
  checkin.addEventListener('change', function () {
    checkout.value = ""; // reset checkout if before checkin
    checkout.setAttribute('min', this.value);
  });

  
});






</script>
@endsection