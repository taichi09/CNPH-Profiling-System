<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    
    <main class="sm:ml-64 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Investments Card -->
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-teal-500">
                    <div class="text-sm text-gray-600 mb-2">Investments</div>
                    <div class="text-4xl font-bold text-gray-800">15</div>
                </div>

                <!-- Employees Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-sm text-gray-600 mb-2">Employees</div>
                    <div class="text-4xl font-bold text-gray-800">500</div>
                </div>

                <!-- Promotions Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-sm text-gray-600 mb-2">Promotions</div>
                    <div class="text-4xl font-bold text-gray-800">400</div>
                </div>

                <!-- Net Hires Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-sm text-gray-600 mb-2">Net Hires</div>
                    <div class="text-4xl font-bold text-gray-800">100</div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Chart Card -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Employees by Department</h2>
                    
                    <!-- Simple Bar Chart -->
                    <div class="relative">
                        <div class="flex items-end justify-around h-64 border-l border-b border-gray-300 pl-12 pb-4">
                            <!-- Y-axis labels -->
                            <div class="absolute left-0 flex flex-col justify-between h-64 text-xs text-gray-500 pb-4">
                                <span>40</span>
                                <span>30</span>
                                <span>20</span>
                                <span>10</span>
                                <span>0</span>
                            </div>
                            
                            <!-- Bars -->
                            <div class="flex items-end justify-around w-full h-full gap-4">
                                <div class="flex flex-col items-center flex-1 max-w-20">
                                    <div class="w-full bg-teal-600 rounded-t" style="height: 25%"></div>
                                    <span class="text-xs text-gray-600 mt-2">IT</span>
                                </div>
                                <div class="flex flex-col items-center flex-1 max-w-20">
                                    <div class="w-full bg-teal-600 rounded-t" style="height: 15%"></div>
                                    <span class="text-xs text-gray-600 mt-2">HR</span>
                                </div>
                                <div class="flex flex-col items-center flex-1 max-w-20">
                                    <div class="w-full bg-teal-600 rounded-t" style="height: 85%"></div>
                                    <span class="text-xs text-gray-600 mt-2">Finance</span>
                                </div>
                                <div class="flex flex-col items-center flex-1 max-w-20">
                                    <div class="w-full bg-teal-600 rounded-t" style="height: 75%"></div>
                                    <span class="text-xs text-gray-600 mt-2">Sales</span>
                                </div>
                                <div class="flex flex-col items-center flex-1 max-w-20">
                                    <div class="w-full bg-teal-600 rounded-t" style="height: 45%"></div>
                                    <span class="text-xs text-gray-600 mt-2">Marketing</span>
                                </div>
                                <div class="flex flex-col items-center flex-1 max-w-20">
                                    <div class="w-full bg-teal-600 rounded-t" style="height: 55%"></div>
                                    <span class="text-xs text-gray-600 mt-2">Operations</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recently Added Employees Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Recently Added Employees</h2>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center">
                                <span class="text-teal-700 font-semibold text-sm">JD</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-800">John Doe</div>
                                <div class="text-xs text-gray-500">Dev, HR, Admin A</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-blue-700 font-semibold text-sm">AS</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-800">Alice Smith</div>
                                <div class="text-xs text-gray-500">Dev, HR, Admin A</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <span class="text-purple-700 font-semibold text-sm">BJ</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-800">Bob Johnson</div>
                                <div class="text-xs text-gray-500">Dev, HR, Admin A</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
</body>
</html>