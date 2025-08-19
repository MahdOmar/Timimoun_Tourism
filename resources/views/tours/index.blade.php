@extends('layouts.layout')

@section('content')
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-4xl font-bold text-center text-gray-800 mb-14">
      Unforgettable Desert Tours
    </h2>
<!-- Filter Bar -->
<div class="sticky top-0 z-30 bg-white shadow-md py-4 px-6 mb-8 mt-8">
  <form method="GET" action="" class="grid md:grid-cols-4 gap-4 items-end">
    
    <!-- Tour Type -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Tour Type</label>
      <select name="type" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
        <option value="">All</option>
        <option value="desert" {{ request('type') == 'desert' ? 'selected' : '' }}>Desert</option>
        <option value="oasis" {{ request('type') == 'oasis' ? 'selected' : '' }}>Oasis</option>
        <option value="cultural" {{ request('type') == 'cultural' ? 'selected' : '' }}>Cultural</option>
      </select>
    </div>

    <!-- Price Range -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Max Price (DA)</label>
      <input type="number" name="max_price" value="{{ request('max_price') }}" 
             class="w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500"
             placeholder="Ex: 5000">
    </div>

    <!-- Duration -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Duration</label>
      <select name="duration" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
        <option value="">All</option>
        <option value="1" {{ request('duration') == '1' ? 'selected' : '' }}>1 Day</option>
        <option value="3" {{ request('duration') == '3' ? 'selected' : '' }}>2-3 Days</option>
        <option value="7" {{ request('duration') == '7' ? 'selected' : '' }}>1 Week</option>
      </select>
    </div>

    <!-- Submit -->
    <div>
      <button type="submit" class="w-full bg-yellow-500 text-black px-4 py-2 rounded-md font-semibold hover:bg-yellow-400 transition">
        Filter
      </button>
    </div>
  </form>
</div>

    <div class="grid md:grid-cols-3 gap-6">
      @foreach($tours as $tour)
        <div class="relative group overflow-hidden rounded-xl shadow-lg h-[420px] my-10">
          <!-- Image -->
          <img src="{{ asset('storage/' . $tour->main_image) }}"
               class="w-full h-full object-cover  transform group-hover:scale-110  transition duration-500"
               alt="{{ $tour->getTranslation('name', app()->getLocale()) }}">

          <!-- Overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-6 bg-black bg-opacity-50">
            <h3 class="text-2xl font-bold text-white mb-2">
              {{ $tour->getTranslation('name', app()->getLocale()) }}
            </h3>
            <p class="text-gray-200 text-sm mb-3 line-clamp-2">
              {{ $tour->getTranslation('description', app()->getLocale()) }}
            </p>
            <div class="flex justify-between items-center">
              <span class="text-lg font-semibold text-yellow-400">
                {{ $tour->price }} DA
              </span>
              <a href="{{ route('tour.show', $tour->id) }}"
                 class="bg-yellow-500 text-orange-700 px-3 py-2 rounded-md text-xl font-semibold hover:bg-yellow-400 transition">
                View Tour
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


@endsection
