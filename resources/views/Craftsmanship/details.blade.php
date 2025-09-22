@extends('layouts.layout')

@section('content')

<section class="py-8">
        <div class="max-w-7xl mx-auto px-4">
       
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Image Gallery -->
                <div class="lg:w-1/2">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-4">
                        <img id="main-image" src="{{ asset('storage/' . $craft->main_image) }}" alt="{{ $craft->getTranslation('name', app()->getLocale()) }}" class="w-full h-96 object-cover">
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                       <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-lg overflow-hidden transition">
                            <img src="{{ asset('storage/' . $craft->main_image) }}" alt="{{ $craft->getTranslation('name', app()->getLocale()) }}" class="w-full h-20 object-cover" onclick="document.getElementById('main-image').src = this.src">
                        </div>
                      @foreach ($craft->gallery as $item)
                          <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-lg overflow-hidden transition">
                            <img src="{{ asset('storage/' . $item->path)  }}" alt="{{ $craft->getTranslation('name', app()->getLocale()) }}" class="w-full h-20 object-cover" onclick="document.getElementById('main-image').src = this.src">
                        </div>
                      @endforeach
                        
                       
                    </div>
                </div>

                <!-- Product Details -->
                <div class="lg:w-1/2">
                    <h1 class="text-3xl font-bold text-neutral mb-2">{{ ucfirst($craft->getTranslation('name', app()->getLocale())) }}</h1>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 mr-2">
                            @for ( $i=0; $i < round($craft->averageRating()); $i++ )
                                 <i class="fas fa-star"></i>
                            @endfor
                           
                           
                        </div>
                        <span class="text-gray-600">({{ count($craft->reviews) }} reviews)</span>
                    </div>
                    <p class="text-2xl font-bold text-green-500 mb-6">{{ ucfirst($craft->category )}} </p>
                    
                    <p class="text-2xl font-bold text-primary mb-6">{{ $craft->min_price }} - {{ $craft->max_price }} DA</p>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-neutral mb-2">Description</h3>
                        <p class="text-gray-700">
                            {{ ucfirst($craft->getTranslation('description', app()->getLocale())) }}
                        </p>
                    </div>
                    
                    {{-- <div class="mb-6">
                        <h3 class="text-lg font-semibold text-neutral mb-2">Contact Information</h3>
                        <ul class="text-gray-700 list-disc pl-5">
                            <li>{{ $craft->phone }}</li>
                            <li>{{ $craft->email }}</li>
                            <li>{{ $craft->getTranslation('location', app()->getLocale()) }}</li>
                           
                        </ul>
                    </div> --}}
                    
                   
               
                </div>
            </div>
        </div>
    </section>

    
    <!-- Map Localization Section -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.craft.details.location') }}</h2>
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Map Container -->
                <div class="md:w-1/2">
                    <div class="rounded-xl overflow-hidden shadow-lg h-96 ">
                        <!-- Google Maps Placeholder -->
                           
                             
                          <iframe 
                            src="https://maps.google.com/maps?q={{ $craft->latitude }},{{ $craft->longitude }}&z=15&output=embed" 
                            width="100%" height="400" 
                            class="rounded-lg shadow">
                          </iframe>
                          
                        >
                        
                     
                    </div>
                </div>
                
                <!-- Location Details -->
                <div class="md:w-1/2">
                    <div class="bg-gray-50 rounded-xl p-6 h-full">
                        <h3 class="text-xl font-bold text-neutral mb-4">{{ __('messages.craft.details.artisan') }}</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-map-marker-alt text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-neutral">{{ __('messages.craft.details.address') }}</h4>
                                    <p class="text-gray-700">{{ ucfirst($craft->getTranslation('location', app()->getLocale())) }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-clock text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-neutral">{{ __('messages.craft.details.opening_hours') }}</h4>
                                    <p class="text-gray-700">{{ __('messages.craft.details.days') }}<br>{{ __('messages.craft.details.friday') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4">
                                    <i class="fas fa-phone text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-neutral">{{ __('messages.craft.details.contact') }}</h4>
                                    <p class="text-gray-700">{{ $craft->phone }}<br>{{ $craft->email }}</p>
                                </div>
                            </div>
                        </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <!-- Related Products -->
    @if (count($related) > 0)
      
   
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.craft.details.like') }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Related Product 1 -->
                @foreach ($related as $item)
                    
                <div class="bg-light rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{asset('storage/' . $item->main_image) }}')"></div>
                    <div class="p-4">
                        <h3 class="text-md font-semibold text-neutral mb-1">{{ $craft->getTranslation('name', app()->getLocale()) }}</h3>
                        <p class="text-primary font-bold">{{ $craft->min_price  }} - {{ $craft->max_price  }} DA</p>
                    </div>
                </div>

                 @endforeach
             
            </div>
        </div>
    </section>

    
     @endif
     @if (count($craft->reviews) > 0)
          <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
           <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.reviews.title') }}</h2>
            @foreach ($craft->reviews as $item)
                 
                 
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-neutral">{{ __('messages.reviews.By') }} {{ $item->name }}</h3>

                        <div class="flex text-yellow-400 mt-1">
                          @for( $i=0; $i < $item->rating; $i++ )
                            <i class="fas fa-star"></i>
                           
                            @endfor
                        </div>
                    </div>
                    <span class="text-gray-500 text-sm mt-2 md:mt-0">{{ __('messages.reviews.On') }} {{ $item->created_at->format('d-M-Y') }}</span>
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
    <h2 class="text-3xl font-extrabold text-center text-orange-500 mb-10">{{ __('messages.reviews.title2') }}</h2>

    <form action="{{ route('review.store') }}" method="POST" class="bg-white shadow-xl rounded-2xl p-8 space-y-6">
      @csrf

       <input type="hidden" name="reviewable_type" value="{{ get_class($craft) }}">
      <input type="hidden" name="reviewable_id" value="{{ $craft->id }}">
      
      <!-- Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.reviews.name') }}</label>
        <input type="text" id="name" name="name" required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" 
          placeholder="John Doe">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('messages.reviews.email') }}</label>
        <input type="email" id="email" name="email" required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" 
          placeholder="johndoe@email.com">
      </div>

      <!-- Star Rating -->
      <div>
        <label class="block text-sm font-medium text-gray-700">{{ __('messages.reviews.rating') }}</label>
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
        <label for="review" class="block text-sm font-medium text-gray-700">{{ __('messages.reviews.text') }}</label>
        <textarea id="review" name="comment" rows="4" required
          class="mt-2 w-full rounded-lg border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" 
          placeholder="Share your experience..."></textarea>
      </div>

      <!-- Submit -->
      <div class="text-center">
        <button type="submit"
          class="w-full bg-orange-500 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-orange-600 transition">
        {{ __('messages.reviews.submit') }}     
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

   
    <script>
        // Simple function to handle thumbnail clicks
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }
    </script>

    @endsection