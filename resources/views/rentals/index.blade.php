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
        
        <div class="grid type-grid grid-cols-2 md:grid-cols-5 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item active">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    
                    <i class="fa-solid fa-border-all text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">All</h3>
                <p class="text-gray-600 text-sm">1,240 listings</p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item ">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-car text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Cars</h3>
                <p class="text-gray-600 text-sm">1,240 listings</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-motorcycle text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Quad</h3>
                <p class="text-gray-600 text-sm">580 listings</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">House</h3>
                <p class="text-gray-600 text-sm">890 listings</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-red-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2">Apartment</h3>
                <p class="text-gray-600 text-sm">1,520 listings</p>
            </div>
        </div>
    </div>

    <!-- Featured Listings -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">Featured Listings</h2>
                
        <div class="filter-grid">
            
            <div class="filter-group "  id="app" data-locale="{{ app()->getLocale() }}">
                <label class="filter-label">Sort By</label>
                <select class="filter-select" id="sort">
                    <option value="Default">Default</option>
                    <option value="Newest">Newest</option>
                    <option value="Rating">Rating</option>
                    <option value="Price">Price</option>
                   
                </select>
            </div>
            
        
        </div>
  

            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="rentals">
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
         const grid = document.querySelector('.type-grid');
        let  category = null
       let filter = null

    grid.addEventListener('click', (e) => {
        const item = e.target.closest('.type-item');
        if (!item) return; // ignore clicks outside .category-item

        // Remove active class from all
        grid.querySelectorAll('.type-item').forEach(btn => {
            btn.classList.remove('active');
        });

        // Add active class to clicked
        item.classList.add('active');

        // Example: get the category name
         category = item.querySelector('h3').textContent.trim();
         filter = document.getElementById('sort').value;
        sort(category,filter)
        

        
    });

      const viewOptions = document.getElementById('sort');

          viewOptions.addEventListener('change',()=> {

            filter = viewOptions.value;
           category = grid.querySelector('.type-item.active h3').textContent.trim();

                    sort(category,filter)


          })

         



         });

         
          function getAverageRating(reviews) {
    if (!reviews || reviews.length === 0) return 0; // prevent division by zero
    
    const sum = reviews.reduce((acc, review) => acc + review.rating, 0);
    return sum / reviews.length;
}


         


async function sort(category,filter) {
      

    

         const response = await fetch(`/rentals/`+category+`/`+filter, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
           
            const data = await response.json();
            console.log(data);
            
            const container = document.getElementById('rentals');
            
           const locale = document.getElementById('app').dataset.locale;
            container.innerHTML = '';
            if(data.length == 0){
                container.innerHTML = '<p class="text-gray-600">No events found in this category.</p>';
                return;
             }
            

            data.forEach(item => {
           const html = `
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="relative">
          <img src="storage/${item.main_image}" 
               alt="${item.name[locale]}" class="w-full h-48 object-cover">
          <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-2 py-1 rounded">${item.type}</span>
          <span class="absolute top-4 right-4 bg-white text-gray-800 text-xs px-2 py-1 rounded font-medium">${item.price} / ${item.unit}</span>
        </div>
        <div class="p-6">
          <h3 class="font-bold text-xl mb-2">${item.name[locale]}</h3>
          <p class="text-gray-600 mb-4">
            <i class="fas fa-map-marker-alt text-gray-400 mr-2"></i> ${item.address[locale]}
          </p>
          <div class="flex items-center justify-between">
            <div class="flex items-center">
              <i class="fas fa-star text-yellow-400 mr-1"></i>
              <span class="font-medium">${Math.round(getAverageRating(item.reviews))}</span>
              <span class="text-gray-500 ml-1">(${item.reviews.length} reviews)</span>
            </div>
            <a href="/rentals/${item.id}">
              <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                View Details
              </button>
            </a>
          </div>
        </div>
      </div>
    `;

    container.innerHTML += html;
        

                
            });
        
           
            
           
            
        } else {
            alert('Failed ');
        }
         
  
    }








    </script>