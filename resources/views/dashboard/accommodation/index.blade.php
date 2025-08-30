@extends('dashboard.index')
@section('main')
{{-- <div class="container bg-white mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="flex my-4">
 <h2 class="text-2xl font-bold mb-4">Accommodation</h2>
    <div class="ml-auto">
      <a href="{{ route('accommodation.create') }}">  <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
          Add New Accomondation  
        </button>
        </a>
    </div>
  </div>
   
    <table id="example" class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Descritption</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Price_range</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Options</th>
            </tr>
        </thead>
        <tbody>
            @if($accommodations->count())
                @foreach ($accommodations as $accommodation)
                    <tr>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400"">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $accommodation->getTranslation('name', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400"">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $accommodation->getTranslation('description', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2">{{ $accommodation->type }} {{ $accommodation->stars }} stars</td>
                        <td class="border px-4 py-2">{{ $accommodation->min_price }} - {{ $accommodation->max_price }} </td>
                        <td class="border px-4 py-2">{{ $accommodation->phone }}</td>
                        <td class="border px-4 py-2">{{ $accommodation->email }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('accommodation.edit', $accommodation->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('accommodation.destroy', $accommodation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a data-toggle='tooltip' title="delete" data-id="{{ $accommodation->id }}"  data-placement="bottom" class="dltBtn text-red-500 hover:underline">Delete</a>
                               
                            </form>
                        </td>
                    </tr>
                @endforeach
            
              
                      @endif 

          

            <!-- Add more rows as needed -->
        </tbody>
    </table>
</div> --}}

<div class="bg-gray-50 min-h-screen py-10 px-6">
  <div class="max-w-9xl mx-auto">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Accommodations</h1>
      <a href="{{ route('accommodation.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Add New Accommodation
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
      <th class="px-6 py-3">Type</th>
      <th class="px-6 py-3">Price Range</th>
      <th class="px-6 py-3">Phone</th>
      <th class="px-6 py-3">Email</th>
      <th class="px-6 py-3 text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($accommodations as $item)
    <tr>
      <td class="px-6 py-4">{{ $item->getTranslation('name', app()->getLocale()) }}</td>
      <td class="px-6 py-4">{{ Str::limit($item->getTranslation('description', app()->getLocale()), 40) }}</td>
      <td class="px-6 py-4">{{ $item->type }}</td>
      <td class="px-6 py-4">{{ $item->min_price }} - {{ $item->max_price }} DA</td>
      <td class="px-6 py-4">{{ $item->phone }}</td>
      <td class="px-6 py-4">{{ $item->email }}</td>
      <td class="px-6 py-4 text-center">
        <a href="{{ route('accommodation.edit', $item->id) }}" class="text-indigo-600 hover:underline">Edit</a>
        <span class="mx-2">|</span>
          <form action="{{ route('accommodation.destroy', $item->id) }}" method="POST" style="display:inline;">
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