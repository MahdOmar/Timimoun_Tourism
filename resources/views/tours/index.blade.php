@extends('layouts.layout')

@section('content')

 <header class="page-header">
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">{{ __('messages.tour.title') }}</h1>
            <p class="page-subtitle">{{ __('messages.tour.subtitle') }}</p>
            
            
        </div>
    </header>

    <!-- Filter Section -->
    <div class="filter-section">
        <div class="filter-grid">
            
            
            <div class="filter-group">
                <label class="filter-label">{{ __('messages.tour.filters.tour_type') }}</label>
                <select class="filter-select" id="category">
                    <option value="all">{{ __('messages.tour.tour_types.all') }}</option>
                    <option value="cars">{{ __('messages.tour.tour_types.cars') }}</option>
                    <option value="quads">{{ __('messages.tour.tour_types.quads') }}</option>
                    <option value="camels">{{ __('messages.tour.tour_types.camels') }}</option>
                  
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">{{ __('messages.tour.filters.duration') }}</label>
                <select class="filter-select" id="duration">
                    <option value="any">{{ __('messages.tour.duration_options.any') }}</option>
                    <option value="1">{{ __('messages.tour.duration_options.1') }}</option>
                    <option value="2">{{ __('messages.tour.duration_options.2') }}</option>
                    <option value="3">{{ __('messages.tour.duration_options.3') }}</option>
                    <option value=">3"> {{ __('messages.tour.duration_options.more') }}</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label class="filter-label">{{ __('messages.tour.filters.price_range') }}</label>
                <select class="filter-select" id="price">
                    <option value="all">{{ __('messages.tour.price_options.all') }}</option>
                    <option value="10000">{{ __('messages.tour.price_options.under_10000') }}</option>
                    <option value="10000-15000">{{ __('messages.tour.price_options.10000_15000') }}</option>
                    <option value="15000-20000">{{ __('messages.tour.price_options.15000_20000') }}</option>
                    <option value=">20000">{{ __('messages.tour.price_options.over_20000') }}</option>
                </select>
            </div>

            <div class="filter-group">
                <label class="filter-label">{{ __('messages.tour.filters.sort_by') }}</label>
                <select class="filter-select" id="sort">
                    <option value="default">{{ __('messages.tour.sort_options.default') }}</option>
                    <option value="Newest">{{ __('messages.tour.sort_options.newest') }}</option>
                    <option value="Rating">{{ __('messages.tour.sort_options.rating') }}</option>
                   
                </select>
            </div>
            
            <div class="filter-group flex items-end">
                <button type="button" class="w-full bg-primary hover:bg-blue-600 text-white py-3 rounded-lg font-semibold" onclick="sort()">
                   {{ __('messages.tour.filters.apply') }}
                </button>
            </div>
        </div>
    </div>

    <!-- Results Header -->
    <div class="results-header" id="app" data-locale="{{ app()->getLocale() }}">
        <div class="results-count" id="total">{{ count($tours) }} {{ __('messages.tour.elements_found') }}</div>
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

    <!-- Tours Grid -->
    <div class="tour-grid" id="tours-list">
        <!-- Tour Card 1 -->
        @foreach ($tours as $item)
         <a href="{{ route('tour.show',$item->id) }}">   <div class="tour-card">
            <div class="tour-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="Alpine Adventure" class="w-full h-full object-cover">
                <div class="tour-badge">
                    <span class="type-adventure">
                      @if ($item->category == 'cars')
                          {{ __('messages.tour.tour_types.cars') }}
                          
                      @elseif( $item->category == 'quads')
                          {{ __('messages.tour.tour_types.quads') }}
                      @elseif( $item->category == 'camels')
                          {{ __('messages.tour.tour_types.camels') }}    
                          
                      @endif
                    </span>
                   
                </div>
                <div class="tour-price">{{ $item->price }} {{ __('messages.DA') }}</div>
            </div>
            <div class="tour-content">
                <h3 class="tour-title">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
               
                <p class="text-gray-600 text-sm">{{ $item->getTranslation('description', app()->getLocale()) }}</p>
                
                <div class="tour-footer">
                    
                    <div class="tour-rating">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>{{ round($item->averageRating()) }} ({{ count($item->reviews) }} {{ __('messages.review') }})</span>
                    </div>
                </div>
                
                <div class="tour-meta">
                    <div class="tour-duration">
                        <i class="far fa-clock mr-2"></i>
                        <span>{{ $item->duration_days }} {{ __('messages.tour.card.days') }}</span>
                    </div>
                    <button class="tour-button">{{ __('messages.tour.card.btn') }}</button>
                </div>
            </div>
        </div></a>

        @endforeach
        
        
    </div>

   

