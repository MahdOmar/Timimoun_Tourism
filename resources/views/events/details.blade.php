@extends('layouts.layout')

@section('content')

<section class="bg-gray-50 py-12">
  <div class="max-w-6xl mx-auto px-4">

    <!-- HEADER -->
    <div class="relative mb-10">
      <img src="{{ asset('storage/' . $event->main_image) }}" 
           alt="{{ $event->getTranslation('name', app()->getLocale()) }}"
           class="w-full h-[400px] object-cover rounded-lg shadow-lg">
      
      <!-- Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent rounded-lg"></div>
      
      <!-- Event Title Overlay -->
      <div class="absolute bottom-6 left-6 text-white">
        <h1 class="text-4xl font-extrabold drop-shadow-lg mb-2">
          {{ $event->getTranslation('name', app()->getLocale()) }}
        </h1>
        <p class="text-lg opacity-90">{{ $event->location ?? 'Timimoun, Algeria' }}</p>
      </div>

      <!-- Date Box -->
      <div class="absolute top-6 right-6 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg text-center">
        <div class="text-2xl font-bold">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</div>
        <div class="uppercase">{{ \Carbon\Carbon::parse($event->start_date)->format('M Y') }}</div>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="grid md:grid-cols-3 gap-8 bg-white shadow-md rounded-lg p-6" >
      
      <!-- LEFT COLUMN: INFO -->
      <div class="md:col-span-2">
        <div class="flex justify-between">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.events.details.title') }}</h2>
      <div class=" bg-green-600 text-white px-6 py-2 rounded-lg shadow-lg text-center">
        <div class="text-xl font-bold">@if ($event->price == 0){{ __('messages.events.details.price') }}
            
        @else
            {{ number_format($event->price, 2) }} DA
            
        @endif</div>
        
      </div>
        </div>
         <span class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span>{{ round($event->averageRating()) }} ({{ count($event->reviews) }} reviews)</span>
          </span>
        
        <p class="text-gray-600 leading-relaxed mb-6 mt-2">
          {{ $event->getTranslation('description', app()->getLocale()) }}
        </p>

        <!-- COUNTDOWN -->
        @php
          $now = \Carbon\Carbon::now();
          $eventDate = \Carbon\Carbon::parse($event->start_date);
          $daysLeft = $now->diffInDays($eventDate, false);
          $hoursLeft = $now->diffInHours($eventDate, false);
        @endphp
        <div class="mb-8">
          @if ($eventDate->isPast())
            <span class="px-4 py-2 bg-gray-200 text-gray-600 rounded">❌ {{ __('messages.events.details.event_passed') }}</span>
          @elseif ($daysLeft > 0)
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded">⏳ {{ $daysLeft }} {{ __('messages.events.details.days') }}</span>
          @elseif ($hoursLeft > 0)
            <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded">⏳ {{ __('messages.events.details.hours') }}</span>
          @else
            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded">⏳ {{ __('messages.events.details.start') }}</span>
          @endif
        </div>

        <!-- Gallery -->
        @if($event->gallery && count($event->gallery) > 0)
        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.events.details.highlights') }}</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
          @foreach($event->gallery as $image)
            <img src="{{ asset('storage/' . $image->path) }}" 
                 alt="Event Gallery Image" 
                 class="w-full h-40 object-cover rounded-lg shadow hover:scale-105 transition">
          @endforeach
        </div>
        @endif
      </div>

      <!-- RIGHT COLUMN: SIDEBAR -->
      <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('messages.events.details.event_info') }}</h3>
        <ul class="space-y-3 text-gray-700">
          <li><strong>{{ __('messages.events.details.start_date') }}:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('l, d M Y H:i') }}</li>
           <li><strong>{{ __('messages.events.details.end_date') }}:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('l, d M Y H:i') }}</li>
          <li><strong>{{ __('messages.events.details.location') }}:</strong> {{ $event->getTranslation('address', app()->getLocale()).' Timimoun, Algeria' ?? 'Timimoun, Algeria' }}</li>
          <li><strong>{{ __('messages.events.details.category') }}:</strong> {{ $event->category ?? 'Festival' }}</li>
        </ul>

       

        <div class="mt-4">
          <a href="" class="block text-center border bg-red-600 text-white py-3 rounded-lg hover:bg-gray-100 transition">
           {{ __('messages.events.details.back') }}
          </a>
        </div>
      </div>
    </div>

    <!-- MAP -->
    @if($event->latitude && $event->longitude)
    <div class="mt-12">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ __('messages.events.details.location') }}</h2>
      <iframe 
        src="https://maps.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}&z=15&output=embed" 
        width="100%" height="400" 
        class="rounded-lg shadow">
      </iframe>
    </div>
    @endif
  </div>
</section>

@if ($event->reviews->count() > 0)
<!-- Reviews -->
  <section class=" py-8">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-neutral mb-6">{{ __('messages.reviews.title') }}</h2>
            @foreach ($event->reviews as $item)
                 
                 
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

       <input type="hidden" name="reviewable_type" value="{{ get_class($event) }}">
      <input type="hidden" name="reviewable_id" value="{{ $event->id }}">
      
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

@endsection('content')  