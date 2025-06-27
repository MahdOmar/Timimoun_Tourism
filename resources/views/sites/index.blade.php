@extends('layouts.layout')

@section('content')

<div class="bg-gray-50 min-h-screen p-4">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-8">📍 Places to Visit in Timimoun</h1>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
          <img src="{{ asset('./images/igh.jpg') }}" alt="" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500" />
          
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Ighzer</h2>
            <p class="text-gray-600 text-sm">dqsldkl  kdlsmq kdlq kdl kl dkqlmk dlsqm kdlmqs k dlm qskl dmsqlm kd</p>
            
            <a href=""
               class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
              View more →
            </a>
          </div>
        </div>
        
           <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
          <img src="{{ asset('./images/igh.jpg') }}" alt="" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500" />
          
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Ighzer</h2>
            <p class="text-gray-600 text-sm">dqsldkl  kdlsmq kdlq kdl kl dkqlmk dlsqm kdlmqs k dlm qskl dmsqlm kd</p>
            
            <a href=""
               class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
              View more →
            </a>
          </div>
        </div>

           <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
          <img src="{{ asset('./images/igh.jpg') }}" alt="" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500" />
          
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Ighzer</h2>
            <p class="text-gray-600 text-sm">dqsldkl  kdlsmq kdlq kdl kl dkqlmk dlsqm kdlmqs k dlm qskl dmsqlm kd</p>
            
            <a href=""
               class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
              View more →
            </a>
          </div>
        </div>

           <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">
          <img src="{{ asset('./images/igh.jpg') }}" alt="" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500" />
          
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Ighzer</h2>
            <p class="text-gray-600 text-sm">dqsldkl  kdlsmq kdlq kdl kl dkqlmk dlsqm kdlmqs k dlm qskl dmsqlm kd</p>
            
            <a href=""
               class="inline-block mt-4 text-indigo-600 hover:text-indigo-800 font-medium transition duration-200">
              View more →
            </a>
          </div>
        </div>
     
    </div>

    <!-- Pagination (if applicable) -->
    <div class="mt-10">
     
    </div>
  </div>
</div>







@endsection('content')  