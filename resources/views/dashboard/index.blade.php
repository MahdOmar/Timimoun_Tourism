<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
   <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
                    @vite(['resources/css/app.css', 'resources/js/app.js'])
                   

</head>
<body>


{{-- <div class="flex h-screen bg-gray-100">

    <!-- sidebar -->
    <div class="hidden md:flex flex-col  bg-gray-800 w-64">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">Sidebar</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto h-full">
            <nav class="flex-1 px-2 py-4 bg-gray-800">
                <a href="#" class="flex items-center px-4 py-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('accommodation.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                    </svg>

                    Accomondations
                </a>

                  <a href="{{ route('foodanddrink.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Food & Drinks
                </a>
                <a href="{{ route('site.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Sites
                </a>

                 <a href="{{ route('event.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Events
                </a>


                 <a href="{{ route('tour.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Tours
                </a>


                 <a href="{{ route('travelagency.index') }}" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    Travel Agencies
                </a>
            </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200">
            <div class="flex items-center px-4">
                <button class="text-gray-500 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <input class="mx-4 w-full border rounded-md px-4 py-2" type="text" placeholder="Search">
            </div>
            <div class="flex items-center pr-4">

                <button
                    class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l-7-7 7-7m5 14l7-7-7-7" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="col-lg-12">
             @include('layouts.notification') 
           </div>
        <div class="p-4">
            

          @yield('main')

        </div>
    </div>
    
</div> --}}

<div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gradient-to-b from-blue-800 to-blue-900 min-h-screen text-white">
            <!-- Logo -->
            <div class="p-6 border-b border-blue-700">
                <h1 class="text-2xl font-bold flex items-center">
                    <i class="fas fa-globe-americas mr-2"></i> TravelHub
                </h1>
                <p class="text-blue-200 text-sm mt-1">Admin Dashboard</p>
            </div>

            <!-- Navigation -->
            <nav class="p-4">
                <div class="mb-8">
                    <h2 class="text-xs uppercase tracking-wider text-blue-400 font-semibold mb-4 pl-3">Dashboard</h2>
                    <a href="{{ route('dashboarde') }}" class="flex items-center py-3 px-4  {{ request()->is('dashboarde*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                        <i class="fas fa-chart-pie mr-3"></i>
                        Overview
                    </a>
                </div>

                <div class="mb-8">
                    <h2 class="text-xs uppercase tracking-wider text-blue-400 font-semibold mb-4 pl-3">Accommodations</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('accommodation.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/accommodation*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-book-open mr-3"></i>
                                Accommodations 
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('site.index') }}" class="flex items-center py-3 px-4 -lg transition-colors group {{ request()->is('dashboard/site*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-landmark mr-3"></i>
                                Sites 
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('event.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/event*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-calendar-alt mr-3"></i>
                                Events
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tour.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/tour*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-route mr-3"></i>
                                Tours
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('foodanddrink.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/foodanddrink*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-building mr-3"></i>
                                Food & Drinks
                            </a>
                        </li>

                         <li>
                            <a href="{{ route('traditionaldish.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/foodanddrink*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-building mr-3"></i>
                                Dishes
                            </a>
                        </li>

                         <li>
                            <a href="{{ route('travelagency.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/travelagency*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-building mr-3"></i>
                                Travel Agencies
                            </a>
                        </li>
                         <li>
                            <a href="{{ route('craft.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/craft*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-building mr-3"></i>
                                Crafts
                            </a>

                            <a href="{{ route('rental.index') }}" class="flex items-center py-3 px-4  rounded-lg transition-colors group {{ request()->is('dashboard/craft*') 
                            ? 'bg-blue-700 text-white' 
                            : 'text-blue-200 hover:bg-blue-700' }}">
                                <i class="fas fa-building mr-3"></i>
                                Rentals
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Additional menu items -->
                <div class="mb-8">
                    <h2 class="text-xs uppercase tracking-wider text-blue-400 font-semibold mb-4 pl-3">Management</h2>
                    <ul class="space-y-2">
                       
                        <li>
                            <a href="#" class="flex items-center py-3 px-4 text-blue-200 hover:bg-blue-700 rounded-lg transition-colors group">
                                <i class="fas fa-users mr-3"></i>
                                Users
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center py-3 px-4 text-blue-200 hover:bg-blue-700 rounded-lg transition-colors group">
                                <i class="fas fa-cog mr-3"></i>
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button class="p-2 rounded-lg mr-2 text-gray-600 hover:bg-gray-100 md:hidden">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">Dashboard Overview</h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" placeholder="Search..." 
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-64">
                        </div>
                        
                        <div class="relative">
                            <button class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                                <i class="fas fa-bell text-gray-600"></i>
                                <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                            </button>
                        </div>
                        
                        <div class="flex items-center">
                            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=100&q=80" 
                                alt="User" class="h-10 w-10 rounded-full object-cover">
                            <div class="ml-2 hidden md:block">
                                <p class="text-sm font-medium text-gray-800">Admin User</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-6">
                <div class="col-lg-12">
             @include('layouts.notification') 
           </div>
        <div class="p-4">
            

          @yield('main')

        </div>
            </main>
        </div>
    </div>
<script>
       
    </script>
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });
</script>

</body>
</html>