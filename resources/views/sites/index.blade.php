@extends('layouts.layout')

@section('content')

{{-- <div class="bg-gray-50 min-h-screen p-4">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-8"> Places to Visit in Timimoun</h1>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($sites as $site)
          
      
    
        <div class="bg-white  shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
          <img src="{{ asset('storage/'.$site->main_image) }}" alt="" class="w-full h-96 object-cover hover:scale-105 transition-transform duration-500" />
          
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ $site->getTranslation('name', app()->getLocale()) }}</h2>
            <p class="text-gray-600 text-sm">{{ $site->getTranslation('description', app()->getLocale()) }}</p>
            
            <a href="{{ route('site.show', $site->id) }}"
               class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
              View more →
            </a>
          </div>
        </div>
        @endforeach
        
          
     
    </div>

    <!-- Pagination (if applicable) -->
    <div class="mt-10">
     
    </div>
  </div>
</div> --}}



<header class="page-header">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">{{ __('messages.site.title') }}</h1>
            <p class="page-subtitle">{{ __('messages.site.subtitle') }}</p>
            
            <div class="search-container">
                <div class="flex bg-white rounded-full shadow-lg overflow-hidden">
                    <input type="text" placeholder="Search destinations, landmarks, or experiences..." class="flex-grow px-6 py-4 text-gray-800 focus:outline-none">
                    <button class="bg-secondary hover:bg-blue-600 px-8 py-4 text-white font-semibold">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Category Section -->
    <div class="category-section">
        <div class="category-grid">

             <div class="category-item active " >
                <div class="category-icon">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <div class="category-name " >{{ __('messages.site.categories.all') }}</div>
            </div>


            <div class="category-item " >
                <div class="category-icon">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <div class="category-name " >{{ __('messages.site.categories.monument') }}</div>
            </div>
            
            <div class="category-item" >
                <div class="category-icon">
                    <i class="fas fa-mountain"></i>
                </div>
                <div class="category-name" >{{ __('messages.site.categories.museum') }}</div>
            </div>
            
            <div class="category-item" >
                <div class="category-icon">
                    <i class="fas fa-city"></i>
                </div>
                <div class="category-name" >{{ __('messages.site.categories.natural') }}</div>
            </div>
            
            <div class="category-item" >
                <div class="category-icon">
                    <i class="fas fa-monument"></i>
                </div>
                <div class="category-name" >{{ __('messages.site.categories.historical') }}</div>
            </div>
            
            <div class="category-item" >
                <div class="category-icon">
                    <i class="fas fa-hiking"></i>
                </div>
                <div class="category-name">{{ __('messages.site.categories.religious') }}</div>
            </div>
            
            <div class="category-item" >
                <div class="category-icon">
                    <i class="fas fa-tree"></i>
                </div>
                <div class="category-name">{{ __('messages.site.categories.other') }}</div>
            </div>
            
          
        </div>
    </div>

    <!-- Main Content -->
    <h2 class="section-title">{{ __('messages.site.categories.featured_destinations') }}</h2>
    
    <div class="view-options">
        <div class="view-option active" >{{ __('messages.site.view.all') }}</div>
        <div class="view-option cursor-pointor hover:bg-primary hover:text-white" >{{ __('messages.site.view.new') }}</div>
        <div class="view-option cursor-pointor hover:bg-primary hover:text-white" >{{ __('messages.site.view.rating') }}</div>
        <div class="view-option cursor-pointor hover:bg-primary hover:text-white" >{{ __('messages.site.view.recommended') }}</div>
    </div>
    
    <div class="results-header" id="app" data-locale="{{ app()->getLocale() }}">
        <div class="results-count" id="total">{{ count($sites) }} {{ __('messages.site.destinations_found') }}</div>
        <div class="filter-button">
            <i class="fas fa-filter mr-2"></i>{{ __('messages.site.filters') }}
        </div>
    </div>

    <!-- Destinations Grid -->
    <div class="grid-container" id="destinations">
        <!-- Destination Card 1 -->
        @foreach ($sites as $item)
      <a href="{{ route('site.show',$item->id) }}">   <div class="destination-card">

            <div class="card-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="Bali Beach" class="w-full h-full object-cover">
                <div class="card-badge">
                    <span class="tag tag-beach">{{ $item->type }}</span>
                   
                </div>
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
                
                <div class="card-footer">
                    <div class="card-price"> @if ($item->price == 0) {{ __('messages.site.card.price') }}
                      
                    @else
                      {{ $item->price }}
                    @endif </div>
                    <button class="card-button">{{ __('messages.site.card.explore') }}</button>
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



