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

<div class="bg-white">
  <div class="main max-w-screen-xl  py-20 bg-white">
    <div class="popular">
      <header class="flex flex-col items-center mb-24">
        <span class="block text-orange-500 font-medium mb-2">POPULAR DESTINATION</span>
        <h2 class="font-extrabold text-5xl">TOP NOTCH DESTINATION</h2>
      </header>
      <div class="list grid grid-cols-4 gap-4">
        
        @foreach ($sites as $site)
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
                <img src="{{ asset('storage/' . $site->main_image) }}" alt="" class="absolute top-0 h-full w-full object-cover">
              </div>
            </div>
          </div>
          <div class="flex items-center flex-col justify-center pb-5 pt-2 relative">
            <a href="" class="absolute top-0 left-0 h-full w-full cursor-pointer"></a>
            <h3 class="text-2xl font-bold text-slate-600 mb-1">{{ $site->name }}</h3>
            <span class="text-sky-700">{{ $site->address }}</span>
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
     <button class="text-white h-12 bg-orange-500 w-60 mx-auto block mt-14 hover:bg-sky-600 transition-all">
        Read More
      </button>
  </div>
</div>

<div class="bg-stone-50" >
  <div class="main max-w-screen-4xl  py-24"  >
  <div class="popular">
    <header class="flex flex-col items-center mb-24">
      <span class="block text-orange-500 font-medium mb-2">WHERE TO STAY</span>
      <h2 class="font-extrabold text-5xl">POPULAR HOTELS / CAMPINGS</h2>
    </header>
    <div class="grid grid-cols-2 gap-10" >
      
      @foreach ($accommodations as $accommodation)
         <div class="group shadow-md hover:shadow-lg bg-white grid grid-cols-2" >
        <div class="relative h-80">
          <div class="absolute bg-rose-500 py-2 pr-3 pl-6 mt-6 text-white">
            <span class="font-bold text-xl">{{ $accommodation->price_range }} DA</span> <span class="text-xs text-stone-200">/ persone</span>
          </div>
          <img src="{{ asset('storage/'.$accommodation->main_image) }}" alt="" class="h-full object-cover">
          <div class="bg-sky-500 py-3 px-6 absolute w-full bottom-0">
            <div class="flex justify-between">
              <span class="flex items-center gap-1 text-xs text-white">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>

            </div>
          </div>
        </div>
        <div class="p-10 relative">
          <a href="" class="absolute top-0 left-0 h-full w-full">&nbsp;</a>
          <h2 class="font-bold text-2xl text-slate-800 mb-6 group-hover:text-rose-600">{{ $accommodation->name }}</h2>
          <p class="flex justify-between mb-6">
            <span class="text-xs text-slate-400">(17 reviews)</span>
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-500 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
            </span>
          </p>
          <h3 class="text-slate-700 text-xl font-semibold mb-4">
            {{ucfirst($accommodation->type)  }}
          </h3>
          <p class="text-slate-700">
            {{ ucfirst($accommodation->description) }}
          </p>
        </div>
      </div>
          
      @endforeach
   

      {{-- <div class="group shadow-md hover:shadow-lg bg-white grid grid-cols-2">
        <div class="relative h-80">
          <div class="absolute bg-rose-500 py-2 pr-3 pl-6 mt-6 text-white">
            <span class="font-bold text-xl">6.500 DA</span> <span class="text-xs text-stone-200">/ persone</span>
          </div>
          <img src="{{ asset('./images/DJENAN_MALEK.jpg') }}" alt="" class="h-full object-cover">
          <div class="bg-sky-500 py-3 px-6 absolute w-full bottom-0">
            <div class="flex justify-between">
              <span class="flex items-center gap-1 text-xs text-white">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>

            </div>
          </div>
        </div>
        <div class="p-10 relative">
          <a href="" class="absolute top-0 left-0 h-full w-full">&nbsp;</a>
          <h2 class="font-bold text-2xl text-slate-800 mb-6 group-hover:text-rose-600">DJENAN MALEK HOTEL</h2>
          <p class="flex justify-between mb-6">
            <span class="text-xs text-slate-400">(17 reviews)</span>
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-500 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
            </span>
          </p>
          <p class="text-slate-700">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam.
          </p>
        </div>
      </div>

      <div class="group shadow-md hover:shadow-lg bg-white grid grid-cols-2">
        <div class="relative h-80">
          <div class="absolute bg-rose-500 py-2 pr-3 pl-6 mt-6 text-white">
            <span class="font-bold text-xl">$5.000</span> <span class="text-xs text-stone-200">/ persone</span>
          </div>
          <img src="{{ asset('./images/agham.jpg') }}" alt="" class="h-full object-cover">
          <div class="bg-sky-500 py-3 px-6 absolute w-full bottom-0">
            <div class="flex justify-between">
              <span class="flex items-center gap-1 text-xs text-white">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>

            </div>
          </div>
        </div>
        <div class="p-10 relative">
          <a href="" class="absolute top-0 left-0 h-full w-full">&nbsp;</a>
          <h2 class="font-bold text-2xl text-slate-800 mb-6 group-hover:text-rose-600">Sunset view of beautiful lakeside</h2>
          <p class="flex justify-between mb-6">
            <span class="text-xs text-slate-400">(17 reviews)</span>
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-500 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
            </span>
          </p>
          <p class="text-slate-700">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam.
          </p>
        </div>
      </div>
      <div class="group shadow-md hover:shadow-lg bg-white grid grid-cols-2">
        <div class="relative h-80">
          <div class="absolute bg-rose-500 py-2 pr-3 pl-6 mt-6 text-white">
            <span class="font-bold text-xl">$6.500</span> <span class="text-xs text-stone-200">/ persone</span>
          </div>
          <img src="{{ asset('./images/dar-el-hakim-2.png') }}" alt="" class="h-full object-cover">
          <div class="bg-sky-500 py-3 px-6 absolute w-full bottom-0">
            <div class="flex justify-between">
              <span class="flex items-center gap-1 text-xs text-white">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>
              <span class="flex items-center gap-1 text-xs text-white relative -- before:block before:absolute before:h-full before:w-px before:top-0 before:bg-white before:-left-[26px]">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                </span>
                <span>7D/6N</span>
              </span>

            </div>
          </div>
        </div>
        <div class="p-10 relative">
          <a href="" class="absolute top-0 left-0 h-full w-full">&nbsp;</a>
          <h2 class="font-bold text-2xl text-slate-800 mb-6 group-hover:text-rose-600">Sunset view of beautiful lakeside</h2>
          <p class="flex justify-between mb-6">
            <span class="text-xs text-slate-400">(17 reviews)</span>
            <span class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-600 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-slate-500 w-4 h-4">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
            </span>
          </p>
          <p class="text-slate-700">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit luctus nec ullam. Ut elit tellus, luctus nec ullam.
          </p>
        </div>
      </div>
    </div> --}}
    
   
  </div>
   <button class="text-white h-12 bg-orange-500 w-60 mx-auto block mt-14 hover:bg-sky-600 transition-all">
      Read More
    </button>

