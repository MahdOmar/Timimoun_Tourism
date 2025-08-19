@extends('layouts.layout')

@section('content')

<section class="bg-gray-100 py-20">
  <div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Essential Services</h2>

    <div class="space-y-16">
      <!-- Hospital -->
      <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Card -->
        <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
          <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M12 3v18m9-9H3" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">Hospital</h3>
          </div>
          <p class="text-gray-600 text-sm">24/7 emergency care and specialized medical services available in the city.</p>
        </div>
        <!-- Map -->
        <div>
          <iframe 
           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27843.088430833213!2d0.22876000390119958!3d29.27099215982808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1275723d4cf19fdf%3A0x810fb1ee4996b3af!2sHospital%20of%20Timimoun!5e0!3m2!1sen!2sus!4v1755557216807!5m2!1sen!2sus" 
            width="100%" height="250" style="border:0;" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            class="rounded-xl shadow-md"></iframe>
        </div>
      </div>

      <!-- Police Station (reverse layout) -->
      <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Map first -->
        <div class="order-2 md:order-1">
          <iframe 
           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27843.088430833213!2d0.22876000390119958!3d29.27099215982808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1275723d4cf19fdf%3A0x810fb1ee4996b3af!2sHospital%20of%20Timimoun!5e0!3m2!1sen!2sus!4v1755557216807!5m2!1sen!2sus" 
            width="100%" height="250" style="border:0;" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            class="rounded-xl shadow-md"></iframe>
        </div>
        <!-- Card -->
        <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition order-1 md:order-2">
          <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2l4 4H8l4-4zm0 0v20m-6-6h12" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">Police Station</h3>
          </div>
          <p class="text-gray-600 text-sm">Main city police office ensuring safety and security for residents and visitors.</p>
        </div>
      </div>

      <!-- Pharmacy (card left, map right again) -->
      <div class="grid md:grid-cols-2 gap-8 items-center">
        <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition">
          <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01m-6.938 4h13.856C19.07 20 20 19.07 20 17.938V6.062C20 4.93 19.07 4 17.938 4H6.062C4.93 4 4 4.93 4 6.062v11.876C4 19.07 4.93 20 6.062 20z" />
          </svg>
          <h3 class="text-xl font-semibold text-gray-800">Pharmacy</h3>
        </div>
        <p class="text-gray-600 text-sm">Multiple pharmacies around the city for all your medical and wellness needs.</p>
        </div>
        <div>
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27843.088430833213!2d0.22876000390119958!3d29.27099215982808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1275723d4cf19fdf%3A0x810fb1ee4996b3af!2sHospital%20of%20Timimoun!5e0!3m2!1sen!2sus!4v1755557216807!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            width="100%" height="250" style="border:0;" allowfullscreen="" 
            loading="lazy" referrerpolicy="no-referrer-when-downgrade" 
            class="rounded-xl shadow-md"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>








@endsection('content')  