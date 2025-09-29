@extends('layouts.layout')


@section('content')
   <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl">
            <div class="relative h-96">
                <img src="{{ asset('storage/' . $food->main_image) }}" 
                     alt="Gusto Italiano Restaurant" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                <div class="absolute bottom-8 left-8 rtl:right-8 text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-2 text-orange-500">{{ $food->getTranslation('name', app()->getLocale()) }}</h1>
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span>{{ round($food->averageRating()) }} ({{ count($food->reviews) }}  {{ __('messages.review') }} )</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-tag text-primary mr-1"></i>
                            <span> @if ($food->type == 'restaurant')
                            {{ __('messages.food.food_categories.restaurant') }}
                            
                        @elseif(($food->type == 'snack')) 
                            {{ __('messages.food.food_categories.snack') }} 
                           @elseif(($food->type == 'traditional')) 
                            {{ __('messages.food.food_categories.traditional') }}
                            @elseif(($food->type == 'cafe')) 
                            {{ __('messages.food.food_categories.cafe') }}
                             
                        @endif</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-dollar-sign text-green-500 mr-1"></i>
                            <span>{{ $food->min_price }} - {{ $food->max_price }} {{ __('messages.DA') }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column -->
            <div class="w-full lg:w-8/12">
                <!-- About Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4 text-orange-500">{{ __('messages.food.details.about') }} {{ $food->getTranslation('name', app()->getLocale()) }}</h2>
                    <p class="text-lg mb-4 leading-relaxed">
                        {{ $food->getTranslation('description', app()->getLocale()) }}
                    </p>
                  
                   
                </section>

                <!-- Gallery Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-orange-500">{{ __('messages.food.details.gallery') }}</h2>
                    <div class="gallery-grid">
                      @foreach ($food->gallery as $item)
                          
                        <div class="gallery-item rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $item->path) }}" 
                                 alt="Restaurant food" class="w-full h-full object-cover">
                        </div>

                         @endforeach
                        
                    </div>
                </section>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-4/12">
                <!-- Reservation Card -->
                {{-- <div class="bg-white rounded-xl shadow-lg p-6 mb-8 sticky top-4">
                    <h3 class="text-2xl font-bold mb-4 text-dark">Make a Reservation</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Date</label>
                            <input type="date" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Time</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg">
                                <option>6:00 PM</option>
                                <option>6:30 PM</option>
                                <option>7:00 PM</option>
                                <option>7:30 PM</option>
                                <option>8:00 PM</option>
                                <option>8:30 PM</option>
                                <option>9:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Party Size</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg">
                                <option>1 person</option>
                                <option>2 people</option>
                                <option>3 people</option>
                                <option>4 people</option>
                                <option>5 people</option>
                                <option>6 people</option>
                                <option>7+ people</option>
                            </select>
                        </div>
                        <button class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-300">
                            Check Availability
                        </button>
                    </form>
                </div> --}}

                <!-- Contact Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-4 text-orange-500">{{ __('messages.food.details.contact') }}</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold  ">{{ __('messages.food.details.address') }}</h4>
                                <p class="text-gray-600">{{ $food->getTranslation('address', app()->getLocale()) }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.food.details.phone') }}</h4>
                                <p class="text-gray-600">{{ $food->phone}}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.food.details.email') }}</h4>
                                <p class="text-gray-600">{{ $food->email}}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-clock text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.food.details.hours') }}</h4>
                                <p class="text-gray-600">{{ __('messages.food.details.days') }}</p>
                                <p class="text-gray-600">{{ __('messages.food.details.friday') }}</p>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold mb-4 text-orange-500">{{ __('messages.food.details.price') }}</h3>
                    <div class="mb-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700">{{ __('messages.food.details.price') }}</span>
                            <span class="text-gray-700">{{ $food->min_price }} - {{ $food->max_price }} {{ __('messages.DA') }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary h-2.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                   
                    <div class="mt-6 bg-secondary p-4 rounded-lg">
                        <p class="text-dark font-semibold">{{ __('messages.food.details.meal') }}: {{ (($food->min_price + $food->max_price) /2) - 300  }} - {{ (($food->min_price + $food->max_price) /2) + 300  }} {{ __('messages.food.details.person') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if (count($food->reviews) > 0)
          <!-- Reviews -->
   <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.reviews.title') }}</h2>
            @foreach ($food->reviews as $item)
                 
                 
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

       <input type="hidden" name="reviewable_type" value="{{ get_class($food) }}">
      <input type="hidden" name="reviewable_id" value="{{ $food->id }}">
      
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

@endsection


