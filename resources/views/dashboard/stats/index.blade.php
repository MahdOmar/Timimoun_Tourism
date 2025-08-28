@extends('dashboard.index')
@section('main')

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Visitors</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">12,856</p>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 12.5% from last month
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-lg">
                                <i class="fas fa-users text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Revenue</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">$42,156</p>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 8.2% from last month
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-lg">
                                <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Bookings</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">1,258</p>
                                <p class="text-xs text-red-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-down mr-1"></i> 3.5% from last month
                                </p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-lg">
                                <i class="fas fa-calendar-check text-purple-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Satisfaction</p>
                                <p class="text-2xl font-bold text-gray-800 mt-1">94%</p>
                                <p class="text-xs text-green-500 mt-2 flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> 2.1% from last month
                                </p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-lg">
                                <i class="fas fa-star text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Content -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Main Chart -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-semibold text-gray-800">Visitor Statistics</h3>
                            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 90 Days</option>
                            </select>
                        </div>
                        <!-- Chart placeholder -->
                        <div class="bg-gray-100 h-64 rounded-lg flex items-center justify-center">
                            <p class="text-gray-500">Visitor chart visualization</p>
                        </div>
                    </div>

                    <!-- Recent Activities -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-6">Recent Activities</h3>
                        <div class="space-y-4">
                            <div class="flex">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-bed text-blue-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">New accommodation added</p>
                                    <p class="text-xs text-gray-500">5 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="bg-green-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-user text-green-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">New user registered</p>
                                    <p class="text-xs text-gray-500">12 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="bg-purple-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-calendar-check text-purple-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">New booking received</p>
                                    <p class="text-xs text-gray-500">18 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="bg-yellow-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-comment text-yellow-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">New review submitted</p>
                                    <p class="text-xs text-gray-500">25 minutes ago</p>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="bg-red-100 p-2 rounded-lg mr-4">
                                    <i class="fas fa-route text-red-600"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">New tour package added</p>
                                    <p class="text-xs text-gray-500">45 minutes ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendations Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Recommendation Overview</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 text-center">
                            <div class="bg-blue-100 p-3 rounded-lg inline-block mb-3">
                                <i class="fas fa-book-open text-blue-600 text-xl"></i>
                            </div>
                            <h4 class="font-medium text-gray-800">Read & Drinks</h4>
                            <p class="text-sm text-gray-500 mt-1">24 Recommendations</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 text-center">
                            <div class="bg-green-100 p-3 rounded-lg inline-block mb-3">
                                <i class="fas fa-landmark text-green-600 text-xl"></i>
                            </div>
                            <h4 class="font-medium text-gray-800">Sites</h4>
                            <p class="text-sm text-gray-500 mt-1">42 Recommendations</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 text-center">
                            <div class="bg-purple-100 p-3 rounded-lg inline-block mb-3">
                                <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                            </div>
                            <h4 class="font-medium text-gray-800">Events</h4>
                            <p class="text-sm text-gray-500 mt-1">18 Recommendations</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 text-center">
                            <div class="bg-yellow-100 p-3 rounded-lg inline-block mb-3">
                                <i class="fas fa-route text-yellow-600 text-xl"></i>
                            </div>
                            <h4 class="font-medium text-gray-800">Tours</h4>
                            <p class="text-sm text-gray-500 mt-1">31 Recommendations</p>
                        </div>
                        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 text-center">
                            <div class="bg-red-100 p-3 rounded-lg inline-block mb-3">
                                <i class="fas fa-building text-red-600 text-xl"></i>
                            </div>
                            <h4 class="font-medium text-gray-800">Travel Agencies</h4>
                            <p class="text-sm text-gray-500 mt-1">15 Recommendations</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    
@endsection