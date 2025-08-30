@extends('dashboard.index')

@section('main')
<div class="max-w-7xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-indigo-700">Add Rental</h1>
   @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('rental.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf

    <div class="grid md:grid-cols-3 gap-2">
    {{-- 🌐 Name (Multilingual) --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="name_{{ $locale }}" class="block text-sm font-medium text-gray-700">Name ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}"
               class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Agency name in {{ $label }}">
      </div>
    @endforeach

    {{-- 🌐 Description (Multilingual) --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="description_{{ $locale }}" class="block text-sm font-medium text-gray-700">Description ({{ $label }})</label>
        <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}" rows="3"
                  class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Describe services in {{ $label }}"></textarea>
      </div>
    @endforeach

    {{-- 📍 Location --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
       
          <label for="location_{{ $locale }}" class="block text-sm font-medium text-gray-700">Address ({{ $label }})</label>
          <input type="text" name="address[{{ $locale }}]" id="location_{{ $locale }}"
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
 
      </div>
    @endforeach


     <!-- Category -->
    <div class="mb-4">
      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
      <select name="type" id="category" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select Type</option>
        <option value="light_car">Light Car</option>
        <option value="4x4_car">4x4Car</option>
        <option value="quad"> Quad</option>
        <option value="apartment">Apartment</option>
        <option value="house">House</option>
      </select>
    </div>


<!-- Price -->
      <div class="mb-4">
      <label for="price" class="block text-sm font-medium text-gray-700"> Price</label>
      <input type="number" name="price" id="price" step="0.01" 
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div class="mb-4">
      <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
      <select name="unit" id="unit" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select Unit</option>
        <option value="day">Day</option>
        <option value="hour">Hour</option>
      
      </select>
    </div>

    {{-- ☎️ Phone --}}
    <div>
      <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
      <input type="text" name="phone" id="contact_phone"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
             placeholder="e.g., +213 555 123 456">
    </div>

 {{--  Email --}}
    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Contact Email</label>
      <input type="email" name="email" id="email"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
             placeholder="e.g., travel@agency.com">
    </div>


   

    <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Latitude</label>
            <input type="text" name="latitude"   
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Longitude</label>
            <input type="text" name="longitude"  
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>

        <!-- Amenities -->
    <div class="mb-6">
        <h3 class="font-medium text-gray-800 mb-3">Amenities</h3>
        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
            @php
                $allAmenities = ['furnished', 'garage', 'garden', 'pool', 'wifi', 'air_conditioning', 'heating', 'kitchen', 'washing_machine', 'tv'];
                $selectedAmenities = old('amenities', $rental->amenities ?? []);
            @endphp

            @foreach($allAmenities as $amenity)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="amenities[]" value="{{ $amenity }}"
                        @if(in_array($amenity, $selectedAmenities)) checked @endif
                        class="accent-indigo-600 rounded">
                    <span class="capitalize">{{ str_replace('_', ' ', $amenity) }}</span>
                </label>
            @endforeach
        </div>
    </div>

    </div>
    {{-- 🖼️ Main Image --}}
    <div>
      <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
      <input type="file" name="main_image" id="main_image" accept="image/*"
             class="mt-1 block w-full text-sm text-gray-500">
      <div class="relative w-40 h-32 mt-2">
        <img id="mainImagePreview" class="w-full h-full object-cover rounded shadow hidden" alt="Preview">
        <button id="removeMainImageBtn" type="button"
                class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded hidden">✕</button>
      </div>
    </div>

    {{-- 🖼️ Gallery Images --}}
    <div>
      <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
      <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*"
             class="mt-1 block w-full text-sm text-gray-500">
    </div>

    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="galleryPreview"></div>

    {{-- 🧾 Submit (Preview Only) --}}
    <div>
      <button type="submit"
              class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
         Submit
      </button>
    </div>

  </form>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  
document.addEventListener('DOMContentLoaded', function () {
  // Main Image
  const mainImageInput = document.getElementById('main_image');
  const mainImagePreview = document.getElementById('mainImagePreview');
  const removeMainImageBtn = document.getElementById('removeMainImageBtn');

  mainImageInput.addEventListener('change', function () {
    const file = mainImageInput.files[0];
    if (file) {
      mainImagePreview.src = URL.createObjectURL(file);
      mainImagePreview.classList.remove('hidden');
      removeMainImageBtn.classList.remove('hidden');
    }
  });

  removeMainImageBtn.addEventListener('click', function () {
    mainImagePreview.src = '';
    mainImagePreview.classList.add('hidden');
    removeMainImageBtn.classList.add('hidden');
    mainImageInput.value = '';
  });

  // Gallery Images
  let selectedGalleryFiles = [];
  const galleryInput = document.getElementById('gallery_images');
  const galleryPreviewContainer = document.getElementById('galleryPreview');

  galleryInput.addEventListener('change', function () {
    selectedGalleryFiles = Array.from(galleryInput.files);
    renderGalleryPreviews();
  });

  function renderGalleryPreviews() {
    galleryPreviewContainer.innerHTML = '';
    selectedGalleryFiles.forEach((file, index) => {
      const reader = new FileReader();
      reader.onload = function (e) {
        const wrapper = document.createElement('div');
        wrapper.classList.add('relative', 'group');

        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('w-full', 'h-28', 'object-cover', 'rounded', 'shadow');

        const removeBtn = document.createElement('button');
        removeBtn.innerHTML = '✕';
        removeBtn.type = 'button';
        removeBtn.className = 'absolute top-1 right-1 bg-red-600 text-white text-xs px-1 rounded hidden group-hover:block';
        removeBtn.addEventListener('click', () => {
          selectedGalleryFiles.splice(index, 1);
          updateGalleryInput();
          renderGalleryPreviews();
        });

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        galleryPreviewContainer.appendChild(wrapper);
      };
      reader.readAsDataURL(file);
    });
  }

  function updateGalleryInput() {
    const dataTransfer = new DataTransfer();
    selectedGalleryFiles.forEach(file => dataTransfer.items.add(file));
    galleryInput.files = dataTransfer.files;
  }
});
</script>