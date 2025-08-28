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
      <span class="text-orange-600 uppercase font-medium mb-4 block text-center animate-left-right ">EXPLORE. DISCOVER. TRAVEL</span>
      <h1 class="text-7xl text-white font-extrabold mb-4 animate-left-right text-center">Discover the Magic of Timimoun</h1>
      <br>
      <span class="text-orange-600 uppercase font-medium mb-4 block text-center animate-left-right">Explore the heart of the Sahara and its rich culture </span>
      

      <div class="flex items-center gap-3 text-white my-6 text-4xl justify-center">
        <span>....</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
        </svg>
        <span>....</span>
      </div>
      <p class="text-slate-200 animate-left-right">
        The Red Oasis is a very beautiful city. It is characterized by its Islamic architectural character. The city of Timimoune, or the bride of the desert, as its visitors call it, is characterized by a unique urban and architectural character. This prompted French researchers during the colonial era to classify it on the basis that it was one of the most wonderful oases...
      </p>
      <div class="flex gap-8 mt-10 justify-center animate-right-left">
        <button class="text-white h-12 bg-orange-700 w-44">
          Read More
        </button>
        <button class="text-white h-12 bg-blue-500 w-44">
          See all offert
        </button>
      </div>
    </div>
    
  </div>
</div>

<section class="bg-white py-20" data-aos="fade-up">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Services</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Sliders Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Personalized Matching</h3>
        <p class="text-gray-600 text-sm">Our unique matching system lets you find just the tour you want for your next holiday.</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Award Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3-1.343 3-3S13.657 2 12 2 9 3.343 9 5s1.343 3 3 3zM5.5 22l1.5-5.5 4.5-1.5 4.5 1.5 1.5 5.5-6-2-6 2z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Wide Variety of Tours</h3>
        <p class="text-gray-600 text-sm">We offer a wide variety of personally picked tours with destinations all over the globe.</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Star Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4l2.09 6.26L20 12l-5.91 1.74L12 20l-2.09-6.26L4 12l5.91-1.74L12 4z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Highly Qualified Service</h3>
        <p class="text-gray-600 text-sm">Our tour managers are qualified, skilled, and friendly to bring you the best service.</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Headset Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8a6 6 0 00-12 0v4a4 4 0 004 4h4a4 4 0 004-4V8z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">24/7 Support</h3>
        <p class="text-gray-600 text-sm">You can always get professional support from our staff 24/7 and ask any question you have.</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Hotel Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16M4 6h16M4 18h16" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Handpicked Hotels</h3>
        <p class="text-gray-600 text-sm">Our team offers only the best selection of affordable and luxury hotels to our clients.</p>
      </div>

      <!-- Service Card -->
      <div class="border p-6 rounded-lg text-center hover:shadow transition">
        <div class="flex justify-center mb-4 text-blue-500">
          <!-- Price Tag Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7l10 10M7 17L17 7" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Best Price Guarantee</h3>
        <p class="text-gray-600 text-sm">If you find tours that are cheaper than ours, we will compensate the difference.</p>
      </div>
    </div>
  </div>
</section>


<div class="bg-white   " data-aos="fade-up">
  <div class="main  py-20 bg-gray-200 w-full mx-auto text-white">
    <div class="popular  ">
      <header class="flex flex-col items-center mb-24 text-center">
        <span class="block text-orange-500 font-medium mb-2 text-center">POPULAR DESTINATION</span>
        <h2 class="font-extrabold text-5xl text-center text-orange-500 ">TOP DESTINATIONS</h2>
      </header>
      <div class="list grid grid-cols-4 gap-4 mx-10">
        
        @foreach ($sites as $site)
          <div class="shadow-md hover:shadow-lg transition-all relative bg-white border border-solid border-white">
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
        Explore More
      </button> </a>
  </div>
</div>

<section class="py-16 bg-white " data-aos="fade-up">
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






