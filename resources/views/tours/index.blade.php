@extends('layouts.layout')

@section('content')
{{-- <section class="py-20 bg-gray-50">
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
</section> --}}

 <header class="page-header">
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">Discover Amazing Tours</h1>
            <p class="page-subtitle">Explore the world with our carefully curated adventure tours and experiences</p>
            
            <div class="search-container">
                <div class="flex bg-white rounded-full shadow-lg overflow-hidden">
                    <input type="text" placeholder="Search destinations, tours, or activities..." class="flex-grow px-6 py-4 text-gray-800 focus:outline-none">
                    <button class="bg-secondary hover:bg-orange-600 px-8 py-4 text-white font-semibold">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="filter-grid">
            <div class="filter-group">
                <label class="filter-label">Destination</label>
                <select class="filter-select">
                    <option>All Destinations</option>
                    <option>Europe</option>
                    <option>Asia</option>
                    <option>North America</option>
                    <option>South America</option>
                    <option>Africa</option>
                    <option>Oceania</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Tour Type</label>
                <select class="filter-select">
                    <option>All Tour Types</option>
                    <option>Adventure</option>
                    <option>Cultural</option>
                    <option>Beach</option>
                    <option>Wildlife</option>
                    <option>City Tours</option>
                    <option>Hiking</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Duration</label>
                <select class="filter-select">
                    <option>Any Duration</option>
                    <option>1-3 Days</option>
                    <option>4-7 Days</option>
                    <option>8-14 Days</option>
                    <option>2+ Weeks</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Price Range</label>
                <select class="filter-select">
                    <option>Any Price</option>
                    <option>Under $500</option>
                    <option>$500 - $1000</option>
                    <option>$1000 - $2000</option>
                    <option>Over $2000</option>
                </select>
            </div>
            
            <div class="filter-group flex items-end">
                <button class="w-full bg-primary hover:bg-blue-600 text-white py-3 rounded-lg font-semibold">
                    Apply Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Results Header -->
    <div class="results-header">
        <div class="results-count">Showing 24 of 128 tours</div>
        <div class="view-options">
            <button class="view-option active">
                <i class="fas fa-th-large"></i>
            </button>
            <button class="view-option">
                <i class="fas fa-list"></i>
            </button>
            <button class="view-option">
                <i class="fas fa-map-marker-alt"></i>
            </button>
        </div>
    </div>

    <!-- Tours Grid -->
    <div class="tour-grid">
        <!-- Tour Card 1 -->
        @foreach ($tours as $item)
            <div class="tour-card">
            <div class="tour-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="Alpine Adventure" class="w-full h-full object-cover">
                <div class="tour-badge">
                    <span class="type-adventure">{{ $item->category }}</span>
                   
                </div>
                <div class="tour-price">{{ $item->price }}</div>
            </div>
            <div class="tour-content">
                <h3 class="tour-title">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
                <div class="tour-location">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span></span>
                </div>
                <p class="text-gray-600 text-sm">{{ $item->getTranslation('description', app()->getLocale()) }}</p>
                
                <div class="tour-footer">
                    
                    <div class="tour-rating">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>4.8 (124)</span>
                    </div>
                </div>
                
                <div class="tour-meta">
                    <div class="tour-duration">
                        <i class="far fa-clock mr-2"></i>
                        <span>{{ $item->duration_days }} Days</span>
                    </div>
                    <button class="tour-button">View Tour</button>
                </div>
            </div>
        </div>

        @endforeach
        
        
    </div>

    <!-- Pagination -->
    <div class="flex justify-center mt-12 mb-16">
        <nav class="flex items-center space-x-2">
            <a href="#" class="px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="px-4 py-2 text-white bg-primary rounded-lg font-semibold">1</a>
            <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">2</a>
            <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">3</a>
            <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">4</a>
            <span class="px-2 py-2 text-gray-500">...</span>
            <a href="#" class="px-4 py-2 text-gray-700 rounded-lg hover:bg-gray-100">10</a>
            <a href="#" class="px-4 py-2 text-gray-500 rounded-lg hover:bg-gray-100">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>


@endsection

 <script>
        // Simple animation for cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.tour-card');
            
            cards.forEach((card, index) => {
                // Add slight delay for staggered animation
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 + (index * 100));
            });
        });
    </script>