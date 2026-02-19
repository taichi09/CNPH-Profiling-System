<!-- Main Sidebar Container -->
<div id="hs-sidebar-layout-splitter"
  class="hs-overlay [--auto-close:lg]
  fixed top-0 start-0 bottom-0 z-[70]
  w-72 bg-[#1b5e3a] text-white flex flex-col shadow-2xl
  transform transition-transform duration-300
  -translate-x-full
  hs-overlay-open:translate-x-0
  lg:translate-x-0"
  role="dialog"
  tabindex="-1"
  aria-label="Sidebar">
  <!-- Close Button (Mobile Only) -->
  <div class="lg:hidden absolute top-4 right-4">
    <button type="button" 
            class="inline-flex items-center justify-center w-8 h-8 text-white hover:bg-white/10 rounded-lg transition-all"
            data-hs-overlay="#hs-sidebar-layout-splitter">
      <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>
  
  <!-- 1. Header: Logos and Branding -->
  <div class="p-8 text-center border-b border-white/10">
    <div class="flex justify-center gap-3 mb-4">
        <img src="{{ asset('images/camarines-norte-official-seal.png') }}" class="w-12 h-12 object-contain">
        <img src="{{ asset('images/camarines-norte-provincial-hospital-logo.png') }}" class="w-12 h-12 object-contain">
    </div>
    
    <h1 class="text-3xl font-bold tracking-tight leading-none uppercase">Profiling System</h1>
    <p class="text-[10px] mt-2 uppercase tracking-[0.3em] font-light leading-tight opacity-90">
        Camarines Norte<br>Provincial Hospital
    </p>
  </div>
  
  <!-- 2. Body: Navigation Links -->
  <nav class="flex-grow px-0 mt-8 overflow-y-auto">
    <ul class="space-y-2">
      <!-- Dashboard -->
      <li>
        <a href="{{ route('dashboard') }}"
          class="flex items-center gap-x-4 py-3 px-6 text-lg font-bold transition-all duration-200
          {{ request()->routeIs('dashboard') ? 'bg-white text-[#1b5e3a]' : 'text-white hover:bg-white/10' }}">
          <span class="material-symbols-outlined">dashboard</span>
          Dashboard
        </a>
      </li>
      <!-- Employees -->
      <li>
        <a href="{{ route('employees.index') }}"
          class="flex items-center gap-x-4 py-3 px-6 text-lg font-bold transition-all duration-200
          {{ request()->routeIs('employees.*') ? 'bg-white text-[#1b5e3a]' : 'text-white hover:bg-white/10' }}">
          <span class="material-symbols-outlined">group</span>
          Employees
        </a>
      </li>
      <!-- Departments -->
      <li>
        <a href="{{ route('departments.index') }}"
          class="flex items-center gap-x-4 py-3 px-6 text-lg font-bold transition-all duration-200
          {{ request()->routeIs('departments.*') ? 'bg-white text-[#1b5e3a]' : 'text-white hover:bg-white/10' }}">
          <span class="material-symbols-outlined">groups</span>
          Departments
        </a>
      </li>
    </ul>
  </nav>
  
  <!-- 3. Footer: Log Out Button -->
  <div class="p-6">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full bg-white text-[#1b5e3a] font-bold py-3 px-4 rounded-sm flex items-center justify-center gap-2 hover:bg-gray-100 transition-colors uppercase tracking-widest text-sm">
          <span class="material-symbols-outlined">logout</span>
          Log Out
        </button>
    </form>
  </div>
</div>