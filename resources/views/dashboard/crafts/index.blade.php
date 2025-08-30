@extends('dashboard.index')
@section('main')


<div class="bg-gray-50 min-h-screen py-10 px-6">
  <div class="max-w-9xl mx-auto">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Crafts</h1>
      <a href="{{ route('craft.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Add New Craft
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
      <th class="px-6 py-3">Location</th>
       <th class="px-6 py-3">Category</th>
      <th class="px-6 py-3">Price Range</th>
      <th class="px-6 py-3">Phone</th>
      <th class="px-6 py-3">Email</th>
      <th class="px-6 py-3 text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($crafts as $item)
    <tr>
      <td class="px-6 py-4">{{ $item->getTranslation('name', app()->getLocale()) }}</td>
      <td class="px-6 py-4">{{ Str::limit($item->getTranslation('description', app()->getLocale()), 40) }}</td>
      <td class="px-6 py-4">{{ $item->getTranslation('location', app()->getLocale()) }}</td>
      <td class="px-6 py-4">{{ $item->category }}</td>
      <td class="px-6 py-4">{{ $item->min_price }} - {{ $item->max_price }} DA</td>
      <td class="px-6 py-4">{{ $item->phone }}</td>
      <td class="px-6 py-4">{{ $item->email }}</td>
      <td class="px-6 py-4 text-center">
        <a href="{{ route('craft.edit', $item->id) }}" class="text-indigo-600 hover:underline">Edit</a>
        <span class="mx-2">|</span>
          <form action="{{ route('craft.destroy', $item->id) }}" method="POST" style="display:inline;">
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



    
 
</script>