@extends('layouts.layout')

@section('content')

<section class="bg-gray-50 py-12">
  <div class="max-w-6xl mx-auto px-4">

    <!-- HEADER -->
    <div class="relative mb-10">
      <img src="{{ asset('storage/' . $event->main_image) }}" 
           alt="{{ $event->getTranslation('name', app()->getLocale()) }}"
           class="w-full h-[400px] object-cover rounded-lg shadow-lg">
      
      <!-- Overlay -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent rounded-lg"></div>
      
      <!-- Event Title Overlay -->
      <div class="absolute bottom-6 left-6 text-white">
        <h1 class="text-4xl font-extrabold drop-shadow-lg mb-2">
          {{ $event->getTranslation('name', app()->getLocale()) }}
        </h1>
        <p class="text-lg opacity-90">{{ $event->location ?? 'Timimoun, Algeria' }}</p>
      </div>

      <!-- Date Box -->
      <div class="absolute top-6 right-6 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg text-center">
        <div class="text-2xl font-bold">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</div>
        <div class="uppercase">{{ \Carbon\Carbon::parse($event->start_date)->format('M Y') }}</div>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="grid md:grid-cols-3 gap-8 bg-white shadow-md rounded-lg p-6" >
      
      <!-- LEFT COLUMN: INFO -->
      <div class="md:col-span-2">
        <div class="flex justify-between">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">About the Event</h2>
      <div class=" bg-green-600 text-white px-6 py-2 rounded-lg shadow-lg text-center">
        <div class="text-xl font-bold">@if ($event->price == 0) Free
            
        @else
            {{ number_format($event->price, 2) }} DA
            
        @endif</div>
        
      </div>
        </div>
        
        <p class="text-gray-600 leading-relaxed mb-6">
          {{ $event->getTranslation('description', app()->getLocale()) }}
        </p>

        <!-- COUNTDOWN -->
        @php
          $now = \Carbon\Carbon::now();
          $eventDate = \Carbon\Carbon::parse($event->start_date);
          $daysLeft = $now->diffInDays($eventDate, false);
          $hoursLeft = $now->diffInHours($eventDate, false);
        @endphp
        <div class="mb-8">
          @if ($eventDate->isPast())
            <span class="px-4 py-2 bg-gray-200 text-gray-600 rounded">❌ Event has passed</span>
          @elseif ($daysLeft > 0)
            <span class="px-4 py-2 bg-green-100 text-green-700 rounded">⏳ {{ $daysLeft }} days left</span>
          @elseif ($hoursLeft > 0)
            <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded">⏳ Few hours left</span>
          @else
            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded">⏳ Starting soon!</span>
          @endif
        </div>

        <!-- Gallery -->
        @if($event->gallery && count($event->gallery) > 0)
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Highlights</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
          @foreach($event->gallery as $image)
            <img src="{{ asset('storage/' . $image->path) }}" 
                 alt="Event Gallery Image" 
                 class="w-full h-40 object-cover rounded-lg shadow hover:scale-105 transition">
          @endforeach
        </div>
        @endif
      </div>

      <!-- RIGHT COLUMN: SIDEBAR -->
      <div class="bg-white shadow-md rounded-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Event Info</h3>
        <ul class="space-y-3 text-gray-700">
          <li><strong>Start Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('l, d M Y H:i') }}</li>
           <li><strong>End Date:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('l, d M Y H:i') }}</li>
          <li><strong>Location:</strong> {{ $event->getTranslation('address', app()->getLocale()).' Timimoun, Algeria' ?? 'Timimoun, Algeria' }}</li>
          <li><strong>Category:</strong> {{ $event->category ?? 'Festival' }}</li>
        </ul>

        <div class="mt-6">
          <a href="#" class="block text-center bg-red-600 text-white py-3 rounded-lg font-semibold hover:bg-red-500 transition">
            Register / Join
          </a>
        </div>

        <div class="mt-4">
          <a href="" class="block text-center border border-gray-300 py-3 rounded-lg hover:bg-gray-100 transition">
            Back to Events
          </a>
        </div>
      </div>
    </div>

    <!-- MAP -->
    @if($event->latitude && $event->longitude)
    <div class="mt-12">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Location</h2>
      <iframe 
        src="https://maps.google.com/maps?q={{ $event->latitude }},{{ $event->longitude }}&z=15&output=embed" 
        width="100%" height="400" 
        class="rounded-lg shadow">
      </iframe>
    </div>
    @endif
  </div>
</section>


@endsection('content')  