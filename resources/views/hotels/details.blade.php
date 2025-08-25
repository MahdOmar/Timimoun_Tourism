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
      <div class="w-full md:w-1/2 px-4 mb-8 ">
       
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

      <!-- Hotel Details -->
      <div class="w-full md:w-1/2 px-4 bg-white rounded-lg shadow overflow-hidden py-4">
        <h2 class="text-3xl font-bold mb-2">{{ $accommodation->getTranslation('name', app()->getLocale()) }}</h2>
        <p class="text-gray-600 mb-4">{{ $accommodation->type }}</p>
        <div class="mb-4">
          <span class="text-2xl font-bold mr-2">{{ $accommodation->min_price }} - {{ $accommodation->max_price }} DA </span>
          {{-- <span class="text-gray-500 line-through">{{ $accommodation->max_price }}</span> --}}
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

       

       

      
        <div>
          <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
          <ul class="list-disc list-inside text-gray-700">
            @foreach ($accommodation->amenities as $item)
            <li>{{ $item }}</li>
                
            @endforeach
            
            
          </ul>
        </div>
        <!-- Contact Info + Map Below -->
    <div class="grid md:grid-cols-2 gap-6 mt-10">
      
      <!-- Contact Info -->
      <div class="bg-white rounded-lg shadow-lg p-5">
        <h3 class="text-lg font-semibold mb-3 ">Contact Information</h3>
        <ul class="text-gray-700 text-sm space-y-2">
          @if($accommodation->phone)
            <li>📞 <a href="tel:{{ $accommodation->phone }}" class="hover:underline">{{ $accommodation->phone }}</a></li>
          @endif
          @if($accommodation->email)
            <li>📧 <a href="mailto:{{ $accommodation->email }}" class="hover:underline">{{ $accommodation->email }}</a></li>
          @endif
          @if($accommodation->website)
            <li>🌐 <a href="{{ $accommodation->website }}" target="_blank" class="text-indigo-600 hover:underline">Visit Website</a></li>
          @endif
        </ul>
      </div>

      <!-- Map -->
      @if($accommodation->latitude && $accommodation->longitude)
      <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <h3 class="text-lg font-semibold p-4">Location</h3>
        <iframe 
          width="100%" 
          height="250" 
          frameborder="0" 
          style="border:0"
          src="https://www.google.com/maps?q={{ $accommodation->latitude }},{{ $accommodation->longitude }}&hl=en&z=14&output=embed"
          allowfullscreen>
        </iframe>
      </div>
      @endif

    </div>
  </div>
      </div>
    </div>
  </div>

  <!-- Related Accommodations -->
    @if(isset($relatedAccommodations) && $relatedAccommodations->count() > 0)
    <div class="mt-12 px-6 py-6 bg-white rounded-xl shadow m-4">
      <h2 class="text-2xl font-bold mb-6">Related Accommodations</h2>
      <div class="grid md:grid-cols-3 gap-6">
        @foreach($relatedAccommodations as $related)
          <a href="{{ route('accommodations.show', $related->id) }}" 
             class="block bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
            <img src="{{ asset('storage/'.$related->main_image) }}" 
                 alt="{{ $related->getTranslation('name', app()->getLocale()) }}"
                 class="w-full h-40 object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-gray-800">
                {{ $related->getTranslation('name', app()->getLocale()) }}
              </h3>
              <p class="text-sm text-gray-600 capitalize">{{ $related->type }}</p>
              <p class="text-indigo-600 font-bold mt-2">{{ $related->min_price }} - {{ $related->max_price }} DA</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    @endif
  

  <script>
    function changeImage(src) {
     
            document.getElementById('mainImage').src = src;
        }
  </script>
</div>

@endsection