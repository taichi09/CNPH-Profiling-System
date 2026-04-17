<x-app-layout>

    {{-- Search Bar --}}
    @include('employees.partials.drawer')
    
    <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300">
        <div class="bg-white rounded-lg shadow">

            {{-- Header --}}
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                    <h2 class="text-xl font-bold text-green-800">Employee Records</h2>
                    <div class="flex flex-col sm:flex-row gap-3">

                        {{-- Filter Trigger Button --}}
                        <div x-data="filterBadge()">
                            <button
                                @click="$store.filter.open = true"
                                type="button"
                                :class="count > 0
                                    ? 'border-green-600 bg-green-50 text-green-800'
                                    : 'border-gray-200 bg-white text-gray-800'"
                                class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border shadow-sm hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z" />
                                </svg>
                                Filter
                                <span
                                    x-show="count > 0"
                                    x-text="count"
                                    class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-green-700 text-white text-xs font-semibold">
                                </span>
                            </button>
                        </div>

                        {{-- Import Button --}}
                        <button type="button" id="import-btn"
                            class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            Import
                        </button>

                        {{-- Add Employee Button --}}
                        <a href="{{ route('employees.create.step', 1) }}"
                            class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Employee
                        </a>
                    </div>
                </div>

                {{-- Active filter pills summary --}}
                @if(request()->hasAny(['departments','age_groups','employment_types','genders','birth_from','birth_to']))
                <div class="flex flex-wrap gap-2 mb-3">
                    @if(request('departments'))
                        @foreach(explode(',', request('departments')) as $d)
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-300">
                            {{ $d }}
                            <a href="{{ request()->fullUrlWithQuery(['departments' => implode(',', array_diff(explode(',', request('departments')), [$d])) ?: null]) }}" class="ml-0.5 hover:text-red-600">✕</a>
                        </span>
                        @endforeach
                    @endif
                    @if(request('employment_types'))
                        @foreach(explode(',', request('employment_types')) as $t)
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 border border-blue-300">
                            {{ $t }}
                        </span>
                        @endforeach
                    @endif
                    @if(request('genders'))
                        @foreach(explode(',', request('genders')) as $g)
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-300">
                            {{ $g }}
                        </span>
                        @endforeach
                    @endif
                    @if(request('age_groups'))
                        @foreach(explode(',', request('age_groups')) as $a)
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 border border-amber-300">
                            Age {{ $a }}
                        </span>
                        @endforeach
                    @endif
                    @if(request('birth_from') || request('birth_to'))
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-teal-100 text-teal-800 border border-teal-300">
                            Born {{ request('birth_from', '1960') }}–{{ request('birth_to', date('Y')) }}
                        </span>
                    @endif
                    <a href="{{ route('employees.index', ['tab' => $tab]) }}"
                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600 border border-gray-300 hover:bg-red-50 hover:text-red-600 hover:border-red-300 transition-colors">
                        Clear all
                    </a>
                </div>
                @endif

                {{-- Search Bar --}}
                @include('employees.partials.search-bar')
            </div>

            {{-- Tabs --}}
            <div class="px-4 sm:px-6 pt-4 border-b border-gray-200">
                <nav class="flex gap-6">
                    <a href="{{ route('employees.index', ['tab' => 'active']) }}"
                        class="pb-3 text-sm font-semibold border-b-2 transition-colors
                        {{ $tab === 'active'
                            ? 'border-green-700 text-green-700'
                            : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                        Active
                        <span class="ml-1 px-2 py-0.5 rounded-full text-xs
                            {{ $tab === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $activeCount > 99 ? '99+' : $activeCount }}
                        </span>
                    </a>
                    <a href="{{ route('employees.index', ['tab' => 'resigned']) }}"
                        class="pb-3 text-sm font-semibold border-b-2 transition-colors
                        {{ $tab === 'resigned'
                            ? 'border-green-700 text-green-700'
                            : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                        Resigned
                        <span class="ml-1 px-2 py-0.5 rounded-full text-xs
                            {{ $tab === 'resigned' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                            {{ $resignedCount > 99 ? '99+' : $resignedCount }}
                        </span>
                    </a>
                </nav>
            </div>

            {{-- Table --}}
            <div id="table-container">
                @include('employees.partials.table')
            </div>
        </div>
    </main>

    {{-- Modals --}}
    @include('employees.partials.import-modal')
    @include('employees.partials.delete-confirmation-modal')
    @include('employees.partials.reinstate-modal')

    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('filter', { open: false });
        });

       
        function filterBadge() {
            return {
                get count() {
                    const params = new URLSearchParams(window.location.search);
                    let n = 0;
                    if (params.get('departments'))     n += params.get('departments').split(',').length;
                    if (params.get('age_groups'))      n += params.get('age_groups').split(',').length;
                    if (params.get('employment_types'))n += params.get('employment_types').split(',').length;
                    if (params.get('genders'))         n += params.get('genders').split(',').length;
                    if (params.get('birth_from') || params.get('birth_to')) n += 1;
                    return n;
                }
            }
        }

        function filterPanel() {
            const currentYear = new Date().getFullYear();
            const startYear   = 1950;

            return {
                activeCount: 0,

                // AFTER
                departments: [
                            'MEDICAL - NURSES',
                            'MEDICAL - DOCTORS',
                            'MEDICAL - NURSING ATTENDANT',
                            'MEDICAL - MIDWIVES',
                            'ADMINISTRATIVE',
                            'TECHNICAL',
                            'ANCILLARY',
                            'COH/COC',
                            'HUMAN RESOURCE MANAGEMENT OFFICE',
                            'QUALITY ASSURANCE UNIT',
                            'BUDGET/FINANCE',
                            'CASH OPERATION',
                            'HIMS OPD RECORDS',
                            'OPD RECORDS',
                            'SUPPLY UNIT',
                            'PROCUREMENT',
                            'INTEGRATED HOSPITAL OPERATIONS & MANAGEMENT PROGRAM',
                            'SECURITY',
                            'MAINTENANCE',
                            'TRANSPORTATION',
                            'DISPATCH',
                            'HELP DESK',
                            'RADIOLOGY',
                        ],
                ageGroups:       ['18–25', '26–35', '36–45', '46–55', '56+'],
                employmentTypes: ['Permanent', 'COS', 'Job Order'],
                genders:         ['Male', 'Female'],

                get yearRange() {
                    const years = [];
                    for (let y = startYear; y <= currentYear; y++) years.push(y);
                    return years;
                },

                selected: {
                    dept:   [],
                    age:    [],
                    type:   [],
                    gender: [],
                },

                birthFrom:        1960,
                birthTo:          currentYear,
                defaultBirthFrom: 1960,
                defaultBirthTo:   currentYear,

                toggleFilter(group, value) {
                    const idx = this.selected[group].indexOf(value);
                    if (idx === -1) {
                        this.selected[group].push(value);
                    } else {
                        this.selected[group].splice(idx, 1);
                    }
                    this.updateActive();
                },

                isActive(group, value) {
                    return this.selected[group].includes(value);
                },

                updateActive() {
                    const chipCount =
                        this.selected.dept.length +
                        this.selected.age.length +
                        this.selected.type.length +
                        this.selected.gender.length;
                    const rangeChanged =
                        (parseInt(this.birthFrom) !== this.defaultBirthFrom ||
                         parseInt(this.birthTo)   !== this.defaultBirthTo) ? 1 : 0;
                    this.activeCount = chipCount + rangeChanged;
                },

                resetFilters() {
                    this.selected           = { dept: [], age: [], type: [], gender: [] };
                    this.birthFrom          = this.defaultBirthFrom;
                    this.birthTo            = this.defaultBirthTo;
                    this.activeCount        = 0;
                    this.$store.filter.open = false;
                    window.location.href    = '?tab={{ $tab }}';
                },

                applyFilters() {
                    const params = new URLSearchParams();
                    params.set('tab', '{{ $tab }}');

                    const currentUrlParams = new URLSearchParams(window.location.search);
                    if (currentUrlParams.has('search')) {
                        params.set('search', currentUrlParams.get('search'));
                    }

                    if (this.selected.dept.length)
                        params.set('departments', this.selected.dept.join(','));
                    if (this.selected.age.length)
                        params.set('age_groups', this.selected.age.join(','));
                    if (this.selected.type.length)
                        params.set('employment_types', this.selected.type.join(','));
                    if (this.selected.gender.length)
                        params.set('genders', this.selected.gender.join(','));
                    if (parseInt(this.birthFrom) !== this.defaultBirthFrom)
                        params.set('birth_from', this.birthFrom);
                    if (parseInt(this.birthTo) !== this.defaultBirthTo)
                        params.set('birth_to', this.birthTo);

                    this.$store.filter.open = false;
                    window.location.href    = '?' + params.toString();
                },

                init() {
                    const params = new URLSearchParams(window.location.search);

                    if (params.get('departments'))
                        this.selected.dept = params.get('departments').split(',');
                    if (params.get('age_groups'))
                        this.selected.age = params.get('age_groups').split(',');
                    if (params.get('employment_types'))
                        this.selected.type = params.get('employment_types').split(',');
                    if (params.get('genders'))
                        this.selected.gender = params.get('genders').split(',');
                    if (params.get('birth_from'))
                        this.birthFrom = parseInt(params.get('birth_from'));
                    if (params.get('birth_to'))
                        this.birthTo = parseInt(params.get('birth_to'));

                    this.updateActive();
                }
            }
        }
    </script>

    {{-- Reinstate Modal --}}
    <script>
        function openReinstateModal(employeeId, employeeName) {
            document.getElementById('reinstateEmployeeName').textContent = employeeName;
            document.getElementById('reinstateForm').action = `/employees/${employeeId}/reinstate`;
            const modal = document.getElementById('reinstateModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeReinstateModal() {
            const modal = document.getElementById('reinstateModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        document.getElementById('reinstateModal').addEventListener('click', function (e) {
            if (e.target === this) closeReinstateModal();
        });
    </script>

    {{-- Resign Modal --}}
    <script>
        function openResignModal(employeeId, employeeName) {
            document.getElementById('resignEmployeeName').textContent = employeeName;
            document.getElementById('resignForm').action = `/employees/${employeeId}/resign`;
            const modal = document.getElementById('resignModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeResignModal() {
            const modal = document.getElementById('resignModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        document.getElementById('resignModal').addEventListener('click', function (e) {
            if (e.target === this) closeResignModal();
        });
    </script>

</x-app-layout>