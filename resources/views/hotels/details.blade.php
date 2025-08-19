@extends('layouts.layout')

@section('content')


{{-- <div class="max-w-5xl mx-auto px-4 py-8">
  <!-- Title & Location -->
  <div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800"></h1>
    <p class="text-gray-500"></p>
  </div>

  <!-- Image Gallery -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
    <img src="{{ asset('./images/gourara.jpg' ) }}" alt="Main photo" class="w-full h-64 object-cover rounded-lg shadow">
    <div class="grid grid-cols-2 gap-2">
    
        <img src="{{ asset('./images/dar-el-hakim-2.png' ) }}" alt="Gallery" class="w-full h-32 object-cover rounded-lg">
  
    </div>
  </div>

  <!-- Description -->
  <div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-2">About this place</h2>
    <p class="text-gray-700 leading-relaxed"></p>
  </div>

  <!-- Amenities -->
  <div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-2">Amenities</h2>
    <ul class="flex flex-wrap gap-4 text-gray-600">
     
        <li class="bg-gray-100 px-3 py-1 rounded"></li>

    </ul>
  </div>

  <!-- Map -->
  <div class="mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-2">Location</h2>
    <iframe
      src="https://www.google.com/maps?q=&output=embed"
      class="w-full h-64 rounded-lg shadow"
      allowfullscreen
      loading="lazy">
    </iframe>
  </div>

  <!-- CTA Button -->
  <div class="text-center">
    <a href="#" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700">
      Book Now
    </a>
  </div>
</div> --}}


<div class="bg-gray-100">
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">
      <!-- Product Images -->
      <div class="w-full md:w-1/2 px-4 mb-8">
       
         <img src=" {{ asset('storage/'.$accommodation->main_image) }} " alt="Product"
                    class="w-full h-[500px] rounded-lg shadow-md mb-4 object-cover" id="mainImage"  >
            
       
       
        <div class="flex gap-4 py-4 justify-center overflow-x-auto">
          <img src=" {{ asset('storage/'.$accommodation->main_image) }} " alt="Thumbnail 1"
                    class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300 w-full h-auto" onclick="changeImage(this.src)">
           @foreach ($accommodation->gallery as $item)
          <img src="{{ asset('storage/'.$item->path) }}" alt="Thumbnail 1"
                        class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300 w-full h-auto"
                        onclick="changeImage(this.src)">

        @endforeach
        </div>
        
      </div>

      <!-- Product Details -->
      <div class="w-full md:w-1/2 px-4">
        <h2 class="text-3xl font-bold mb-2">{{ $accommodation->getTranslation('name', app()->getLocale()) }}</h2>
        <p class="text-gray-600 mb-4">{{ $accommodation->type }}</p>
        <div class="mb-4">
          <span class="text-2xl font-bold mr-2">{{ $accommodation->price_range }}</span>
          <span class="text-gray-500 line-through">{{ $accommodation->price_range }}</span>
        </div>
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
              clip-rule="evenodd" />
          </svg>
          <span class="ml-2 text-gray-600">4.5 (120 reviews)</span>
        </div>
        <p class="text-gray-700 mb-6">{{ $accommodation->getTranslation('description', app()->getLocale()) }}</p>

        <div class="mb-6">
          <h3 class="text-lg font-semibold mb-2">Color:</h3>
          <div class="flex space-x-2">
            <button
                            class="w-8 h-8 bg-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"></button>
            <button
                            class="w-8 h-8 bg-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"></button>
            <button
                            class="w-8 h-8 bg-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"></button>
          </div>
        </div>

        <div class="mb-6">
          <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
         
        </div>

      
        <div>
          <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
          <ul class="list-disc list-inside text-gray-700">
            <li>Industry-leading noise cancellation</li>
            <li>30-hour battery life</li>
            <li>Touch sensor controls</li>
            <li>Speak-to-chat technology</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script>
    function changeImage(src) {
     
            document.getElementById('mainImage').src = src;
        }
  </script>
</div>

@endsection