<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Employees Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Employees</div>
        <div class="text-4xl font-bold text-gray-800">{{ $employeeCount }}</div>
    </div>

    <!-- Investments Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Departments</div>
        <div class="text-4xl font-bold text-gray-800">15</div>
    </div>

    <!-- Net Hires Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Permanent</div>
        <div class="text-4xl font-bold text-gray-800">{{ $permanentCount }}</div>
    </div>

    <!-- Promotions Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Job Orders</div>
        <div class="text-4xl font-bold text-gray-800">{{ $JobOrderCount }}</div>
    </div>
</div>