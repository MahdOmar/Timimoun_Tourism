@extends('layouts.layout')

@section('content')

<div id="carousel" class="hero py-40 bg-slate-200 relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-10 before:opacity-70">

  


 
  {{-- <div class="flex transition-transform duration-500 ease-in-out absolute top-0 left-0 h-full">
    <img src="/images/timi.jpg" alt="Slide 1" class="w-full flex-shrink-0 h-full   object-cover ">
    <img src="/images/oasis.jpg" alt="Slide 2" class="w-full flex-shrink-0 h-full object-cover  ">
    <img src="/images/igh.jpg" alt="Slide 3" class="w-full flex-shrink-0 h-full object-cover  ">
  </div> --}}

   <div class="absolute inset-0 transition-opacity duration-1000 opacity-100" id="slide-0">
    <img src="/images/timi.jpg" class="w-full h-full object-cover">
  </div>
  <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide-1">
    <img src="/images/oasis.jpg" class="w-full h-full object-cover">
  </div>
  <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide-2">
    <img src="/images/igh.jpg" class="w-full h-full object-cover">
  </div>
  <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide-3">
    <img src="/images/kaf.jpeg" class="w-full h-full object-cover">
  </div>
  <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" id="slide-4">
    <img src="/images/timimoun2.jpg" class="w-full h-full object-cover">
  </div>





  {{-- <img src="{{ asset('./images/timi.jpg') }}" alt="" class="absolute top-0 left-0 h-full w-full object-cover animate-zoom-in-out"> 
   <img src="{{ asset('./images/oasis.jpg') }}" alt="" class="absolute top-0 left-0 h-full w-full object-cover animate-zoom-in-out">  --}}
  <div class="relative z-30 mx-auto max-w-screen-xl flex gap-20">
    <div class="w-3/3">
      <span class="text-orange-600 uppercase font-medium mb-4 block text-center animate-left-right ">{{ __('messages.EXPLORE. DISCOVER. TRAVEL') }}</span>
      <h1 class="text-7xl text-white font-extrabold mb-4 animate-left-right text-center">{{ __('messages.DMT') }}</h1>
      <br>
      <span class="text-orange-600 uppercase font-medium mb-4 block text-center animate-left-right">{{ __('messages.ETS') }}</span>
      

      <div class="flex items-center gap-3 text-white my-6 text-4xl justify-center">
        <span>....</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
        </svg>
        <span>....</span>
      </div>
      <p class="text-slate-200 animate-left-right">
        {{ __('messages.DES_TIMIMOUN') }}
      </p>
      <div class="flex gap-8 mt-10 justify-center animate-right-left">
        <button class="text-white h-12 bg-orange-700 w-44">
          {{ __('messages.BTN_READMORE') }}
        </button>
        <button class="text-white h-12 bg-blue-500 w-44">
          {{ __('messages.BTN_SEEOFFERT') }}
        </button>
      </div>
    </div>
    
  </div>
</div>

  <section class="py-20 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-accent mb-4"> {{ __('messages.Description_title') }}</h2>
                <div class="w-20 h-1 bg-primary mx-auto"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg mb-6">
                       {{ __('messages.Description_text1') }}
                    </p>
                    <p class="text-lg mb-8">
                        {{ __('messages.Description_text2') }}
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow-md text-center">
                            <i class="fas fa-sun text-2xl text-primary mb-2"></i>
                            <p class="font-semibold">{{ __('messages.Sunny_days') }}</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md text-center">
                            <i class="fas fa-history text-2xl text-primary mb-2"></i>
                            <p class="font-semibold">{{ __('messages.Rich_history') }}</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-lg overflow-hidden shadow-2xl">
                        <img src="{{ asset('./images/archi.jpg') }}" alt="Timimoun architecture" class="w-full h-96 object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-primary text-white p-6 rounded-lg shadow-lg">
                        <p class="font-heading text-2xl">"{{ __('messages.Magazine_phrase') }}"</p>
                        <p class="text-sm">- Travel Magazine</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
