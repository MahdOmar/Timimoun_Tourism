@extends('dashboard.index')
@section('main')

<div class="max-w-3xl mx-auto py-10 px-4">
  <h1 class="text-2xl font-bold mb-6 text-indigo-700">Add New Accommodation</h1>

  <form action="" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf

    <!-- Other fields (name, category, etc.) go here... -->

       {{-- 🌐 Name Fields --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="name_{{ $locale }}" class="block text-sm font-medium text-gray-700">Name ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}"
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
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
      </div>
    @endforeach
    <!-- Category -->
    <div>
      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
      <select name="category" id="category" required
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select category</option>
        <option value="hotel">Hotel</option>
        <option value="guest_house">Guest House</option>
        <option value="mini_villa">Mini Villa</option>
        <option value="campsite">Campsite</option>
      </select>
    </div>

    <!-- Price -->
    <div>
      <label for="price" class="block text-sm font-medium text-gray-700">Price per Night ($)</label>
      <input type="number" name="price" id="price" step="0.01" required
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- Location -->
    <div>
      <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
      <input type="text" name="location" id="location"
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <!-- Description -->
   

    <!-- Main Image -->
    <div>
      <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
      <input type="file" name="main_image" id="main_image" accept="image/*" required
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