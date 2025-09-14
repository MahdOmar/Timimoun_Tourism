@extends('layouts.layout')

@section('content')

 <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8 relative">
            <!-- Left Column - Images & Details -->
            <div class="lg:w-2/3">
                <!-- Main Image -->
                <div class="rounded-xl overflow-hidden shadow-md mb-6">
                    <img src="{{ asset('storage/' . $rental->main_image) }}" 
                         alt="Luxury Beachfront Villa" class="w-full h-96 object-cover">
                </div>

                <!-- Thumbnails -->
                <div class="grid grid-cols-4 gap-4 mb-8">
                  <div class="rounded-lg overflow-hidden shadow-sm cursor-pointer border-2 border-blue-500">
                    <img src="{{ asset('storage/' . $rental->main_image) }}" 
                         alt="Luxury Beachfront Villa" class="w-full h-64 object-cover">
                </div>
                @foreach ($rental->gallery as $item)
                     <div class="rounded-lg overflow-hidden shadow-sm cursor-pointer border-2 border-blue-500">
                        <img src="{{ asset('storage/' . $item->path) }}" 
                             alt="Villa Living Room" class="w-full h-64 object-cover">
                    </div>
                   
                @endforeach
                   
                </div>

              
            </div>
             <div class="lg:w-1/3">
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-bold mb-4"> {{ $rental->getTranslation('name', app()->getLocale()) }}</h2>
                    <div class="flex items-center mb-6">
                        <div class="flex items-center mr-6">
                            <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i>
                            <span class="text-gray-600">{{ $rental->getTranslation('address', app()->getLocale()) }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span class="font-medium">{{ round($rental->averageRating()) }}</span>
                            <span class="text-gray-500 ml-1">({{ count($rental->reviews) }} reviews)</span>
                        </div>

                        
                    </div>

                     <div class="flex items-center mr-6">
                            
                            <div class="absolute top-4 left-4 bg-yellow-500 text-black px-3 py-1 font-semibold rounded-md">
                              <i class="fas fa-money-bill text-dark mr-2"></i>
                          {{ $rental->price }} DA
                        </div>
                        </div>

                  

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-xl font-semibold mb-4">Description</h3>
                        <p class="text-gray-600 mb-4">
                            {{ $rental->getTranslation('description', app()->getLocale()) }}
                        </p>
                    </div>
                </div>

                <!-- Amenities -->
                <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-6">Amenities</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                      @foreach ($rental->amenities as $item)
                           <div class="flex items-center">
                            
                            <span class="text-gray-700">{{ $item }}</span>
                        </div>
                      @endforeach
                       
                       
                       
                    </div>
                </div>
                </div>
            <!-- Reviews -->
    
</div>
 @if ($rental->reviews->count() > 0)
     <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">Customer Reviews</h2>
            @foreach ($rental->reviews as $item)
                 
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

       <input type="hidden" name="reviewable_type" value="{{ get_class($rental) }}">
      <input type="hidden" name="reviewable_id" value="{{ $rental->id }}">
      
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