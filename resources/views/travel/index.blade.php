@extends('layouts.layout')

@section('content')


   <header class="page-header">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">{{ __('messages.travel.title') }}</h1>
            <p class="page-subtitle">{{ __('messages.travel.subtitle') }}</p>
            
           
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
        <div class="results-count">{{ count($travels) }} {{ __('messages.travel.elements_found') }}</div>
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
                        <span class="text-gray-600">({{ count($item->reviews) }} {{ __('messages.review') }})</span>
                </div>
                
                <div class="agency-stats">
                    <div class="stat">
                        <span class="stat-value">12+</span>
                        <span class="stat-label">{{ __('messages.travel.year') }}</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">54</span>
                        <span class="stat-label">{{ __('messages.travel.countries') }}</span>
                    </div>
                    <div class="stat">
                        <span class="stat-value">5K+</span>
                        <span class="stat-label">{{ __('messages.travel.travlers') }}</span>
                    </div>
                </div>
                
                <div class="card-footer mt-4">
                    <div class="card-button mt-2">{{ __('messages.travel.btn') }}</div>
                </div>
            </div>
        </div></a>

        @endforeach
       
      
    </div>


@endsection