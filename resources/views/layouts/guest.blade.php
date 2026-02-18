<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Mr+Dafoe&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-900 antialiased" style="font-family: 'Montserrat', sans-serif;">
        <div class="min-h-screen flex bg-gradient-to-r from-[#02522D] to-[#53886E]">
            
            {{-- Left Side --}}
            <div class="w-1/2 min-h-screen relative flex items-center justify-center ">
                <img src="{{ asset('images/camarines-norte-provincial-hospital-logo.png') }}"
                    class="scale-[1.2] opacity-25 -translate-x-0">

                {{-- Contents --}}
                <div class="absolute flex flex-col items-center text-white text-center px-10">
                    <div class="flex gap-3 mb-4">
                        <img src="{{ asset('images/camarines-norte-official-seal.png') }}" class="w-20 h-20 object-contain">
                        <img src="{{ asset('images/camarines-norte-provincial-hospital-logo.png') }}" class="w-20 h-20 object-contain">
                    </div>
                    <p class="text-medium uppercase tracking-widest font-regular">Camarines Norte</p>
                    <h1 class="text-5xl font-extrabold uppercase leading-tight">Provincial Hospital</h1>
                    <p class="text-3xl font-regular mb-20">Employee Profiling System</p>
                    <p class="text-white mt-20" style="font-family: 'Mr Dafoe', cursive; font-size: 2.2rem;">"Alay sa Diyos, Alay sa Bayan"</p>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="w-1/2 min-h-screen flex items-center justify-center">
                <div class="w-full max-w-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
