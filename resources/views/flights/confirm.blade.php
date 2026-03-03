@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Confirm Booking</h2>
                <p>Would you like to confirm this booking?</p>

                <div class="space-y-4 mt-4">
                    <p><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
                    <p><strong>Departure:</strong> {{ $flight->departure }}</p>
                    <p><strong>Destination:</strong> {{ $flight->destination }}</p>
                    <p><strong>Price:</strong> ${{ number_format($flight->price, 2) }}</p>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="p-6 bg-gray-100 flex justify-between">
                <a href="{{ route('flights.index') }}" class="bg-gray-500 text-white py-2 px-6 rounded-full hover:bg-gray-600 transition-colors">
                    Cancel
                </a>
                <form action="{{ route('flights.finalize', $flight->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-full hover:bg-green-600 transition-colors">
                        Yes, Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