<section id="gallery" class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">{{ __('messages.photo_gallery') }}</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      <img src="/images/gal-1.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gal-2.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gal-3.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gal-4.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gal-5.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gal-6.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
    </div>
  </div>
</section>



{{-- <section class="bg-white py-20" data-aos="fade-up">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">  {{ __('messages.services_title') }}</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Sliders Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('messages.service1_title') }}</h3>
        <p class="text-gray-600 text-sm"> {{ __('messages.service1_text') }}</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Award Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zM5.5 22l1.5-5.5 4.5-1.5 4.5 1.5 1.5 5.5-6-2-6 2z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('messages.service2_title') }}</h3>
        <p class="text-gray-600 text-sm">{{ __('messages.service2_text') }}</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Star Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l2.09 6.26L20 12l-5.91 1.74L12 20l-2.09-6.26L4 12l5.91-1.74L12 4z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('messages.service3_title') }}</h3>
        <p class="text-gray-600 text-sm">{{ __('messages.service3_text') }}</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Headset Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8a6 6 0 00-12 0v4a4 4 0 004 4h4a4 4 0 004-4V8z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('messages.service4_title') }}</h3>
        <p class="text-gray-600 text-sm">{{ __('messages.service4_text') }}</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Hotel Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16M4 6h16M4 18h16" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('messages.service5_title') }}</h3>
        <p class="text-gray-600 text-sm">{{ __('messages.service5_text') }}</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Price Tag Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7l10 10M7 17L17 7" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ __('messages.service6_title') }}</h3>
        <p class="text-gray-600 text-sm">{{ __('messages.service6_text') }}</p>
      </div>
    </div>
  </div>
</section> --}}


<div class="bg-white   " data-aos="fade-up">
  <div class="main  py-20 bg-gray-100 w-full mx-auto text-white">
    <div class="popular  ">
      <header class="flex flex-col items-center mb-24 text-center">
        <span class="block text-orange-500 font-medium mb-2 text-center">{{ __('messages.Destinations_subtitle') }}</span>
        <h2 class="font-extrabold text-5xl text-center text-orange-500 ">{{ __('messages.Destinations_title') }}</h2>
      </header>
      <div class="list grid grid-cols-4 gap-4 mx-10">
        
        @foreach ($sites as $site)
          {{-- <div class="shadow-md hover:shadow-lg transition-all relative bg-white border border-solid border-white">
          <a href="{{ route('site.show', $site->id) }}">
          <div class="bg-white min-h-80 ">
            <div class="overflow-hidden h-80">
              <div class="block h-full relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-20 before:opacity-45">
                <img src="{{ asset('storage/' . $site->main_image) }}" alt="" class="absolute top-0 h-full w-full object-cover">
              </div>
            </div>
          </div>
          <div class="flex items-center flex-col justify-center pb-5 pt-2 relative bg-white">
           
            <h3 class="text-2xl font-bold text-gray-800 mb-1">{{ Str::upper($site->name )}}</h3>
            <span class="text-sky-700">{{ Str::upper($site->address) }}</span>
          </div></a>
        </div> --}}
             <div class="group relative overflow-hidden rounded-2xl shadow-lg">
                    <div class="h-80 overflow-hidden">
                        <img src="{{ asset('storage/'.$site->main_image) }}" alt="Red architecture" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                        <div class="p-6 text-white">
                            <h3 class="text-2xl font-heading font-bold mb-2">{{   $site->getTranslation('name', app()->getLocale()) }}</h3>
                            <p>{{   $site->getTranslation('description', app()->getLocale()) }}</p>
                        </div>
                    </div>
                </div>
        @endforeach

       

        
      

        {{-- <div class="shadow-md hover:shadow-lg transition-all relative">
          <div class="rate flex gap-1 absolute z-40 m-4 right-0">
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
          </div>
          <div class="bg-white min-h-80 p-2">
            <div class="overflow-hidden h-80">
              <div class="block h-full relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-20 before:opacity-45">
                <img src="{{ asset('./images/igh.jpg') }}" alt="" class="absolute top-0 h-full w-full object-cover">
              </div>
            </div>
          </div>
          <div class="flex items-center flex-col justify-center pb-5 pt-2 relative">
            <a href="" class="absolute top-0 left-0 h-full w-full cursor-pointer"></a>
            <h3 class="text-2xl font-bold text-slate-600 mb-1">IGHZER CAVE</h3>
            <span class="text-sky-700">IGHZER OULED SAID</span>
          </div>
        </div>

        <div class="shadow-md hover:shadow-lg transition-all relative">
          <div class="rate flex gap-1 absolute z-40 m-4 right-0">
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
          </div>
          <div class="bg-white min-h-80 p-2">
            <div class="overflow-hidden h-80">
              <div class="block h-full relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-20 before:opacity-45">
                <img src="{{ asset('./images/fougerra.jpg') }}" alt="" class="absolute top-0 h-full w-full object-cover">
              </div>
            </div>
          </div>
          <div class="flex items-center flex-col justify-center pb-5 pt-2 relative">
            <a href="" class="absolute top-0 left-0 h-full w-full cursor-pointer"></a>
            <h3 class="text-2xl font-bold text-slate-600 mb-1">KASRIYA FOUGERRA</h3>
            <span class="text-sky-700">OULED SAID</span>
          </div>
        </div>

        <div class="shadow-md hover:shadow-lg transition-all relative">
          <div class="rate flex gap-1 absolute z-40 m-4 right-0">
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-white">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
            <a href="" class="text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
              </svg>
            </a>
          </div>
          <div class="bg-white min-h-80 p-2">
            <div class="overflow-hidden h-80">
              <div class="block h-full relative before:block before:absolute before:bg-black before:h-full before:w-full before:top-0 before:z-20 before:opacity-45">
                <img src="{{ asset('./images/roses-sables.jpg') }}" alt="" class="absolute top-0 h-full w-full object-cover">
              </div>
            </div>
          </div>
          <div class="flex items-center flex-col justify-center pb-5 pt-2 relative">
            <a href="" class="absolute top-0 left-0 h-full w-full cursor-pointer"></a>
            <h3 class="text-2xl font-bold text-slate-600 mb-1">SAND ROSES</h3>
            <span class="text-sky-700">TIMIMOUN</span>
          </div>
        </div>
      </div> --}}
      
     
    </div>
    <a href="{{ route('sites.all') }}"> <button class="text-white h-12 bg-orange-500 w-60 mx-auto block mt-14 hover:bg-sky-600 transition-all">
       {{ __('messages.BTN_EXPLOREMORE') }}
      </button> </a>
  </div>