</div>
 {{--  Food and Drinks Section --}}
<section class="relative py-16 my-4 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/bg-food.jpeg');">
  <div class="absolute inset-0 bg-black bg-opacity-50"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
    <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center">{{ __('Where to Eat in Timimoun') }}</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($foodAndDrinks as $food)
        <div class="bg-white bg-opacity-90 rounded-xl overflow-hidden shadow-lg text-gray-900">
          <img src="{{ asset('storage/' . $food->main_image) }}" alt="{{ $food->getTranslation('name', app()->getLocale()) }}" class="w-full h-48 object-cover">
          <div class="p-4">
            <h3 class="text-xl font-semibold mb-2">{{ $food->getTranslation('name', app()->getLocale()) }}</h3>
            <p class="text-sm text-gray-700">{{ Str::limit($food->getTranslation('description', app()->getLocale()), 80) }}</p>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-10">
      <a href="{{ route('foodanddrink.index') }}" class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-full shadow transition">
        {{ __('See All Food & Drinks') }}
      </a>
    </div>
  </div>
</section>

{{--  Tours Section --}}
<section class="relative py-16 my-4 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/bg-tour.jpg');">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl md:text-4xl font-bold mb-8 text-center text-gray-800">{{ __('Top Tours in Timimoun') }}</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($tours as $tour)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition hover:shadow-2xl">
          <img src="{{ asset('storage/' . $tour->main_image) }}" alt="{{ $tour->getTranslation('name', app()->getLocale()) }}" class="w-full h-48 object-cover">
          <div class="p-5">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
              {{ $tour->getTranslation('name', app()->getLocale()) }}
            </h3>
            <p class="text-sm text-gray-600 mb-4">
              {{ Str::limit($tour->getTranslation('description', app()->getLocale()), 80) }}
            </p>

            <a href="{{ route('tour.show', $tour->id) }}"
               class="inline-block text-sm text-orange-600 font-medium hover:underline">
              {{ __('View Details') }} →
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-10">
      <a href="{{ route('tour.index') }}"
         class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-6 rounded-full shadow transition">
        {{ __('Explore All Tours') }}
      </a>
    </div>
  </div>
</section>

{{-- Events section --}}

