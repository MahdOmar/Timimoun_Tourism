@extends('layouts.layout')

@section('content')
  <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Find Your Perfect Rental</h1>
            <p class="text-xl mb-8">Discover the best cars, quads, houses, and apartments for rent</p>
            
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-2 flex flex-col md:flex-row">
                <input type="text" placeholder="What are you looking for?" class="flex-grow p-4 text-gray-700 rounded-l-lg focus:outline-none">
                <input type="text" placeholder="Location" class="p-4 text-gray-700 border-t md:border-t-0 md:border-l border-gray-300 focus:outline-none">
                <button class="bg-blue-600 text-white px-6 py-4 rounded-lg mt-2 md:mt-0 md:rounded-r-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-12">Browse by Category</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-car text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Cars</h3>
                <p class="text-gray-600 text-sm">1,240 listings</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-motorcycle text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Quads</h3>
                <p class="text-gray-600 text-sm">580 listings</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Houses</h3>
                <p class="text-gray-600 text-sm">890 listings</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-red-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Apartments</h3>
                <p class="text-gray-600 text-sm">1,520 listings</p>
            </div>
        </div>
    </div>

    <!-- Featured Listings -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Featured Listings</h2>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800">View all <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Car Card -->
                @foreach ($rentals as $item)
              
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $item->main_image) }}" 
                             alt="Luxury Car" class="w-full h-48 object-cover">
                        <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-2 py-1 rounded"> {{ $item->type }}</span>
                        <span class="absolute top-4 right-4 bg-white text-gray-800 text-xs px-2 py-1 rounded font-medium">{{ $item->price }} / {{ $item->unit }}</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
                        <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i> {{ $item->getTranslation('address', app()->getLocale()) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span class="font-medium">{{ round($item->averageRating()) }}</span>
                                <span class="text-gray-500 ml-1">({{ count($item->reviews) }} reviews)</span>
                            </div>
                           <a href="{{ route('rental.show',$item->id) }}"> <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                                View Details</a>
                            </button>
                        </div>
                    </div>
                </div>
                  @endforeach
               
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-600 text-2xl font-bold">1</span>
                </div>
                <h3 class="font-semibold text-xl mb-4">Find the Perfect Rental</h3>
                <p class="text-gray-600">Browse through thousands of listings to find the perfect car, quad, house, or apartment.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-600 text-2xl font-bold">2</span>
                </div>
                <h3 class="font-semibold text-xl mb-4">Book Online</h3>
                <p class="text-gray-600">Book your rental with a few clicks. Secure payment and instant confirmation.</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-600 text-2xl font-bold">3</span>
                </div>
                <h3 class="font-semibold text-xl mb-4">Enjoy Your Rental</h3>
                <p class="text-gray-600">Pick up your rental or get the keys. Enjoy your experience with peace of mind.</p>
            </div>
        </div>
    </div>
@endsection('content')  

 <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add to favorites functionality
            const favoriteButtons = document.querySelectorAll('.favorite-btn');
            favoriteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.toggle('text-red-500');
                    this.classList.toggle('text-gray-400');
                });
            });
            
            // Rent now button functionality
            const rentButtons = document.querySelectorAll('button:contains("Rent Now")');
            rentButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const item = this.closest('.bg-white').querySelector('h3').textContent;
                    alert(`You are about to rent: ${item}`);
                });
            });
        });
    </script>