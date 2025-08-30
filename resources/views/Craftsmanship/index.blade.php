@extends('layouts.layout')

@section('content')
 <section class="bg-gradient-to-r from-primary to-secondary text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover Local Craftsmanship</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Handmade with passion, tradition, and creativity. Explore unique pieces from local artisans in your community.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button class="bg-white text-primary px-6 py-3 rounded-full font-medium hover:bg-opacity-90 transition">Explore Collection</button>
                <button class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-full font-medium hover:bg-white hover:bg-opacity-10 transition">Meet Artisans</button>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <h2 class="text-xl font-bold text-neutral mb-4 md:mb-0">Browse by Category</h2>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-primary text-white rounded-full text-sm font-medium">All</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Pottery</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Textiles</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Woodwork</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Jewelry</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Glassware</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                <!-- Product Card 1 -->
                @foreach ($crafts as $item)
                   <a href="{{ route('craft.show',$item->id) }}"> <div class="craft-card bg-white rounded-lg overflow-hidden shadow-md cursor-pointer relative">
                    <div class="h-60 bg-cover bg-center relative" style="background-image: url('{{ asset('storage/'.$item->main_image) }}');">
                        <div class="info-overlay absolute inset-0 bg-black bg-opacity-70 flex flex-col justify-center items-center text-white p-4">
                            <h3 class="text-lg font-bold text-center">{{ ucfirst($item->getTranslation('name', app()->getLocale())) }}</h3>
                            <p class="text-primary font-bold text-lg mt-2">{{ $item->min_price}}</p>
                            <p class="text-sm text-center mt-2"></p>
                        </div>
                    </div>
                    <div class="p-3">
                        <h3 class="text-sm font-medium text-neutral truncate">{{ ucfirst($item->getTranslation('name', app()->getLocale())) }}</h3>
                    </div>
                </div></a>
                @endforeach
                

              
            </div>

            <div class="mt-12 text-center">
                <button class="px-6 py-3 border-2 border-primary text-primary rounded-full font-medium hover:bg-primary hover:text-white transition">
                    Load More Crafts
                </button>
            </div>
        </div>
    </section>







@endsection