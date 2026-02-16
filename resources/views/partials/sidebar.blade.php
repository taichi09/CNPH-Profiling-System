<!-- The main container below makes the sidebar appear fixed on the left -->
<div id="hs-sidebar-layout-splitter"
  class="hs-overlay [--auto-close:sm] sm:block sm:translate-x-0
  w-64 fixed top-0 start-0 bottom-0 z-60
  bg-sidebar border-e border-sidebar-line transition-all duration-300 transform"
  role="dialog" tabindex="-1">

  <!-- Sidebar Header -->
  <header class="p-4 flex justify-between items-center">
    <a class="font-semibold text-xl text-layer-foreground" href="#">CNPH HR</a>
  </header>

  <!-- Sidebar Items -->
  <div class="h-full overflow-y-auto px-2 mt-4">
    <ul class="space-y-2">

      <!-- Dashboard (Active) -->
      <li>
        <a class="flex items-center gap-x-3.5 py-3 px-4 bg-sidebar-nav-active text-sidebar-nav-foreground text-sm font-medium rounded-lg transition-all duration-300 cursor-pointer hover:bg-sidebar-nav-hover">
          <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-6H3v6zm10-18v6h8V3h-8z"/>
          </svg>
          Dashboard
        </a>
      </li>

      <!-- Employee (Hover Effect Added) -->
      <li>
        <a class="flex items-center gap-x-3.5 py-3 px-4 text-sidebar-nav-foreground text-sm font-medium rounded-lg transition-all duration-300 cursor-pointer hover:bg-sidebar-nav-hover hover:text-white">
          <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
          Employee
        </a>
      </li>

      <!-- Departments (Hover Effect Added) -->
      <li>
        <a class="flex items-center gap-x-3.5 py-3 px-4 text-sidebar-nav-foreground text-sm font-medium rounded-lg transition-all duration-300 cursor-pointer hover:bg-sidebar-nav-hover hover:text-white">
          <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
          </svg>
          Departments
        </a>
      </li>

    </ul>
  </div>
</div>