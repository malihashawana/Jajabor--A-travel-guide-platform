@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Booking History</h1>

    @if($bookings->isEmpty())
        <p class="text-center">You have no booking history yet.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Hotel Name</th>
                    <th>Number of Guests</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->hotel->name }}</td>
                        <td>{{ $booking->number_of_guests }}</td>
                        <td>{{ $booking->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                        <form action="{{ route('hotelbookings.cancel', $booking->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
</form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
