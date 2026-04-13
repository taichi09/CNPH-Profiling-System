<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Middle Name</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell w-[200px]">Department</th>
                <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden xl:table-cell">Job Status</th>
                @if ($tab === 'resigned')
                    <th scope="col" class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden xl:table-cell">
                        Date Resigned
                    </th>
                @endif
                <th scope="col" class="px-4 sm:px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($employees as $index => $employee)
            <tr class="hover:bg-gray-50">
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employees->firstItem() + $loop->index }}</td>
                
                {{-- Last Name + Matched Training Badge --}}
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <div class="flex flex-col">
                        <span class="font-normal">{{ $employee->surname }}</span>
                        @if(!empty($employee->matched_training))
                            <div class="mt-1">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-blue-50 text-blue-700 border border-blue-200" title="{{ $employee->matched_training }}">
                                    <svg class="mr-1 w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    </svg>
                                    Matched: {{ \Illuminate\Support\Str::limit($employee->matched_training, 25) }}
                                </span>
                            </div>
                        @endif
                    </div>
                </td>

                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->first_name }}</td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden md:table-cell">{{ $employee->middle_name }}</td>
                
                <td class="px-4 sm:px-6 py-4 text-sm text-gray-900 hidden lg:table-cell max-w-[200px]">
                    <span class="block truncate" title="{{ $employee->department_name ?? '—' }}">{{ $employee->department_name ?? '—' }}</span>
                </td>
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden xl:table-cell">
                    @php
                        $status = $employee->employment_status ?? null;
                        $statusClasses = match(strtolower($status ?? '')) {
                            'permanent' => 'bg-green-100 text-green-800',
                            'job order' => 'bg-yellow-100 text-yellow-800',
                            'cos' => 'bg-blue-100 text-blue-800',
                            default => 'bg-gray-100 text-gray-600',
                        };
                    @endphp
                    @if ($status)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses }}">
                            {{ $status }}
                        </span>
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </td>
                @if ($tab === 'resigned')
                    <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900 hidden xl:table-cell">
                        {{ $employee->date_resigned
                            ? \Carbon\Carbon::parse($employee->date_resigned)->format('M d, Y')
                            : '—' }}
                    </td>
                @endif
                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('employees.show', $employee->employee_id) }}"
                            class="py-1 px-2 sm:px-3 text-xs font-medium rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50">
                            View
                        </a>

                        @if ($tab === 'active')
                            <button type="button"
                                onclick="window.location='{{ route('employees.edit.step', ['id' => $employee->employee_id, 'step' => 1]) }}'"
                                class="py-1 px-2 sm:px-3 text-xs font-medium rounded bg-green-600 text-white hover:bg-green-700">
                                Edit
                            </button>
                            <button type="button"
                                onclick="openResignModal('{{ $employee->employee_id }}', '{{ $employee->surname }}, {{ $employee->first_name }}')"
                                class="py-1 px-2 sm:px-3 text-xs font-medium rounded bg-red-600 text-white hover:bg-red-700">
                                Delete
                            </button>
                        @endif

                        @if ($tab === 'resigned')
                            <button type="button"
                                onclick="openReinstateModal('{{ $employee->employee_id }}', '{{ $employee->surname }}, {{ $employee->first_name }}')"
                                class="py-1 px-2 sm:px-3 text-xs font-medium rounded bg-blue-600 text-white hover:bg-blue-700">
                                Reinstate
                            </button>
                        @endif
                    </div>
                </td>
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
    <div class="px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-3">
        <p class="text-sm text-gray-500">
            Showing <span class="font-medium text-gray-700">{{ $employees->firstItem() }}</span>
            to <span class="font-medium text-gray-700">{{ $employees->lastItem() }}</span>
            of <span class="font-medium text-gray-700">{{ $employees->total() }}</span> results
        </p>

        <div class="flex items-center gap-x-1">
            {{-- Previous --}}
            @if ($employees->onFirstPage())
                <span class="inline-flex items-center gap-1 px-3 py-1.5 text-sm text-gray-400 border border-gray-200 rounded-lg cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Prev
                </span>
            @else
                <button type="button" 
                    @click="window.location.href='{{ $employees->previousPageUrl() }}&tab={{ request('tab', 'active') }}'"
                    class="inline-flex items-center gap-1 px-3 py-1.5 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Prev
                </button>
            @endif

            {{-- Page Numbers logic --}}
            @php
                $current = $employees->currentPage();
                $last = $employees->lastPage();
                $tab = request('tab', 'active');
            @endphp

            @if ($current > 3)
                <a href="{{ $employees->url(1) }}&tab={{ $tab }}" class="px-3 py-1.5 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">1</a>
                @if ($current > 4) <span class="px-2 py-1.5 text-sm text-gray-400">...</span> @endif
            @endif

            @for ($page = max(1, $current - 2); $page <= min($last, $current + 2); $page++)
                @if ($page == $current)
                    <span class="px-3 py-1.5 text-sm font-semibold text-white bg-green-700 border border-green-700 rounded-lg">{{ $page }}</span>
                @else
                    <a href="{{ $employees->url($page) }}&tab={{ $tab }}" class="px-3 py-1.5 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">{{ $page }}</a>
                @endif
            @endfor

            @if ($current < $last - 2)
                @if ($current < $last - 3) <span class="px-2 py-1.5 text-sm text-gray-400">...</span> @endif
                <a href="{{ $employees->url($last) }}&tab={{ $tab }}" class="px-3 py-1.5 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">{{ $last }}</a>
            @endif

            {{-- Next --}}
            @if ($employees->hasMorePages())
                <button type="button" 
                    @click="window.location.href='{{ $employees->nextPageUrl() }}&tab={{ request('tab', 'active') }}'"
                    class="inline-flex items-center gap-1 px-3 py-1.5 text-sm text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            @else
                <span class="inline-flex items-center gap-1 px-3 py-1.5 text-sm text-gray-400 border border-gray-200 rounded-lg cursor-not-allowed">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            @endif
        </div>
    </div>
@endif