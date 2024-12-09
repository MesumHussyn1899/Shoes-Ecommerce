<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Laravel Vite asset handling -->
</head>
<body class="font-sans antialiased">
    @include('layouts.navigation')  <!-- Include the navigation (if any) -->

    <div class="min-h-screen bg-gray-100">
        <!-- Main content here -->
        @yield('content')
    </div>

    @stack('modals') <!-- For handling modals if needed -->
</body>
</html>