</div>

{{-- <section class="py-16 bg-white " data-aos="fade-up">
  <div class="max-w-7xl mx-auto my-10 px-6">
     <h2 class="font-extrabold text-5xl text-center text-orange-500 my-10">Local Craftsmanship</h2>

    <div class="relative">
      <!-- Carousel Container -->
      <div id="cardCarousel"   class="flex gap-4 overflow-x-auto scroll-smooth hide-scrollbar">
        <!-- Card 1 -->
        <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/Timimoun.jpg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Handmade Pottery</h3>
        </div>

        <!-- Card 2 -->
        <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/459.jpg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Textile Weaving</h3>
        </div>

        <!-- Card 3 -->
        <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/25.jpeg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Leather Goods</h3>
        </div>

        <!-- Add more cards as needed -->
         <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/25.jpeg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Leather Goods</h3>
        </div>
         <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/25.jpeg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Leather Goods</h3>
        </div>
         <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/25.jpeg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Leather Goods</h3>
        </div>
         <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/25.jpeg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Leather Goods</h3>
        </div>
         <div class="min-w-[250px] h-[300px] bg-cover bg-center rounded-lg shadow-lg flex items-end p-4 text-white relative" style="background-image: url('/images/25.jpeg');">
          <div class="absolute inset-0 bg-black/40 rounded-lg"></div>
          <h3 class="relative z-10 font-semibold">Leather Goods</h3>
        </div>
      </div>

      <!-- Navigation Buttons -->
   
    </div>
  </div>
</section>
 --}}

 <section class="py-20 bg-white" data-aos="fade-up">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="font-extrabold text-5xl text-center text-accent mb-12"> {{ __('messages.Crafts_title') }}</h2>

    <div class="relative">
      <!-- Carousel Container -->
      <div id="cardCarousel" class="flex gap-6 overflow-x-auto scroll-smooth hide-scrollbar snap-x snap-mandatory">
       @foreach ($crafts as $item)
           
      
      <a href="{{ route('craft.show',$item->id) }}">  <div class="snap-center min-w-[350px] h-[400px] bg-cover bg-center rounded-2xl shadow-xl flex items-end p-6 text-white relative" 
             style="background-image: url('{{ asset('storage/'.$item->main_image) }}');">
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-2xl"></div>
          <h3 class="relative z-10 font-bold text-xl">{{   $item->getTranslation('name', app()->getLocale()) }}</h3>
        </div></a>
        @endforeach
      
      </div>

      <!-- Navigation Buttons -->
      <button id="prevBtn" 
              class="absolute top-1/2 -left-6 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-orange-500 hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <button id="nextBtn" 
              class="absolute top-1/2 -right-6 transform -translate-y-1/2 bg-white p-3 rounded-full shadow-lg hover:bg-orange-500 hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
    </div>
  </div>
