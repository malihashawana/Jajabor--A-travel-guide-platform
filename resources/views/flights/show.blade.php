@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <!-- Flight Details Card -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Title -->
                <h2 class="text-3xl font-semibold text-gray-900 mb-6">Flight Details</h2>

                <!-- Flight Information -->
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <p class="font-medium text-gray-700"><strong>Flight Number:</strong></p>
                        <p class="text-gray-800">{{ $flight->flight_number }}</p>
                    </div>

                    <div class="flex justify-between">
                        <p class="font-medium text-gray-700"><strong>Departure:</strong></p>
                        <p class="text-gray-800">{{ $flight->departure }}</p>
                    </div>

                    <div class="flex justify-between">
                        <p class="font-medium text-gray-700"><strong>Destination:</strong></p>
                        <p class="text-gray-800">{{ $flight->destination }}</p>
                    </div>

                    <div class="flex justify-between">
                        <p class="font-medium text-gray-700"><strong>Departure Time:</strong></p>
                        <p class="text-gray-800">{{ $flight->departure_time }}</p>
                    </div>

                    <div class="flex justify-between">
                        <p class="font-medium text-gray-700"><strong>Arrival Time:</strong></p>
                        <p class="text-gray-800">{{ $flight->arrival_time }}</p>
                    </div>

                    <div class="flex justify-between">
                        <p class="font-medium text-gray-700"><strong>Price:</strong></p>
                        <p class="text-xl font-semibold text-blue-600">${{ number_format($flight->price, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="p-6 bg-gray-100 flex justify-between">
                <!-- Back Button -->
                <a href="{{ route('flights.index') }}" class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 transition-colors">
                    Back to Flights
                </a>

                <!-- Buy Button -->
                <a href="{{ route('flights.buy',$flight->id) }}" class="bg-green-500 text-white py-2 px-6 rounded-full hover:bg-green-600 transition-colors"><div class="container mx-auto p-6">
    <!-- Flight Details Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6">
            <!-- Title -->
            <h2 class="text-3xl font-semibold text-gray-900 mb-6">Flight Details</h2>

            <!-- Flight Information -->
            <div class="space-y-4">
                <div class="flex justify-between">
                    <p class="font-medium text-gray-700"><strong>Flight Number:</strong></p>
                    <p class="text-gray-800">{{ $flight->flight_number }}</p>
                </div>

                <div class="flex justify-between">
                    <p class="font-medium text-gray-700"><strong>Departure:</strong></p>
                    <p class="text-gray-800">{{ $flight->departure }}</p>
                </div>

                <div class="flex justify-between">
                    <p class="font-medium text-gray-700"><strong>Destination:</strong></p>
                    <p class="text-gray-800">{{ $flight->destination }}</p>
                </div>

                <div class="flex justify-between">
                    <p class="font-medium text-gray-700"><strong>Departure Time:</strong></p>
                    <p class="text-gray-800">{{ $flight->departure_time }}</p>
                </div>

                <div class="flex justify-between">
                    <p class="font-medium text-gray-700"><strong>Arrival Time:</strong></p>
                    <p class="text-gray-800">{{ $flight->arrival_time }}</p>
                </div>

                <div class="flex justify-between">
                    <p class="font-medium text-gray-700"><strong>Price:</strong></p>
                    <p class="text-xl font-semibold text-blue-600">${{ number_format($flight->price, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Buttons Section -->
        <div class="p-6 bg-gray-100 flex justify-between">
            <!-- Back Button -->
            <a href="{{ route('flights.index') }}" class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 transition-colors">
                Back to Flights
            </a>

            <!-- Buy Button -->
            <a href="{{ route('flights.buy',$flight->id) }}" class="bg-green-500 text-white py-2 px-6 rounded-full hover:bg-green-600 transition-colors">
                Buy Now
            </a>
        </div>
    </div>
</div>
                    Buy Now
                </a>
            </div>
        </div>
    </div>
@endsection
