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
                <div class="flex flex-wrap gap-2 category">
                    <button class="px-4 py-2 bg-primary text-white rounded-full text-sm font-medium">All</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Pottery</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Textiles</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Woodwork</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Jewelry</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Leather</button>
                    <button class="px-4 py-2 bg-light text-neutral rounded-full text-sm font-medium hover:bg-primary hover:text-white transition">Metalwork</button>
                    <div class="filter-group "  id="app" data-locale="{{ app()->getLocale() }}">
               
                     <select class="filter-select" id="sort">
                    <option value="Default">Default</option>
                    <option value="Newest">Newest</option>
                    <option value="Rating">Rating</option>
                    <option value="Price">Price</option>
                   
                </select>
            </div>
                </div>
            </div>
        </div>
    </section>
   
            
            
            
        
       

    <!-- Products Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6" id="crafts-list">
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
             <div class="flex items-center ">
                 @if (round($item->averageRating()) > 0)
              <i class="fas fa-star text-yellow-400 mr-1"></i>
             
              <span class="font-medium"> 
                   {{ round($item->averageRating())   }}
              @else
                    @endif
              </span>
              <span class="text-gray-500 ml-1">({{ count($item->reviews) }} reviews)</span>
            
            </div>
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

<script>
     document.addEventListener('DOMContentLoaded', function() {
         const grid = document.querySelector('.category');
        let  category = null
       let filter = null

    grid.addEventListener('click', (e) => {
        const item = e.target.closest('button');
        if (!item) return; // ignore clicks outside .category-item

       
        

        // Remove active class from all
        grid.querySelectorAll('button').forEach(btn => {
           
            
            btn.classList.remove('bg-primary','text-white');
            btn.classList.add('bg-light', 'text-neutral','hover:text-white','hover:bg-primary');
        });

        // Add active class to clicked
        item.classList.add('bg-primary','text-white');

        // Example: get the category name
         category = item.textContent.trim();
         filter = document.getElementById('sort').value;
        sort(category,filter)
        
             

        
    });

      const viewOptions = document.getElementById('sort');

          viewOptions.addEventListener('change',()=> {

            filter = viewOptions.value;
           category = grid.querySelector('.category .bg-primary').textContent.trim();

                    sort(category,filter)

               

          })

         



         });

         
          function getAverageRating(reviews) {
    if (!reviews || reviews.length === 0) return 0; // prevent division by zero
    
    const sum = reviews.reduce((acc, review) => acc + review.rating, 0);
    return sum / reviews.length;
}


         


 async function sort(category,filter) {
      

    

         const response = await fetch(`/crafts/`+category+`/`+filter, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
           
            const data = await response.json();
            console.log(data);
            
            const container = document.getElementById('crafts-list');
            
           const locale = document.getElementById('app').dataset.locale;
            container.innerHTML = '';
            if(data.length == 0){
                container.innerHTML = '<p class="text-gray-600">No Crafts found in this category.</p>';
                return;
             }
            

            data.forEach(item => {
        const html = `
      <a href="/craft/${item.id}">
        <div class="craft-card bg-white rounded-lg overflow-hidden shadow-md cursor-pointer relative">
          <div class="h-60 bg-cover bg-center relative" style="background-image: url('storage/${item.main_image}');">
            <div class="info-overlay absolute inset-0 bg-black bg-opacity-70 flex flex-col justify-center items-center text-white p-4">
              <h3 class="text-lg font-bold text-center">${item.name[locale]}</h3>
              <p class="text-primary font-bold text-lg mt-2">${item.min_price}</p>
              <p class="text-sm text-center mt-2"></p>
            </div>
          </div>
          <div class="p-3">
            <h3 class="text-sm font-medium text-neutral truncate">${item.name[locale]}</h3>
             <div class="flex items-center ">
              <i class="fas fa-star text-yellow-400 mr-1"></i>
              <span class="font-medium">${Math.round(getAverageRating(item.reviews))}</span>
              <span class="text-gray-500 ml-1">(${item.reviews.length} reviews)</span>
            </div>
          </div>
          
        </div>
      </a>
    `;

    container.innerHTML += html;
        

                
            });
        
           
            
           
            
         } else {
            alert('Failed ');
         }
         
  
    }
</script>