@endsection('content')  

 <script>
        // Simple animation for cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.destination-card');
            
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
                        this.style.background = '#1D4ED8';
                        this.style.color = 'white';
                    } else {
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        this.style.background = 'rgba(255, 255, 255, 0.9)';
                        this.style.color = '#1D4ED8';
                    }
                });
            });
        });

 document.addEventListener('DOMContentLoaded', function() {
         const grid = document.querySelector('.category-grid');
        let  category = null
       let filter = null

    grid.addEventListener('click', (e) => {
        const item = e.target.closest('.category-item');
        if (!item) return; // ignore clicks outside .category-item

        // Remove active class from all
        grid.querySelectorAll('.category-item').forEach(btn => {
            btn.classList.remove('active');
        });

        // Add active class to clicked
        item.classList.add('active');

        // Example: get the category name
         category = item.querySelector('.category-name').textContent.trim();
         filter = document.querySelector('.view-option.active').textContent.trim();
        
          sort(category,filter);
        
    });

         const viewOptions = document.querySelector('.view-options');

        viewOptions.addEventListener('click', (e) => {
        const option = e.target.closest('.view-option');
        if (!option) return; // click happened outside

        // Remove active from all
        viewOptions.querySelectorAll('.view-option').forEach(opt => {
            opt.classList.remove('active');
        });

        // Set clicked one active
        option.classList.add('active');

          filter = option.textContent.trim();
          category = document.querySelector('.category-item.active').textContent.trim();
          sort(category,filter);
       
        });

         });

         function getAverageRating(reviews) {
    if (!reviews || reviews.length === 0) return 0; // prevent division by zero
    
    const sum = reviews.reduce((acc, review) => acc + review.rating, 0);
    return sum / reviews.length;
}




      async function sort(category,filter) {
      

    

         const response = await fetch(`/sites/`+category+`/`+filter, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
           
            const data = await response.json();
            const container = document.getElementById('destinations');
            const total = document.getElementById('total');
             total.textContent = data.length + ' Destinations Found';
            console.log(data);
           const locale = document.getElementById('app').dataset.locale;
            console.log(locale);
            container.innerHTML = '';
            if(data.length == 0){
                container.innerHTML = '<p class="text-gray-600">No events found in this category.</p>';
                return;
            }
            

            data.forEach(item => {
           const card = `
                    <a href="/sites/${item.id}">
                        <div class="destination-card">
                            <div class="card-image">
                                <img src="/storage/${item.main_image}" 
                                     alt="${item.name.en}" class="w-full h-full object-cover">
                                <div class="card-badge">
                                    <span class="tag tag-beach">${item.type}</span>
                                </div>
                                <div class="card-wishlist">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title">${item.name[locale]}</h3>
                                <div class="card-location">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>${item.address[locale]}</span>
                                </div>
                                <p class="card-description">${item.description[locale]}</p>
                                
                                <div class="card-rating">
                                    <div class="flex text-yellow-400 mr-2">
                                        ${'<i class="fas fa-star"></i>'.repeat(Math.round(getAverageRating(item.reviews)))}
                                    </div>
                                    <span class="text-gray-600">(${item.reviews.length} reviews)</span>
                                </div>
                                
                                <div class="card-footer">
                                    <div class="card-price">
                                       Free
                                    </div>
                                    <button class="card-button">Explore</button>
                                </div>
                            </div>
                        </div>
                    </a>
                `;
                  container.innerHTML += card;
        

                
            });
           
            
            console.log(data);
          //  Update the accommodations list in the DOM
            //You would typically re-render the accommodations here
           
            
        } else {
            alert('Failed ');
        }
         
  
    }










    </script>