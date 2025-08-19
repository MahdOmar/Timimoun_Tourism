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
        <p class="text-gray-600 text-lg leading-relaxed mb-6">
          {{ $tour->getTranslation('description', app()->getLocale()) }}
        </p>

        <!-- Duration + Type -->
        <div class="flex items-center gap-6 mb-6">
          <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
            Duration: {{ $tour->duration }} days
          </span>
          <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium capitalize">
            {{ $tour->type }}
          </span>
        </div>

        <!-- Reviews -->
        <div class="flex items-center mb-6">
          <div class="flex text-yellow-400">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
            <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c..."/></svg>
          </div>
          <span class="ml-2 text-sm text-gray-500">(24 reviews)</span>
        </div>
      </div>

      <!-- CTA -->
      <div class="flex gap-4">
        <a href="#" class="bg-yellow-500 text-black px-6 py-3 rounded-lg font-semibold hover:bg-yellow-400 transition">
          Book Now
        </a>
        <a href="" class="px-6 py-3 rounded-lg border border-gray-300 hover:bg-gray-100 transition">
          Back to Tours
        </a>
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
  @if($tour->latitude && $tour->longitude)
  <div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Location</h2>
    <iframe 
      src="https://maps.google.com/maps?q={{ $tour->latitude }},{{ $tour->longitude }}&z=15&output=embed" 
      width="100%" height="400" 
      class="rounded-lg shadow">
    </iframe>
  </div>
  @endif
</section>

@endsection
