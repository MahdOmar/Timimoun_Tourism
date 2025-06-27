@extends('layouts.layout')

@section('content')

<div class="bg-gray-50 min-h-screen py-8 px-4">
  <div class="max-w-5xl mx-auto">
    
    <!-- Back Button -->
    <a href="" class="inline-block text-indigo-600 hover:underline mb-6">
      ← Back to Places
    </a>

    <!-- Hero Image -->
    <div class="w-full h-72 rounded-2xl overflow-hidden shadow-lg mb-6">
      <img src="{{ asset('./images/igh.jpg') }}" alt="" class="w-full h-full object-cover">
    </div>

    <!-- Title & Info -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
      <div>
        <h1 class="text-3xl font-bold mb-2">Ighzer Cave</h1>
        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-medium px-3 py-1 rounded-full">
          <i class="fas fa-map-marker-alt mr-1"></i> Timimoun
        </span>
      </div>

      <!-- Location -->
    
        <div class="mt-4 md:mt-0 text-gray-600">
          📍 location
        </div>
      
    </div>

    <!-- Description -->
    <div class="prose max-w-none text-gray-800">
      {!! nl2br(e('glsdfmgl gk dslmkg lmsdk gl klsdm kmg kdslm klmg ksdlm klms klmd')) !!}
    </div>

    <!-- Optional: Gallery (can be added later) -->
    
    <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
      
        <img src="{{ asset('./images/kaf.jpeg') }}" class="w-full h-32 object-cover rounded-lg shadow">
        <img src="{{ asset('./images/timi.jpg') }}" class="w-full h-32 object-cover rounded-lg shadow">
        <img src="{{ asset('./images/roses-sables.jpg') }}" class="w-full h-32 object-cover rounded-lg shadow">
      
    
    </div>
    
  </div>
</div>



@endsection('content')  