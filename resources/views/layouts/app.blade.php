<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/complaints.css') }}" rel="stylesheet">

    <!-- Custom Twitter-like Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-image: url('https://www.nwslc.ac.uk/wp-content/uploads/hand-holding-loupe-traveller-table-scaled-e1681808146477.jpg');
            background-size: cover; /* Ensures the image covers the whole background */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            background-attachment: fixed; /* Keeps the background fixed while scrolling */
            color: #14171A; /* Dark text */
            margin: 0;
            padding: 0;
        }

        .bg-gray-100 {
            background-color: #F5F8FA; /* Background for general layout */
        }

        .dark\:bg-gray-900 {
            background-color: #1A1C1D; /* Dark background for dark mode */
        }

        .bg-white {
            background-color: #FFFFFF;
        }

        .dark\:bg-gray-800 {
            background-color: #1C1E21; /* Dark mode header background */
        }

        .shadow {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .font-sans {
            font-family: 'Figtree', sans-serif;
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Button styles */
        .btn-primary {
            background-color: #1DA1F2; /* Twitter blue */
            color: white;
            border-radius: 30px; /* Rounded edges */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #1991DB; /* Darker blue on hover */
        }

        /* Header styling */
        .header {
            color: #1DA1F2; /* Blue for headings like Twitter */
            font-size: 24px;
            font-weight: bold;
        }

        .max-w-7xl {
            max-width: 80%;
        }

        /* Responsive padding */
        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        /* Responsive layout for large screens */
        @media (min-width: 768px) {
            .max-w-7xl {
                max-width: 90%;
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="header">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif




            @if(View::hasSection('content'))
        @yield('content')
    @else
        {{ $slot ?? '' }}
    @endif

        </main>
    </div>
</body>
</html>
