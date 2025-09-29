@extends('layouts.layout')

@section('content')


<main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <section class="mb-12 rounded-2xl overflow-hidden shadow-xl relative bg-gradient-to-r from-purple-600 to-indigo-700 text-white">
            <div class="p-12 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4"> {{ __('messages.events.title') }}</h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto"> {{ __('messages.events.subtitle') }}</p>
                
            </div>
        </section>

        <!-- Category Filters -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-6 text-dark">{{ __('messages.events.categories.title') }}</h2>
            <div class="flex flex-wrap gap-4">
                <button class="category-filter  active px-6 py-2 bg-primary border border-gray-300 text-white rounded-full font-medium" onclick="sort(this)" data-name = "AllEvents">
                   {{ __('messages.events.categories.all') }}
                </button>
                <button id="Festival" data-name = "festival" class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium" onclick="sort(this)">
                    <i class="fas fa-music mr-2"></i>{{ __('messages.events.categories.festival') }}
                </button>
                <button id="Concert" data-name ='concert' class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium" onclick="sort(this)">
                    <i class="fas fa-theater-masks mr-2"></i>{{ __('messages.events.categories.concert') }}
                </button>
                <button id="Cultural" data-name ='cultural' class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium" onclick="sort(this)">
                    <i class="fas fa-chalkboard-teacher mr-2"></i>{{ __('messages.events.categories.cultural') }}
                </button>
                <button id="Exihbition" data-name ='exihbition' class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium" onclick="sort(this)">
                    <i class="fas fa-utensils mr-2"></i>{{ __('messages.events.categories.exhibition') }}
                </button>
                <button  id="Sports" data-name ='sports' class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium" onclick="sort(this)">
                    <i class="fas fa-running mr-2"></i>{{ __('messages.events.categories.sports') }}
                </button>
                <button id="Other" data-name ='other' class="category-filter px-6 py-2 bg-white border border-gray-300 rounded-full font-medium" onclick="sort(this)">
                    <i class="fas fa-microphone mr-2"></i>{{ __('messages.events.categories.other') }}
                </button>
            </div>
        </section>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Event Listings -->
            <div class="w-full " id="app" data-locale="{{ app()->getLocale() }}">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-dark" id="total">{{ count($events ) }} {{ __('messages.events.filtre.events_found') }}</h2>
                    <div class="flex items-center">
                        <span class="text-gray-600 mr-3">{{ __('messages.events.filtre.title') }}:</span>
                        <select class="border border-gray-300 rounded-lg px-4 py-2" id="sort-select" onchange="sort()">
                            <option value="soonest">{{ __('messages.events.filtre.option1') }}</option>
                            <option value="latest">{{ __('messages.events.filtre.option2') }}</option>
                            <option value="lowtohigh">{{ __('messages.events.filtre.option3') }}</option>
                            <option value="hightolow">{{ __('messages.events.filtre.option4') }}</option>
                        </select>
                    </div>
                </div>

                <!-- Event Cards -->
                <div id="events-list" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
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
                                <i class="fas fa-music mr-1"></i>
                                @if ($event->category == 'festival')
                                    {{ __('messages.events.categories.festival') }}
                                    
                                @elseif($event->category == 'concert')
                                {{ __('messages.events.categories.concert') }}
                                @elseif($event->category == 'cultural')
                                {{ __('messages.events.categories.cultural') }}
                                @elseif($event->category == 'exhibition')
                                {{ __('messages.events.categories.exhibition') }}
                                @elseif($event->category == 'sports')
                                {{ __('messages.events.categories.sports') }}
                                @elseif($event->category == 'other')
                                {{ __('messages.events.categories.other') }}
                                    
                                @endif
                                 
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
                                         {{ __('messages.site.card.price') }}
                                        
                                    @else
                                        {{ $event->price }}
                                    @endif</span>
                                 @if ($event->price > 0)   <span class="text-gray-600">/ {{ __('messages.events.card.person') }}</span>@endif
                                </div>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                                    {{ __('messages.events.card.btn') }}
                                </button>
                            </div>
                        </div>
                    </div></a>

                    @endforeach
                   
                   
                </div>

               
            </div>
        </div>
    </main>

  

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.18/dayjs.min.js" integrity="sha512-FwNWaxyfy2XlEINoSnZh1JQ5TRRtGow0D6XcmAWmYCRgvqOUTnzCxPc9uF35u5ZEpirk1uhlPVA19tflhvnW1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  
    const btn = @json(__('messages.events.card.btn'));
    const person =  @json( __('messages.events.card.person') );
    const free =  @json(     __('messages.site.card.price')  );
    const Festival =  @json(     __('messages.events.categories.festival')  );
    const Concert =  @json(     __('messages.events.categories.concert')  );
    const Cultural =  @json(     __('messages.events.categories.cultural')  );
    const Exhibition =  @json(     __('messages.events.categories.exhibition')  );
    const Sports =  @json(     __('messages.events.categories.sports')  );
    const Other =  @json(     __('messages.events.categories.other')  );
    const events = @json(     __('messages.events.filtre.events_found')  );

        



  

    
                                

