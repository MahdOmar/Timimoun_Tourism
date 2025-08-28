@extends('layouts.layout')

@section('content')
{{-- <section class="py-16 bg-gray-50">
  <div class="max-w-9xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Local Events</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Filters -->
      <aside class="bg-white shadow-md rounded-lg p-5 h-fit">
        <h3 class="text-lg font-semibold mb-4">Filter Events</h3>

        <!-- Upcoming / Past -->
        <div class="mb-4">
          <label class="block font-medium text-sm text-gray-700 mb-2">Show</label>
          <select name="status" class="w-full border-gray-300 rounded-lg">
            <option value="upcoming" selected>Upcoming Events</option>
            <option value="past">Past Events</option>
            <option value="all">All Events</option>
          </select>
        </div>

        <!-- Duration -->
        <div class="mb-4">
          <label class="block font-medium text-sm text-gray-700 mb-2">Duration</label>
          <select name="duration" class="w-full border-gray-300 rounded-lg">
            <option value="all" selected>All Durations</option>
            <option value="short">Short (≤ 1 day)</option>
            <option value="medium">Medium (2–3 days)</option>
            <option value="long">Long (≥ 4 days)</option>
          </select>
        </div>

        <!-- Filter Button -->
        <button type="submit"
          class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-500 transition">
          Apply Filters
        </button>
      </aside>

      <!-- Events Grid -->
      <div class="md:col-span-3 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
          @php
            $start = \Carbon\Carbon::parse($event->start_date);
            $end   = \Carbon\Carbon::parse($event->end_date);
            $days  = $start->diffInDays($end) + 1;
          @endphp

          <!-- Reuse the modern event card we styled -->
          <div class="relative bg-white overflow-hidden shadow-md group hover:shadow-2xl transition transform hover:-translate-y-1 flex flex-col">
            <div class="relative h-96">
              <img src="{{ asset('storage/' . $event->main_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
              <div class="absolute top-4 left-4 bg-white shadow-md rounded-lg px-3 py-2 text-center">
                <div class="text-lg font-bold text-red-600 leading-none">{{ $start->format('d') }}</div>
                <div class="text-xs uppercase text-gray-600">{{ $start->format('M') }}</div>
              </div>
            </div>
            <div class="flex-1 p-5 flex flex-col">
              <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-red-600 transition">
                {{ $event->getTranslation('name', app()->getLocale()) }}
              </h3>
              <p class="text-gray-600 text-sm mb-4 flex-1">{{ Str::limit($event->getTranslation('description', app()->getLocale()), 90) }}</p>
              <span class="text-xs text-gray-500 mb-3">Duration: {{ $days }} day(s)</span>
              <a href="{{ route('event.show', $event->id) }}" class="mt-auto inline-block text-center bg-red-600 text-white px-4 py-2  hover:bg-red-500 transition font-medium">
                View Details
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section> --}}

