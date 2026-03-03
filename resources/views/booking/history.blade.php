@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Booking History</h1>
        
        @if($bookings->isEmpty())
            <p>You have no bookings yet.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Flight Name</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->flight_name }}</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                            <td>{{ $booking->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                @if($booking->status === 'confirmed')
                                    <form action="{{ route('flights.cancel', $booking->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                    </form>
                                @else
                                    <span class="text-muted">No actions</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
