@extends('layouts.layout')

@section('content')
{{-- <section class="max-w-7xl mx-auto px-4 py-12">
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
            {{ __('messages.tour.details.duration') }}: {{ $tour->duration_days }} days / {{ $tour->duration_nights }} nights
          </span>
         
           <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium capitalize">
            @if ($tour->category == "cars") 4x4 @endif {{ $tour->category }}
          </span>
            
          
         
        </div>

        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-3 ">{{ __('messages.tour.details.stops') }}: {{ $tour->stops}} Destinations</h3>
           
        <h3 class="text-lg font-semibold mb-3 ">{{ __('messages.tour.details.includes') }}</h3>

       
        
        <p> {{ $tour->getTranslation('includes', app()->getLocale()) }}</p>
        
      </div>

        
       <div class="mb-6">
        <h3 class="text-lg font-semibold mb-3 ">{{ __('messages.tour.details.contact') }}</h3>

        <p class="text-sm text-gray-600 mb-2">{{ __('messages.tour.details.text') }}</p>
        <ul class="text-gray-700 text-sm space-y-2">
          @if($tour->phone)
            <li>📞 <a href="tel:{{ $tour->phone }}" class="hover:underline">{{ $tour->phone }}</a></li>
          @endif
          @if($tour->email)
            <li>📧 <a href="mailto:{{ $tour->email }}" class="hover:underline">{{ $tour->email }}</a></li>
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
                            <i class="fas fa-calendar-check mr-2"></i>{{ __('messages.tour.details.book_now') }}
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
                        {{ __('messages.tour.details.book.title') }}
                    </h2>
                    <button class="text-white hover:text-gray-200 transition-colors "@click="open = false">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <p class="text-sm text-blue-100 mt-2"> {{ __('messages.tour.details.book.subtitle') }} {{  $tour->getTranslation('name', app()->getLocale()) }}</p>
                
              
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
                            {{ __('messages.tour.details.book.name') }}
                        </label>
                        <div class="relative">
                            <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your name" required>
                        </div>
                    </div>
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fa-solid fa-envelope mr-2 text-primary"></i>
                             {{ __('messages.tour.details.book.email') }}
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
                             {{ __('messages.tour.details.book.phone') }}
                        </label>
                        <div class="relative">
                            <input type="text" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your phone" required>
                        </div>
                    </div>
                     <div class="mb-6">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-users mr-2 text-primary"></i>
                         {{ __('messages.tour.details.book.guests') }}
                    </label>
                  
                    <input type="number" name="guests" min="1" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 2" required>

                    
                </div>
                </div>



                <!-- Dates Selection -->
                <div class=" mb-4">
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-primary"></i>
                           {{ __('messages.tour.details.book.date') }}
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
                       {{ __('messages.tour.details.book.message') }}
                    </label>
                    <textarea class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" name="message" rows="2" placeholder="Any special requests?"></textarea>
                </div>
              
            </div>
            
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between">
                 <button type="button" @click="open = false"
                            class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                       {{ __('messages.tour.details.book.cancel') }}
                    </button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-primary text-white hover:bg-blue-700 transition-colors flex items-center">
                    <i class="fas fa-check mr-2"></i>
                   {{ __('messages.tour.details.book.confirm') }}
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
    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('messages.tour.details.gallery') }}</h2>
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

  {{-- <div id="map" class="w-full h-96 rounded-lg shadow-md mt-6"></div> 




</section> --}}


  <!-- Header Section -->
    <header class="bg-gradient-to-r from-blue-600 to-teal-500 text-white py-6 px-4 shadow-lg">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">{{ $tour->getTranslation('name', app()->getLocale()) }}</h1>
                    <div class="tour-rating">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>{{ round($tour->averageRating()) }} ({{ count($tour->reviews) }} {{ __('messages.review') }})</span>
                    </div>
                </div>
                <div class="text-sm bg-blue-800 bg-opacity-40 px-3 py-1 rounded-full m-2">
                    <span class="text-yellow-300">★</span> {{ __('messages.tour_details.featured') }}
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Image Section -->
    <section class="relative h-96 w-full overflow-hidden">
        <img src="{{ asset('storage/'.$tour->main_image) }}" 
             alt="صورة رئيسية للرحلة - جبال قورارة" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h2 class="text-4xl font-bold mb-4">{{ $tour->getTranslation('name', app()->getLocale()) }}</h2>
                <p class="text-xl max-w-2xl">{{ __('messages.tour_details.hero_sub') }}</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Price Section -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-700 mb-2">{{ __('messages.tour_details.price_title') }}</h2>
            <div class="text-4xl font-bold text-blue-600 mb-4"> {{ number_format($tour->price, 0) }} {{ __('messages.DA') }}</div>
            <p class="text-gray-600">{{ __('messages.tour_details.price_note') }}</p>
        </section>

        <!-- Gallery Section -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 border-b pb-2">{{ __('messages.tour_details.gallery') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              @foreach ($tour->gallery as $item)
                   <div class="overflow-hidden rounded-lg gallery-image cursor-pointer">
                    <img src="{{ asset('storage/'.$item->path)  }}" 
                         alt="منظر الصحراء في قورارة" 
                         class="w-full h-48 object-cover">
                </div>
              @endforeach
               
                
               
               
            </div>
        </section>

        <!-- Car Details -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 border-b pb-2">{{ __('messages.tour_details.details') }} </h2>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                  @if ($tour->category == "cars") 
                  <i class="fas fa-car text-2xl text-blue-500 mr-3"></i>
                    <div>
                        <h3 class="font-bold text-lg">{{ __('messages.tour_details.car_title') }}</h3>
                        <p class="text-gray-600">{{ __('messages.tour_details.car_sub') }}</p>
                    </div>
                      
                  @else
                      
                  @endif
                    
                </div>
                <div class="text-right">
                    <p class="font-bold text-lg">{{ $tour->duration_days }} {{ __('messages.tour_details.days') }}/ {{ $tour->duration_nights }} {{ __('messages.tour_details.nights') }}</p>
                   
                </div>
            </div>
            <div class="bg-blue-50 p-4 rounded-lg">
                <p class="text-blue-700"><i class="fas fa-info-circle mr-2"></i>{{ __('messages.tour_details.price_info') }}</p>
            </div>
        </section>

       

        <!-- What's Included -->
        <section class="bg-white rounded-xl shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 border-b pb-2">{{ __('messages.tour_details.program_title') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 text-xl mt-1 ml-2"></i>
                    <div>
                        <h3 class="font-bold">{{ __('messages.tour_details.accommodation') }}</h3>
                        <p class="text-gray-600">{{ __('messages.tour_details.accommodation_sub') }}</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 text-xl mt-1 ml-2"></i>
                    <div>
                        <h3 class="font-bold">{{ __('messages.tour_details.transport') }}</h3>
                        <p class="text-gray-600">{{ __('messages.tour_details.transport_sub') }}</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 text-xl mt-1 ml-2"></i>
                    <div>
                        <h3 class="font-bold">{{ __('messages.tour_details.meals') }}</h3>
                        <p class="text-gray-600">{{ __('messages.tour_details.meals_sub') }}</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-check-circle text-green-500 text-xl mt-1 ml-2"></i>
                    <div>
                        <h3 class="font-bold">{{ __('messages.tour_details.activities') }}</h3>
                        <p class="text-gray-600">{{ __('messages.tour_details.activities_sub') }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Information -->
        <section class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 border-b pb-2"> {{ __('messages.tour_details.contact_title') }}</h2>
            <p class="text-gray-700 mb-6">{{ __('messages.tour_details.contact_desc') }}</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-blue-50 p-4 rounded-lg">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-phone-alt text-blue-600 text-xl ml-3"></i>
                        <h3 class="font-bold text-lg">{{ __('messages.tour_details.phone') }}</h3>
                    </div>
                    <p class="text-blue-700 font-medium text-lg">{{ $tour->phone }}</p>
                    <p class="text-gray-600 text-sm">{{ __('messages.tour_details.phone_hours') }}</p>
                </div>
                
                <div class="bg-green-50 p-4 rounded-lg">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-envelope text-green-600 text-xl ml-3"></i>
                        <h3 class="font-bold text-lg">{{ __('messages.tour_details.email') }}</h3>
                    </div>
                    <p class="text-green-700 font-medium text-lg">{{ $tour->email }}</p>
                    <p class="text-gray-600 text-sm">{{ __('messages.tour_details.email_reply') }}</p>
                </div>
            </div>
            
            <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                <p class="text-gray-700"><i class="fas fa-headset text-gray-500 ml-2"></i>{{ __('messages.tour_details.customer_service') }} </p>
            </div>
            <div class="">
                <!-- Modal -->
<div x-data="{ open: false }">
    <!-- Reservation Button -->
    <button class="w-full bg-primary hover:bg-blue-800 text-white font-bold py-3 rounded-lg transition duration-300 mt-4" @click="open = true" class="px-4 py-2 bg-blue-600 text-white rounded-lg"">
                            <i class="fas fa-calendar-check mr-2"></i>{{ __('messages.tour.details.book_now') }}
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
                        {{ __('messages.tour.details.book.title') }}
                    </h2>
                    <button class="text-white hover:text-gray-200 transition-colors "@click="open = false">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <p class="text-sm text-blue-100 mt-2"> {{ __('messages.tour.details.book.subtitle') }} {{  $tour->getTranslation('name', app()->getLocale()) }}</p>
                
              
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
                            {{ __('messages.tour.details.book.name') }}
                        </label>
                        <div class="relative">
                            <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your name" required>
                        </div>
                    </div>
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fa-solid fa-envelope mr-2 text-primary"></i>
                             {{ __('messages.tour.details.book.email') }}
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
                             {{ __('messages.tour.details.book.phone') }}
                        </label>
                        <div class="relative">
                            <input type="text" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Your phone" required>
                        </div>
                    </div>
                     <div class="mb-6">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-users mr-2 text-primary"></i>
                         {{ __('messages.tour.details.book.guests') }}
                    </label>
                  
                    <input type="number" name="guests" min="1" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 2" required>

                    
                </div>
                </div>



                <!-- Dates Selection -->
                <div class=" mb-4">
                    <div>
                        <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-calendar-day mr-2 text-primary"></i>
                           {{ __('messages.tour.details.book.date') }}
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
                       {{ __('messages.tour.details.book.message') }}
                    </label>
                    <textarea class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" name="message" rows="2" placeholder="Any special requests?"></textarea>
                </div>
              
            </div>
            
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between">
                 <button type="button" @click="open = false"
                            class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                       {{ __('messages.tour.details.book.cancel') }}
                    </button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-primary text-white hover:bg-blue-700 transition-colors flex items-center">
                    <i class="fas fa-check mr-2"></i>
                   {{ __('messages.tour.details.book.confirm') }}
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
       
      </div>
    </div>
  </div>
        </section>
    </main>


@if ($tour->reviews && count($tour->reviews) > 0)
     <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.reviews.title') }}</h2>
            @foreach ($tour->reviews as $item)
                 
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

       <input type="hidden" name="reviewable_type" value="{{ get_class($tour) }}">
      <input type="hidden" name="reviewable_id" value="{{ $tour->id }}">
      
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
          placeholder=" {{ __('messages.reviews.message') }}"></textarea>
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