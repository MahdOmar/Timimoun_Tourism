@extends('layouts.layout')

@section('content')
<section class="py-16 bg-gray-50">
  <div class="max-w-9xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Local Events</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Filters -->
      <aside class="bg-white shadow-md rounded-lg p-5 h-fit">
        <h3 class="text-lg font-semibold mb-4">Filter Events</h3>

        <!-- Upcoming / Past -->
        <div class="mb-4">
          <label class="block font-medium text-sm text-gray-700 mb-2">Show</label>
          <select name="status" class="w-full border-gray-300 rounded-lg">
            <option value="upcoming" selected>Upcoming Events</option>
            <option value="past">Past Events</option>
            <option value="all">All Events</option>
          </select>
        </div>

        <!-- Duration -->
        <div class="mb-4">
          <label class="block font-medium text-sm text-gray-700 mb-2">Duration</label>
          <select name="duration" class="w-full border-gray-300 rounded-lg">
            <option value="all" selected>All Durations</option>
            <option value="short">Short (≤ 1 day)</option>
            <option value="medium">Medium (2–3 days)</option>
            <option value="long">Long (≥ 4 days)</option>
          </select>
        </div>

        <!-- Filter Button -->
        <button type="submit"
          class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-500 transition">
          Apply Filters
        </button>
      </aside>

      <!-- Events Grid -->
      <div class="md:col-span-3 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
          @php
            $start = \Carbon\Carbon::parse($event->start_date);
            $end   = \Carbon\Carbon::parse($event->end_date);
            $days  = $start->diffInDays($end) + 1;
          @endphp

          <!-- Reuse the modern event card we styled -->
          <div class="relative bg-white overflow-hidden shadow-md group hover:shadow-2xl transition transform hover:-translate-y-1 flex flex-col">
            <div class="relative h-96">
              <img src="{{ asset('storage/' . $event->main_image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
              <div class="absolute top-4 left-4 bg-white shadow-md rounded-lg px-3 py-2 text-center">
                <div class="text-lg font-bold text-red-600 leading-none">{{ $start->format('d') }}</div>
                <div class="text-xs uppercase text-gray-600">{{ $start->format('M') }}</div>
              </div>
            </div>
            <div class="flex-1 p-5 flex flex-col">
              <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-red-600 transition">
                {{ $event->getTranslation('name', app()->getLocale()) }}
              </h3>
              <p class="text-gray-600 text-sm mb-4 flex-1">{{ Str::limit($event->getTranslation('description', app()->getLocale()), 90) }}</p>
              <span class="text-xs text-gray-500 mb-3">Duration: {{ $days }} day(s)</span>
              <a href="{{ route('event.show', $event->id) }}" class="mt-auto inline-block text-center bg-red-600 text-white px-4 py-2  hover:bg-red-500 transition font-medium">
                View Details
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection
