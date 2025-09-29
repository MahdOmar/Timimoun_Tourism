@extends('layouts.layout')

@section('content')



    <header class="page-header">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">{{ __('messages.food.restaurants_title') }}</h1>
            <p class="page-subtitle">{{ __('messages.food.restaurants_subtitle') }}</p>
           
        </div>
    </header>

    <!-- Category Section -->
    <div class="category-section">
        <div class="category-grid">
             <div class="category-item active " >
                <div class="category-icon">
                    <i class="fas fa-umbrella-beach"></i>
                </div>
                <div class="category-name " data-name="All" >{{ __('messages.food.food_categories.all') }}</div>
            </div>


            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="category-name" data-name="restaurant">{{ __('messages.food.food_categories.restaurant') }}</div>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-pizza-slice"></i>
                </div>
                <div class="category-name"  data-name="snack">{{ __('messages.food.food_categories.snack') }}</div>
            </div>
           
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-fish"></i>
                </div>
                <div class="category-name"  data-name="traditional">{{ __('messages.food.food_categories.traditional') }}</div>
            </div>
            
           
            
            <div class="category-item">
                <div class="category-icon">
                    <i class="fas fa-mug-hot"></i>
                </div>
                <div class="category-name" data-name="cafe">{{ __('messages.food.food_categories.cafe') }}</div>
            </div>
            
          
        </div>
    </div>

    <!-- Main Content -->
    <h2 class="section-title">{{ __('messages.food.featured_restaurants') }}</h2>
    
    <div class="view-options">
        <div class="view-option active" data-name="All">{{ __('messages.food.view.all') }}</div>
        <div class="view-option hover:bg-primary hover:text-white" data-name="Price: Low to High">{{ __('messages.food.view.price_low') }}</div>
        <div class="view-option hover:bg-primary hover:text-white" data-name="Price: High to Low">{{ __('messages.food.view.price_high') }}</div>
        <div class="view-option hover:bg-primary hover:text-white" data-name="Rating">{{ __('messages.food.view.rating') }}</div>
    </div>
    
    <div class="results-header"  id="app" data-locale="{{ app()->getLocale() }}">
        <div class="results-count" id="total"> {{ count($food) }} {{ __('messages.food.elements_found') }}</div>
        <div class="filter-button">
            <i class="fas fa-filter mr-2"></i>{{ __('messages.food.filters') }}
        </div>
    </div>

    <!-- Style 1: Rounded cards with badges -->
   
    <div class="grid-container" id="food">
        <!-- Restaurant Card 1 -->
        @foreach ($food as $item)
       <a href="{{ route('food.show',$item->id) }}"> <div class="restaurant-card-1">
            <div class="card-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="Fine Dining Restaurant" class="w-full h-full object-cover">
                <div class="card-badge">
                    <span class="tag tag-italian">
                        @if ($item->type == 'restaurant')
                            {{ __('messages.food.food_categories.restaurant') }}
                            
                        @elseif(($item->type == 'snack')) 
                            {{ __('messages.food.food_categories.snack') }} 
                           @elseif(($item->type == 'traditional')) 
                            {{ __('messages.food.food_categories.traditional') }}
                            @elseif(($item->type == 'cafe')) 
                            {{ __('messages.food.food_categories.cafe') }}
                             
                        @endif
                    </span>
                    
                </div>
                <div class="card-wishlist">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="card-style-label"></div>
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
                
                <div class="card-footer">
                    <div class="card-price">{{ $item->min_price }} - {{ $item->max_price }} {{ __('messages.DA') }}</div>
                    <button class="card-button">{{ __('messages.food.btn') }}</button>
                </div>
            </div>
        </div></a>

            
        @endforeach
        
        
    </div>

    <script>
  
    const btn = @json(__('messages.food.btn'));
    const da =  @json(     __('messages.DA')  );
    const review = @json(     __('messages.review')  );
    const restaurant =  @json(     __('messages.food.food_categories.restaurant')  );
    const snack =  @json(     __('messages.food.food_categories.snack')  );
    const traditional =  @json(     __('messages.food.food_categories.traditional')  );
    const cafe =  @json(     __('messages.food.food_categories.cafe')  );
    const food =  @json(     __('messages.food.elements_found')  );
   
         

</script>
    
    <script>
        // Simple animation for cards when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.restaurant-card-1, .restaurant-card-2, .restaurant-card-3, .restaurant-card-4');
            
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
                        this.style.background = '#DC2626';
                        this.style.color = 'white';
                    } else {
                        this.innerHTML = '<i class="fas fa-heart"></i>';
                        this.style.background = 'rgba(255, 255, 255, 0.9)';
                        this.style.color = '#DC2626';
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
         category = item.querySelector('.category-name').dataset.name;
         filter = document.querySelector('.view-option.active').dataset.name;
        
          sort(category,filter);
          console.log(category,filter);
          
        
        
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

          filter = option.dataset.name;
          category = document.querySelector('.category-item.active .category-name').dataset.name;
          sort(category,filter);
          console.log(category,filter);
          

       
        });

         });

            function getAverageRating(reviews) {
    if (!reviews || reviews.length === 0) return 0; // prevent division by zero
    
    const sum = reviews.reduce((acc, review) => acc + review.rating, 0);
    return sum / reviews.length;
}



   async function sort(category,filter) {
      

    

         const response = await fetch(`/food/`+category+`/`+filter, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
           
            const data = await response.json();
            const container = document.getElementById('food');
            const total = document.getElementById('total');
             total.textContent = data.length + ' '+ food;
            console.log(data);
           const locale = document.getElementById('app').dataset.locale;
            console.log(locale);
            container.innerHTML = '';
            if(data.length == 0){
                container.innerHTML = '<p class="text-gray-600">No events found in this category.</p>';
                return;
            }
            

            data.forEach(item => {

         if(item.type == 'restaurant')
        {
            category = restaurant ;
        }
        else if(item.type == 'snack' )
        {
            category = snack;
        }

         else if(item.type == 'traditional')
        {
            category = traditional;
        }

      
        else{
             category = cafe;
        }




             let stars = '';
        for (let i = 0; i < Math.round(getAverageRating(item.reviews)); i++) {
            stars += `<i class="fas fa-star"></i>`;
        }

        // Card HTML
        const card = `
        <a href="/food/${item.id}">
            <div class="restaurant-card-1">
                <div class="card-image">
                    <img src="/storage/${item.main_image}" 
                         alt="${item.name[locale]}" class="w-full h-full object-cover">
                    <div class="card-badge">
                        <span class="tag tag-italian">${category}</span>
                    </div>
                    <div class="card-wishlist">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="card-style-label"></div>
                </div>
                <div class="card-content">
                    <h3 class="card-title">${item.name[locale]}</h3>
                    <div class="card-location">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>${item.address[locale]}</span>
                    </div>
                    <p class="card-description">${item.description[locale]}</p>
                    
                    <div class="card-rating">
                        <div class="flex text-yellow-400 mr-2">${Math.round(getAverageRating(item.reviews))} ${stars}</div>
                        <span class="text-gray-600">(${item.reviews.length} ${review})</span>
                    </div>
                    
                    <div class="card-footer">
                        <div class="card-price">${item.min_price} - ${item.max_price} ${da}</div>
                        <button class="card-button">${btn}</button>
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


@endsection