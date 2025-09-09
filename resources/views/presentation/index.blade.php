@extends('layouts.layout')

@section('content')

<!-- Timimoun Presentation Page (TailwindCSS only) -->

<!-- Hero -->
<section class="relative min-h-screen flex items-center justify-center">
  <div class="absolute inset-0">
    <img src="/images/timimoun-hero.jpg" alt="Timimoun dunes at sunset"
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
  </div>

  <div class="relative z-10 max-w-5xl mx-auto px-6 text-center text-white">
    <span class="inline-block px-3 py-1 rounded-full bg-white/10 backdrop-blur text-sm tracking-wide">
      Sahara Oasis • Red Dunes • Desert Culture
    </span>
    <h1 class="mt-6 text-5xl sm:text-6xl md:text-7xl font-extrabold">
      Timimoun — The Red Oasis of the Sahara
    </h1>
    <p class="mt-6 text-lg sm:text-xl md:text-2xl text-white/90 max-w-3xl mx-auto">
      Wander among crimson dunes, ksour architecture, palm groves, and star-filled skies in Algeria’s most photogenic oasis.
    </p>
    <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
      <a href="#highlights" class="px-8 py-4 bg-orange-500 hover:bg-orange-600 rounded-xl font-semibold text-lg">
        Discover Highlights
      </a>
      <a href="#gallery" class="px-8 py-4 bg-white/10 hover:bg-white/20 rounded-xl font-semibold text-lg">
        View Gallery
      </a>
    </div>
  </div>
</section>

  <section class="py-20 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-heading font-bold text-accent mb-4">Discover the Red Oasis</h2>
                <div class="w-20 h-1 bg-primary mx-auto"></div>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-lg mb-6">
                        Nestled in the heart of the Algerian Sahara, Timimoun is a breathtaking oasis town known for its distinctive red architecture and stunning palm groves. This magical destination offers visitors a unique blend of natural beauty and cultural heritage.
                    </p>
                    <p class="text-lg mb-8">
                        With its crimson buildings contrasting against the azure blue of the sky and the vibrant green of the palm trees, Timimoun creates a visual spectacle unlike any other place in the world.
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow-md text-center">
                            <i class="fas fa-sun text-2xl text-primary mb-2"></i>
                            <p class="font-semibold">300+ Sunny Days</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-md text-center">
                            <i class="fas fa-history text-2xl text-primary mb-2"></i>
                            <p class="font-semibold">Rich History</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-lg overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1596726895343-5b2f4ebc29b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=774&q=80" alt="Timimoun architecture" class="w-full h-96 object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-primary text-white p-6 rounded-lg shadow-lg">
                        <p class="font-heading text-2xl">"The most beautiful oasis in Algeria"</p>
                        <p class="text-sm">- Travel Magazine</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Highlights -->
<section id="highlights" class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Top Highlights</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Card -->
      <div class="rounded-2xl overflow-hidden border bg-white">
        <div class="h-44">
          <img src="/images/timimoun-dunes.jpg" alt="Red dunes of Timimoun" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <h3 class="text-lg font-semibold">Red Sahara Dunes</h3>
          <p class="mt-2 text-gray-600">Catch golden hours over rust-colored dunes and gentle ergs shaped by the desert wind.</p>
        </div>
      </div>

      <div class="rounded-2xl overflow-hidden border bg-white">
        <div class="h-44">
          <img src="/images/timimoun-ksar.jpg" alt="Ksour and mud-brick architecture" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <h3 class="text-lg font-semibold">Ksour Architecture</h3>
          <p class="mt-2 text-gray-600">Explore mud-brick villages, vaulted passages, and palm-shaded alleys of the oasis.</p>
        </div>
      </div>

      <div class="rounded-2xl overflow-hidden border bg-white">
        <div class="h-44">
          <img src="/images/timimoun-lake.jpg" alt="Sebkha and palm groves" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <h3 class="text-lg font-semibold">Sebkha & Palmgroves</h3>
          <p class="mt-2 text-gray-600">Contrast the salt flats with lush palmgroves—an oasis ecology you can walk through.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Gallery -->
<section id="gallery" class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Photo Gallery</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      <img src="/images/gallery-1.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gallery-2.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gallery-3.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gallery-4.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gallery-5.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
      <img src="/images/gallery-6.jpg" class="w-full h-48 md:h-56 object-cover rounded-xl" alt="">
    </div>
  </div>
