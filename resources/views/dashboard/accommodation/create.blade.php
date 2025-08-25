@extends('dashboard.index')
@section('main')

<div class="max-w-7xl mx-auto py-10 px-4">
  <h1 class="text-2xl font-bold mb-6 text-indigo-700">Add New Accommodation</h1>

    @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('accommodation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf

    <!-- Other fields (name, category, etc.) go here... -->
 <div class="grid md:grid-cols-3 gap-2">
       {{-- 🌐 Name Fields --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div class="mb-4">
        <label for="name_{{ $locale }}" class="block text-sm font-medium text-gray-700">Name ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}"
               placeholder="Enter name in {{ $label }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
    @endforeach

    {{-- 🌐 Description Fields --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div class="mb-4">
        <label for="description_{{ $locale }}" class="block text-sm font-medium text-gray-700">Description ({{ $label }})</label>
        <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}" rows="3"
                  placeholder="Write description in {{ $label }}"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
      </div>
    @endforeach

     <!-- Adress -->
   


     @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
       
          <label for="location_{{ $locale }}" class="block text-sm font-medium text-gray-700">Address({{ $label }})</label>
          <input type="text" name="address[{{ $locale }}]" id="location_{{ $locale }}"
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
 
      </div>
    @endforeach

    
    <!-- Category -->
    <div class="mb-4">
      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
      <select name="type" id="category" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select category</option>
        <option value="hotel">Hotel</option>
        <option value="guest_house">Guest House</option>
        <option value="mini_villa">Mini Villa</option>
        <option value="campsite">Campsite</option>
      </select>
    </div>


    <div class="mb-4">
    <label for="stars" class="block text-gray-700 font-medium">Number of Stars</label>
    <select name="stars" id="stars" class="w-full border-gray-300 rounded mt-1">
        <option value="">-- Select --</option>
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}">{{ $i }} ⭐</option>
        @endfor
    </select>
</div>

    <!-- Price -->
    <div class="mb-4">
      <label for="min_price" class="block text-sm font-medium text-gray-700">Min Price per Night ($)</label>
      <input type="number" name="min_price" id="min_price" step="0.01" 
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>
     <div class="mb-4">
      <label for="max_price" class="block text-sm font-medium text-gray-700">Max Price per Night ($)</label>
      <input type="number" name="max_price" id="max_price" step="0.01" 
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
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


    {{-- 🌐 Website (Optional) --}}
    <div>
      <label for="website" class="block text-sm font-medium text-gray-700">Website </label>
      <input type="url" name="website" id="website"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
             placeholder="https://example.com">
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
                $allAmenities = ['wifi', 'pool', 'parking', 'restaurant', 'air_conditioning', 'breakfast', 'gym', 'spa'];
                $selectedAmenities = old('amenities', $accommodation->amenities ?? []);
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
   

    <!-- Main Image -->
    <div>
      <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
      <input type="file" name="main_image" id="main_image" accept="image/*" 
             class="mt-1 block w-full text-sm text-gray-500">
    </div>

       <div class="relative w-40 h-32 mt-2">
  <img id="mainImagePreview" class="w-full h-full object-cover rounded shadow hidden" alt="Main Image Preview">
  <button id="removeMainImageBtn"
          type="button"
          class="absolute top-1 right-1 bg-red-600 text-white text-xs px-1 rounded hidden">
    ✕
  </button>
</div>

    <!-- Gallery Images -->
    <div>
      <label for="gallery_images[]" class="block text-sm font-medium text-gray-700">Gallery Images</label>
      <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
             class="mt-1 block w-full text-sm text-gray-500">
    </div>
   <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="galleryPreview"></div>


    

    <div>
      <button type="submit"
              class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
        Add Accommodation
      </button>
    </div>
  
  </form>
</div>





@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script>

  $('document').ready(function() {
    
let selectedGalleryFiles = [];

const galleryInput = document.getElementById('gallery_images');
const galleryPreviewContainer = document.getElementById('galleryPreview');
const mainImageInput = document.getElementById('main_image');
const mainImagePreview = document.getElementById('mainImagePreview');
const removeMainImageBtn = document.getElementById('removeMainImageBtn');

// ---- Main image preview + remove ----
mainImageInput.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        mainImagePreview.src = URL.createObjectURL(file);
        mainImagePreview.classList.remove('hidden');
        removeMainImageBtn.classList.remove('hidden');
    }
});

removeMainImageBtn.addEventListener('click', function() {
    mainImagePreview.src = '';
    mainImagePreview.classList.add('hidden');
    removeMainImageBtn.classList.add('hidden');
    mainImageInput.value = ''; // clear input
});

// ---- Gallery preview + remove buttons ----
galleryInput.addEventListener('change', function(e) {
    selectedGalleryFiles = Array.from(e.target.files);
    renderGalleryPreviews();
});

function renderGalleryPreviews() {
    galleryPreviewContainer.innerHTML = '';
    selectedGalleryFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
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
                updateInputFiles();
                renderGalleryPreviews();
            });

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            galleryPreviewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });
}

function updateInputFiles() {
    const dataTransfer = new DataTransfer();
    selectedGalleryFiles.forEach(file => dataTransfer.items.add(file));
    galleryInput.files = dataTransfer.files;
}
});
  
</script>