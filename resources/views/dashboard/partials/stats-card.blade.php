<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Employees Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Employees</div>
        <div class="text-4xl font-bold text-gray-800">{{ $employeeCount }}</div>
    </div>

    <!-- Permanent Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Permanent</div>
        <div class="text-4xl font-bold text-gray-800">{{ $permanentCount }}</div>
    </div>

    <!-- Casual Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Casual</div>
        <div class="text-4xl font-bold text-gray-800">{{ $casualCount }}</div>
    </div>

    <!-- COS Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">COS</div>
        <div class="text-4xl font-bold text-gray-800">{{ $COSCount }}</div>
    </div>

    <!-- Job Orders Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-600 mb-2">Job Orders</div>
        <div class="text-4xl font-bold text-gray-800">{{ $JobOrderCount }}</div>
    </div>
</div>