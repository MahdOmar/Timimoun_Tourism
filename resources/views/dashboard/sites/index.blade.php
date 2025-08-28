@extends('dashboard.index')
@section('main')
<div class="bg-gray-50 min-h-screen py-10 px-6">
  <div class="max-w-9xl mx-auto">
    
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800"> Sites</h1>
      <a href="{{ route('site.create') }}" 
         class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
        + Add New Site
      </a>
    </div>
   <div class="overflow-x-auto bg-white rounded-xl shadow p-4">
   
    <table id="example" class="min-w-full text-sm text-gray-700 ">
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
                            <span class="mx-2">|</span>
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