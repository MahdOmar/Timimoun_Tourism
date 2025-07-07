@extends('dashboard.index')
@section('main')

<div class="max-w-3xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-indigo-700">Add Food & Drink Place</h1>
   @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('foodanddrink.update',$foodanddrink->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf
    @method('PUT')
       <input type="text" name="id" value="{{ $foodanddrink->id }}" hidden>


        {{-- 🌐 Name Fields --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="name_{{ $locale }}" class="block text-sm font-medium text-gray-700">Name ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}" value="{{ $foodanddrink->getTranslation('name', $locale) }}"
               placeholder="Enter name in {{ $label }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>
    @endforeach

    {{-- 🌐 Description Fields --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="description_{{ $locale }}" class="block text-sm font-medium text-gray-700">Description ({{ $label }})</label>
        <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}" rows="3"
                  placeholder="Write description in {{ $label }}"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $foodanddrink->getTranslation('description', $locale) }}</textarea>
      </div>
    @endforeach

    <!-- Category -->
    <div>
      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
      <select name="type" id="category"
              class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select category</option>
        <option value="restaurant" {{ $foodanddrink->type === 'restaurant' ? 'selected' : '' }}>Restaurant</option>
        <option value="cafe" {{ $foodanddrink->type === 'cafe' ? 'selected' : '' }}>Café</option>
        <option value="snack" {{ $foodanddrink->type === 'snack' ? 'selected' : '' }}>Snack</option>
        <option value="traditional" {{ $foodanddrink->type === 'traditional' ? 'selected' : '' }}>Traditional Cuisine</option>
      </select>
    </div>

    

    <!-- Location -->
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
       
          <label for="location_{{ $locale }}" class="block text-sm font-medium text-gray-700">Address ({{ $label }})</label>
          <input type="text" name="address[{{ $locale }}]" id="location_{{ $locale }}" value="{{ $foodanddrink->getTranslation('address', $locale) }}"
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
 
      </div>
    @endforeach

    <!-- Main Image Upload -->
    <div>
      <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
       @if($foodanddrink->main_image)
    <div id="main-image-wrapper" class="relative w-max">
        <img src="{{ asset('storage/' . $foodanddrink->main_image) }}" alt="Main Image" class="w-40 h-32 object-cover mb-2 rounded">

        <button
            type="button"
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700"
            onclick="removeMainImage({{ $foodanddrink->id }})"
        >✕</button>
    </div>
@endif
      <input type="file" name="main_image" id="main_image" accept="image/*"
             class="mt-1 block w-full text-sm text-gray-500">
      <div class="relative w-40 h-32 mt-2">
        <img id="mainImagePreview" class="w-full h-full object-cover rounded shadow hidden" alt="Preview">
        <button id="removeMainImageBtn"
                type="button"
                class="absolute top-1 right-1 bg-red-600 text-white text-xs px-2 py-1 rounded hidden">✕</button>
      </div>
    </div>
    <!-- Gallery Images Upload -->
<div>
   <div>
     @foreach ($foodanddrink->gallery as $image)
    <div id="gallery-image-{{ $image->id }}" class="relative w-max">
        <img src="{{ asset('storage/' . $image->path) }}" class="w-32 h-24 object-cover rounded">

        <button
            type="button"
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700"
            onclick="removeGalleryImage({{ $foodanddrink->id }}, {{ $image->id }})"
        >✕</button>
    </div>
@endforeach
  <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
  <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*"
         class="mt-1 block w-full text-sm text-gray-500">
</div>

<!-- Gallery Previews -->

<div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="galleryPreview"></div>

    <!-- Submit (Non-functional) -->
    <div class="mt-4">
         <button type="submit"
              class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 transition">
        Edit Food&Drink
      </button>
    </div>

  </form>
</div>









@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
 document.addEventListener('DOMContentLoaded', function () {
    // ---- Main image ----
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

    // ---- Gallery images ----
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
    async function removeMainImage(foodanddrinkId) {
        if (!confirm('Are you sure you want to remove the main image?')) return;

        const response = await fetch(`/foodanddrinks/${foodanddrinkId}/remove-main-image`, {
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

    async function removeGalleryImage(foodanddrinkId, imageId) {
        if (!confirm('Are you sure you want to remove this gallery image?')) return;

        const response = await fetch(`/foodanddrinks/${foodanddrinkId}/gallery/${imageId}/remove`, {
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