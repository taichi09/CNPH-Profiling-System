<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. of Employees</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($departments as $index => $department)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $department->dept_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $department->emp_no }}</td>
                    <td class="px-6 py-4 text-sm">
                        <div class="flex items-center gap-x-2">
                            <!-- Edit Button -->
<button type="button"
    class="edit-btn py-1 px-2 sm:px-3 text-xs font-medium rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50"
    data-id="{{ $department->dept_id }}"
    data-name="{{ $department->dept_name }}">
    Edit
</button>
                            <!-- Delete Button -->
                            <button type="button" class="py-1 px-2 sm:px-3 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700">Delete</button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">
                        No departments found. Click <span class="font-semibold text-blue-600">Add Department</span> to get started.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>