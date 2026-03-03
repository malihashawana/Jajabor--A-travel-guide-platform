<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">User Information</h3>
                    <ul class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        <li class="mb-2"><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>

                    <h3 class="text-2xl font-bold mt-6 mb-4">Past Bookings</h3>
                    <ul class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        @forelse ($pastBookings as $booking)
                            <li class="mb-4">
                                <strong>Hotel:</strong> {{ $booking->hotel_name }}<br>
                                <strong>Check-in Date:</strong> {{ $booking->check_in_date }}<br>
                                <strong>Check-out Date:</strong> {{ $booking->check_out_date }}
                            </li>
                        @empty
                            <li class="mb-2">No past bookings found.</li>
                        @endforelse
                    </ul>

                    <h3 class="text-2xl font-bold mt-6 mb-4">Current Bookings</h3>
                    <ul class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        @forelse ($currentBookings as $booking)
                            <li class="mb-4">
                                <strong>Hotel:</strong> {{ $booking->hotel_name }}<br>
                                <strong>Check-in Date:</strong> {{ $booking->check_in_date }}<br>
                                <strong>Check-out Date:</strong> {{ $booking->check_out_date }}
                            </li>
                        @empty
                            <li class="mb-2">No current bookings found.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
