@extends('layouts.layout')

@section('content')



    <header class="page-header">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        
        <div class="container mx-auto px-4 relative">
            <h1 class="page-title">Discover Amazing Traditional Dishes</h1>
            <p class="page-subtitle">Explore the finest dining experiences from around the world</p>
            
            <div class="search-container">
                <div class="flex bg-white rounded-full shadow-lg overflow-hidden">
                    <input type="text" placeholder="Search restaurants, cuisines, or locations..." class="flex-grow px-6 py-4 text-gray-800 focus:outline-none">
                    <button class="bg-secondary hover:bg-orange-700 px-8 py-4 text-white font-semibold">
                        <i class="fas fa-search mr-2"></i>Search
                    </button>
                </div>
            </div>
        </div>
    </header>

 

    <!-- Main Content -->
    <h2 class="section-title">Featured Traditional Dishes</h2>
    
   
    
    <div class="results-header"  id="app" data-locale="{{ app()->getLocale() }}">
        <div class="results-count" id="total"> {{ count($food) }} Elements Found</div>
        <div class="filter-button">
            <i class="fas fa-filter mr-2"></i>Filters
        </div>
    </div>

    <!-- Style 1: Rounded cards with badges -->
    <h3 class="card-style-title">Rounded Cards</h3>
    <div class="grid-container" id="food">
        <!-- Restaurant Card 1 -->
        @foreach ($food as $item)
       <a href="{{ route('traditionaldish.show',$item->id) }}"> <div class="restaurant-card-1">
            <div class="card-image">
                <img src="{{ asset('storage/' . $item->main_image) }}" 
                     alt="Fine Dining Restaurant" class="w-full h-full object-cover">
               
               
                <div class="card-style-label"></div>
            </div>
            <div class="card-content">
                <h3 class="card-title">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
                
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
                  
                   <a href=""></a> <button class="card-button">Details</button>
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
             let stars = '';
        for (let i = 0; i < Math.round(getAverageRating(item.reviews)); i++) {
            stars += `<i class="fas fa-star"></i>`;
        }

        // Card HTML
        const card = `
        <a href="/foods/${item.id}">
            <div class="restaurant-card-1">
                <div class="card-image">
                    <img src="/storage/${item.main_image}" 
                         alt="${item.name[locale]}" class="w-full h-full object-cover">
                    <div class="card-badge">
                        <span class="tag tag-italian">${item.type}</span>
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
                        <span class="text-gray-600">(${item.reviews.length} reviews)</span>
                    </div>
                    
                    <div class="card-footer">
                        <div class="card-price">${item.min_price} - ${item.max_price} DA</div>
                        <button class="card-button">Reserve</button>
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