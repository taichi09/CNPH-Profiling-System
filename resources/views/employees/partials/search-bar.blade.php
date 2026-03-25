<div x-data="{ 
    search: '{{ request('search') }}',
    async performSearch() {
        // 1. Setup URL with current search and current filters
        const url = new URL(window.location.origin + window.location.pathname);
        url.searchParams.set('search', this.search);
        url.searchParams.set('tab', '{{ $tab }}');
        
        // 2. Preserve existing drawer filters from the current URL
        const currentParams = new URLSearchParams(window.location.search);
        ['departments', 'employment_types', 'genders', 'age_groups', 'birth_from', 'birth_to'].forEach(param => {
            if (currentParams.has(param)) url.searchParams.set(param, currentParams.get(param));
        });

        try {
            // 3. Fetch ONLY the table HTML from the controller
            const response = await fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            const html = await response.text();

            // 4. Update the table container and the browser's URL bar
            document.getElementById('table-container').innerHTML = html;
            window.history.pushState({}, '', url);
        } catch (e) {
            console.error('Search error:', e);
        }
    }
}" class="w-full max-w-lg mb-4">
    
    <div class="relative group">
        <!-- Search Icon -->
        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400 group-focus-within:text-green-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- Input Box -->
        <input type="text" 
               x-model="search"
               @input.debounce.300ms="performSearch()"
               class="block w-full py-2.5 pl-10 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition-all"
               placeholder="Type to search names..."
               autocomplete="off">
               
        <!-- Clear Button -->
        <div class="absolute inset-y-0 right-0 flex items-center pr-3" x-show="search.length > 0">
            <button type="button" @click="search = ''; performSearch()" class="text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</div>