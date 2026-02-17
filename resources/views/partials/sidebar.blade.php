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
        <!-- Logo Placeholders (Replace with your <img> tags later) -->
        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-[8px]">SEAL</div>
        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center text-[8px]">LOGO</div>
    </div>
    
    <h1 class="text-3xl font-bold tracking-tight leading-none uppercase">Profiling System</h1>
    <p class="text-[10px] mt-2 uppercase tracking-[0.3em] font-light leading-tight opacity-90">
        Camarines Norte<br>Provincial Hospital
    </p>
  </div>
  
  <!-- 2. Body: Navigation Links -->
  <nav class="flex-grow px-0 mt-8 overflow-y-auto">
    <ul class="space-y-2">
      <!-- Dashboard (Active State) -->
      <li>
        <a href="{{ route('dashboard') }}"
          class="flex items-center gap-x-4 py-3 px-6 text-lg font-bold transition-all duration-200
          {{ request()->routeIs('dashboard') ? 'bg-white text-[#1b5e3a]' : 'text-white hover:bg-white/10' }}">
          <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-6H3v6zm10-18v6h8V3h-8z"/>
          </svg>
          Dashboard
        </a>
      </li>
      <!-- Employees -->
      <li>
        <a href="{{ route('employees.index') }}"
          class="flex items-center gap-x-4 py-3 px-6 text-lg font-bold transition-all duration-200
          {{ request()->routeIs('employees.*') ? 'bg-white text-[#1b5e3a]' : 'text-white hover:bg-white/10' }}">
          <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/>
          </svg>
          Employees
        </a>
      </li>
      <!-- Departments -->
      <li>
        <a href="{{ route('departments.index') }}"
          class="flex items-center gap-x-4 py-3 px-6 text-lg font-bold transition-all duration-200
          {{ request()->routeIs('departments.*') ? 'bg-white text-[#1b5e3a]' : 'text-white hover:bg-white/10' }}">
          <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
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
            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            Log Out
        </button>
    </form>
  </div>
</div>