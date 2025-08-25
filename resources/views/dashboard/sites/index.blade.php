@extends('dashboard.index')
@section('main')
<div class="container bg-white mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="flex my-4">
 <h2 class="text-2xl font-bold mb-4">Sites</h2>
    <div class="ml-auto">
        <a href="{{ route('site.create') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add New Site
        </button>
        </a>
    </div>
  </div>
   
    <table id="example" class="table-auto w-full">
        <thead>
            <tr>
               <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Address</th>
                <th class="px-4 py-2">Opening Hours</th>
                <th class="px-4 py-2">Type</th>
                <th class="px-4 py-2">Amenities</th>
                <th class="px-4 py-2">Options</th>
            </tr>
        </thead>
        <tbody>
               @if($sites->count())
                @foreach ($sites as $site)
                    <tr>
                         <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $site->getTranslation('name', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $site->getTranslation('description', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>

                            <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $site->getTranslation('address', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                       <td class="border px-4 py-2"><ul class="max-w-md space-y-1  list-disc list-inside dark:text-gray-400">
                            @foreach(['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French'] as $locale => $label)
     
        
                                <li>{{ $site->getTranslation('opening_hours', $locale) }}</li>
      
      
                              @endforeach
                            </ul></td>
                        <td class="border px-4 py-2">{{ $site->type }}</td>
                          <td class="border px-4 py-2"><ul class="mx-2 my-2">
                            @foreach ($site->amenities as $item)
                              
                                <li class="m-2"><span class=" bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold my-2">{{ $item }}</span></li>
                              
                            @endforeach
                        </ul>  </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('site.edit', $site->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('site.destroy', $site->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a data-toggle='tooltip' title="delete" data-id="{{ $site->id }}"  data-placement="bottom" class="dltBtn text-red-500 hover:underline">Delete</a>
                               
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