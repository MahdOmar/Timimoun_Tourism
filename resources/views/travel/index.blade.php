@extends('layouts.layout')

@section('content')
{{-- <section class="max-w-7xl mx-auto px-6 py-16">
  <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Travel Agencies</h2>

  <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
    @foreach($travels as $agency)
      <a href="{{ route('travel.show', $agency->id) }}" 
         class="group flex flex-col items-center text-center  shadow hover:shadow-lg transition p-6">
        
        <!-- Agency Image -->
        <img src="{{ asset('storage/' . $agency->main_image) }}" 
             alt="{{ $agency->getTranslation('name', app()->getLocale()) }}" 
             class="w-28 h-28 object-cover rounded-full mb-4 group-hover:scale-105 transition duration-300">

        <!-- Agency Name -->
        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-orange-600">
          {{ $agency->getTranslation('name', app()->getLocale()) }}
        </h3>

        <!-- Rating -->
        <div class="flex items-center justify-center mt-2 text-yellow-400">
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <span class="ml-2 text-sm text-gray-500">(23 reviews)</span>
        </div>
      </a>
    @endforeach
  </div>


</section>
 --}}

   <header class="page-header">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">Find Your Travel Agency</h1>
            <p class="page-subtitle">Discover the best travel agencies to plan your next adventure</p>
            
            <div class="search-container">
                <div class="flex bg-white rounded-full shadow-lg overflow-hidden">
                    <input type="text" placeholder="Search agencies, destinations, or specialties..." class="flex-grow px-6 py-4 text-gray-800 focus:outline-none">
                    <button class="bg-accent hover:bg-amber-600 px-8 py-4 text-white font-semibold">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- <!-- Filter Section -->
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
                <label class="filter-label">Specialty</label>
                <select class="filter-select">
                    <option>All Specialties</option>
                    <option>Adventure</option>
                    <option>Luxury</option>
                    <option>Family</option>
                    <option>Cultural</option>
                    <option>Beach</option>
                    <option>Wildlife</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Price Range</label>
                <select class="filter-select">
                    <option>Any Price Range</option>
                    <option>Budget</option>
                    <option>Mid-range</option>
                    <option>Luxury</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">Sort By</label>
                <select class="filter-select">
                    <option>Recommended</option>
                    <option>Highest Rated</option>
                    <option>Most Popular</option>
                    <option>Newest</option>
                </select>
            </div>
            
            <div class="filter-group flex items-end">
                <button class="w-full bg-primary hover:bg-blue-600 text-white py-3 rounded-lg font-semibold">
                    Apply Filters
                </button>
            </div>
        </div>
    </div> --}}

    <!-- Results Header -->
    <div class="results-header">
        <div class="results-count">Showing 8 of 42 agencies</div>
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

    <!-- Agencies Grid -->
    <div class="grid-container">
        <!-- Agency Card 1 -->
        @foreach ($travels as $item)
            <a href="{{ route('travel.show',$item->id) }}"> <div class="agency-card">
            <div class="card-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="World Explorers Travel" class="w-full h-full object-cover">
                
                <div class="card-wishlist">
                    <i class="fas fa-heart"></i>
                </div>
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
                            @for ( $i=0; $i < round($item->averageRating()); $i++ )
                                 <i class="fas fa-star"></i>
                            @endfor
                           
                           
                        </div>
                        <span class="text-gray-600">({{ count($item->reviews) }} reviews)</span>
                </div>
                
                <div class="agency-stats">
                    <div class="stat">
                        <span class="stat-value">12+</span>
                        <span class="stat-label">Years</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">54</span>
                        <span class="stat-label">Countries</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">5K+</span>
                        <span class="stat-label">Travelers</span>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="card-button">View Details</div>
                </div>
            </div>
        </div></a>

        @endforeach
       
      
    </div>


@endsection