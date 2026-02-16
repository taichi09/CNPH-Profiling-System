<!-- Navbar -->
<nav class="bg-[#1b5e3a] fixed top-0 left-0 right-0 z-50 sm:left-72 border-b border-white/10 transition-all duration-300">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end items-center h-16">
            
            <!-- Right side - User Menu & Notifications -->
            <div class="flex items-center gap-4">

                <!-- User Dropdown -->
                <div class="hs-dropdown relative inline-flex">
                    <button id="hs-dropdown-user" type="button" 
                        class="hs-dropdown-toggle flex items-center gap-3 p-2 text-white hover:bg-white/10 rounded-lg transition-all duration-200 focus:outline-none">
                        
                        <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center border border-white/30">
                            <!-- Placeholder Initials -->
                            <span class="text-xs font-bold uppercase tracking-tighter">JD</span>
                        </div>
                        
                        <div class="hidden md:block text-left leading-tight">
                            <span class="block text-sm font-bold uppercase tracking-wide">John Doe</span>
                            <span class="block text-[10px] opacity-70 uppercase tracking-widest">Administrator</span>
                        </div>

                        <svg class="w-4 h-4 opacity-70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu (The actual pop-up box) -->
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration-300 hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-2xl rounded-xl p-2 mt-2 border border-gray-100" aria-labelledby="hs-dropdown-user">
                        
                        <a class="flex items-center gap-x-3.5 py-2.5 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition-colors" href="#">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            My Profile
                        </a>

                        <a class="flex items-center gap-x-3.5 py-2.5 px-3 rounded-lg text-sm text-gray-700 hover:bg-gray-50 transition-colors" href="#">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </a>

                        <hr class="my-2 border-gray-100">

                        <!-- Logout Link -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-x-3.5 py-2.5 px-3 rounded-lg text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->