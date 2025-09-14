@extends('layouts.layout')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-12">
  <!-- Tour Main Info -->
  <div class="grid md:grid-cols-2 gap-8">
    
    <!-- Left: Tour Image -->
    <div class="relative">
      <img src="{{ asset('storage/' . $tour->main_image) }}" 
           alt="{{ $tour->getTranslation('name', app()->getLocale()) }}"
           class="w-full h-[400px] object-cover rounded-lg shadow-md">
      <div class="absolute top-4 left-4 bg-yellow-500 text-black px-3 py-1 font-semibold rounded-md">
        {{ $tour->price }} DA
      </div>
    </div>

    <!-- Right: Tour Details -->
    <div class="flex flex-col justify-between">
      <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
          {{ $tour->getTranslation('name', app()->getLocale()) }}
         
        </h1>
         <span class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span>{{round($tour->averageRating())  }} ({{ count($tour->reviews) }} reviews)</span>
          </span>
        <p class="text-gray-600 text-lg leading-relaxed mb-6">
          {{ $tour->getTranslation('description', app()->getLocale()) }}
        </p>

        <!-- Duration + Type -->
        <div class="flex items-center gap-6 mb-6">
          <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
            Duration: {{ $tour->duration_days }} days / {{ $tour->duration_nights }} nights
          </span>
         
           <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium capitalize">
            @if ($tour->category == "cars") 4x4 @endif {{ $tour->category }}
          </span>
            
          
         
        </div>

        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-3 ">Stops: {{ $tour->stops}} Destinations</h3>
           
        <h3 class="text-lg font-semibold mb-3 ">What includes ?</h3>

       
        
        <p> {{ $tour->getTranslation('includes', app()->getLocale()) }}</p>
        
      </div>

        <!-- Reviews -->
        {{-- <div class="flex items-center mb-6">
          <div class="flex text-yellow-400">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
          </div>
          <span class="ml-2 text-sm text-gray-500">(24 reviews)</span>
        </div> --}}
       <div class="mb-6">
        <h3 class="text-lg font-semibold mb-3 ">Contact Information</h3>

        <p class="text-sm text-gray-600 mb-2">For assistance booking and info, you can contact:</p>
        <ul class="text-gray-700 text-sm space-y-2">
          @if($tour->phone)
            <li>📞 <a href="tel:{{ $tour->phone }}" class="hover:underline">{{ $tour->phone }}</a></li>
          @endif
          @if($tour->email)
            <li>📧 <a href="mailto:{{ $tour->email }}" class="hover:underline">{{ $tour->email }}</a></li>
          @endif
          @if($tour->website)
            <li>🌐 <a href="{{ $tour->website }}" target="_blank" class="text-indigo-600 hover:underline">Visit Website</a></li>
          @endif
        </ul>
      </div>
      </div>

      <!-- CTA -->
      <div class="">
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
                        Tour Reservation Request
                    </h2>
                    <button class="text-white hover:text-gray-200 transition-colors "@click="open = false">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <p class="text-sm text-blue-100 mt-2">Book your Tour with {{  $tour->getTranslation('name', app()->getLocale()) }}</p>
                
              
            </div>
            
            <!-- Modal Body -->
            <form action="{{ route('tour.reservation') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="p-6">
              
              <input type="text" name="tour_email" value="{{ $tour->email }}" hidden>
              <input type="text" name="tour_name" value="{{  $tour->getTranslation('name', app()->getLocale()) }}" hidden>

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
                <div class=" mb-4">
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-primary"></i>
                           Date
                        </label>
                        <div class="relative">
                            <input type="date" name="date" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" id="checkin" required>
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
    </div>
  </div>

  <!-- Gallery -->
  @if($tour->gallery && count($tour->gallery) > 0)
  <div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Gallery</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      @foreach($tour->gallery as $image)
        <img src="{{ asset('storage/' . $image->path) }}" 
             alt="Gallery Image" 
             class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition">
      @endforeach
    </div>
  </div>
  @endif

  <!-- Itinerary -->
  {{-- <div class="mt-12 bg-gray-50 rounded-lg p-6 shadow">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Itinerary</h2>
    <ul class="list-disc pl-5 space-y-2 text-gray-700">
      @foreach($tour->itinerary as $day)
        <li><span class="font-semibold">{{ $day['day'] }}:</span> {{ $day['description'] }}</li>
      @endforeach
    </ul>
  </div> --}}

  <!-- Map -->
  {{-- @if($tour->latitude && $tour->longitude)
  <div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Location</h2>
    <iframe 
      src="https://maps.google.com/maps?q={{ $tour->latitude }},{{ $tour->longitude }}&z=15&output=embed" 
      width="100%" height="400" 
      class="rounded-lg shadow">
    </iframe>
  </div>
  @endif --}}

  {{-- <div id="map" class="w-full h-96 rounded-lg shadow-md mt-6"></div> --}}




</section>

@if ($tour->reviews && count($tour->reviews) > 0)
     <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">Customer Reviews</h2>
            @foreach ($tour->reviews as $item)
                 
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

       <input type="hidden" name="reviewable_type" value="{{ get_class($tour) }}">
      <input type="hidden" name="reviewable_id" value="{{ $tour->id }}">
      
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
</script>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {

       var s_lat = {{ $tour->start_latitude ?? 0 }};
        var s_lng = {{ $tour->start_longitude ?? 0 }};
        var e_lat = {{ $tour->end_latitude ?? 0 }};
        var e_lng = {{ $tour->end_longitude ?? 0 }};

              var map = L.map('map').setView([s_lat, s_lng], 13);

        // Add tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Add routing control
        L.Routing.control({
            waypoints: [
                L.latLng(s_lat, s_lng),       // tour
                L.latLng(e_lat, e_lng) // related site
            ],
            routeWhileDragging: true,
            lineOptions: {
                styles: [{color: 'blue', opacity: 0.7, weight: 5}]
            }
        }).addTo(map);

    });

    $( document ).ready(function() {
    const checkin = document.getElementById('checkin');

  // Set today's date as minimum for check-in
  const today = new Date().toISOString().split('T')[0];
  checkin.setAttribute('min', today);

  
  
});
</script>