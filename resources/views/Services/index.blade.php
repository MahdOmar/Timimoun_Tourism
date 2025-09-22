@extends('layouts.layout')

@section('content')



  

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">{{ __('messages.service.services_hero_title') }}</h2>
            <p class="text-xl max-w-2xl mx-auto mb-8">{{ __('messages.service.services_hero_sub') }}</p>
            
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Services List -->
            <div class="lg:w-1/3">
               

                <div class="space-y-5">
                    <!-- Service Card -->
                    <div class="service-card bg-white rounded-xl shadow-md p-5 active-service transition-all duration-300 cursor-pointer">
                        <div class="flex items-start">
                            <div class="bg-blue-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-hospital text-blue-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-lg text-gray-800">{{ __('messages.service.hospital_name') }}</h3>
                                <p class="text-gray-600 mb-2">{{ __('messages.service.hospital_desc') }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>123 Main Street, Downtown</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    <span>+1 (555) 123-4567</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service Card -->
                    <div class="service-card bg-white rounded-xl shadow-md p-5 transition-all duration-300 cursor-pointer">
                        <div class="flex items-start">
                            <div class="bg-green-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-first-aid text-green-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-lg text-gray-800">{{ __('messages.service.pharmacy_name') }}</h3>
                                <p class="text-gray-600 mb-2">{{ __('messages.service.pharmacy_desc') }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>456 Oak Avenue, Midtown</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    <span>+1 (555) 987-6543</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service Card -->
                    <div class="service-card bg-white rounded-xl shadow-md p-5 transition-all duration-300 cursor-pointer">
                        <div class="flex items-start">
                            <div class="bg-red-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-shield-alt text-red-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-lg text-gray-800">{{ __('messages.service.police_name') }}</h3>
                                <p class="text-gray-600 mb-2">{{ __('messages.service.police_desc') }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>789 Justice Boulevard</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    <span>911 (Emergency)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service Card -->
                    <div class="service-card bg-white rounded-xl shadow-md p-5 transition-all duration-300 cursor-pointer">
                        <div class="flex items-start">
                            <div class="bg-purple-100 p-3 rounded-lg mr-4">
                                <i class="fas fa-ambulance text-purple-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-lg text-gray-800">{{ __('messages.service.urgent_care_name') }}</h3>
                                <p class="text-gray-600 mb-2">{{ __('messages.service.urgent_care_desc') }}</p>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    <span>321 Pine Street, Westside</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mt-1">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    <span>+1 (555) 456-7890</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-gray-800">{{ __('messages.service.service_locations') }}</h3>
                        <div class="flex items-center space-x-2">
                            <span class="text-gray-600">{{ __('messages.service.your_location') }}:</span>
                            <span class="font-medium">{{ __('messages.service.downtown') }}</span>
                            <button class="ml-2 text-blue-600">
                                <i class="fas fa-location-arrow"></i>
                            </button>
                        </div>
                    </div>
                    
                </div>

                <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('messages.service.emergency_contacts') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-red-50 p-4 rounded-lg border-l-4 border-red-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-red-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-phone-alt text-red-600"></i>
                                </div>
                                <h4 class="font-bold text-red-700">{{ __('messages.service.police') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-red-800">1548</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-ambulance text-blue-600"></i>
                                </div>
                                <h4 class="font-bold text-blue-700">{{ __('messages.service.ambulance') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-blue-800">14</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-yellow-100 p-2 rounded-full mr-3">
                                    <i class="fas fa-fire-extinguisher text-yellow-600"></i>
                                </div>
                                <h4 class="font-bold text-yellow-700">{{ __('messages.service.fire') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-yellow-800">14</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 w-full h-96 rounded-lg shadow-md" id="map"></div>

                <div class="">
                 <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('messages.service.postes_banks_atms') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-red-50 p-4 rounded-lg border-l-4 border-red-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-red-100 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <h4 class="font-bold text-red-700">{{ __('messages.service.postes') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-red-800">04 {{ __('messages.service.office') }}</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                </div>
                                <h4 class="font-bold text-blue-700">{{ __('messages.service.banks') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-blue-800">04 {{ __('messages.service.agency') }}</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-yellow-100 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-money-bills"></i>
                                </div>
                                <h4 class="font-bold text-yellow-700">{{ __('messages.service.atms') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-yellow-800">08 {{ __('messages.service.atm') }}</p>
                        </div>
                    </div>
                </div>

               
                <div class="mt-4 w-full h-96 rounded-lg shadow-md" id="map2"></div>



                 <div class="">
                 <div class="bg-white rounded-xl shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('messages.service.doctors_pharmacies') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-red-50 p-4 rounded-lg border-l-4 border-red-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-red-100 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                <h4 class="font-bold text-red-700">{{ __('messages.service.general_doctors') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-red-800">04 {{ __('messages.service.doctor') }}</p>
                        </div>
                        <div class="bg-blue-50 p-4 rounded-lg border-l-4 border-blue-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-blue-100 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                </div>
                                <h4 class="font-bold text-blue-700">{{ __('messages.service.specialist_doctors') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-blue-800">04 {{ __('messages.service.specialist') }}</p>
                        </div>
                        <div class="bg-yellow-50 p-4 rounded-lg border-l-4 border-yellow-500">
                            <div class="flex items-center mb-2">
                                <div class="bg-yellow-100 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-money-bills"></i>
                                </div>
                                <h4 class="font-bold text-yellow-700">{{ __('messages.service.pharmacy') }}</h4>
                            </div>
                            <p class="text-2xl font-bold text-yellow-800">08 {{ __('messages.service.store') }}</p>
                        </div>
                    </div>
                </div>

               
                <div class="mt-4 w-full h-96 rounded-lg shadow-md" id="map3"></div>



            </div>



            </div>


            
        </div>
    </main>





@endsection('content')  

 <script>

    document.addEventListener("DOMContentLoaded", function () {
        // Initialize map
       
        
        var map = L.map('map').setView([29.26008881814599, 0.2285530930399549], 13);
        
        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        
        // Add markers for demonstration
        L.marker([29.256246912996673, 0.2338650094604732]).addTo(map)
            .bindPopup('<strong>City General Hospital</strong><br>24/7 emergency services')
            .openPopup();
        
        L.marker([29.265813016869632, 0.2333187140967738]).addTo(map)
            .bindPopup('<strong>Police Station</strong><br>24/7 emergency services')
            .openPopup();
        
        L.marker([29.275295189038157, 0.2401809883871802]).addTo(map)
            .bindPopup('<strong>Ambulence</strong><br>24/7 emergency services')
            .openPopup();
        
        L.marker([29.257373309227653, 0.23214867945993878]).addTo(map)
            .bindPopup('<strong>Pharmacy</strong><br>Open until 11:00 PM')
           


            
        var map2 = L.map('map2').setView([29.26008881814599, 0.2285530930399549], 13);
        
        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map2);
        
        // Add markers for demonstration
        L.marker([29.26015828127157, 0.2287773917465265]).addTo(map2)
            .bindPopup('<strong>Main Poste + ATM</strong><br> From Saturday to Thursday <br> Open until 18:00 <br> ATM available 24/7')
            
        
        L.marker([29.26014190138587, 0.2281712125214895]).addTo(map2)
            .bindPopup('<strong>BNA + ATM</strong><br>From Sunday to Thursday <br> Open until 15:00 <br> ATM available 24/7')
           
        
        L.marker([29.262225513289444, 0.229614818478226652]).addTo(map2)
            .bindPopup('<strong>BDL + ATM</strong><br>From Sunday to Thursday <br> Open until 15:00 <br> ATM available 24/7')
           
        
        L.marker([29.264983998861695, 0.2339384759752733]).addTo(map2)
            .bindPopup('<strong>BADR + ATM</strong><br>From Sunday to Thursday <br> Open until 15:00 <br> ATM available 24/7')

         L.marker([29.25904325091708, 0.22895275076276675]).addTo(map2)
            .bindPopup('<strong>BEA + ATM</strong><br>From Sunday to Thursday <br> Open until 15:00 <br> ATM available 24/7')    
            
         L.marker([29.26410400638427, 0.23632222086488916]).addTo(map2)
            .bindPopup('<strong>Poste Office + ATM</strong> <br>  Saturday to Thursday <br> Open until 16:00 <br> ATM available 24/7') 
            
         L.marker([29.270636043183135, 0.2366308103804145]).addTo(map2)
            .bindPopup('<strong>Poste Office + ATM </strong><br> Saturday to Thursday <br> Open until 16:00 <br> ATM available 24/7') 
            
         L.marker([29.253385453923894, 0.22768267514482787]).addTo(map2)
            .bindPopup('<strong>Poste Office + ATM</strong> <br>  Saturday to Thursday <br> Open until 16:00 <br> ATM available 24/7')
            
    



             var map3 = L.map('map3').setView([29.26008881814599, 0.2285530930399549], 13);
        
        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map3);
        
        // Add markers for demonstration
        L.marker([29.26341764766776, 0.2305582038686992]).addTo(map3)
            .bindPopup('<strong>Dr KABACH </strong><br> General Practitioner<br> From Saturday to Thursday <br> Open until 16:00 <br>')
            
        
        L.marker([29.257845038097972, 0.237949118178328]).addTo(map3)
            .bindPopup('<strong>Dr SMAHI </strong><br> General Practitioner<br> From Saturday to Thursday <br> Open until 16:00 <br>')
           
        
        L.marker([29.26000746710055, 0.23080779090679407]).addTo(map3)
            .bindPopup('<strong>Dr MENAOUER </strong><br> Internal Medicine Specialist<br> From Saturday to Thursday <br> Open until 16:00 <br>')
           
        
        L.marker([29.25395347043828, 0.22390907434572754]).addTo(map3)
            .bindPopup('<strong>Dr Daouelhadj </strong><br> Cardiologist<br> From Saturday to Thursday <br> Open until 16:00 <br>')

         L.marker([29.270402756966895, 0.241184581384931]).addTo(map3)
            .bindPopup('<strong>Dr Necira </strong><br> Gynecologist<br> From Saturday to Thursday <br> Open until 16:00 <br>')    
            
         L.marker([29.2719364021746, 0.236882735507053]).addTo(map3)
            .bindPopup('<strong>Dr KARIMI </strong><br>General Practitioner<br> From Saturday to Thursday <br> Open until 16:00 <br>') 
            
         L.marker([29.26545451888424, 0.23588248363577985]).addTo(map3)
            .bindPopup('<strong>Pharmacy Gachouch</strong> <br> Open until 23:00 ') 
            
         L.marker([29.253385453923894, 0.22768267514482787]).addTo(map3)
            .bindPopup('<strong>Pharmacy</strong> <br> Open until 23:00 ')

                
         L.marker([29.262396370074043, 0.24191955746371366]).addTo(map3)
            .bindPopup('<strong>Pharmacy Djoudi</strong> <br> Open until 23:00 ')
            
            
        
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