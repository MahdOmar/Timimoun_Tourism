@extends('layouts.layout')

@section('content')

     <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl">
            <div class="relative h-96">
                <img src="{{ asset('storage/' . $travel->main_image) }}" 
                     alt="Wanderlust Travels" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                <div class="absolute bottom-8 left-8 rtl:right-8 text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $travel->getTranslation('name', app()->getLocale()) }}</h1>
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span>{{round($travel->averageRating())  }} ({{ count($travel->reviews) }} {{ __('messages.review') }} )</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-map-marker-alt text-accent mr-1"></i>
                            <span>{{ __('messages.travel.details.world') }}</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-award text-green-400 mr-1"></i>
                            <span>{{ __('messages.travel.details.travels') }} {{ date('Y') }}</span>
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
                    <h2 class="text-3xl font-bold mb-4 text-dark">{{ __('messages.travel.details.about') }} {{ $travel->getTranslation('name', app()->getLocale()) }}</h2>
                    <p class="text-lg mb-4 leading-relaxed">
                        {{ $travel->getTranslation('description', app()->getLocale()) }}
                    </p>
                   
                    {{-- <div class="bg-accent p-6 rounded-xl mt-6">
                        <h3 class="text-xl font-semibold mb-2 text-dark">Our Specialties</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start">
                                <i class="fas fa-globe-americas text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Worldwide Destinations</h4>
                                    <p class="text-gray-700">From Bali to Barcelona, we offer global coverage</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-crown text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Luxury Experiences</h4>
                                    <p class="text-gray-700">5-star accommodations and exclusive access</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-hiking text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Adventure Tours</h4>
                                    <p class="text-gray-700">Thrilling experiences for adrenaline seekers</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-heart text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Honeymoon Packages</h4>
                                    <p class="text-gray-700">Romantic getaways for special moments</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </section>

                <!-- Services Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-dark">{{ __('messages.travel.details.services.title') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.travel.details.services.flight.title') }}</h3>
                            <p class="text-gray-700">{{ __('messages.travel.details.services.flight.text') }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.travel.details.services.accommodation.title') }}</h3>
                            <p class="text-gray-700">{{ __('messages.travel.details.services.accommodation.text') }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-route"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.travel.details.services.itineraries.title') }}</h3>
                            <p class="text-gray-700">{{ __('messages.travel.details.services.itineraries.text') }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.travel.details.services.transportation.title') }}</h3>
                            <p class="text-gray-700">{{ __('messages.travel.details.services.transportation.text') }}</p>
                        </div>
                    </div>
                </section> 

                <!-- Gallery Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-dark">{{ __('messages.travel.details.gallery') }}</h2>
                    <div class="gallery-grid">
                      @foreach ($travel->gallery as $item)
                           <div class="gallery-item rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $item->path) }}" 
                                 alt="Nature" class="w-full h-full object-cover">
                        </div>
                      @endforeach
                       
                      
                    </div>
                </section>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-4/12">
              

                <!-- Contact Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-4 text-dark">{{ __('messages.travel.details.contact') }}</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.travel.details.address') }}</h4>
                                <p class="text-gray-700">{{ $travel->getTranslation('address', app()->getLocale()) }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.travel.details.phone') }}</h4>
                                <p class="text-gray-700">{{ $travel->phone }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.travel.details.email') }}</h4>
                                <p class="text-gray-700">{{ $travel->email }}</p>
                            </div>
                          
                        </div>
                          @if ($travel->website)
                          <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">{{ __('messages.travel.details.website') }}</h4>
                                <a href="{{ $travel->website }}" class="text-gray-700">{{ $travel->website }}</a>
                            </div>
                              </div>
                                
                            @endif
                       
                    </div>
                </div>

                <!-- Popular Destinations -->
                {{-- <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold mb-4 text-dark">Popular Destinations</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YmFsaXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=800&q=60" 
                                     alt="Bali" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Bali, Indonesia</h4>
                                <p class="text-gray-700 text-sm">From $1,299</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1593537612376-5fbe1a5fe30d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2FudG9yaW5pfGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" 
                                     alt="Santorini" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Santorini, Greece</h4>
                                <p class="text-gray-700 text-sm">From $1,899</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1582571352032-448f7928eca2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8a3lsYWElMjBtdXJ1fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" 
                                     alt="Kyoto" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Kyoto, Japan</h4>
                                <p class="text-gray-700 text-sm">From $2,199</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGFyaXN8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=800&q=60" 
                                     alt="Paris" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Paris, France</h4>
                                <p class="text-gray-700 text-sm">From $1,599</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>

    @if ($travel->reviews->count() > 0)
         <!-- Reviews -->
  <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
             <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.reviews.title') }}</h2>
            @foreach ($travel->reviews as $item)
                 
                 
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

       <input type="hidden" name="reviewable_type" value="{{ get_class($travel) }}">
      <input type="hidden" name="reviewable_id" value="{{ $travel->id }}">
      
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