@extends('dashboard.index')
@section('main')
<div class="bg-gray-50 min-h-screen py-10 px-6">
  <div class="max-w-9xl mx-auto">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Tours</h1>
      <a href="{{ route('tour.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Add New Tour
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
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Includes</th>
                <th class="px-4 py-2">Duration</th>
                <th class="px-4 py-2">Stops</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Options</th>
            </tr>
        </thead>
        <tbody>
              @if($tours->count())
                @foreach ($tours as $tour)
                    <tr>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $tour->getTranslation('name', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400"">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $tour->getTranslation('description', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>

                            <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400"">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $tour->getTranslation('includes', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2">{{ $tour->duration_days }} Days / {{ $tour->duration_nights }} Nights</td>
                        <td class="border px-4 py-2">{{ $tour->stops }} stops</td>
                        <td class="border px-4 py-2">{{ $tour->price }} DA/person</td>
                         <td class="border px-4 py-2">{{ $tour->phone }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('tour.edit', $tour->id) }}" class="text-blue-500 hover:underline">Edit</a>
                              <span class="mx-2">|</span>

                            <form action="{{ route('tour.destroy', $tour->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a data-toggle='tooltip' title="delete" data-id="{{ $tour->id }}"  data-placement="bottom" class="dltBtn text-red-500 hover:underline">Delete</a>
                               
                            </form>
                        </td>
                    </tr>
                @endforeach
            
              
                      @endif 
            <!-- Add more rows as needed -->
        </tbody>
    </table>
    </div>
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