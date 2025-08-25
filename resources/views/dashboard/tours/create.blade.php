@extends('dashboard.index')

@section('main')
<div class="max-w-7xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-indigo-700">Add New Tour</h1>
  
    @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('tour.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf
<div class="grid md:grid-cols-3 gap-2">


    {{-- 🌐 Name --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div class="mb-4">
        <label for="title_{{ $locale }}" class="block text-sm font-medium text-gray-700">Title ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="title_{{ $locale }}"
               class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Tour title in {{ $label }}">
      </div>
    @endforeach

    {{-- 🌐 Description --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div class="mb-4">
        <label for="description_{{ $locale }}" class="block text-sm font-medium text-gray-700">Description ({{ $label }})</label>
        <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}" rows="3"
                  class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Tour details in {{ $label }}"></textarea>
      </div>
    @endforeach

      {{-- ✅ Includes --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div class="mb-4">
        <label for="includes_{{ $locale }}" class="block text-sm font-medium text-gray-700">What's Included ({{ $label }})</label>
        <textarea name="includes[{{ $locale }}]" id="includes_{{ $locale }}" rows="2"
                  class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Meals, transportation, guide... in {{ $label }}"></textarea>
      </div>
    @endforeach

   

    {{-- ⏱️ Duration --}}

            <div>
                <label class="block text-sm font-medium text-gray-700">Days</label>
                <input type="number" name="duration_days" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 7">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nights</label>
                <input type="number" name="duration_nights" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 6">
            </div>
     

        {{-- Price --}}
       
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 25000">
            </div>
            

         {{-- STOPS --}}
             <div>
                <label class="block text-sm font-medium text-gray-700">Stops</label>
                <input type="number" step="1" name="stops" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 3">
            </div>
            
        

        {{-- Contact Info --}}
      
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">
            </div>
          
        

        {{-- Category --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">
               <option value="" >Select Category</option>
                <option value="cars">4x4 Cars</option>
                <option value="quads">Quads</option>
                <option value="camels">Camels</option>
              
            </select>
        </div>
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Start Latitude</label>
            <input type="text" name="start_latitude" 
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Start Longitude</label>
            <input type="text" name="start_longitude"  
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">End Latitude</label>
            <input type="text" name="end_latitude" 
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">End Longitude</label>
            <input type="text" name="end_longitude"  
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm">
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