@extends('dashboard.index')
@section('main')


<div class="bg-gray-50 min-h-screen py-10 px-6">
  <div class="max-w-9xl mx-auto">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Traditional Dishes</h1>
      <a href="{{ route('traditionaldish.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Add New Traditional Dish
      </a>
    </div>

    <!-- Search -->
    <div class="mb-6">
      <input type="text" placeholder="Search..." 
             class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
      <table id="example" class="min-w-full text-sm text-gray-700 ">
  <thead class="bg-gray-50">
    <tr>
      <th class="px-6 py-3">Name</th>
      <th class="px-6 py-3">Description</th>
        <th class="px-6 py-3">Providers</th>
     
      <th class="px-6 py-3 text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dishes as $item)
    <tr>
      <td class="px-6 py-4">{{ $item->getTranslation('name', app()->getLocale()) }}</td>
      <td class="px-6 py-4">{{ Str::limit($item->getTranslation('description', app()->getLocale()), 40) }}</td>
      @if($item->restaurants->isEmpty())
    <td class="px-4 py-2 text-left">This dish is not linked to any providers yet.</td>
@else
      <td class="px-6 py-4">
        <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Price</th>
                 <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
          <tr>
         @foreach($item->restaurants as $restaurant)
                
                    <td class="px-4 py-2">{{ $restaurant->name }}</td>
                    <td class="px-4 py-2">{{ $restaurant->pivot->price }} DA</td>
                     <td class="px-4 py-2">
        <form method="POST" 
              action="{{ route('traditionaldish.delink', [$item->id, $restaurant->id]) }}"
              onsubmit="return confirm('Are you sure you want to unlink this restaurant?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:underline px-4 py-2">Delink</button>
        </form>
    </td>
                
            @endforeach
            </tr>
             </tbody>
    </table>
      </td>
      @endif
      
      <td class="px-6 py-4 text-center">
        <a href="{{ route('traditionaldish.edit', $item->id) }}" class="text-indigo-600 hover:underline">Edit</a>
        <span class="mx-2">|</span>
        <button 
        type="button" 
        class="btn btn-sm btn-secondary" 
        data-dish-id="{{ $item->id }}" 
        onclick="openLinkModal({{ $item->id }})">
        Link
    </button>
    <span class="mx-2">|</span>
          <form action="{{ route('traditionaldish.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a data-toggle='tooltip' title="delete" data-id="{{ $item->id }}"  data-placement="bottom" class="dltBtn text-red-500 hover:underline">Delete</a>
                               
                            </form>
      </td>
    </tr>
    @endforeach 
  </tbody>
</table>
    </div>

    <!-- Pagination -->
    {{-- <div class="mt-6">
      {{ $accommodations->links() }}
    </div> --}}
  </div>
</div>

<!-- Modal -->
{{-- <div id="linkModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
        <h2 class="text-lg font-bold mb-4">Link Dish to Restaurant</h2>
        
        <form id="linkForm" method="POST" action="">
            @csrf
            <input type="hidden" name="dish_id" id="dish_id">

            <div class="mb-4">
                <label class="block text-sm">Restaurant</label>
                <select name="restaurant_id" class="w-full border p-2 rounded" required>
                    <option value="">-- Select Restaurant --</option>
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                    @endforeach 
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm">Price</label>
                <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeLinkModal()" class="bg-gray-400 text-white px-3 py-1 rounded">Cancel</button>
                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Save</button>
            </div>
        </form>
    </div>
</div> --}}

 <!-- Modal Container -->
    <div class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center"  id="linkModal">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all duration-300 scale-100 opacity-100">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-primary to-purple-600 p-6 text-white">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold flex items-center">
                        <i class="fas fa-link mr-3"></i>
                        Link Dish to Restaurant
                    </h2>
                    <button class="text-white hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
                <p class="text-sm text-purple-100 mt-2">Connect a dish to its serving restaurant</p>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
               <form id="linkForm" method="POST" action="{{ route('traditionaldish.link') }}">
            @csrf
            <input type="hidden" name="traditional_dish_id" id="dish_id">
                <!-- Restaurant Selection -->
                <div class="mb-6">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-utensils mr-2 text-primary"></i>
                        Restaurant
                    </label>
                    <div class="relative">
                        <select class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition appearance-none" name="food_and_drink_id">
                            <option selected disabled>-- Select Restaurant --</option>
                     @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                    @endforeach 
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

     @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
      <div class="mb-4">
        <label for="includes_{{ $locale }}" class="block text-sm font-medium text-gray-700">Includes ({{ $label }})</label>
        <textarea name="includes[{{ $locale }}]" id="includes_{{ $locale }}" rows="3"
                  placeholder="Write description in {{ $label }}"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
      </div>
    @endforeach
                
                <!-- Price Input -->
                <div class="mb-6">
                    <label class=" text-sm font-medium text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-tag mr-2 text-primary"></i>
                        Price
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            
                        </div>
                        <input type="number" step="0.01" name="price" min="0" class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="0.00">
                    </div>
                </div>
                
           
            </div>
            
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between">
                <button class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors flex items-center" onclick="closeLinkModal()" type="button">
                    <i class="fas fa-times mr-2"></i>
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 rounded-lg bg-primary text-white hover:bg-purple-700 transition-colors flex items-center">
                    <i class="fas fa-check mr-2"></i>
                    Save Link
                </button>
            </div>
             </form>
        </div>
    </div>



@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>


  
  $(document).on('click','.dltBtn',function(e)
  {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var form = $(this).closest('form');
        var dataId = $(this).data('id');
      
        
        e.preventDefault();
        
       
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
      
        form.submit();
        swal("Poof! Your imaginary file has been deleted!", {
          icon: "success",
        });
        } else {
        swal("Your imaginary file is safe!");
        }
        });
        

        

  })

function openLinkModal(dishId) {

  
    const modal = document.getElementById('linkModal');
    document.getElementById('dish_id').value = dishId;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeLinkModal() {
    const modal = document.getElementById('linkModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}



    
 
</script>