<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <!-- Error messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <!-- Profile Form -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <!-- Name Field -->
                    <div class="mb-4">
                        <label for="name" class="block font-bold text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    </div>


                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block font-bold text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    </div>


                    <!-- Profile Image Field -->
                    <div class="mb-4">
                        <label for="profile_image" class="block font-bold text-gray-700 dark:text-gray-300">Profile Image</label>
                        @if ($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="w-24 h-24 rounded-full mb-2">
                        @endif
                        <input type="file" name="profile_image" id="profile_image" class="form-control block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    </div>


                    <!-- Password Fields -->
                    <div class="mb-4">
                        <label for="password" class="block font-bold text-gray-700 dark:text-gray-300">Password (leave blank to keep current)</label>
                        <input type="password" name="password" id="password" class="form-control block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    </div>


                    <div class="mb-4">
                        <label for="password_confirmation" class="block font-bold text-gray-700 dark:text-gray-300">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-gray-300">
                    </div>


                    <!-- Update Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Update Profile</button>
                    </div>
                </form>
            </div>


<!-- Delete Account Form -->
<div class="mt-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')


        <!-- Password Confirmation -->
        <div class="mb-4">
            <label for="delete_password" class="block font-bold text-gray-700 dark:text-gray-300">Confirm Password</label>
            <input type="password" name="password" id="delete_password" class="form-control block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-gray-300" required>
        </div>


        <button type="submit" class="btn btn-danger px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700">Delete Account</button>
    </form>
</div>


        </div>
    </div>


    <!-- Styling -->
    <style>
        .btn-close {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
        }


        .btn-primary {
            background-color: #1d4ed8;
            border: none;
        }


        .btn-primary:hover {
            background-color: #1e40af;
        }


        .btn-danger {
            background-color: #dc2626;
            border: none;
        }


        .btn-danger:hover {
            background-color: #b91c1c;
        }
    </style>
</x-app-layout>
