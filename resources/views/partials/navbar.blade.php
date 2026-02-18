<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    
</body>
</html>
<main class="sm:ml-72 p-8">
    
</main>

<!-- Navbar -->
<!-- Navbar -->
<nav class="bg-gradient-to-r from-[#1b5e3a] to-[#53886E] fixed top-0 left-0 right-0 z-50 sm:left-72">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end items-center h-16">
            
            <!-- Right side - User Menu & Notifications -->
            <div class="flex items-center gap-4">

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">
                        <button type="button"
                            class="flex items-center gap-3 p-2 text-white hover:bg-white/10 rounded-lg transition-all duration-200 focus:outline-none">

                            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center border border-white/30">
                                <span class="text-xs font-bold uppercase tracking-tighter">
                                    {{ Auth::user() ? strtoupper(substr(Auth::user()->name, 0, 2)) : '??' }}
                                </span>
                            </div>

                            <div class="hidden md:block text-left leading-tight">
                                <span class="block text-sm font-bold uppercase tracking-wide">
                                    {{ Auth::user()->name ?? 'Guest' }}
                                </span>
                                <span class="block text-[10px] opacity-70 uppercase tracking-widest">
                                    {{ Auth::user()->role ?? 'User' }}
                                </span>
                            </div>

                            <svg class="w-4 h-4 opacity-70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('profile.edit')">
                            <span class="flex items-center gap-x-3">
                                <span class="material-icons text-[18px]">settings</span>
                                Settings
                            </span>
                        </x-dropdown-link>

                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<!-- End Navbar -->