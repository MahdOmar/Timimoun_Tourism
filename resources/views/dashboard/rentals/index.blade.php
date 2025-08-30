@extends('dashboard.index')
@section('main')
<div class="bg-gray-50 min-h-screen py-10 px-6">
  <div class="max-w-9xl mx-auto">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Rentals</h1>
      <a href="{{ route('rental.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Add New Rental
      </a>
    </div>

   <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
    <table id="example" class="min-w-full text-sm text-gray-700 ">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Address</th>
                 <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">price</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Options</th>
            </tr>
        </thead>
        <tbody>
            @if($rentals->count())
                @foreach ($rentals as $rental)
                    <tr>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $rental->getTranslation('name', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400"">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $rental->getTranslation('description', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>

                            <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400"">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $rental->getTranslation('address', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2">{{ $rental->type }}</td>
                        <td class="border px-4 py-2">{{ $rental->price }} / {{ $rental->unit }}</td>
                        <td class="border px-4 py-2">{{ $rental->phone }}</td>
                        <td class="border px-4 py-2">{{ $rental->email }}</td>
                       
                        <td class="border px-4 py-2">
                            <a href="{{ route('rental.edit', $rental->id) }}" class="text-blue-500 hover:underline">Edit</a>
                           <span class="mx-2">|</span>

                            <form action="{{ route('rental.destroy', $rental->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a data-toggle='tooltip' title="delete" data-id="{{ $rental->id }}"  data-placement="bottom" class="dltBtn text-red-500 hover:underline">Delete</a>
                               
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
