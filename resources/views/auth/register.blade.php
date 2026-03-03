<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Header Styling */
        header {
            background: linear-gradient(to right, #4f46e5, #6d28d9); /* Gradient background */
            color: white; /* White text */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            position: sticky;
            top: 0;
            z-index: 50;
        }
        header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        header nav a {
            color: white;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        header nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        /* Cool Form Styling */
        form {
            background: linear-gradient(135deg, #ffffff, #f9fafb); /* Subtle gradient */
            border-radius: 15px; /* Smooth rounded corners */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Strong shadow */
            padding: 2.5rem;
            animation: fadeIn 1s ease-in-out; /* Animation */
        }
        form label {
            font-weight: 600;
            color: #4b5563; /* Neutral gray for text */
        }
        form input {
            border: none;
            border-radius: 8px; /* Rounded inputs */
            background-color: #f3f4f6; /* Light gray */
            padding: 0.75rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        form input:focus {
            background-color: #ffffff; /* White background on focus */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow effect */
            outline: none;
        }

        /* Submit Button Styling */
        button {
            background: linear-gradient(90deg, #4f46e5, #6d28d9); /* Cool gradient */
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); /* Button shadow */
            transition: background 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background: linear-gradient(90deg, #4338ca, #5b21b6); /* Darker gradient on hover */
            transform: scale(1.05); /* Slight zoom on hover */
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Background Styling */
        body {
            background: radial-gradient(circle, #e0e7ff, #c7d2fe); /* Cool radial gradient */
            font-family: 'Inter', sans-serif;
            color: #1f2937;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="py-4 px-8">
        <div class="container mx-auto flex justify-between items-center">
            <h1>My Application</h1>
            <nav>
                <a href="{{ route('home') }}" class="px-4 py-2 rounded">
                    Dashboard
                </a>
                <a href="{{ route('login') }}" class="px-4 py-2 rounded ms-2">
                    Login
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto mt-12 px-4 flex justify-center items-center">
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-2 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-2 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-2 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-2 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <button class="ms-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
