<x-app-layout>

    {{-- Dark backdrop for filter panel --}}
    <div
        x-data
        x-show="$store.filter.open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="$store.filter.open = false"
        class="fixed inset-0 bg-black/40 z-40"
        style="display:none;">
    </div>

    <main class="lg:ml-72 p-4 sm:p-6 transition-all duration-300">
        <div class="bg-white rounded-lg shadow">

            {{-- Header --}}
            <div class="p-4 sm:p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-4">
                    <h2 class="text-xl font-bold text-green-800">Employee Records</h2>
                    <div class="flex flex-col sm:flex-row gap-3">

                        {{-- Filter Button + Panel --}}
                        <div x-data="filterPanel()" @keydown.escape.window="$store.filter.open = false">
                            <button
                                @click="$store.filter.open = !$store.filter.open"
                                type="button"
                                :class="activeCount > 0
                                    ? 'border-green-600 bg-green-50 text-green-800'
                                    : 'border-gray-200 bg-white text-gray-800'"
                                class="py-2 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border shadow-sm hover:bg-gray-50 transition-colors">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z" />
                                </svg>
                                Filter
                                <span
                                    x-show="activeCount > 0"
                                    x-text="activeCount"
                                    class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-green-700 text-white text-xs font-semibold">
                                </span>
                            </button>

                            {{-- Filter Modal Panel — fixed centered, above backdrop z-50 --}}
                            <div
                                x-show="$store.filter.open"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[520px] max-w-[calc(100vw-2rem)] bg-white rounded-2xl shadow-2xl border border-gray-200 z-50 overflow-hidden"
                                style="display:none;">

                                {{-- Panel Header --}}
                                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gray-50">
                                    <span class="text-sm font-semibold text-gray-700">Filter Employees</span>
                                    <button @click="$store.filter.open = false" class="text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <div class="p-5 space-y-5 max-h-[65vh] overflow-y-auto">

                                    {{-- Department --}}
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Department</p>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="dept in departments" :key="dept">
                                                <button
                                                    type="button"
                                                    @click="toggleFilter('dept', dept)"
                                                    :class="isActive('dept', dept)
                                                        ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                                                        : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-colors">
                                                    <span :class="isActive('dept', dept) ? 'bg-green-600' : 'bg-gray-300'"
                                                        class="w-1.5 h-1.5 rounded-full flex-shrink-0"></span>
                                                    <span x-text="dept"></span>
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                    {{-- Age Group --}}
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Age Group</p>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="group in ageGroups" :key="group">
                                                <button
                                                    type="button"
                                                    @click="toggleFilter('age', group)"
                                                    :class="isActive('age', group)
                                                        ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                                                        : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-colors">
                                                    <span :class="isActive('age', group) ? 'bg-green-600' : 'bg-gray-300'"
                                                        class="w-1.5 h-1.5 rounded-full flex-shrink-0"></span>
                                                    <span x-text="group"></span>
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                    {{-- Birth Year — Select Dropdowns --}}
                                    <div>
                                        <div class="flex items-center justify-between mb-3">
                                            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400">Birth Year</p>
                                            <span class="text-xs text-green-700 font-semibold bg-green-50 border border-green-200 px-2 py-0.5 rounded-full">
                                                <span x-text="birthFrom"></span> – <span x-text="birthTo"></span>
                                            </span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-xs text-gray-500 mb-1">From</label>
                                                <select
                                                    x-model="birthFrom"
                                                    @change="if(parseInt(birthFrom) > parseInt(birthTo)) birthTo = birthFrom; updateActive()"
                                                    class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                                    <template x-for="y in yearRange" :key="y">
                                                        <option :value="y" x-text="y" :selected="y == birthFrom"></option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-xs text-gray-500 mb-1">To</label>
                                                <select
                                                    x-model="birthTo"
                                                    @change="if(parseInt(birthTo) < parseInt(birthFrom)) birthFrom = birthTo; updateActive()"
                                                    class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500">
                                                    <template x-for="y in yearRange" :key="y">
                                                        <option :value="y" x-text="y" :selected="y == birthTo"></option>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Employment Type --}}
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Employment Type</p>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="type in employmentTypes" :key="type">
                                                <button
                                                    type="button"
                                                    @click="toggleFilter('type', type)"
                                                    :class="isActive('type', type)
                                                        ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                                                        : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-colors">
                                                    <span :class="isActive('type', type) ? 'bg-green-600' : 'bg-gray-300'"
                                                        class="w-1.5 h-1.5 rounded-full flex-shrink-0"></span>
                                                    <span x-text="type"></span>
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                    {{-- Gender --}}
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">Gender</p>
                                        <div class="flex flex-wrap gap-2">
                                            <template x-for="g in genders" :key="g">
                                                <button
                                                    type="button"
                                                    @click="toggleFilter('gender', g)"
                                                    :class="isActive('gender', g)
                                                        ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                                                        : 'bg-white border-gray-200 text-gray-700 hover:bg-gray-50'"
                                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-colors">
                                                    <span :class="isActive('gender', g) ? 'bg-green-600' : 'bg-gray-300'"
                                                        class="w-1.5 h-1.5 rounded-full flex-shrink-0"></span>
                                                    <span x-text="g"></span>
                                                </button>
                                            </template>
                                        </div>
                                    </div>

                                </div>

                                {{-- Panel Footer --}}
                                <div class="flex items-center justify-between px-5 py-3 border-t border-gray-100 bg-gray-50">
                                    <button
                                        @click="resetFilters()"
                                        type="button"
                                        class="text-xs text-gray-500 hover:text-red-600 transition-colors underline underline-offset-2">
                                        Reset all
                                    </button>
                                    <div class="flex gap-2">
                                        <button
                                            @click="$store.filter.open = false"
                                            type="button"
                                            class="py-1.5 px-4 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-50">
                                            Cancel
                                        </button>
                                        <button
                                            @click="applyFilters()"
                                            type="button"
                                            class="py-1.5 px-4 text-xs font-semibold rounded-lg bg-green-700 text-white hover:bg-green-800 transition-colors">
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Filter --}}

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
            @include('employees.partials.table')
        </div>
    </main>

    {{-- Modals --}}
    @include('employees.partials.import-modal')
    @include('employees.partials.delete-confirmation-modal')
    @include('employees.partials.reinstate-modal')

    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>

    {{-- Alpine Global Store + Filter Component --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('filter', { open: false });
        });

        function filterPanel() {
            const currentYear = new Date().getFullYear();
            const startYear   = 1950;

            return {
                activeCount: 0,

                departments: [
                    'Medical - Nurses',
                    'Medical - Doctors',
                    'Medical - Midwives',
                    'Medical - Technicians',
                    'Administrative',
                    'Finance',
                    'HR',
                    'IT',
                ],
                ageGroups:       ['18–25', '26–35', '36–45', '46–55', '56+'],
                employmentTypes: ['Regular', 'Contractual', 'Part-time', 'Job Order'],
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
                    this.selected            = { dept: [], age: [], type: [], gender: [] };
                    this.birthFrom           = this.defaultBirthFrom;
                    this.birthTo             = this.defaultBirthTo;
                    this.activeCount         = 0;
                    this.$store.filter.open  = false;
                    const url = new URL(window.location.href);
                    url.search = '?tab={{ $tab }}';
                    window.location.href = url.toString();
                },

                applyFilters() {
                    const params = new URLSearchParams();
                    params.set('tab', '{{ $tab }}');

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
                    window.location.href = '?' + params.toString();
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