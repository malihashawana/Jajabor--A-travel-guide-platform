@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Booking History</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <ul class="space-y-4">
        @foreach ($bookings as $booking)
            <li class="p-4 bg-white shadow rounded flex justify-between items-center">
                <span>
                    {{ $booking->flight_name }} - <span class="capitalize">{{ $booking->status }}</span>
                </span>
                @if ($booking->status == 'confirmed')
                    <form action="{{ route('flights.cancel', $booking->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Cancel</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('flights.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to Flights</a>
</div>
@endsection
