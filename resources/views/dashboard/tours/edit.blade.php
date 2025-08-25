@extends('dashboard.index')

@section('main')
<div class="max-w-7xl mx-auto py-10 px-4">
  <h1 class="text-3xl font-bold mb-6 text-indigo-700">Edit New Tour</h1>
  
    @if ($errors->any())
          <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
                      
                  @endforeach
              </ul>
  
          </div>
         
              
          @endif

  <form action="{{ route('tour.update',$tour->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf
    @method('PUT') {{-- Use PUT method for updates --}}

           <input type="text" name="id" value="{{ $tour->id }}" hidden>

  <div class="grid md:grid-cols-3 gap-2">


    {{-- 🌐 Title --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="title_{{ $locale }}" class="block text-sm font-medium text-gray-700">Title ({{ $label }})</label>
        <input type="text" name="name[{{ $locale }}]" id="title_{{ $locale }}" value="{{ $tour->getTranslation('name', $locale) }}"
               class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
               placeholder="Tour title in {{ $label }}">
      </div>
    @endforeach

    {{-- 🌐 Description --}}
    @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div>
        <label for="description_{{ $locale }}" class="block text-sm font-medium text-gray-700">Description ({{ $label }})</label>
        <textarea name="description[{{ $locale }}]" id="description_{{ $locale }}" rows="3"
                  class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                  placeholder="Tour details in {{ $label }}">{{ $tour->getTranslation('description', $locale) }}</textarea>
      </div>
    @endforeach

   

   
            <div>
                <label class="block text-sm font-medium text-gray-700">Days</label>
                <input type="number" name="duration_days" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 7" value="{{ $tour->duration_days }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nights</label>
                <input type="number" name="duration_nights" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 6" value="{{ $tour->duration_nights }}">
            </div>
     

        {{-- Price --}}
       
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 25000" value="{{ $tour->price }}">
            </div>

            
         {{-- STOPS --}}
             <div>
                <label class="block text-sm font-medium text-gray-700">Stops</label>
                <input type="number" step="1" name="stops" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" placeholder="e.g. 3" value="{{ $tour->stops }}">
            </div>
            
         
        

        {{-- Contact Info --}}
      
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" value="{{ $tour->phone }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm mt-1" value="{{ $tour->email }}">
            </div>
          
        

        {{-- Category --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select name="category" class="w-full border-gray-300 rounded-lg shadow-sm mt-1">
               <option value="" >Select Category</option>
                <option value="cars" {{ $tour->category ==="cars" ? 'selected' : "" }}>4x4 Cars</option>
                <option value="quads" {{ $tour->category ==="quads" ? 'selected' : "" }}>Quads</option>
                <option value="camels" {{ $tour->category ==="camels" ? 'selected' : "" }}>Camels</option>
              
            </select>
        </div>
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Start Latitude</label>
            <input type="text" name="start_latitude" 
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $tour->start_latitude }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Start Longitude</label>
            <input type="text" name="start_longitude"  
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $tour->start_longitude }}">
        </div>
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">End Latitude</label>
            <input type="text" name="end_latitude" 
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $tour->end_latitude }}">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">End Longitude</label>
            <input type="text" name="end_longitude"  
                   class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $tour->end_longitude }}">
        </div>
   

  </div>


    <!-- Main Image Upload -->
    <div>
      <label for="main_image" class="block text-sm font-medium text-gray-700">Main Image</label>
       @if($tour->main_image)
    <div id="main-image-wrapper" class="relative w-max">
        <img src="{{ asset('storage/' . $tour->main_image) }}" alt="Main Image" class="w-40 h-32 object-cover mb-2 rounded">

        <button
            type="button"
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700"
            onclick="removeMainImage({{ $tour->id }})"
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
     @foreach ($tour->gallery as $image)
    <div id="gallery-image-{{ $image->id }}" class="relative w-max">
        <img src="{{ asset('storage/' . $image->path) }}" class="w-32 h-24 object-cover rounded">

        <button
            type="button"
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700"
            onclick="removeGalleryImage({{ $tour->id }}, {{ $image->id }})"
        >✕</button>
    </div>
@endforeach
  <label for="gallery_images" class="block text-sm font-medium text-gray-700">Gallery Images</label>
  <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*"
         class="mt-1 block w-full text-sm text-gray-500">
</div>

<!-- Gallery Previews -->

<div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="galleryPreview"></div>

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
<script>
    async function removeMainImage(tourId) {
        if (!confirm('Are you sure you want to remove the main image?')) return;

        const response = await fetch(`/tours/${tourId}/remove-main-image`, {
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

    async function removeGalleryImage(tourId, imageId) {
        if (!confirm('Are you sure you want to remove this gallery image?')) return;

        const response = await fetch(`/tours/${tourId}/gallery/${imageId}/remove`, {
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