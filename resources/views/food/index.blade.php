@extends('layouts.layout')

@section('content')

{{-- <!-- Hero Section -->
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
</section> --}}

    <header class="page-header">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">Discover Amazing Restaurants</h1>
            <p class="page-subtitle">Explore the finest dining experiences from around the world</p>
            
            <div class="search-container">
                <div class="flex bg-white rounded-full shadow-lg overflow-hidden">
                    <input type="text" placeholder="Search restaurants, cuisines, or locations..." class="flex-grow px-6 py-4 text-gray-800 focus:outline-none">
                    <button class="bg-secondary hover:bg-orange-700 px-8 py-4 text-white font-semibold">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Category Section -->
    <div class="category-section">
        <div class="category-grid">
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="category-name">Fine Dining</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-pizza-slice"></i>
                </div>
                <div class="category-name">Casual</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="category-name">Vegetarian</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-fish"></i>
                </div>
                <div class="category-name">Seafood</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-ice-cream"></i>
                </div>
                <div class="category-name">Desserts</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-mug-hot"></i>
                </div>
                <div class="category-name">Cafés</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-cheese"></i>
                </div>
                <div class="category-name">Bars</div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <h2 class="section-title">Featured Restaurants</h2>
    
    <div class="view-options">
        <div class="view-option active">All</div>
        <div class="view-option">Popular</div>
        <div class="view-option">New</div>
        <div class="view-option">Recommended</div>
    </div>
    
    <div class="results-header">
        <div class="results-count">Showing 12 of 64 restaurants</div>
        <div class="filter-button">
            <i class="fas fa-filter mr-2"></i>Filters
        </div>
    </div>

    <!-- Style 1: Rounded cards with badges -->
    <h3 class="card-style-title">Rounded Cards</h3>
    <div class="grid-container">
        <!-- Restaurant Card 1 -->
        @foreach ($food as $item)
       <a href="{{ route('food.show',$item->id) }}"> <div class="restaurant-card-1">
            <div class="card-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="Fine Dining Restaurant" class="w-full h-full object-cover">
                <div class="card-badge">
                    <span class="tag tag-italian">{{ $item->type }}</span>
                    
                </div>
                <div class="card-wishlist">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="card-style-label"></div>
            </div>
            <div class="card-content">
                <h3 class="card-title">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
                <div class="card-location">
                    <i class="fas fa-map-marker-alt mr-2"></i>
                    <span>{{ $item->getTranslation('address', app()->getLocale()) }}</span>
                </div>
                <p class="card-description">{{ $item->getTranslation('description', app()->getLocale()) }}</p>
                
                <div class="card-rating">
                    <div class="flex text-yellow-400 mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span>4.8 (124 reviews)</span>
                </div>
                
                <div class="card-footer">
                    <div class="card-price">{{ $item->min_price }} - {{ $item->max_price }} DA</div>
                    <button class="card-button">Reserve</button>
                </div>
            </div>
        </div></a>

            
        @endforeach
        
        
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <div class="pagination-button">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="pagination-button active">1</div>
        <div class="pagination-button">2</div>
        <div class="pagination-button">3</div>
        <div class="pagination-button">4</div>
        <div class="pagination-button">5</div>
        <div class="pagination-button">
            <i class="fas fa-chevron-right"></i>
        </div>
    </div>

    <script>
        // Simple animation for cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.restaurant-card-1, .restaurant-card-2, .restaurant-card-3, .restaurant-card-4');
            
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
            
            // Add click event to wishlist icons
            const wishlistIcons = document.querySelectorAll('.card-wishlist');
            wishlistIcons.forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.stopPropagation();
                    this.classList.toggle('active');
                    if (this.classList.contains('active')) {
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        this.style.background = '#DC2626';
                        this.style.color = 'white';
                    } else {
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        this.style.background = 'rgba(255, 255, 255, 0.9)';
                        this.style.color = '#DC2626';
                    }
                });
            });
        });
    </script>


@endsection