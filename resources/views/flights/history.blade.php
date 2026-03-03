@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking History</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($bookings as $booking)
            <li>
                {{ $booking->flight_name }} - {{ ucfirst($booking->status) }}
                
                <!-- Show cancel button only for confirmed bookings -->
                @if ($booking->status == 'confirmed')
                    <form action="{{ route('flights.cancel', $booking->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">Cancel</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>

    <a href="{{ route('flights.index') }}" class="text-blue-500 hover:underline">Back to Flights</a>
</div>
@endsection