<div class="bg-gray-200 " >
  <div class="main max-w-screen-4xl  py-24"  >
  <div class="popular">
    <header class="flex flex-col items-center mb-24">
      <span class="block text-orange-500 font-medium mb-2">WHERE TO STAY</span>
      <h2 class="font-extrabold text-5xl text-orange-500">POPULAR HOTELS / CAMPINGS</h2>
    </header>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 m-4 " data-aos="fade-up">
    @foreach ($accommodations as $accommodation)
        <div class="group bg-gray-900 shadow-md hover:shadow-lg rounded-lg overflow-hidden transition">
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <!-- Image -->
                <div class="relative h-64 sm:h-80">
                    <div class="absolute bg-rose-500 py-1.5 px-4 mt-4 ml-4 text-white rounded-md shadow">
                        <span class="font-bold text-lg">{{ $accommodation->price_range }} DA</span>
                        <span class="text-xs text-stone-200">/ person</span>
                    </div>
                    <img src="{{ asset('storage/'.$accommodation->main_image) }}" 
                         alt="{{ $accommodation->name }}" 
                         class="w-full h-full object-cover">
                    <div class="bg-sky-500 py-2 px-4 absolute w-full bottom-0">
                        <div class="flex justify-between text-xs text-white">
                            <span class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                7/24
                            </span>
                            <span class="flex items-center gap-1 border-l border-white pl-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Timimoun
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 relative">
                    <a href="{{ route('accommodation.show',$accommodation->id) }}" class="absolute inset-0"></a>
                    <h2 class="font-bold text-xl text-slate-100 mb-4 group-hover:text-rose-600">
                        {{ $accommodation->name }}
                    </h2>
                    <p class="flex justify-between mb-4">
                        <span class="text-xs text-slate-100">(17 reviews)</span>
                        <span class="flex gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $i < 4 ? 'orange' : 'gray' }}" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.5l2.125 5.111 5.518.442-4.204 3.602 1.285 5.385-4.725-2.885-4.725 2.885 1.285-5.385-4.204-3.602 5.518-.442L11.48 3.5z"/>
                                </svg>
                            @endfor
                        </span>
                    </p>
                    <h3 class="text-slate-700 text-sm font-medium mb-3">
                        <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full capitalize">
                            {{ $accommodation->type }}
                        </span>
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed line-clamp-3">
                        {{ ucfirst($accommodation->description) }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

    
   
  </div>
   <a href="{{ route("accommodations.all") }}"><button class="text-white h-12 bg-orange-500 w-60 mx-auto block mt-14 hover:bg-sky-600 transition-all">
      See More
    </button>
    </a>

</div>


{{--  Tours Section --}}
<section class="bg-gray-50 py-20">
  <div class="max-w-8xl mx-auto px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-center">

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
  <h2 class="text-3xl font-bold mb-6 text-orange-900">Desert Tours</h2>
  <p class="text-gray-700 leading-relaxed text-lg">
    Discover the timeless beauty of the Sahara with our exclusive desert tours. 
    Whether you’re seeking a thrilling camel ride across golden dunes, 
    a peaceful evening under a star-filled sky, or the warmth of 
    traditional desert hospitality, our tours are carefully designed 
    to give you a once-in-a-lifetime experience.  
    <br><br>
    You’ll visit breathtaking landscapes, ancient caravan routes, and 
    remote villages where local traditions are still alive. Each tour 
    offers the perfect balance of adventure, culture, and relaxation, 
    making it ideal for families, couples, or solo travelers. 
    Join us to create unforgettable memories in the heart of the desert. 
  </p>

  </div>
</section>







{{-- Events section --}}

<section class="bg-gray-200 py-20">
  <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">

    <!-- LEFT: Text Description -->
    <div class="flex flex-col justify-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-red-900">Local Events</h2>
      <p class="text-gray-700 leading-relaxed text-lg">
        Timimoun is not only about breathtaking landscapes—it’s also a land of vibrant traditions and unforgettable celebrations.  
        Throughout the year, our city hosts a wide variety of events, from colorful cultural festivals and traditional music performances to artisanal fairs and spiritual gatherings.  
      </p>
      <p class="text-gray-700 leading-relaxed text-lg mt-4">
        These events are the perfect opportunity to immerse yourself in the rhythm of local life, discover ancient customs that have been passed down for generations, and connect with the warm spirit of the community.  
        Whether you’re enjoying the sound of desert drums, joining a caravan-inspired parade, or tasting local specialties at a lively souk, each event offers a unique glimpse into the soul of the Sahara.  
      </p>
      <p class="text-gray-700 leading-relaxed text-lg mt-4">
        Come experience the magic—every season brings something new to celebrate!
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

 {{--  Food and Drinks Section --}}
<section class="bg-gray-100 py-20" data-aos="fade-up">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="font-extrabold text-5xl text-center text-orange-500 my-10">Local Food & Drinks</h2>

    <div class=" grid grid-cols-2 gap-4">
      @foreach($foodAndDrinks as $item)
      {{-- <div class="flex w-[500px] bg-white shadow-sm border border-gray-200 font-sans">
    <!-- Image Section (Left) -->
    <div class="w-1/2 bg-gray-200 flex items-center justify-center">
        <!-- Replace with your actual image -->
                  <img src="{{ asset('storage/' . $item->main_image) }}" class=" object-cover">

    </div>

    <!-- Info Section (Right) -->
    <div class="w-1/2 p-8 text-center bg-gray-900 text-white">
        <!-- Restaurant Name -->
        <div class="text-3xl font-bold tracking-tight mb-1">YOUR RESTAURANT</div>
        
        <!-- Tagline -->
        <div class="text-base font-light mb-6">{{ $item->getTranslation('name', app()->getLocale()) }}</div>
        
        <!-- Contact Info -->
        <div class="text-sm space-y-2 font-medium">
            <div>resto@gmail.com</div>
            <div>{{ $item->getTranslation('name', app()->getLocale()) }}</div>
            <div>{{ $item->getTranslation('address', app()->getLocale()) }}</div>
            <div>US20260-0010</div>
            <div class="mt-4">+0123456789</div>
        </div>
        
        <!-- Photo Credit -->
        <div class="mt-8 text-xs">PHOTO@KING</div>
    </div>
</div> --}}

 <a href="{{ route('food.show',$item->id) }}"><div class="relative max-w-4xl mx-auto rounded-lg shadow-lg flex overflow-hidden bg-[#1a1a1a]">

    <!-- Top-left orange corner -->
    <div class="absolute top-0 left-0 w-14 h-14 bg-orange-500 rotate-45 origin-top-left z-20"></div>

    <!-- Bottom-right orange corner -->
    <div class="absolute bottom-0 right-0 w-14 h-14 bg-orange-500 rotate-45 origin-bottom-right z-20"></div>

    <!-- Left Image Section -->
    <div class="relative w-1/2">
        <img src="{{ asset('storage/' . $item->main_image) }}" alt="Pizza" class="w-full h-full object-cover">

        <!-- Blend effect -->
        <div class="absolute inset-0 bg-black bg-opacity-10 mix-blend-multiply"></div>

        <!-- Optional shadow gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent"></div>
    </div>

    <!-- Right Content Section -->
    <div class="w-1/2 p-8 text-white flex flex-col justify-center space-y-4">

        <!-- Logo/Title -->
        <div class="flex items-center gap-3">
            <div class="text-3xl text-orange-500">🍕</div>
            <div>
                <h2 class="text-xl font-bold">{{ $item->getTranslation('name', app()->getLocale()) }}</h2>
                <p class="text-xs text-gray-300">{{ $item->type }}</p>
            </div>
        </div>

        <!-- Contact Info -->
        <ul class="space-y-3 text-sm">
            <li class="flex items-center gap-2">
                <svg class="w-5 h-5 text-orange-500"><!-- email icon --></svg> resto@gmail.com
            </li>
            <li class="flex items-center gap-2">
                <svg class="w-5 h-5 text-orange-500"><!-- globe icon --></svg> www.restoyoursite.com
            </li>
            <li class="flex items-center gap-2">
                <svg class="w-5 h-5 text-orange-500"><!-- location icon --></svg> {{ $item->getTranslation('address', app()->getLocale()) }}
            </li>
            <li class="flex items-center gap-2">
                <svg class="w-5 h-5 text-orange-500"><!-- phone icon --></svg> +0 123 456 789
            </li>
        </ul>

    </div>
</div></a>



        
      @endforeach
    </div>
  </div>
</section>



{{-- Travel Agencies Section --}}

<section class="bg-gray-200 py-20">
  <div class="max-w-7xl mx-auto px-4">
   <h2 class="font-extrabold text-5xl text-center text-orange-500 my-10">Travel Agencies</h2>

    <div class="grid sm:grid-cols-1 md:grid-cols-6 gap-6">
      @foreach($travels as $agency)
        <div class="bg-gray-50 border border-gray-200 rounded-xl  flex gap-4 shadow hover:shadow-md transition"
       >

          {{-- Optional Logo --}}
          @if($agency->main_image)
            <a href="{{ route('travel.show',$agency->id) }}"><img src="{{ asset('storage/' . $agency->main_image) }}"
                 class="w-full h-full object-contain rounded-md border" alt="Agency Logo"></a>
          @else
            <div class="w-20 h-20 bg-gray-200 rounded-md flex items-center justify-center text-gray-500 text-sm">
              No Logo
            </div>
          @endif

          {{-- Info --}}
          {{-- <div class="flex-1">
            <h3 class="text-xl font-semibold text-gray-800">
              {{ $agency->getTranslation('name', app()->getLocale()) }}
            </h3>

            <div class="text-sm text-gray-600 mt-2 space-y-1">
              @if($agency->address)
                <p><i class="fa-solid fa-location-dot text-orange-500 mr-1"></i> {{ $agency->address }}</p>
              @endif
              @if($agency->phone)
                <p><i class="fa-solid fa-phone text-orange-500 mr-1"></i> {{ $agency->phone }}</p>
              @endif
              @if($agency->email)
                <p><i class="fa-solid fa-envelope text-orange-500 mr-1"></i> {{ $agency->email }}</p>
              @endif
            </div>
          </div> --}}
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