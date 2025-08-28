@extends('layouts.layout')


@section('content')
   <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl">
            <div class="relative h-96">
                <img src="{{ asset('storage/' . $food->main_image) }}" 
                     alt="Gusto Italiano Restaurant" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                <div class="absolute bottom-8 left-8 text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-2 text-orange-500">{{ $food->getTranslation('name', app()->getLocale()) }}</h1>
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span>4.8 (428 reviews)</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-tag text-primary mr-1"></i>
                            <span>{{ $food->type}}</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-dollar-sign text-green-500 mr-1"></i>
                            <span>$$$</span>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column -->
            <div class="w-full lg:w-8/12">
                <!-- About Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4 text-orange-500">About {{ $food->getTranslation('name', app()->getLocale()) }}</h2>
                    <p class="text-lg mb-4 leading-relaxed">
                        Gusto Italiano brings the authentic taste of Italy to the heart of the city. Founded in 2005 by Master Chef Antonio Rossi, our restaurant combines traditional recipes with modern culinary techniques to create an unforgettable dining experience.
                    </p>
                    <p class="text-lg mb-4 leading-relaxed">
                        Our ingredients are sourced directly from Italy and local organic farms, ensuring the highest quality and freshness in every dish. The warm, inviting atmosphere makes Gusto Italiano the perfect place for romantic dinners, family gatherings, and business meetings.
                    </p>
                    <div class="bg-accent p-6 rounded-xl mt-6">
                        <h3 class="text-xl font-semibold mb-2 text-orange-500">Specialties</h3>
                        <ul class="list-disc list-inside">
                            <li>Handmade pasta with truffle sauce</li>
                            <li>Wood-fired Neapolitan pizza</li>
                            <li>Osso Buco alla Milanese</li>
                            <li>Tiramisu made from secret family recipe</li>
                        </ul>
                    </div>
                </section>

                <!-- Gallery Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-orange-500">Gallery</h2>
                    <div class="gallery-grid">
                      @foreach ($food->gallery as $item)
                          
                        <div class="gallery-item rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $item->path) }}" 
                                 alt="Restaurant food" class="w-full h-full object-cover">
                        </div>

                         @endforeach
                        
                    </div>
                </section>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-4/12">
                <!-- Reservation Card -->
                {{-- <div class="bg-white rounded-xl shadow-lg p-6 mb-8 sticky top-4">
                    <h3 class="text-2xl font-bold mb-4 text-dark">Make a Reservation</h3>
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Date</label>
                            <input type="date" class="w-full p-3 border border-gray-300 rounded-lg">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Time</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg">
                                <option>6:00 PM</option>
                                <option>6:30 PM</option>
                                <option>7:00 PM</option>
                                <option>7:30 PM</option>
                                <option>8:00 PM</option>
                                <option>8:30 PM</option>
                                <option>9:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Party Size</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg">
                                <option>1 person</option>
                                <option>2 people</option>
                                <option>3 people</option>
                                <option>4 people</option>
                                <option>5 people</option>
                                <option>6 people</option>
                                <option>7+ people</option>
                            </select>
                        </div>
                        <button class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-red-600 transition duration-300">
                            Check Availability
                        </button>
                    </form>
                </div> --}}

                <!-- Contact Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-4 text-orange-500">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold  ">Address</h4>
                                <p class="text-gray-600">{{ $food->getTranslation('address', app()->getLocale()) }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Phone</h4>
                                <p class="text-gray-600">{{ $food->phone}}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <p class="text-gray-600">{{ $food->email}}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-clock text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Hours</h4>
                                <p class="text-gray-600">Mon-Thu: 11am-10pm</p>
                                <p class="text-gray-600">Fri-Sat: 11am-11pm</p>
                                <p class="text-gray-600">Sun: 12pm-9pm</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold mb-4 text-orange-500">Price Range</h3>
                    <div class="mb-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-700">Price Range</span>
                            <span class="text-gray-700">{{ $food->min_price }} - {{ $food->max_price }} DA</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary h-2.5 rounded-full" style="width: 45%"></div>
                        </div>
                    </div>
                   
                    <div class="mt-6 bg-secondary p-4 rounded-lg">
                        <p class="text-dark font-semibold">Average meal: {{ (($food->min_price + $food->max_price) /2) - 300  }} - {{ (($food->min_price + $food->max_price) /2) + 300  }} per person</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection


