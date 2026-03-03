<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
        font-family: 'Inter', sans-serif;
    }

    /* Header styles */
    header {
        width: 100%;
        padding: 15px 25px;
        background-color: rgb(0, 118, 215);
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-sizing: border-box;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    header h1 {
        color: white;
        margin: 0;
        font-size: 1.8rem;
    }

    header a {
        display: inline-block;
        padding: 12px 20px; /* Increased padding for larger buttons */
        font-size: 1rem; /* Adjusted font size for better visibility */
        border: 2px solid white;
        border-radius: 8px; /* Smooth rounded corners */
        color: white;
        background-color: transparent;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    header a:hover {
        color: #fff;
        background-color: #4f46e5;
        box-shadow: 0px 4px 10px rgba(79, 70, 229, 0.6);
    }

    /* Form styles */
    form button {
        transition: transform 0.3s ease, box-shadow 0.3s;
    }

    form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.6);
    }

    /* Footer styles */
    footer {
        background-color: #1f2937;
        color: #d1d5db;
    }

    footer a {
        color: #60a5fa;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    footer a:hover {
        color: #9333ea;
    }
</style>

</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col justify-between">

    <header class="shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">JAJABOR</h1>
            <div>
                <a href="{{ route('home') }}" class="text-lg text-gray-100 hover:bg-white hover:text-indigo-700 px-4 py-2 mr-2 border border-transparent rounded-md">
                    Dashboard
                </a>
                <a href="{{ route('register') }}" class="text-lg text-gray-100 hover:bg-white hover:text-indigo-700 px-4 py-2 mr-2 border border-transparent rounded-md">
                    Register
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-6">Log in to your account</h2>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="email" 
                        class="block mt-1 w-full h-12 text-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500" 
                        type="email"  name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                    <x-text-input 
                        id="password" 
                        class="block mt-1 w-full h-12 text-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Remember Me -->
                <div class="flex items-center">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" 
                               class="h-4 w-4 text-indigo-600 dark:bg-gray-900 border-gray-300 dark:border-gray-700 focus:ring-indigo-500 rounded">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="text-center py-4 shadow-md">
        <p>&copy; 2024 <a href="#" class="hover:underline">JAJABOR</a>. All Rights Reserved.</p>
    </footer>

</body>
</html>
