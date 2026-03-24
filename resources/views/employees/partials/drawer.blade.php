<div
    x-data
    x-show="$store.filter.open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="$store.filter.open = false"
    class="fixed inset-0 bg-black/40 z-40"
    style="display:none;">
</div>

{{-- Drawer --}}
<div
    x-data="filterPanel()"
    x-show="$store.filter.open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="translate-x-full opacity-0"
    @keydown.escape.window="$store.filter.open = false"
    class="fixed top-0 right-0 h-full w-80 sm:w-96 bg-white shadow-2xl z-50 flex flex-col"
    style="display:none;">

    {{-- Drawer Header --}}
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gray-50 flex-shrink-0">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z" />
            </svg>
            <span class="text-sm font-semibold text-gray-700">Filter Employees</span>
            <span
                x-show="activeCount > 0"
                x-text="activeCount + ' active'"
                class="text-xs bg-green-100 text-green-800 font-medium px-2 py-0.5 rounded-full">
            </span>
        </div>
        <button @click="$store.filter.open = false" class="text-gray-400 hover:text-gray-600 transition-colors p-1 rounded-md hover:bg-gray-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Drawer Body (scrollable) --}}
    <div class="flex-1 overflow-y-auto px-5 py-4 space-y-6">

        {{-- Department --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2.5">Department</p>
            <div class="flex flex-wrap gap-2">
                <template x-for="dept in departments" :key="dept">
                    <button
                        type="button"
                        @click="toggleFilter('dept', dept)"
                        :class="isActive('dept', dept)
                            ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                            : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300'"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-all">
                        <span :class="isActive('dept', dept) ? 'bg-green-600' : 'bg-gray-300'"
                            class="w-1.5 h-1.5 rounded-full flex-shrink-0 transition-colors"></span>
                        <span x-text="dept"></span>
                    </button>
                </template>
            </div>
        </div>

        <div class="border-t border-gray-100"></div>

        {{-- Age Group --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2.5">Age Group</p>
            <div class="flex flex-wrap gap-2">
                <template x-for="group in ageGroups" :key="group">
                    <button
                        type="button"
                        @click="toggleFilter('age', group)"
                        :class="isActive('age', group)
                            ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                            : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300'"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-all">
                        <span :class="isActive('age', group) ? 'bg-green-600' : 'bg-gray-300'"
                            class="w-1.5 h-1.5 rounded-full flex-shrink-0 transition-colors"></span>
                        <span x-text="group"></span>
                    </button>
                </template>
            </div>
        </div>

        <div class="border-t border-gray-100"></div>

        {{-- Birth Year --}}
        <div>
            <div class="flex items-center justify-between mb-2.5">
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

        <div class="border-t border-gray-100"></div>

        {{-- Employment Type --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2.5">Employment Type</p>
            <div class="flex flex-wrap gap-2">
                <template x-for="type in employmentTypes" :key="type">
                    <button
                        type="button"
                        @click="toggleFilter('type', type)"
                        :class="isActive('type', type)
                            ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                            : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300'"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-all">
                        <span :class="isActive('type', type) ? 'bg-green-600' : 'bg-gray-300'"
                            class="w-1.5 h-1.5 rounded-full flex-shrink-0 transition-colors"></span>
                        <span x-text="type"></span>
                    </button>
                </template>
            </div>
        </div>

        <div class="border-t border-gray-100"></div>

        {{-- Gender --}}
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2.5">Gender</p>
            <div class="flex flex-wrap gap-2">
                <template x-for="g in genders" :key="g">
                    <button
                        type="button"
                        @click="toggleFilter('gender', g)"
                        :class="isActive('gender', g)
                            ? 'bg-green-100 border-green-600 text-green-800 font-medium'
                            : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300'"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full border text-xs transition-all">
                        <span :class="isActive('gender', g) ? 'bg-green-600' : 'bg-gray-300'"
                            class="w-1.5 h-1.5 rounded-full flex-shrink-0 transition-colors"></span>
                        <span x-text="g"></span>
                    </button>
                </template>
            </div>
        </div>

    </div>

    {{-- Drawer Footer --}}
    <div class="flex items-center justify-between px-5 py-4 border-t border-gray-200 bg-gray-50 flex-shrink-0">
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
                class="py-2 px-4 text-xs font-medium rounded-lg border border-gray-200 bg-white text-gray-700 hover:bg-gray-100 transition-colors">
                Cancel
            </button>
            <button
                @click="applyFilters()"
                type="button"
                class="py-2 px-4 text-xs font-semibold rounded-lg bg-green-700 text-white hover:bg-green-800 transition-colors">
                Apply Filters
            </button>
        </div>
    </div>

</div>
{{-- End Drawer --}}