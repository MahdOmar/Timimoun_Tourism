@extends('layouts.layout')

@section('content')

     <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl">
            <div class="relative h-96">
                <img src="{{ asset('storage/' . $travel->main_image) }}" 
                     alt="Wanderlust Travels" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-80"></div>
                <div class="absolute bottom-8 left-8 text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-2">{{ $travel->getTranslation('name', app()->getLocale()) }}</h1>
                    <div class="flex items-center space-x-4">
                        <span class="flex items-center">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span>4.9 (1,247 reviews)</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-map-marker-alt text-accent mr-1"></i>
                            <span>Worldwide Destinations</span>
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-award text-green-400 mr-1"></i>
                            <span>Travel Excellence {{ date('Y') }}</span>
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
                    <h2 class="text-3xl font-bold mb-4 text-dark">About Wanderlust Travels</h2>
                    <p class="text-lg mb-4 leading-relaxed">
                        Wanderlust Travels has been creating unforgettable travel experiences since 2008. We specialize in crafting personalized journeys that combine luxury, adventure, and cultural immersion. Our team of travel experts has explored every corner of the globe, bringing you insider knowledge and exclusive access.
                    </p>
                    <p class="text-lg mb-4 leading-relaxed">
                        We believe that travel has the power to transform lives, broaden perspectives, and create lasting memories. Whether you're seeking a relaxing beach getaway, an adventurous trek through mountains, or a deep cultural immersion, we design trips that exceed expectations.
                    </p>
                    {{-- <div class="bg-accent p-6 rounded-xl mt-6">
                        <h3 class="text-xl font-semibold mb-2 text-dark">Our Specialties</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-start">
                                <i class="fas fa-globe-americas text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Worldwide Destinations</h4>
                                    <p class="text-gray-700">From Bali to Barcelona, we offer global coverage</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-crown text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Luxury Experiences</h4>
                                    <p class="text-gray-700">5-star accommodations and exclusive access</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-hiking text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Adventure Tours</h4>
                                    <p class="text-gray-700">Thrilling experiences for adrenaline seekers</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-heart text-primary mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold">Honeymoon Packages</h4>
                                    <p class="text-gray-700">Romantic getaways for special moments</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </section>

                <!-- Services Section -->
                {{-- <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-dark">Our Services</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Flight Bookings</h3>
                            <p class="text-gray-700">We secure the best routes and prices with premium airlines worldwide.</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-hotel"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Accommodation</h3>
                            <p class="text-gray-700">From boutique hotels to luxury resorts, we have partnerships with the finest properties.</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-route"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Custom Itineraries</h3>
                            <p class="text-gray-700">Tailor-made travel plans designed around your interests and preferences.</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <div class="text-primary text-3xl mb-4">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">Transportation</h3>
                            <p class="text-gray-700">Private transfers, rental cars, and chauffeur services for seamless travel.</p>
                        </div>
                    </div>
                </section> --}}

                <!-- Gallery Section -->
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-6 text-dark">Travel Gallery</h2>
                    <div class="gallery-grid">
                      @foreach ($travel->gallery as $item)
                           <div class="gallery-item rounded-xl overflow-hidden">
                            <img src="{{ asset('storage/' . $item->path) }}" 
                                 alt="Nature" class="w-full h-full object-cover">
                        </div>
                      @endforeach
                       
                      
                    </div>
                </section>
            </div>

            <!-- Right Column -->
            <div class="w-full lg:w-4/12">
              

                <!-- Contact Info -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <h3 class="text-2xl font-bold mb-4 text-dark">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Address</h4>
                                <p class="text-gray-700">{{ $travel->getTranslation('address', app()->getLocale()) }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-phone text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Phone</h4>
                                <p class="text-gray-700">{{ $travel->phone }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Email</h4>
                                <p class="text-gray-700">{{ $travel->email }}</p>
                            </div>
                          
                        </div>
                          @if ($travel->website)
                          <div class="flex items-start">
                            <i class="fas fa-envelope text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Website</h4>
                                <a href="{{ $travel->website }}" class="text-gray-700">{{ $travel->website }}</a>
                            </div>
                              </div>
                                
                            @endif
                            
                        <div class="flex items-start">
                            <i class="fas fa-clock text-primary mt-1 mr-4"></i>
                            <div>
                                <h4 class="font-semibold">Office Hours</h4>
                                <p class="text-gray-700">Mon-Fri: 9am-7pm</p>
                                <p class="text-gray-700">Sat: 10am-5pm</p>
                                <p class="text-gray-700">Sun: 11am-4pm</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popular Destinations -->
                {{-- <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold mb-4 text-dark">Popular Destinations</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YmFsaXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=800&q=60" 
                                     alt="Bali" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Bali, Indonesia</h4>
                                <p class="text-gray-700 text-sm">From $1,299</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1593537612376-5fbe1a5fe30d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8c2FudG9yaW5pfGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" 
                                     alt="Santorini" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Santorini, Greece</h4>
                                <p class="text-gray-700 text-sm">From $1,899</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1582571352032-448f7928eca2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8a3lsYWElMjBtdXJ1fGVufDB8fDB8fHww&auto=format&fit=crop&w=800&q=60" 
                                     alt="Kyoto" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Kyoto, Japan</h4>
                                <p class="text-gray-700 text-sm">From $2,199</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGFyaXN8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=800&q=60" 
                                     alt="Paris" class="w-full h-full object-cover">
                            </div>
                            <div class="ml-4">
                                <h4 class="font-semibold">Paris, France</h4>
                                <p class="text-gray-700 text-sm">From $1,599</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
@endsection