@extends('layouts.layout')

@section('content')
  <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('messages.rental.title') }}</h1>
            <p class="text-xl mb-8">{{ __('messages.rental.subtitle') }}</p>
            
           
        </div>
    </div>

    <!-- Categories -->
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-12">{{ __('messages.rental.browse_category') }}</h2>
        
        <div class="grid type-grid grid-cols-2 md:grid-cols-5 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item active">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    
                    <i class="fa-solid fa-border-all text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2" data-name="All">{{ __('messages.rental.categories.all') }}</h3>
                <p class="text-gray-600 text-sm">1,240 {{ __('messages.rental.listing') }}</p>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item ">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-car text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2" data-name="cars">{{ __('messages.rental.categories.cars') }}</h3>
                <p class="text-gray-600 text-sm">1,240 {{ __('messages.rental.listing') }}</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-motorcycle text-green-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2" data-name="quad">{{ __('messages.rental.categories.quad') }}</h3>
                <p class="text-gray-600 text-sm">580 {{ __('messages.rental.listing') }}</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item">
                <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-home text-purple-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2" data-name="house">{{ __('messages.rental.categories.house') }}</h3>
                <p class="text-gray-600 text-sm">890 {{ __('messages.rental.listing') }}</p>
            </div>
            
            <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow cursor-pointer type-item">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-red-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-lg mb-2" data-name="apartment">{{ __('messages.rental.categories.apartment') }}</h3>
                <p class="text-gray-600 text-sm">1,520 {{ __('messages.rental.listing') }}</p>
            </div>
        </div>
    </div>

    <!-- Featured Listings -->
    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold">{{ __('messages.rental.featured_listings') }}</h2>
                
        <div class="filter-grid">
            
            <div class="filter-group "  id="app" data-locale="{{ app()->getLocale() }}">
                <label class="filter-label">{{ __('messages.rental.sort_by') }}</label>
                <select class="filter-select" id="sort">
                    <option value="Default">{{ __('messages.rental.sort.default') }}</option>
                    <option value="Newest">{{ __('messages.rental.sort.newest') }}</option>
                    <option value="Rating">{{ __('messages.rental.sort.rating') }}</option>
                    <option value="Price">{{ __('messages.rental.sort.price') }}</option>
                   
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
                        <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-2 py-1 rounded"> 
                             
                            @if ($item->type == '4x4_car')
                            {{ __('messages.rental.categories.4x4_cars') }}
                             @elseif( $item->type == 'light_car')
                            {{ __('messages.rental.categories.cars') }}
                                
                            @elseif( $item->type == 'quad')
                            {{ __('messages.rental.categories.quad') }}
                            @elseif($item->type == 'apartment')
                            {{ __('messages.rental.categories.apartment') }}
                            @elseif ($item->type == 'house')
                             {{ __('messages.rental.categories.house') }}
                                
                            @endif
                        </span>
                        <span class="absolute top-4 right-4 bg-white text-gray-800 text-xs px-2 py-1 rounded font-medium">{{ $item->price }} / @if (  $item->unit == 'day')
                            {{ __('messages.rental.card.day') }}
                            @elseif (  $item->unit == 'hour')
                            {{ __('messages.rental.card.hour') }}
                            
                        @endif</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
                        <p class="text-gray-600 mb-4"><i class="fas fa-map-marker-alt text-gray-400 mr-2"></i> {{ $item->getTranslation('address', app()->getLocale()) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i>
                                <span class="font-medium">{{ round($item->averageRating()) }}</span>
                                <span class="text-gray-500 m-2">({{ count($item->reviews) }} {{ __('messages.review') }})</span>
                            </div>
                           <a href="{{ route('rental.show',$item->id) }}"> <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
                               {{ __('messages.rental.card.btn') }}</a>
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
        <h2 class="text-3xl font-bold text-center mb-12"> {{ __('messages.rental.how_it_works') }}</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-600 text-2xl font-bold">1</span>
                </div>
                <h3 class="font-semibold text-xl mb-4">{{ __('messages.rental.step1_title') }}</h3>
                <p class="text-gray-600">{{ __('messages.rental.step1_desc') }}</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-600 text-2xl font-bold">2</span>
                </div>
                <h3 class="font-semibold text-xl mb-4">{{ __('messages.rental.step2_title') }}</h3>
                <p class="text-gray-600">{{ __('messages.rental.step2_desc') }}</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-600 text-2xl font-bold">3</span>
                </div>
                <h3 class="font-semibold text-xl mb-4">{{ __('messages.rental.step3_title') }}</h3>
                <p class="text-gray-600">{{ __('messages.rental.step3_desc') }}</p>
            </div>
        </div>
    </div>
@endsection('content') 

<script>
  
    const btn = @json(__('messages.rental.card.btn'));
    const day =  @json(     __('messages.rental.card.day')  );
    const night =  @json(     __('messages.rental.card.hour')  );
    const da = @json(     __('messages.DA')  );
    const review = @json(     __('messages.review')  );
    const cars=  @json(     __('messages.rental.categories.4x4_cars')  );
    const light_cars =  @json(     __('messages.rental.categories.light_cars')  );
    const quad =  @json(     __('messages.rental.categories.quad')  );
    const house =  @json(     __('messages.rental.categories.house')  );
    const appartement =  @json(     __('messages.rental.categories.apartment')  );
    const rentals =  @json(     __('messages.site.destinations_found')  );
   
</script>

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
         category = item.querySelector('h3').dataset.name;
         filter = document.getElementById('sort').value;
        sort(category,filter)
        console.log(category);
        
        

        
    });

      const viewOptions = document.getElementById('sort');

          viewOptions.addEventListener('change',()=> {

            filter = viewOptions.value;
           category = grid.querySelector('.type-item.active h3').dataset.name;

                    sort(category,filter)
                    console.log(category);


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

                 if(item.type == '4x4_car')
        {
            category = cars ;
        }
        else if(item.type == 'light_car' )
        {
            category = light_cars;
        }

         else if(item.type == 'quad')
        {
            category = quad;
        }

         else if(item.type == 'house')
        {
            category = house;
        }

         else if(item.type == 'apartment')
        {
            category = appartement;
        }

        if(item.unit == "day")
        {
            var duration= day;
        }
        else {
            var duration= night;
        }

   





           const html = `
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow">
        <div class="relative">
          <img src="{{ asset('storage/${item.main_image}') }}" 
               alt="${item.name[locale]}" class="w-full h-48 object-cover">
          <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-2 py-1 rounded">${category}</span>
          <span class="absolute top-4 right-4 bg-white text-gray-800 text-xs px-2 py-1 rounded font-medium">${item.price} ${da} / ${duration}</span>
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
              <span class="text-gray-500 m-1">(${item.reviews.length} ${review})</span>
            </div>
            <a href="/rentals/${item.id}">
              <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition-colors">
               ${btn}
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