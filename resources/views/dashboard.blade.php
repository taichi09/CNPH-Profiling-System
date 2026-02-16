<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body class="bg-gray-50">
    @include('partials.navbar')
    @include('partials.sidebar')
    
    <main class="sm:ml-64 p-6">
    
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/preline@1.11.0/dist/preline.min.js"></script>
</body>
</html>