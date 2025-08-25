@extends('dashboard.index')
@section('main')
<div class="container bg-white mx-auto px-4 sm:px-6 lg:px-8 py-8">
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