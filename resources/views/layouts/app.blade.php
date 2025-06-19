<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio - @yield('title', 'Welcome')</title>
    <!-- Google Fonts: Inter - for a clean, modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vite CSS & JS - This is how Laravel processes your Tailwind CSS and JavaScript -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom font family applied globally */
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom scrollbar for webkit browsers (Chrome, Safari, Edge) for a darker aesthetic */
        ::-webkit-scrollbar {
            width: 8px; /* Width of vertical scrollbar */
            height: 8px; /* Height of horizontal scrollbar */
        }
        ::-webkit-scrollbar-track {
            background: #0A0A0A; /* Very dark background for the scrollbar track */
            border-radius: 10px; /* Rounded corners for the track */
        }
        ::-webkit-scrollbar-thumb {
            background: #2D3748; /* Dark blue-gray for the scrollbar thumb */
            border-radius: 10px; /* Rounded corners for the thumb */
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4A5568; /* Slightly lighter thumb on hover */
        }
        /* Utility class to clamp text to a specific number of lines,
           useful for consistent card heights */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Limit to 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Limit to 2 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        /* Utility to hide scrollbars */
        .scrollbar-hide::-webkit-scrollbar { display: none; } /* Chrome, Safari, Edge */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* IE 10+ */
            scrollbar-width: none;  /* Firefox */
        }
    </style>
</head>
<body class="bg-black text-white min-h-screen flex flex-col">

    <!-- Header Component: Includes the navigation bar -->
    @include('components.header')

    <!-- Main Content Area: This is where the specific page content will be injected -->
    <!-- The mt-16 (margin-top: 4rem) pushes content down to clear the fixed header -->
    <main class="flex-grow container mx-auto p-6 md:p-8 mt-16">
        @yield('content')
    </main>    <!-- Footer Component: Includes the copyright and other footer links -->
    @include('components.footer')

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
