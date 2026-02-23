<x-app-layout>    
    <main class="sm:ml-72 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            </div>

            <!-- Stats Cards -->
            @include('dashboard.partials.stats-card')

            <!-- Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Chart Card - Increased Height -->
                @include('dashboard.partials.employees-chart')

                <!-- Recently Added Employees Card - Increased Height -->
                @include('dashboard.partials.recent-employees')
            </div>
        </div>
    </main>
</x-app-layout>
