<div class="bg-white rounded-lg shadow p-6 min-h-[450px] flex flex-col">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Recently Added Employees</h2>
    <div class="space-y-3 flex-1">
        @forelse($recentEmployees as $info)
            @php
                $colors = ['teal','blue','purple','green','orange','pink'];
                $color = $colors[$loop->index % count($colors)];
                $initials = strtoupper(substr($info->first_name, 0, 1) . substr($info->surname, 0, 1));
                $fullName = $info->first_name . ' ' . $info->surname;
                $department = $info->department_name ?? 'N/A';
            @endphp
            <div class="flex items-center space-x-3 p-3 hover:bg-gray-50 rounded-lg transition">
                <div class="w-10 h-10 bg-{{ $color }}-100 rounded-full flex items-center justify-center">
                    <span class="text-{{ $color }}-700 font-semibold text-sm">{{ $initials }}</span>
                </div>
                <div class="flex-1">
                    <div class="text-sm font-medium text-gray-800">{{ $fullName }}</div>
                    <div class="text-xs text-gray-500">{{ $department }}</div>
                </div>
            </div>
        @empty
            <p class="text-sm text-gray-400 text-center py-6">No employees found.</p>
        @endforelse
    </div>
</div>