</section>






<div class="bg-gray-100 " >
  <div class="main max-w-screen-7xl  py-24"  >
  <div class="popular">
    <header class="flex flex-col items-center mb-24">
      <span class="block text-orange-500 font-medium mb-2">{{ __('messages.Where to Stay') }}</span>
      <h2 class="font-extrabold text-5xl text-orange-500">{{ __('messages.Accommodations_title') }}</h2>
    </header>
   

  <div class="max-w-7xl w-full  mx-auto    overflow-hidden ">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 m-4 w-full " data-aos="fade-up">
    @foreach ($accommodations as $accommodation)
        
    
        <div class="flex flex-col md:flex-row bg-white h-64 w-full shadow-lg rounded-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <!-- Image Section -->
            <div class="md:w-2/5">
                <img class="h-48 md:h-full w-full object-cover" src="{{ asset('storage/'.$accommodation->main_image) }}" alt="Gourara Hotel Room">
            </div>
            
            <!-- Content Section -->
            <div class="md:w-3/5 p-6">
                <!-- Header -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <div class="text-xs font-semibold text-blue-600 uppercase tracking-wider">{{ $accommodation->min_price }} DA / person</div>
                        <h2 class="text-xl font-bold text-gray-800 mt-1">{{ $accommodation->name  }}</h2>
                    </div>
                    <div class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">4.2/5</div>
                </div>
                
                <!-- Reviews -->
                <div class="flex items-center text-sm text-gray-600 mb-4">
                    <div class="flex text-yellow-400 mr-1">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span>(17 reviews)</span>
                </div>
                
                <!-- Hotel Description -->
                <p class="text-gray-600 text-sm mb-5">
                    {{ $accommodation->description }} 
                </p>
                
                <!-- Location -->
                <div class="flex items-center text-sm text-gray-700 mb-6">
                    <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>
                    <span>{{ $accommodation->address }} </span>
                </div>
                
                <!-- Footer -->
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
                        <span class="font-medium text-gray-700">{{ $accommodation->stars }} </span>{{ __('messages.stars') }}
                    </div>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200">
                        {{ __('messages.book') }}
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
   
  </div>
   <a href="{{ route("accommodations.all") }}"><button class="text-white h-12 bg-orange-500 w-60 mx-auto block mt-14 hover:bg-sky-600 transition-all">
       {{ __('messages.seemore') }}
    </button>
    </a>

</div>

  <section class="bg-white py-20 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-accent mb-4">{{ __('messages.adventures_title') }}</h2>
                <div class="w-20 h-1 bg-primary mx-auto"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <div class="flex items-start mb-8">
                        <div class="bg-primary p-4 rounded-full mr-6">
                            <i class="fas fa-camel text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-2">{{ __('messages.adventures_subtitle1') }}</h3>
                            <p class="text-lg">{{ __('messages.adventures_description1') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start mb-8">
                        <div class="bg-primary p-4 rounded-full mr-6">
                            <i class="fas fa-hiking text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-2">{{ __('messages.adventures_subtitle2') }}</h3>
                            <p class="text-lg">{{ __('messages.adventures_description2') }}.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-primary p-4 rounded-full mr-6">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-2">{{ __('messages.adventures_subtitle3') }}</h3>
                            <p class="text-lg">{{ __('messages.adventures_description3') }}</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('./images/ksar_draa.jpg') }}" alt="Desert adventure" class="w-full h-96 object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>