<section class="relative py-16 my-4 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/bg-events.jpg');">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-12">
      {{ __('Upcoming Events in Timimoun') }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
      @foreach($events as $event)
        <div class="bg-white shadow-xl rounded-xl overflow-hidden relative transition hover:scale-[1.02]">
          @if($event->main_image)
            <img src="{{ asset('storage/' . $event->main_image) }}" alt="{{ $event->getTranslation('name', app()->getLocale()) }}"
                 class="w-full h-56 object-cover">
          @endif

          {{-- Badge --}}
          <div class="absolute top-3 left-3 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow">
            {{ ucfirst($event->type) }}
          </div>

          <div class="p-5">
            {{-- Date + Countdown --}}
            <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
              <span>📅 {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y') }}</span>
     @php
    

    $now = Carbon\Carbon::now();
    $eventDate = Carbon\Carbon::parse($event->start_date);

    $isPast = $eventDate->isPast();
    $daysDiff = $now->diffInDays($eventDate, false);  // false = allow negative
    $hoursDiff = $now->diffInHours($eventDate, false);
@endphp

@if (!$isPast)
    @if ($daysDiff > 1)
        <span class="text-green-600 font-medium">⏳ {{ $daysDiff }} {{ __('days left') }}</span>
    @elseif ($hoursDiff > 0)
        <span class="text-yellow-600 font-medium">⏳ {{ __('A few hours left') }}</span>
    @else
        <span class="text-gray-500 font-medium">❌ {{ __('Event Starting Soon') }}</span>
    @endif
@else
    <span class="text-gray-500 font-medium">❌ {{ __('Event Passed') }}</span>
@endif
            </div>

            {{-- Event Name --}}
            <h3 class="text-lg font-semibold text-gray-800 mb-1">
              {{ $event->getTranslation('name', app()->getLocale()) }}
            </h3>

            {{-- Location --}}
            @if($event->location)
              <p class="text-sm text-gray-600 mb-2">📍 {{ $event->getTranslation('address', app()->getLocale()) }}</p>
            @endif

            {{-- Description --}}
            <p class="text-sm text-gray-700 mb-4">
              {{ Str::limit($event->getTranslation('description', app()->getLocale()), 90) }}
            </p>

            {{-- CTA --}}
            <a href="{{ route('event.show', $event->id) }}"
               class="inline-block text-orange-600 hover:underline font-medium text-sm">
              {{ __('More Info') }} →
            </a>
          </div>
        </div>
      @endforeach
    </div>

    {{-- See all CTA --}}
    <div class="text-center mt-12">
      <a href="{{ route('event.index') }}"
         class="inline-block bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-full shadow transition">
        {{ __('See All Events') }}
      </a>
    </div>
  </div>
</section>


{{-- Travel Agencies Section --}}

<section  class="relative py-16 my-4 bg-cover bg-center bg-no-repeat" style="background-image: url('/images/bg-travel.jpg');">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">
      {{ __('Trusted Travel Agencies') }}
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($travels as $agency)
        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition">
          {{-- Logo --}}
          @if($agency->main_image)
            <img src="{{ asset('storage/' . $agency->main_image) }}"
                 alt="{{ $agency->getTranslation('name', app()->getLocale()) }}"
                 class="w-full h-56 object-cover">
          @else
            <div class="w-20 h-20 mx-auto mb-4 bg-gray-200 flex items-center justify-center rounded-full">
              <span class="text-gray-500 text-xl">🌍</span>
            </div>
          @endif

          {{-- Name --}}
          <h3 class="text-xl font-semibold text-center text-gray-800">
            {{ $agency->getTranslation('name', app()->getLocale()) }}
          </h3>

          {{-- Description --}}
          <p class="text-center text-sm text-gray-600 mt-2">
            {{ Str::limit($agency->getTranslation('description', app()->getLocale()), 70) }}
          </p>

          {{-- Contact Info --}}
          <div class="mt-4 text-center text-sm text-gray-500">
            @if($agency->phone)
              📞 {{ $agency->phone }} <br>
            @endif
            @if($agency->email)
              ✉️ {{ $agency->email }}
            @endif
          </div>

          {{-- CTA --}}
          <div class="text-center mt-4">
            <a href="{{ route('travelagency.show', $agency->id) }}"
               class="inline-block mt-2 text-orange-600 hover:underline font-medium text-sm">
              {{ __('More Info') }} →
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <div class="text-center mt-12">
      <a href="{{ route('travelagency.index') }}"
         class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-6 rounded-full shadow transition">
        {{ __('Browse All Travel Agencies') }}
      </a>
    </div>
  </div>
</section>


</div>


@endsection



  