@endsection

<script>
  
    
    const day =  @json(     __('messages.tour.card.days')  );
    const da = @json(     __('messages.DA')  );
    const btn =  @json(     __('messages.tour.card.btn')  );
    const review = @json(     __('messages.review')  );
    const tours =  @json(     __('messages.tour.elements_found')  );
    const cars =  @json(     __('messages.tour.tour_types.cars')  );
    const quads =  @json(     __('messages.tour.tour_types.quads')  );
    const camels =  @json(     __('messages.tour.tour_types.camels')  );
   
   
   
                                

</script>



 <script>
        // Simple animation for cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.tour-card');
            
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
        });


          function getAverageRating(reviews) {
    if (!reviews || reviews.length === 0) return 0; // prevent division by zero
    
    const sum = reviews.reduce((acc, review) => acc + review.rating, 0);
    return sum / reviews.length;
}


async function sort(){

   
   const container = document.getElementById("tours-list");

        let category = document.getElementById("category").value
        let duration = document.getElementById("duration").value
        let price = document.getElementById("price").value;
        let sort = document.getElementById("sort").value;

      

        // build query
        let params = new URLSearchParams({
            category:category,
            duration:duration,
            price: price,
            sort: sort,
           
        });


        console.log(params.toString());
       



      
        
         const response = await fetch(`/tours/sort/filter?${params.toString()}`, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            const data = await response.json();
             const container = document.getElementById('tours-list');
             const total = document.getElementById('total');
             total.textContent = data.tours.length + ' '+ tours;
             console.log(data);
            const locale = document.getElementById('app').dataset.locale;
             console.log(locale);
            container.innerHTML = '';
            
        
           data.tours.forEach(tour => {

             if(tour.category == 'cars')
        {
            category = cars ;
        }
        else if(tour.category == 'quads' )
        {
            category = quads;
        }

      
        else{
             category = camels;
        }



             // Generate stars
        let stars = "";
        for (let i = 0; i < getAverageRating(tour.reviews); i++) {
            stars += `<i class="fas fa-star text-yellow-400"></i>`;
        }

      
       

                      container.innerHTML +=  `
                  <a href="/tours/${tour.id}">
                    <div class="tour-card">
                      <div class="tour-image">
                        <img src="/storage/${tour.main_image}" alt="${tour.name[locale]}" class="w-full h-full object-cover">
                        <div class="tour-badge">
                          <span class="type-adventure">${category}</span>
                        </div>
                        <div class="tour-price">${tour.price} ${da}</div>
                      </div>
                      <div class="tour-content">
                        <h3 class="tour-title">${tour.name[locale]}</h3>
                        
                        <p class="text-gray-600 text-sm">${tour.description[locale]}</p>
                        <div class="tour-footer">
                          <div class="tour-rating">
                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                            <span>${Math.round(getAverageRating(tour.reviews))} (${tour.reviews.length} ${review})</span>
                          </div>
                        </div>
                        <div class="tour-meta">
                          <div class="tour-duration">
                            <i class="far fa-clock mr-2"></i>
                            <span>${tour.duration_days} ${day}</span>
                          </div>
                          <button class="tour-button">${btn}</button>
                        </div>
                      </div>
                    </div>
                  </a>
                `;

                
           });
           
            
            // console.log(data);
            // Update the accommodations list in the DOM
            // You would typically re-render the accommodations here
           
            
        } else {
            alert('Failed ');
        }
         
  
    }

        
    </script>