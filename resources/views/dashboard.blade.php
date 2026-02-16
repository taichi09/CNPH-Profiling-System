<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    
    <main class="sm:ml-72 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Investments Card -->
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-teal-500">
                    <div class="text-sm text-gray-600 mb-2">Departments</div>
                    <div class="text-4xl font-bold text-gray-800">15</div>
                </div>

                <!-- Employees Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-sm text-gray-600 mb-2">Employees</div>
                    <div class="text-4xl font-bold text-gray-800">500</div>
                </div>

                <!-- Promotions Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-sm text-gray-600 mb-2">Job Orders</div>
                    <div class="text-4xl font-bold text-gray-800">400</div>
                </div>

                <!-- Net Hires Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-sm text-gray-600 mb-2">Permanent</div>
                    <div class="text-4xl font-bold text-gray-800">100</div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Chart Card - Increased Height -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow p-6 min-h-[450px]">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Employees by Department</h2>
                    
                    <!-- Chart.js Canvas -->
                    <div class="relative" style="height: 350px;">
                        <canvas id="departmentChart"></canvas>
                    </div>
                </div>

                <!-- Recently Added Employees Card - Increased Height -->
                <div class="bg-white rounded-lg shadow p-6 min-h-[450px] flex flex-col">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Recently Added Employees</h2>
                    <div class="space-y-3 flex-1">
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
                        <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-green-700 font-semibold text-sm">MJ</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-800">Maria Johnson</div>
                                <div class="text-xs text-gray-500">Sales, Marketing, Admin B</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                                <span class="text-orange-700 font-semibold text-sm">RC</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-800">Robert Chen</div>
                                <div class="text-xs text-gray-500">IT, Operations, Admin C</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                            <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center">
                                <span class="text-pink-700 font-semibold text-sm">SL</span>
                            </div>
                            <div class="flex-1">
                                <div class="text-sm font-medium text-gray-800">Sarah Lee</div>
                                <div class="text-xs text-gray-500">Finance, HR, Admin A</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
    
    <!-- Chart.js Initialization -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('departmentChart').getContext('2d');
            
            const departmentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['IT', 'HR', 'Finance', 'Sales', 'Marketing', 'Operations'],
                    datasets: [{
                        label: 'Employees',
                        data: [45, 28, 85, 92, 62, 78],
                        backgroundColor: '#0d9488', // teal-600
                        borderRadius: 4,
                        barThickness: 50
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Employees: ' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            ticks: {
                                stepSize: 25
                            },
                            grid: {
                                display: true,
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>