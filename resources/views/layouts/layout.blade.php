<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
  .hide-scrollbar {
    scrollbar-width: none; /* Firefox */
  }
  .hide-scrollbar::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Edge */
  }
</style>
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
   <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                    @vite(['resources/css/app.css', 'resources/js/app.js'])

             <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

<!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


</head>
<body>
  <!-- component -->
<header class="pb-6 bg-gray-900">
  <div class="mx-auto border-b border-gray-900 mb-6">
    <div class="flex justify-between max-w-screen-xl mx-auto py-2">
      <div class="flex items-center gap-10 text-xs text-slate-200">
        <a href="" class="flex items-center gap-2">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
          </svg>
          </span>
          <span>+01 (977) 2599 12</span>
        </a>
        <a href="" class="flex items-center gap-2">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>

          </span>
          <span>company@domain.com</span>
        </a>
        <a href="" class="flex items-center gap-2">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
          </svg>

          </span>
          <span>3146 Koontz Lane, California</span>
        </a>
      </div>
      <div>
        <div class="relative inline-block text-left">
    <button type="button"
        class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none"
        id="langMenuButton">
        {{ strtoupper(app()->getLocale()) }}
        <svg class="-mr-1 ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
        </svg>
    </button>

    <div id="langMenu" class="hidden absolute z-50 mt-2 w-28 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
        <div class="py-1 text-sm">
            @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <a rel="alternate" hreflang="{{ $localeCode }}"  class="block px-4 py-2 text-gray-700 hover:bg-gray-100 text-sm "
               href="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
        </a>
            @endforeach
        </div>
    </div>
</div>
        

        </a>
      </div>
    </div>
  </div>
  <div class="mx-auto max-w-screen-2xl flex items-center w-full gap-12">
    <a href="{{ route('home') }}" class="font-bold text-3xl text-white">Timimoun</a>
    <nav class="flex gap-6">
      
      <a href="{{ route('home') }}" class="text-white uppercase relative pr-6">{{ __('messages.HOME') }}
       
      </a>
      
        {{-- <div x-data="{ open: false }" class="relative">
          <button @click="open = !open" class="text-white focus:outline-none">
            Where to Stay 
          </button>
          
          
          <div x-show="open" @click.away="open = false"
               x-transition
               class="absolute bg-white border rounded shadow-md py-2 mt-2 w-48 z-50">
            <a href="" class="block px-4 py-2 hover:bg-gray-100">Hotels</a>
            <a href="" class="block px-4 py-2 hover:bg-gray-100">Guest Houses</a>
            <a href="" class="block px-4 py-2 hover:bg-gray-100">Mini Villas</a>
            <a href="" class="block px-4 py-2 hover:bg-gray-100">Campsites</a>
          </div>
         
   
        </div> --}}
        
          <a href="{{ route('accommodations.all') }}" class="text-white uppercase relative pr-6">{{ __('messages.Where to Stay') }}
        
      </a>
                  
      


       
     
       <div x-data="{ open: false }" class="relative uppercase">
          <button @click="open = !open" class="text-white focus:outline-none uppercase">
            {{ __('messages.Things to Do') }}
          </button>
          
          
          <div x-show="open" @click.away="open = false"
               x-transition
               class="absolute bg-white border rounded shadow-md py-2 mt-2 w-48 z-50">
            <a href="{{ route('events.all') }}" class="block px-4 py-2 hover:bg-gray-100">{{ __('messages.EVENTS') }}</a>
            <a href="{{ route('sites.all') }}" class="block px-4 py-2 hover:bg-gray-100">{{ __('messages.SITES') }}</a>
          
          </div>
         
   
        </div>
      <a href="{{ route('food.all') }}" class="text-white uppercase relative pr-6">{{ __('messages.Food & Drink') }}
        
      </a>
      <a href="{{ route('travel.all') }}" class="text-white uppercase relative pr-6">{{ __('messages.Travel Agencies') }}
       
      </a>
      <a href="{{ route('tours.all') }}" class="text-white uppercase relative pr-6">{{ __('messages.Tours') }}
        
      </a>

      <a href="{{ route('rentals.all') }}" class="text-white uppercase relative pr-6">{{ __('messages.Rentals') }}
        
      </a>
      <a href="/services" class="text-white uppercase relative pr-6">{{ __('messages.Essential Services') }}
        
      </a>
    </nav>
    {{-- <button class="uppercase text-white text-sm bg-orange-600 pt-2 pb-3 px-6">
      Book now
    </button> --}}
  </div>
</header>

<div class="main">
  @yield('content')
</div>

<div class="min-h-96 relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-10 before:opacity-80">
  <img src="/images/sables.jpg" alt="" class="h-full object-cover absolute top-0 left-0 w-full ">
  <div class="mx-auto max-w-screen-xl relative z-20 text-white py-20">
    <header class="flex flex-col items-center mb-10">
      <span class="block text-rose-600 font-medium mb-4">{{ __('messages.footer_subtitle') }}</span>
      <h2 class="font-extrabold text-5xl">{{ __('messages.footer_title') }}</h2>
      <div class="flex items-center justify-center gap-4 mt-8">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
        </svg>
      </div>
    </header>
    <div class="flex items-center justify-center gap-20">
      <div class="group flex flex-col items-center text-sm relative">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
         <a href="{{ route('accommodations.all') }}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_accommodations') }}</b></a>
        {{-- {{ count($accommodations) }} Destination --}}
      </div>
      <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
      <a href="{{ route('sites.all') }}">    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_sites') }}</b></a>
       {{-- {{ count($sites) }} Places --}}
      </div>
      <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
          <a href="{{ route('tours.all') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_tours') }}</b></a>
        {{-- {{ count($tours) }} Tours --}}
      </div>
      <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
        <a href="{{ route('events.all') }}">  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_events') }}</b></a>
        {{-- {{ count($events) }} Events --}}
      </div>
      <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
         <a href="{{ route('food.all') }}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_food') }}</b></a>
        {{-- {{ count($foodAndDrinks) }} Restaurents --}}
      </div>
      <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
          <a href="{{ route('travel.all') }}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_travels') }}</b></a>
         {{-- {{ count($travels) }} Agencies --}}
      </div>

        <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
           <a href="{{ route('crafts.all') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_crafts') }}</b></a>
         {{-- {{ count($travels) }} Agencies --}}
      </div>


        <div class="group flex flex-col items-center text-sm relative before:absolute before:bg-white before:opacity-25 before:h-full before:w-px before:-left-10">
        <div class="absolute h-2/3 w-2/3 -z-10 top-6 left-4 bg-stone-100 hidden opacity-0 group-hover:block group-hover:opacity-10 animate-ping"></div>
        <div class="mb-2 group-hover:scale-105 transition-all">
          <a href="{{ route('rentals.all') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
          </svg>
        </div>
        <b class="font-bold text-xl block mb-2">{{ __('messages.footer_rentals') }}</b></a>
         {{-- {{ count($travels) }} Agencies --}}
      </div>



    </div>
  </div>
</div>
  

<script>

  const slides = document.querySelectorAll('[id^="slide-"]');
  let current = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.toggle('opacity-100', i === index);
      slide.classList.toggle('opacity-0', i !== index);
    });
  }

  setInterval(() => {
    current = (current + 1) % slides.length;
    showSlide(current);
  }, 3000); // change every 5s
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('langMenuButton');
    const menu = document.getElementById('langMenu');

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        menu.classList.toggle('hidden');
    });

    document.addEventListener('click', () => {
        if (!menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
        }
    });
});

</script>
  
</body>
</html>