<main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl relative bg-gradient-to-r from-purple-600 to-indigo-700 text-white">
            <div class="p-12 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover Amazing Events</h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">Find and attend events that match your interests. From concerts to conferences, we have it all.</p>
                <div class="flex flex-col sm:flex-row justify-center max-w-2xl mx-auto">
                    <input type="text" placeholder="Search events, artists, or categories..." class="px-6 py-3 rounded-l-lg sm:rounded-r-none rounded-r-lg sm:w-2/3 text-gray-800">
                    <select class="px-4 py-3 bg-white text-gray-800 sm:rounded-none sm:w-1/4">
                        <option>All Cities</option>
                        <option>New York</option>
                        <option>Los Angeles</option>
                        <option>Chicago</option>
                        <option>Miami</option>
                    </select>
                    <button class="bg-accent hover:bg-amber-600 px-6 py-3 rounded-r-lg sm:rounded-l-none rounded-l-lg mt-2 sm:mt-0 sm:w-1/4 font-semibold">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </section>

        <!-- Category Filters -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-6 text-dark">Popular Categories</h2>
            <div class="flex flex-wrap gap-4">
                <button class="category-filter active px-6 py-2 bg-primary text-white rounded-full font-medium">
                    All Events
                </button>
                <button class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium">
                    <i class="fas fa-music mr-2"></i>Festival
                </button>
                <button class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium">
                    <i class="fas fa-theater-masks mr-2"></i>Concert
                </button>
                <button class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>Cultural
                </button>
                <button class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium">
                    <i class="fas fa-utensils mr-2"></i>Exihbition
                </button>
                <button class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium">
                    <i class="fas fa-running mr-2"></i>Sports
                </button>
                <button class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium">
                    <i class="fas fa-microphone mr-2"></i>Other
                </button>
            </div>
        </section>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="w-full lg:w-1/4">
                <div class="bg-white p-6 rounded-xl shadow-lg sticky top-4">
                    <h2 class="text-xl font-bold mb-6 text-dark">Filters</h2>
                    
                    <!-- Date Filter -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Date</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="radio" id="anydate" name="date" class="h-5 w-5 text-primary" checked>
                                <label for="anydate" class="ml-2 text-gray-700">Any Date</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="today" name="date" class="h-5 w-5 text-primary">
                                <label for="today" class="ml-2 text-gray-700">Today</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="tomorrow" name="date" class="h-5 w-5 text-primary">
                                <label for="tomorrow" class="ml-2 text-gray-700">Tomorrow</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="weekend" name="date" class="h-5 w-5 text-primary">
                                <label for="weekend" class="ml-2 text-gray-700">This Weekend</label>
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="date" class="w-full p-2 border border-gray-300 rounded-lg">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price Range -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Price Range</h3>
                        <input type="range" min="0" max="500" value="100" class="price-range w-full mb-4">
                        <div class="flex justify-between text-gray-600">
                            <span>$0</span>
                            <span>$500+</span>
                        </div>
                        <div class="mt-2 text-center font-medium text-primary">Up to $100</div>
                    </div>
                    
                    <!-- Location -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Location</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="online" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="online" class="ml-2 text-gray-700">Online Events</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="ny" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="ny" class="ml-2 text-gray-700">New York</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="la" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="la" class="ml-2 text-gray-700">Los Angeles</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="chi" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="chi" class="ml-2 text-gray-700">Chicago</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="mia" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="mia" class="ml-2 text-gray-700">Miami</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Event Type -->
                    <div class="mb-8">
                        <h3 class="font-semibold mb-4">Event Type</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input type="checkbox" id="free" class="checkbox h-5 w-5 text-primary rounded" checked>
                                <label for="free" class="ml-2 text-gray-700">Free Events</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="paid" class="checkbox h-5 w-5 text-primary rounded" checked>
                                <label for="paid" class="ml-2 text-gray-700">Paid Events</label>
                            </div>
                            <div class="flex items-center">
                                <input type="checkbox" id="private" class="checkbox h-5 w-5 text-primary rounded">
                                <label for="private" class="ml-2 text-gray-700">Private Events</label>
                            </div>
                        </div>
                    </div>
                    
                    <button class="w-full bg-primary text-white py-3 rounded-lg font-semibold hover:bg-purple-700">
                        Apply Filters
                    </button>
                    <button class="w-full mt-3 border border-gray-300 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-100">
                        Reset Filters
                    </button>
                </div>
            </div>

            <!-- Event Listings -->
            <div class="w-full lg:w-3/4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-dark">128 Events Found</h2>
                    <div class="flex items-center">
                        <span class="text-gray-600 mr-3">Sort by:</span>
                        <select class="border border-gray-300 rounded-lg px-4 py-2">
                            <option>Date: Soonest First</option>
                            <option>Date: Latest First</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Most Popular</option>
                        </select>
                    </div>
                </div>

                <!-- Event Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    <!-- Event Card 1 -->
                    @foreach ($events as $event)
                        <a href="{{ route('event.show',$event->id) }}"> <div class="event-card bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $event->main_image) }}" 
                                 alt="Summer Music Festival" class="w-full h-48 object-cover">
                            <div class="date-badge">
                                <div class="text-sm">{{ \Carbon\Carbon::parse($event->start_date)->format('M')}}</div>
                                <div class="text-lg">{{ \Carbon\Carbon::parse($event->start_date)->format('d')}}</div>
                            </div>
                            <div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold px-3 py-1 rounded-full">
                                <i class="fas fa-music mr-1"></i> {{ $event->category }}
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold mb-2">{{ $event->getTranslation('name', app()->getLocale()) }}</h3>
                            <p class="text-gray-600 mb-4">{{ $event->getTranslation('description', app()->getLocale()) }}</p>
                            <div class="flex items-center text-gray-500 mb-4">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span class="mr-4">{{ $event->getTranslation('address', app()->getLocale()) }}</span>
                                <i class="fas fa-clock mr-2"></i>
                                <span>7:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-2xl font-bold text-primary">@if ($event->price == 0)
                                        Free
                                        
                                    @else
                                        {{ $event->price }}
                                    @endif</span>
                                    <span class="text-gray-600">/person</span>
                                </div>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                                    Get Tickets
                                </button>
                            </div>
                        </div>
                    </div></a>

                    @endforeach
                   
                   
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
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
            </div>
        </div>
    </main>

    <!-- Newsletter Section -->
    <section class="bg-primary text-white py-12 mt-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Never Miss an Event Again</h2>
            <p class="text-purple-100 mb-8 max-w-2xl mx-auto">Subscribe to our newsletter and get updates on the best events in your city.</p>
            <div class="flex flex-col sm:flex-row justify-center max-w-2xl mx-auto">
                <input type="email" placeholder="Your email address" class="px-6 py-3 rounded-l-lg sm:rounded-r-none rounded-r-lg sm:w-2/3 text-gray-800">
                <button class="bg-accent hover:bg-amber-600 px-6 py-3 rounded-r-lg sm:rounded-l-none rounded-l-lg mt-2 sm:mt-0 sm:w-1/3 font-semibold">
                    Subscribe
                </button>
            </div>
        </div>
    </section>

@endsection
