<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Middle Name</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Department</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden xl:table-cell">Job Status</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($employees as $index => $employee)
            <tr class="hover:bg-gray-50">
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employees->firstItem() + $loop->index }}</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->first_name }}</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">{{ $employee->middle_name }}</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->surname }}</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden lg:table-cell">—</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden xl:table-cell">—</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm">
                    <div class="flex gap-2">
                        <a href="{{ route('employees.show', $employee->employee_id) }}" class="py-1 px-2 sm:px-3 text-xs font-medium rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">View</a>
                        <button type="button" class="py-1 px-2 sm:px-3 text-xs font-medium rounded bg-green-600 text-white hover:bg-green-700">Edit</button>
                    </div>
                </td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm"></td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-6 py-10 text-center text-sm text-gray-500">
                    No employees found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($employees->hasPages())
    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
        <p class="text-sm text-gray-500">
            Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} results
        </p>
        <div class="flex items-center gap-x-1">
            {{-- Previous --}}
            @if ($employees->onFirstPage())
                <span class="px-3 py-1 text-sm text-gray-400 border border-gray-200 rounded cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $employees->previousPageUrl() }}" class="px-3 py-1 text-sm text-gray-700 border border-gray-300 rounded hover:bg-gray-50">Previous</a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($employees->getUrlRange(1, $employees->lastPage()) as $page => $url)
                @if ($page == $employees->currentPage())
                    <span class="px-3 py-1 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 text-sm text-gray-700 border border-gray-300 rounded hover:bg-gray-50">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next --}}
            @if ($employees->hasMorePages())
                <a href="{{ $employees->nextPageUrl() }}" class="px-3 py-1 text-sm text-gray-700 border border-gray-300 rounded hover:bg-gray-50">Next</a>
            @else
                <span class="px-3 py-1 text-sm text-gray-400 border border-gray-200 rounded cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>
@endif