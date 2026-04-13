<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">No. of Employees</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($departments as $index => $department)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ ($departments->currentPage() - 1) * $departments->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $department->dept_name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $department->emp_no }}</td>
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
                            <button type="button" class="delete-btn py-1 px-2 sm:px-3 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700"
    data-id="{{ $department->dept_id }}"
    data-name="{{ $department->dept_name }}">
    Delete
</button>
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

    @if ($departments->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <p class="text-sm text-gray-500">
                Showing {{ $departments->firstItem() }} to {{ $departments->lastItem() }} of {{ $departments->total() }} results
            </p>
            <div class="flex items-center gap-x-1">
                <!-- Previous -->
                @if ($departments->onFirstPage())
                    <span class="px-3 py-1 text-sm text-gray-400 border border-gray-200 rounded cursor-not-allowed">Previous</span>
                @else
                    <a href="{{ $departments->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-700 border border-gray-300 rounded hover:bg-gray-50">Previous</a>
                @endif

                <!-- Page Numbers -->
                @foreach ($departments->getUrlRange(1, $departments->lastPage()) as $page => $url)
                    @if ($page == $departments->currentPage())
                        <span class="px-3 py-1 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-700 border border-gray-300 rounded hover:bg-gray-50">{{ $page }}</a>
                    @endif
                @endforeach

                <!-- Next -->
                @if ($departments->hasMorePages())
                    <a href="{{ $departments->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-700 border border-gray-300 rounded hover:bg-gray-50">Next</a>
                @else
                    <span class="px-3 py-1 text-sm text-gray-400 border border-gray-200 rounded cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>
    @endif
</div>