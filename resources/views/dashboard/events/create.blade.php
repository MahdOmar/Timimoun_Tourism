@extends('dashboard.index')
@section('main')

<div class="max-w-7xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-indigo-700">Add New Event</h1>
  
    @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf

     <div class="grid md:grid-cols-3 gap-2">

    {{-- 🌐 Multilingual Name --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="name_{{ $locale }}" class="block text-sm font-medium text-gray-700">Name ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="name_{{ $locale }}"
               class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Event name in {{ $label }}">
      </div>
    @endforeach

    {{-- 🌐 Multilingual Description --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="description_{{ $locale }}" class="block text-sm font-medium text-gray-700">Description ({{ $label }})</label>
        <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}" rows="3"
                  class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Description in {{ $label }}"></textarea>
      </div>
    @endforeach

    {{-- 📍 Location --}}
      @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
       
          <label for="location_{{ $locale }}" class="block text-sm font-medium text-gray-700">Address({{ $label }})</label>
          <input type="text" name="address[{{ $locale }}]" id="location_{{ $locale }}"
             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
 
      </div>
    @endforeach

    {{-- 🕒 Start Date/Time --}}

    <div class="mb-4">
      <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
      <select name="category" id="category" 
              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Select category</option>
        <option value="festival">Festival</option>
        <option value="concert">Concert </option>
        <option value="cultural">Cultural</option>
        <option value="exhibition">Exhibition</option>
        <option value="sports">Sports</option>
        <option value="other">Other</option>
      </select>
    </div>

    <div>
      <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date & Time</label>
      <input type="date" name="start_date" id="start_date"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    {{-- 🕓 End Date/Time --}}
    <div>
      <label for="end_date" class="block text-sm font-medium text-gray-700">End Date & Time (optional)</label>
      <input type="date" name="end_date" id="end_date"
             class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
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

        {{-- 💰 Price --}}
         <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 25000">
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

    {{-- 🖼️ Gallery --}}
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