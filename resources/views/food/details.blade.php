@extends('layouts.layout')


@section('content')
<!-- Hero Banner -->
<section class="relative h-72 md:h-96">
  <img src="{{ asset('storage/' . $food->main_image) }}" 
       alt="{{ $food->getTranslation('name', app()->getLocale()) }}"
       class="w-full h-full object-cover">
  <div class="absolute inset-0 bg-black/40"></div>
  <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
    <div>
      <h1 class="text-3xl md:text-4xl font-bold mb-2">
        {{ $food->getTranslation('name', app()->getLocale()) }}
      </h1>
      <span class="bg-orange-600 px-3 py-1 rounded-full text-xs uppercase tracking-wide">
        {{ ucfirst($food->type) }}
      </span>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-3 gap-12">
  <!-- Left Content -->
  <div class="md:col-span-2">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">About this Dish</h2>
    <p class="text-gray-600 leading-relaxed mb-6">
      {{ $food->getTranslation('description', app()->getLocale()) }}
    </p>

    <!-- Gallery -->
    @if($food->gallery && count($food->gallery) > 0)
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Gallery</h3>
    <div class="grid sm:grid-cols-2 gap-4">
      @foreach($food->gallery as $image)
        <img src="{{ asset('storage/' . $image->path) }}" 
             class="w-full h-52 md:h-64 object-cover rounded-lg shadow hover:scale-105 transition">
      @endforeach
    </div>
    @endif
  </div>

  <!-- Right Sidebar -->
  <aside class="bg-gray-50 p-6 rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-4">Quick Info</h3>
    <ul class="space-y-3 text-gray-700">
      <li><strong>Type:</strong> {{ ucfirst($food->type) }}</li>
      <li><strong>Category:</strong> Traditional Food</li>
      <li><strong>Recommended:</strong> Yes ✅</li>
    </ul>

    
  </aside>
</section>

<!-- Related Dishes -->
<section class="bg-gray-100 py-12">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-8">You may also like</h2>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach($related as $item)
      <a href="{{ route('food.show', $item->id) }}" 
         class="group block bg-white rounded-lg overflow-hidden shadow hover:shadow-lg">
        <img src="{{ asset('storage/' . $item->main_image) }}" 
             class="w-full h-44 object-cover group-hover:scale-105 transition">
        <div class="p-4">
          <h3 class="text-lg font-semibold text-gray-800 group-hover:text-orange-600">
            {{ $item->getTranslation('name', app()->getLocale()) }}
          </h3>
          <p class="text-sm text-gray-600 mt-1">
            {{ Str::limit($item->getTranslation('description', app()->getLocale()), 60) }}
          </p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endsection


