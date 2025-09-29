@extends('layouts.layout')

@section('content')



@section('content')
<section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">
            {{ __('messages.flights_to_timimoun') }}
        </h2>
        <p class="text-xl max-w-2xl mx-auto mb-8">
            {{ __('messages.weekly_program_air_algerie') }}
        </p>
    </div>
</section>

<main class="container mx-auto px-4 py-12">
    <div class="bg-white rounded-xl shadow-md p-6 overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-800">
                    <th class="p-3">{{ __('messages.day') }}</th>
                    <th class="p-3">{{ __('messages.route') }}</th>
                    <th class="p-3">{{ __('messages.departure') }}</th>
                    <th class="p-3">{{ __('messages.arrival') }} ({{ __('messages.Timimoun') }})</th>
                   <th class="p-3">{{ __('messages.departure') }} ({{ __('messages.Timimoun') }})</th>
                    <th class="p-3">{{ __('messages.arrival') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3 font-semibold">{{ __('messages.saturday') }}</td>
                    <td class="p-3">{{ __('messages.flight.saturday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.saturday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.saturday.arrival') }}</td>
                     <td class="p-3">{{ __('messages.flight.saturday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.saturday.arrival_algeirs') }}</td>
                </tr>
                <tr class="border-b">
                    <td class="p-3 font-semibold">{{ __('messages.sunday') }}</td>
                    <td class="p-3">{{ __('messages.flight.sunday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.sunday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.sunday.arrival') }}</td>
                    <td class="p-3">{{ __('messages.flight.sunday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.sunday.arrival_algeirs') }}</td>
                </tr>
                <tr class="border-b">
                     <td class="p-3 font-semibold">{{ __('messages.monday') }}</td>
                    <td class="p-3">{{ __('messages.flight.monday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.monday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.monday.arrival') }}</td>
                    <td class="p-3">{{ __('messages.flight.monday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.monday.arrival_algeirs') }}</td>
                </tr>

                 <tr class="border-b">
                     <td class="p-3 font-semibold">{{ __('messages.tuesday') }}</td>
                    <td class="p-3">{{ __('messages.flight.tuesday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.tuesday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.tuesday.arrival') }}</td>
                    <td class="p-3">{{ __('messages.flight.tuesday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.tuesday.arrival_algeirs') }}</td>
                </tr>

                 <tr class="border-b">
                     <td class="p-3 font-semibold" rowspan="2">{{ __('messages.wednesday') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.arrival') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.arrival_algeirs') }}</td>
                   
                </tr>

                <tr class="border-b">
                  
                    <td class="p-3">{{ __('messages.flight.wednesday.route2') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.departure2') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.arrival2') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.departure2_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.wednesday.arrival_oran') }}</td>
                </tr>

                 <tr class="border-b">
                     <td class="p-3 font-semibold">{{ __('messages.thursday') }}</td>
                    <td class="p-3">{{ __('messages.flight.thursday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.thursday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.thursday.arrival') }}</td>
                    <td class="p-3">{{ __('messages.flight.thursday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.thursday.arrival_algeirs') }}</td>
                </tr>

                 <tr class="border-b">
                     <td class="p-3 font-semibold">{{ __('messages.friday') }}</td>
                    <td class="p-3">{{ __('messages.flight.friday.route') }}</td>
                    <td class="p-3">{{ __('messages.flight.friday.departure') }}</td>
                    <td class="p-3">{{ __('messages.flight.friday.arrival') }}</td>
                    <td class="p-3">{{ __('messages.flight.friday.departure_timimoun') }}</td>
                    <td class="p-3">{{ __('messages.flight.friday.arrival_oran') }}</td>
                </tr>
            </tbody>
        </table>
    </div>

      <div class="bg-white rounded-xl shadow-md p-6 mb-6 mt-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ __('messages.service_transportation.transportation') }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-600">{{ __('messages.service.your_location') }}:</span>
                            <span class="font-medium">{{ __('messages.service.downtown') }}</span>
                            <button class="ml-2 text-blue-600">
                                <i class="fas fa-location-arrow"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>

                  <div class="mt-4 w-full h-96 rounded-lg shadow-md" id="map"></div>
</main>
@endsection

 <script>

    document.addEventListener("DOMContentLoaded", function () {
        // Initialize map
       
        
        var map = L.map('map').setView([29.26008881814599, 0.2285530930399549], 13);

        const translations = @json(__('messages.service_transportation'));

        
        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        // Add markers for demonstration
        L.marker([29.245836905384138, 0.28128677530293755]).addTo(map)
            .bindPopup(`<strong>${translations.airport}</strong><br>`)
          
        
        L.marker([29.246938091897665, 0.22562877838635984]).addTo(map)
            .bindPopup(`<strong>${translations.bus_station}</strong><br>`)
           
        L.marker([29.262813062314613, 0.2300384214176276]).addTo(map)
         .bindPopup(`<strong>${translations.air_algerie}</strong><br>${translations.air_algerie_open}`)
            
        
     
            
         L.marker([29.254414706414718, 0.23268606883012205]).addTo(map)
           
            .bindPopup(`<strong>${translations.bus_station2}</strong><br>`)
     
           


            
        
        
        // Add click event to service cards
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.service-card').forEach(c => {
                    c.classList.remove('active-service');
                });
                this.classList.add('active-service');
            });
        });
           });
    </script>