</script>



<script>
      async function sort(type){

          const locale = document.getElementById('app').dataset.locale;
        if(!type){
            type = document.querySelector('.category-filter.bg-primary');
        }

        console.log(type.dataset.name);
      
     
  
        var category =type.dataset.name;
       


         let sort = document.getElementById("sort-select").value;
        
         const response = await fetch(`/events/`+category+`/`+sort, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            document.querySelectorAll('.category-filter').forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white', 'active');
                btn.classList.add('bg-white');
            });
            type.classList.remove('bg-white',);
            type.classList.add('bg-primary','text-white');
            const data = await response.json();
            const container = document.getElementById('events-list');
             const total = document.getElementById('total');
             total.textContent = data.length + ' '+ events;
            console.log(data);
         
            console.log(locale);
            container.innerHTML = '';
            if(data.length == 0){
                container.innerHTML = '<p class="text-gray-600">No events found in this category.</p>';
                return;
            }
            

           data.forEach(event => {

            if(event.category == 'festival')
        {
            category = Festival ;
        }
        else if(event.category == 'concert' )
        {
            category = Concert;
        }

         else if(event.category == 'cultural')
        {
            category = Cultural;
        }

         else if(event.category == 'exhibition')
        {
            category = Exhibition;
        }

         else if(event.category == 'sports')
        {
            category = Sports;
        }

      
        else{
             category = Other;
        }



           const card = `
                <a href="/events/${event.id}">
                  <div class="event-card bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="relative">
                            <img src="/storage/${event.main_image}" 
                                 alt="${event.name[locale]}" class="w-full h-48 object-cover">
                            <div class="date-badge">
                                <div class="text-sm">${dayjs(event.start_date).format('MMM')}</div>
                                <div class="text-lg">${dayjs(event.start_date).format('DD')}</div>
                            </div>
                            <div class="absolute top-4 right-4 bg-primary text-white text-sm font-semibold px-3 py-1 rounded-full">
                                <i class="fas fa-music mr-1"></i> ${category}
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold mb-2">${event.name[locale]}</h3>
                            <p class="text-gray-600 mb-4">${event.description[locale]}</p>
                            <div class="flex items-center text-gray-500 mb-4">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span class="mr-4">${event.address[locale]}</span>
                                <i class="fas fa-clock mr-2"></i>
                                <span>7:00 PM</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-2xl font-bold text-primary">
                                        ${event.price == 0 ? free : event.price}
                                    </span>
                                    <span class="text-gray-600">/${person}</span>
                                </div>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                                    ${btn}
                                </button>
                            </div>
                        </div>
                    </div>
                </a>`;

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