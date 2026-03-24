<form action="{{ route('employees.index') }}" method="GET" class="w-full max-w-lg">
    <!-- Keep the current tab active while searching -->
    <input type="hidden" name="tab" value="{{ $tab }}">
    
    <div class="relative group">
        <!-- Search Icon (slightly smaller) -->
        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
            <svg class="w-4 h-4 text-gray-400 group-focus-within:text-green-600 transition-colors" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <!-- Input Box -->
        <input type="text" 
               name="search" 
               value="{{ request('search') }}"
               class="block w-full py-2.5 pl-10 pr-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white shadow-sm transition-all focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none"
               placeholder="Search by Name...">
               
        <!-- Clear Search Button -->
        @if(request('search'))
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <a href="{{ route('employees.index', ['tab' => $tab]) }}" class="text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</form>