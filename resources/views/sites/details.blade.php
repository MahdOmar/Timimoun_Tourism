@extends('layouts.layout')

@section('content')

<div class="bg-gray-50 min-h-screen py-10 px-4">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- LEFT CONTENT -->
    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow">
      <!-- Hero Image -->
      <div class="w-full h-[420px] rounded-2xl overflow-hidden shadow-lg mb-6">
        <img src="{{ asset('storage/'.$site->main_image) }}" 
             alt="{{ $site->getTranslation('name', app()->getLocale()) }}" 
             class="w-full h-full object-cover" id="mainImage">
      </div>

      <!-- Title, Location & Wishlist -->
      <div class=" flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
        <div>
          <h1 class="text-3xl font-bold text-gray-800">
            {{ $site->getTranslation('name', app()->getLocale()) }}
          </h1>
          <div class="flex items-center text-sm text-gray-500 mt-2">
            <i class="fas fa-map-marker-alt mr-2 text-red-500"></i>
            {{ $site->getTranslation('address', app()->getLocale()) }}
          </div>
        </div>
       
      </div>

      <!-- Rating -->
        <div class="flex items-center">
                <i class="fas fa-star text-yellow-400 mr-1"></i>
                   <span class="font-medium">{{ round($site->averageRating()) }}</span>
                      <span class="text-gray-500 ml-1">({{ count($site->reviews) }} reviews)</span>
          </div>

      <!-- Description -->
      <div class="prose max-w-none text-gray-700 leading-relaxed">
        {{ $site->getTranslation('description', app()->getLocale()) }}
      </div>

      <!-- Gallery -->
      @if($site->gallery && $site->gallery->count() > 0)
        <h2 class="text-2xl font-semibold text-gray-800 mt-10 mb-6">Gallery</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <img src="{{ asset('storage/'.$site->main_image) }}" 
                 class="w-full h-40 object-cover rounded-lg shadow cursor-pointer hover:scale-105 transition"  onclick="changeImage(this.src)">
          @foreach ($site->gallery as $item)
            <img src="{{ asset('storage/'.$item->path) }}" 
                 class="w-full h-40 object-cover rounded-lg shadow cursor-pointer hover:scale-105 transition"  onclick="changeImage(this.src)">
          @endforeach
        </div>
      @endif
       <!-- Related Sites -->
      @if(isset($relatedSites) && $relatedSites->count() > 0)
        <h2 class="text-2xl font-semibold text-gray-800 mt-12 mb-6">Related Sites</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
          @foreach($relatedSites as $related)
            <a href="{{ route('site.show', $related->id) }}" class="group block bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
              <div class="h-40">
                <img src="{{ asset('storage/'.$related->main_image) }}" 
                     alt="{{ $related->getTranslation('name', app()->getLocale()) }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition">
              </div>
              <div class="p-4">
                <h3 class="font-semibold text-gray-800 group-hover:text-indigo-600 truncate">
                  {{ $related->getTranslation('name', app()->getLocale()) }}
                </h3>
                <p class="text-sm text-gray-500 mt-1 truncate">
                  {{ $related->getTranslation('address', app()->getLocale()) }}
                </p>
              </div>
            </a>
          @endforeach
        </div>
      @endif

    </div>

    <!-- RIGHT SIDEBAR -->
    <div class="space-y-6">
      
      <!-- Map -->
      <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="h-56">
          @if($site->latitude && $site->longitude)
            <iframe 
              src="https://www.google.com/maps?q={{ $site->latitude }},{{ $site->longitude }}&hl=es;z=14&output=embed"
              class="w-full h-full border-0">
            </iframe>
          @else
            <div class="flex items-center justify-center h-full text-gray-500">
              No map available
            </div>
          @endif
        </div>
      </div>

      <!-- Info Card -->
      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Site Information</h3>
        <ul class="space-y-3 text-gray-700 text-sm">
          <li><strong>Category:</strong> {{ $site->type }}</li>
          <li><strong>Best time to visit:</strong> Morning & Sunset</li>
          <li><strong>Entry:</strong> Free</li>
          <li><strong>Amenities:</strong>
            @foreach ($site->amenities as $item)
              <span class="inline-block bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">
                {{ $item }}
              </span>
                
            @endforeach
          </li>
        </ul>
      </div>

      <!-- Contact (Optional) -->
      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Need Help?</h3>
        <p class="text-sm text-gray-600 mb-2">For assistance, you can contact:</p>
        <p class="text-sm font-medium text-gray-800">Tourism Office</p>
        <p class="text-sm text-gray-600">+213 123 456 789</p>
      </div>
    </div>
  </div>
</div>

  <!-- Reviews -->
<section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">Customer Reviews</h2>
            @foreach ($site->reviews as $item)
                 
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

  
    

<section class="py-16 bg-gray-50">
  <div class="max-w-3xl mx-auto px-6">
    <h2 class="text-3xl font-extrabold text-center text-orange-500 mb-10">Leave a Review</h2>

    <form action="{{ route('review.store') }}" method="POST" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
      @csrf

       <input type="hidden" name="reviewable_type" value="{{ get_class($site) }}">
      <input type="hidden" name="reviewable_id" value="{{ $site->id }}">
      
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



@endsection('content')  

 <script>
    function changeImage(src) {
     
            document.getElementById('mainImage').src = src;
        }
  </script>