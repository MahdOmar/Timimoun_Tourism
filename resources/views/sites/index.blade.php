@extends('layouts.layout')

@section('content')

<div class="bg-gray-50 min-h-screen p-4">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-8">📍 Places to Visit in Timimoun</h1>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($sites as $site)
          
      
    
        <div class="bg-white  shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
          <img src="{{ asset('storage/'.$site->main_image) }}" alt="" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500" />
          
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ $site->getTranslation('name', app()->getLocale()) }}</h2>
            <p class="text-gray-600 text-sm">{{ $site->getTranslation('description', app()->getLocale()) }}</p>
            
            <a href="{{ route('site.show', $site->id) }}"
               class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
              View more →
            </a>
          </div>
        </div>
        @endforeach
        
          
     
    </div>

    <!-- Pagination (if applicable) -->
    <div class="mt-10">
     
    </div>
  </div>
</div>







@endsection('content')  