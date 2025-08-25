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
      <div class="flex items-center text-sm mb-6">
        <span class="text-yellow-500 mr-2">★★★★☆</span>
        <span class="text-gray-600">4.5 (23 Reviews)</span>
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
            <a href="{{ route('sites.show', $related->id) }}" class="group block bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
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



@endsection('content')  

 <script>
    function changeImage(src) {
     
            document.getElementById('mainImage').src = src;
        }
  </script>