{{--  Tours Section --}}
<section class="bg-gray-100 py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">

    <!-- Left side: Gallery-style cards -->
    <div class="grid sm:grid-cols-2 gap-6">
      @foreach($tours->take(4) as $tour)
        <div class="relative group h-96 rounded-lg overflow-hidden shadow-lg">
          <!-- Tour Image -->
          <img src="{{ asset('storage/'.$tour->main_image) }}" 
               alt="Tour Image"
               class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">

          <!-- Hover Overlay -->
          <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-center items-center text-center p-4">
            <h3 class="text-xl font-bold text-white mb-2">
              {{ $tour->getTranslation('name', app()->getLocale()) }}
            </h3>
            <p class="text-sm text-gray-200">
              {{ Str::limit($tour->getTranslation('description', app()->getLocale()), 80) }}
            </p>
            <a href="{{ route('tour.show', $tour->id) }}" 
               class="mt-4 inline-block px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 transition">
              Explore
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Right side: Description -->
    <div class=" flex flex-col justify-center px-6">
  <h2 class="text-3xl font-bold mb-6 text-orange-900"> {{ __('messages.tours_title') }}</h2>
  <p class="text-gray-700 leading-relaxed text-lg">
   {{ __('messages.tours_description1') }}
    <br><br>
   {{ __('messages.tours_description2') }} 
  </p>

  </div>
</section>


