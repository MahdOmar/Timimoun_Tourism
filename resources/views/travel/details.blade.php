@extends('layouts.layout')

@section('content')

<section class="max-w-7xl mx-auto px-6 py-16">
  
  <!-- Hero Section -->
  <div class="relative mb-16">
    <img src="{{ asset('storage/' . $travel->main_image) }}" 
         alt="{{ $travel->getTranslation('name', app()->getLocale()) }}"
         class="w-full h-96 md:h-[500px] object-cover rounded-2xl shadow-lg">
  
  </div>

  <!-- Info Section -->
  <div class="grid md:grid-cols-2 gap-12">
    <!-- Left Info -->
    <div>
      <h2 class="text-2xl font-semibold mb-6">About the travel</h2>
      <p class="text-gray-700 leading-relaxed">
        {{ $travel->getTranslation('description', app()->getLocale()) }}
      </p>

      <!-- Contact Info -->
      <div class="mt-8 space-y-3 text-gray-700">
        <p><strong>📍 Address:</strong> {{ $travel->address }}</p>
        <p><strong>📞 Phone:</strong> {{ $travel->phone }}</p>
        <p><strong>📧 Email:</strong> {{ $travel->email }}</p>
        <p><strong>🌐 Website:</strong> 
          <a href="{{ $travel->website }}" class="text-blue-600 hover:underline" target="_blank">{{ $travel->website }}</a>
        </p>
      </div>
    </div>

    <!-- Right Rating & Gallery -->
    <div>
      <!-- Rating -->
      <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Customer Rating</h2>
        <div class="flex items-center text-yellow-400">
          @for($i = 0; $i < 4; $i++)
            <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          @endfor
          <svg class="w-6 h-6 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <span class="ml-3 text-gray-600">(23 reviews)</span>
        </div>
      </div>

      <!-- Mini Gallery -->
      <div>
        <h2 class="text-2xl font-semibold mb-4">Gallery</h2>
        <div class="grid grid-cols-2 gap-4">
          @foreach($travel->gallery as $image)
            <img src="{{ asset('storage/' . $image->path) }}" 
                 alt="Gallery" 
                 class="w-full h-32 object-cover rounded-lg shadow hover:scale-105 transition">
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- Tours Section -->
  {{-- <div class="mt-16">
    <h2 class="text-2xl font-semibold mb-6">Tours by this travel</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach($travel->tours as $tour)
        <a href="{{ route('tour.show', $tour->id) }}" class="block group">
          <div class="bg-white rounded-lg shadow hover:shadow-lg overflow-hidden">
            <img src="{{ asset('storage/' . $tour->main_image) }}" class="w-full h-40 object-cover group-hover:scale-105 transition">
            <div class="p-4">
              <h3 class="font-semibold text-gray-800 group-hover:text-orange-600">
                {{ $tour->getTranslation('name', app()->getLocale()) }}
              </h3>
              <p class="text-sm text-gray-600 mt-1">{{ Str::limit($tour->getTranslation('description', app()->getLocale()), 60) }}</p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div> --}}

  <!-- Related Agencies -->
  <div class="mt-16">
    <h2 class="text-2xl font-semibold mb-6">Related Travel Agencies</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
      @foreach($relatedAgencies as $related)
        <a href="{{ route('travel.show', $related->id) }}" class="block group">
          <div class="bg-white rounded-lg shadow hover:shadow-lg overflow-hidden text-center p-4">
            <img src="{{ asset('storage/' . $related->main_image) }}" 
                 class="w-24 h-24 mx-auto rounded-full object-cover mb-3 group-hover:scale-105 transition">
            <h3 class="font-semibold text-gray-800 group-hover:text-orange-600">
              {{ $related->getTranslation('name', app()->getLocale()) }}
            </h3>
            <p class="text-xs text-gray-500 mt-1">(12 reviews)</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>

</section>



@endsection