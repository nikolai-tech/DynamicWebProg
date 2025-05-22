<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Link your Tailwind CSS here (if you set it up to compile into app.css) --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{-- Link your custom CSS file here --}}
    <link href="{{ asset('custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @stack('styles')
    {{-- These are "stacks" where child views can "push" additional CSS or 
        JavaScript files if they need them, without directly modifying the main layout. --}}
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>