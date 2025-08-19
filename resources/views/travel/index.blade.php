@extends('layouts.layout')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-16">
  <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Travel Agencies</h2>

  <div class="grid sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
    @foreach($travels as $agency)
      <a href="{{ route('travel.show', $agency->id) }}" 
         class="group flex flex-col items-center text-center  shadow hover:shadow-lg transition p-6">
        
        <!-- Agency Image -->
        <img src="{{ asset('storage/' . $agency->main_image) }}" 
             alt="{{ $agency->getTranslation('name', app()->getLocale()) }}" 
             class="w-28 h-28 object-cover rounded-full mb-4 group-hover:scale-105 transition duration-300">

        <!-- Agency Name -->
        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-orange-600">
          {{ $agency->getTranslation('name', app()->getLocale()) }}
        </h3>

        <!-- Rating -->
        <div class="flex items-center justify-center mt-2 text-yellow-400">
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <svg class="w-5 h-5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.943h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44 1.286 3.943c.3.921-.755 1.688-1.54 1.118L10 13.011l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.286-3.943-3.36-2.44c-.783-.57-.38-1.81.588-1.81h4.15l1.286-3.943z"/></svg>
          <span class="ml-2 text-sm text-gray-500">(23 reviews)</span>
        </div>
      </a>
    @endforeach
  </div>


</section>


@endsection