@extends('layouts.layout')

@section('content')

<!-- Hero Section -->
<section class="relative h-[60vh] flex items-center justify-center bg-cover bg-center" 
         style="background-image: url('/images/food-hero.jpg')">
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="relative z-10 text-center text-white px-6">
    <h1 class="text-4xl md:text-5xl font-bold">Taste the Flavors of Timimoun</h1>
    <p class="mt-4 text-lg md:text-xl max-w-2xl mx-auto">
      Discover traditional dishes, refreshing drinks, and unique flavors that define our oasis culture.
    </p>
  </div>
</section>

<!-- Food & Drinks with Top Filter -->
<section class="py-16 bg-orange-50">
  <div class="max-w-7xl mx-auto px-4">
    
    <!-- Filter Bar -->
    <form method="GET" action="{{ route('foodanddrink.index') }}" 
          class="bg-white rounded-xl shadow p-6 mb-10 grid md:grid-cols-4 gap-4">
      
      <!-- Type -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
        <select name="type" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
          <option value="">All</option>
          <option value="food" {{ request('type')=='food' ? 'selected' : '' }}>Food</option>
          <option value="drink" {{ request('type')=='drink' ? 'selected' : '' }}>Drinks</option>
          <option value="dessert" {{ request('type')=='dessert' ? 'selected' : '' }}>Dessert</option>
          <option value="traditional" {{ request('type')=='traditional' ? 'selected' : '' }}>Traditional</option>
        </select>
      </div>

      <!-- Search -->
      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search food..."
               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
      </div>

      <!-- Button -->
      <div class="flex items-end">
        <button type="submit"
                class="w-full px-4 py-2 bg-orange-600 text-white font-semibold rounded-lg shadow hover:bg-orange-700 transition">
          Apply Filter
        </button>
      </div>
    </form>

    <!-- Food Cards Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($food as $item)
        <a href="{{ route('food.show',$item->id) }}"><div class="relative group rounded-xl overflow-hidden shadow-lg bg-gray-950">
          <!-- Image -->
          <img src="{{ asset('storage/' . $item->main_image) }}" 
               alt="{{ $item->getTranslation('name', app()->getLocale()) }}"
               class="w-full h-72 object-cover group-hover:scale-110 transition duration-500">

          <!-- Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent 
                      opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-5">
            <h3 class="text-xl font-bold text-white">
              {{ $item->getTranslation('name', app()->getLocale()) }}
            </h3>
            <p class="text-sm text-gray-200 mt-1">
              {{ Str::limit($item->getTranslation('description', app()->getLocale()), 90) }}
            </p>
            <span class="inline-block mt-3 bg-orange-600 text-white text-xs px-3 py-1 rounded-full">
              {{ ucfirst($item->type) }}
            </span>
          </div>
        </div></a>
      @endforeach
    </div>

  
  </div>
</section>


@endsection