@extends('dashboard.index')

@section('main')
<div class="max-w-7xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-indigo-700">Edit Rental</h1>
   @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('rental.update',$rental->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf
    @method('PUT') {{-- Use PUT method for updates --}}
    <input type="text" name="id" value="{{ $rental->id }}" hidden>

    <div class="grid md:grid-cols-3 gap-2">

    {{-- 🌐 Name (Multilingual) --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="name_{{ $locale }}" class="block text-sm font-medium text-gray-700">Name ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}"  value="{{ $rental->getTranslation('name', $locale) }}"
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
                  placeholder="Describe services in {{ $label }}">{{ $rental->getTranslation('description', $locale)}}</textarea>
      </div>
    @endforeach

    {{-- 📍 Location --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
       
          <label for="location_{{ $locale }}" class="block text-sm font-medium text-gray-700">Address ({{ $label }})</label>
          <input type="text" name="address[{{ $locale }}]" id="location_{{ $locale }}"  value="{{ $rental->getTranslation('address', $locale) }}"
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
 
      </div>
    @endforeach
     <!-- Category -->
    <div class="mb-4">
      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
      <select name="type" id="category" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select Type</option>
        <option value="light_car" {{ $rental->type === "light_car" ? 'selected' : '' }}>Light Car</option>
        <option value="4x4_car" {{ $rental->type === "4x4_car" ? 'selected' : '' }}>4x4Car</option>
        <option value="quad" {{ $rental->type === "quad" ? 'selected' : '' }}> Quad</option>
        <option value="apartment" {{ $rental->type === "apartment" ? 'selected' : '' }}>Apartment</option>
        <option value="house" {{ $rental->type === "house" ? 'selected' : '' }}>House</option>
      </select>
    </div>

    <!-- Price -->
      <div class="mb-4">
      <label for="price" class="block text-sm font-medium text-gray-700"> Price</label>
      <input type="number" name="price" id="price" step="0.01" 
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" value="{{ $rental->price }}">
    </div>

    <div class="mb-4">
      <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
      <select name="unit" id="unit" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select Unit</option>
        <option value="day" {{ $rental->unit === "day" ? 'selected' : '' }}>Day</option>
        <option value="hour" {{ $rental->unit === "hour" ? 'selected' : '' }}>Hour</option>
      
      </select>
    </div>

    {{-- ☎️ Phone --}}
    <div>
      <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
      <input type="text" name="phone" id="contact_phone" value="{{ $rental->phone }}"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
             placeholder="e.g., +213 555 123 456">
    </div>

 {{--  Email --}}
    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Contact Email</label>
      <input type="email" name="email" id="email" value="{{ $rental->email }}"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
             placeholder="e.g., travel@agency.com">
    </div>


    

    
    <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Latitude</label>
            <input type="text" name="latitude"   
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $rental->latitude }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Longitude</label>
            <input type="text" name="longitude"  
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $rental->longitude }}">
        </div>

    </div>

      <!-- Amenities -->
    <div class="mb-6">
        <h3 class="font-medium text-gray-800 mb-3">Amenities</h3>
        <div class="grid grid-cols-2 gap-2 text-sm text-gray-600">
            @php
                $allAmenities = ['furnished', 'garage', 'garden', 'pool', 'wifi', 'air_conditioning', 'heating', 'kitchen', 'washing_machine', 'tv'];
                $selectedAmenities = $rental->amenities ?? [];
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




   <!-- Main Image -->
    <div>
      <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
        @if($rental->main_image)
    <div id="main-image-wrapper" class="relative w-max">
        <img src="{{ asset('storage/' . $rental->main_image) }}" alt="Main Image" class="w-40 h-32 object-cover mb-2 rounded">

        <button
            type="button"
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700"
            onclick="removeMainImage({{ $rental->id }})"
        >✕</button>
    </div>
@endif
          
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
     <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
    <div class="grid grid-cols-8 gap-2 mb-4">
     
      
     @foreach ($rental->gallery as $image)
    <div id="gallery-image-{{ $image->id }}" class="relative w-max">
        <img src="{{ asset('storage/' . $image->path) }}" class="w-32 h-24 object-cover rounded">

        <button
            type="button"
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700"
            onclick="removeGalleryImage({{ $rental->id }}, {{ $image->id }})"
        >✕</button>
    </div>
@endforeach
       
      
    </div>
    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
             class="mt-1 block w-full text-sm text-gray-500">
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

<script>
    async function removeMainImage(rentalId) {
        if (!confirm('Are you sure you want to remove the main image?')) return;

        const response = await fetch(`/rental/${rentalId}/remove-main-image`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            document.getElementById('main-image-wrapper').remove();
        } else {
            alert('Failed to remove image.');
        }
    }

    async function removeGalleryImage(rentalId, imageId) {
        if (!confirm('Are you sure you want to remove this gallery image?')) return;

        const response = await fetch(`/rental/${rentalId}/gallery/${imageId}/remove`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        });

        if (response.ok) {
            document.getElementById(`gallery-image-${imageId}`).remove();
        } else {
            alert('Failed to remove image.');
        }
    }
</script>