<!-- Cultural Highlights -->
    <section class="py-20 px-4 md:px-8 bg-white text-dark">
        <div class="max-w-6xl mx-auto ">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-heading font-bold mb-4"> {{ __('messages.cultural_title') }} </h2>
                <div class="w-24 h-1 bg-sahara-gold mx-auto"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center ">
                <div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-6 rounded-lg backdrop-blur-sm card-hover">
                            <i class="fas fa-utensils text-3xl text-sahara-gold mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.cultural_subtitle') }}</h3>
                            <p>{{ __('messages.cultural_description1') }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg backdrop-blur-sm card-hover">
                            <i class="fas fa-music text-3xl text-sahara-gold mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.cultural_subtitle1') }}</h3>
                            <p>{{ __('messages.cultural_description2') }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg backdrop-blur-sm card-hover">
                            <i class="fas fa-hands text-3xl text-sahara-gold mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.cultural_subtitle2') }}</h3>
                            <p>{{ __('messages.cultural_description3') }}</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg backdrop-blur-sm card-hover">
                            <i class="fas fa-camera text-3xl text-sahara-gold mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">{{ __('messages.cultural_subtitle3') }}</h3>
                            <p>{{ __('messages.cultural_description4') }}</p>
                        </div>
                    </div>
                </div>
                
                <div >
                    <h3 class="text-3xl font-heading font-bold mb-6 ">{{ __('messages.cultural_subtitle4') }}</h3>
                    <p class="text-lg mb-6">
                       {{ __('messages.cultural_description5') }}
                    </p>
                    <p class="text-lg">
                       {{ __('messages.cultural_description6') }}
                    </p>
                    
                </div>
            </div>
        </div>
    </section>







{{-- Events section --}}

<section class="bg-gray-100 py-20">
  <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">

    <!-- LEFT: Text Description -->
    <div class="flex flex-col justify-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-accent">{{ __('messages.events_title') }}</h2>
      <p class="text-gray-700 leading-relaxed text-lg">
        {{ __('messages.events_description1') }}
      </p>
      <p class="text-gray-700 leading-relaxed text-lg mt-4">
        {{ __('messages.events_description2') }}
      </p>
      <p class="text-gray-700 leading-relaxed text-lg mt-4">
         {{ __('messages.events_description3') }}
      </p>
    </div>


    <!-- RIGHT: Event Cards -->
    <div class="grid grid-cols-2 gap-6">
      @foreach($events as $event)
      <a href="{{ route('event.show',$event->id) }}">  <div class="relative group overflow-hidden rounded-lg shadow-md">
          <!-- Event Image -->
          <img src="{{ asset('storage/' . $event->main_image) }}" 
               alt="{{ $event->getTranslation('name', app()->getLocale()) }}" 
               class="w-full h-96 object-cover transform group-hover:scale-110 transition duration-500">

          <!-- Overlay -->
          <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center 
                      opacity-0 group-hover:opacity-100 transition duration-500 text-center px-3">
            <h3 class="text-lg font-semibold text-white mb-2">
              {{ $event->getTranslation('name', app()->getLocale()) }}
            </h3>
            <p class="text-sm text-gray-200">
              {{ Str::limit($event->getTranslation('description', app()->getLocale()), 80) }}
            </p>
            <span class="mt-3 text-xs text-gray-300">
              📅 {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
            </span>
          </div>
        </div></a>
      @endforeach
    </div>

  </div>
</section>







<!--!-- Local Food & Drinks -->
<section class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-orange-600 mb-12">
      Local Food & Drinks
    </h2>

    <div class="grid gap-8 md:grid-cols-2">
      <!-- Food Card -->
      @foreach ($foodAndDrinks as $item)
          <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('storage/' . $item->main_image) }}" alt="Traditional Couscous" class="w-full h-60 object-cover">
        <div class="p-6 text-left">
          <h3 class="text-xl font-semibold flex items-center gap-2">
            {{ $item->getTranslation('name', app()->getLocale()) }}
          </h3>
          <p class="text-sm text-gray-500">{{ $item->type }}</p>
          <p class="mt-2 text-gray-700">{{ $item->email }}
            </li></p>
          <p class="text-gray-700">{{ $item->getTranslation('description', app()->getLocale()) }}</p>
          <p class="text-gray-700">{{ $item->phone }}</p>
        </div>
      </div>
      @endforeach
      

     
    </div>
  </div>
</section>


<!-- Travel Agencies -->
<section class="py-16 bg-gray-100">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold text-orange-600 mb-12">
      Travel Agencies
    </h2>

    <div class="grid gap-8 md:grid-cols-3">
      @foreach ($travels as $item)
        <div class="bg-gray-50 rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
        <img src="{{ asset('storage/' . $item->main_image) }}" alt="{{ $item->getTranslation('name', app()->getLocale()) }}" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-lg font-semibold">{{ $item->getTranslation('name', app()->getLocale()) }}</h3>
          <p class="text-gray-600 mt-2">{{ $item->getTranslation('description', app()->getLocale()) }}</p>
        </div>
      </div>
          
      @endforeach
    

    </div>
  </div>
</section>





{{-- <section class="bg-gray-100 py-20">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
      Auto-Guide: Discover Timimoun
    </h2>
    <p class="text-center text-gray-600 max-w-2xl mx-auto mb-10">
      Follow our guided path to explore the best of Timimoun. Start from iconic accommodations, 
      through historic sites, to breathtaking desert dunes and lively local markets. 
      Let us guide you step by step through the wonders of the city.
    </p>

    <!-- Map Container -->
    <div id="map" class="w-full h-[500px] rounded-lg shadow-md"></div>

    <!-- Start Tour Button -->
    <div class="text-center mt-6">
      <button id="start-tour" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-md shadow-md transition">
        ▶️ Start Guided Tour
      </button>
    </div>
  </div>
</section> --}}



<!-- Experiences -->
<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">  {{ __('messages.experiance_title') }}</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
            <!-- Icon -->
            <svg class="w-6 h-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7" />
            </svg>
          </div>
          <h3 class="font-semibold">{{ __('messages.experiance_subtitle') }}</h3>
        </div>
        <p class="mt-3 text-gray-600">{{ __('messages.experiance_description1') }}</p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
            <svg class="w-6 h-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2h-3l-2-2H9L7 5H4a2 2 0 00-2 2v6" />
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M1 13h22M6 16h.01M10 16h.01M14 16h.01M18 16h.01" />
            </svg>
          </div>
          <h3 class="font-semibold">{{ __('messages.experiance_subtitle1') }}</h3>
        </div>
        <p class="mt-3 text-gray-600">{{ __('messages.experiance_description2') }}</p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
            <svg class="w-6 h-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 8c2.21 0 4-1.79 4-4S14.21 0 12 0 8 1.79 8 4s1.79 4 4 4zM6 22v-2a4 4 0 014-4h4a4 4 0 014 4v2" />
            </svg>
          </div>
          <h3 class="font-semibold">{{ __('messages.experiance_subtitle2') }}</h3>
        </div>
        <p class="mt-3 text-gray-600">{{ __('messages.experiance_description3') }}</p>
      </div>

       
      <div class="rounded-2xl border bg-white p-6">
        <div class="text-sm text-orange-600 font-semibold">{{ __('messages.experiance_subtitle3') }}</div>
        <h3 class="mt-2 font-semibold">{{ __('messages.experiance_subsubtitle') }}</h3>
        <p class="mt-2 text-gray-600">{{ __('messages.experiance_description4') }}</p>
      </div>
      <div class="rounded-2xl border bg-white p-6">
        <div class="text-sm text-orange-600 font-semibold">{{ __('messages.experiance_subtitle4') }}</div>
        <h3 class="mt-2 font-semibold">{{ __('messages.experiance_subsubtitle1') }}</h3>
        <p class="mt-2 text-gray-600">{{ __('messages.experiance_description5') }}</p>
      </div>
      <div class="rounded-2xl border bg-white p-6">
        <div class="text-sm text-orange-600 font-semibold">{{ __('messages.experiance_subtitle5') }}</div>
        <h3 class="mt-2 font-semibold">{{ __('messages.experiance_subsubtitle2') }}</h3>
        <p class="mt-2 text-gray-600">{{ __('messages.experiance_description6') }}</p>
      </div>



   
  </div>
</section>



</div>


@endsection


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  
<script>
    $( document ).ready(function() {
const container = document.getElementById("cardCarousel");

  function autoScrollCarousel() {
    if (container.scrollLeft + container.clientWidth >= container.scrollWidth) {
      container.scrollTo({ left: 0, behavior: 'smooth' });
    } else {
      container.scrollBy({ left: 270, behavior: 'smooth' });
    }
  }

  setInterval(autoScrollCarousel, 3000);
  });

</script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    // Initialize map centered on Timimoun


    
  const carousel = document.getElementById('cardCarousel');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');

  nextBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: 400, behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: -400, behavior: 'smooth' });
  });

    var map = L.map('map').setView([29.2639, 0.2300], 12);

    // Load tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Example stops (dynamic later from DB)
    var stops = [
        { name: "Gourara Hotel", lat: 29.266, lng: 0.230, description: "Best place to stay with traditional design." },
        { name: "Timimoun Ksour", lat: 29.270, lng: 0.240, description: "Explore ancient desert villages." },
        { name: "Red Dunes", lat: 29.280, lng: 0.220, description: "Perfect spot for sunset views." },
        { name: "Local Market", lat: 29.260, lng: 0.210, description: "Discover local handicrafts and food." }
    ];

    // Store markers
    var markers = [];

    // Add markers
    stops.forEach((stop, index) => {
        var marker = L.marker([stop.lat, stop.lng])
            .bindPopup(`<b>Stop ${index+1}: ${stop.name}</b><br>${stop.description}`);
        markers.push(marker);
    });

    // Draw connecting line
    var latlngs = stops.map(s => [s.lat, s.lng]);
    var polyline = L.polyline(latlngs, { color: 'orange', weight: 4 }).addTo(map);

    // "Start Tour" button logic
    document.getElementById('start-tour').addEventListener('click', function () {
        let i = 0;
        function nextStop() {
            if (i < markers.length) {
                markers[i].addTo(map).openPopup();
                map.setView([stops[i].lat, stops[i].lng], 13, { animate: true });
                i++;
                setTimeout(nextStop, 3000); // 3s delay per stop
            }
        }
        nextStop();
    });
});
</script>