</section>

<!-- Experiences -->
<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Unmissable Experiences</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
            <!-- Icon -->
            <svg class="w-6 h-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7" />
            </svg>
          </div>
          <h3 class="font-semibold">Sunset Dune Walk</h3>
        </div>
        <p class="mt-3 text-gray-600">Follow local guides to panoramic dune crests for the most vivid Sahara sunsets.</p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
            <svg class="w-6 h-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2h-3l-2-2H9L7 5H4a2 2 0 00-2 2v6" />
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M1 13h22M6 16h.01M10 16h.01M14 16h.01M18 16h.01" />
            </svg>
          </div>
          <h3 class="font-semibold">4×4 Desert Safari</h3>
        </div>
        <p class="mt-3 text-gray-600">Ride across ergs and plateaus, stopping at hidden viewpoints and nomad camps.</p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center">
            <svg class="w-6 h-6 text-orange-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 8c2.21 0 4-1.79 4-4S14.21 0 12 0 8 1.79 8 4s1.79 4 4 4zM6 22v-2a4 4 0 014-4h4a4 4 0 014 4v2" />
            </svg>
          </div>
          <h3 class="font-semibold">Oasis Village Tour</h3>
        </div>
        <p class="mt-3 text-gray-600">Meet artisans, taste dates, and learn local Saharan traditions in Timimoun’s ksour.</p>
      </div>
    </div>
  </div>
</section>

<!-- Crafts -->
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Local Crafts</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="rounded-2xl overflow-hidden border">
        <div class="h-44">
          <img src="/images/craft-pottery.jpg" alt="Handmade pottery" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <h3 class="font-semibold">Handmade Pottery</h3>
          <p class="mt-2 text-gray-600">Earth-toned ceramics shaped and fired with oasis techniques.</p>
        </div>
      </div>

      <div class="rounded-2xl overflow-hidden border">
        <div class="h-44">
          <img src="/images/craft-textile.jpg" alt="Textile weaving" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <h3 class="font-semibold">Textile Weaving</h3>
          <p class="mt-2 text-gray-600">Bold geometric patterns in rugs and shawls, dyed with desert hues.</p>
        </div>
      </div>

      <div class="rounded-2xl overflow-hidden border">
        <div class="h-44">
          <img src="/images/craft-leather.jpg" alt="Leather goods" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <h3 class="font-semibold">Leather Goods</h3>
          <p class="mt-2 text-gray-600">Hand-stitched bags and sandals crafted from durable local leather.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Events -->
<section class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Festivals & Events</h2>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <div class="rounded-2xl border bg-white p-6">
        <div class="text-sm text-orange-600 font-semibold">Cultural</div>
        <h3 class="mt-2 font-semibold">Sahara Music Nights</h3>
        <p class="mt-2 text-gray-600">Open-air performances of local rhythms under crystal skies.</p>
      </div>
      <div class="rounded-2xl border bg-white p-6">
        <div class="text-sm text-orange-600 font-semibold">Heritage</div>
        <h3 class="mt-2 font-semibold">Oasis Harvest Day</h3>
        <p class="mt-2 text-gray-600">Date harvest traditions, folk dance, and artisan markets.</p>
      </div>
      <div class="rounded-2xl border bg-white p-6">
        <div class="text-sm text-orange-600 font-semibold">Adventure</div>
        <h3 class="mt-2 font-semibold">Dune Trek Challenge</h3>
        <p class="mt-2 text-gray-600">Guided sunrise treks over the region’s iconic red dunes.</p>
      </div>
    </div>
  </div>
</section>

<!-- Simple CTA -->
<section class="py-16 bg-white">
  <div class="max-w-3xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-gray-900">Plan Your Timimoun Escape</h2>
    <p class="mt-3 text-gray-600">
      Choose a dune trek, village tour, or 4×4 safari—our local experts will tailor the perfect Sahara experience.
    </p>
    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a href="#experiences" class="px-6 py-3 bg-orange-500 hover:bg-orange-600 rounded-xl font-semibold text-white">
        Browse Experiences
      </a>
      <a href="#highlights" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 rounded-xl font-semibold">
        See Highlights
      </a>
    </div>
  </div>
</section>


@endsection('content')  
