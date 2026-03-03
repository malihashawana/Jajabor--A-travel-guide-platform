<h1>Your Hotel Bookings</h1>
<ul>
@foreach ($hotels as $hotel)
    <div>
        <h2>{{ $hotel->name }}</h2>
        <p>{{ $hotel->location }}</p>
        <p>Latitude: {{ $hotel->latitude }}, Longitude: {{ $hotel->longitude }}</p>

        <div style="display: flex; gap: 10px;">
            @foreach (json_decode($hotel->images) as $image)
                <img src="{{ asset($image) }}" alt="{{ $hotel->name }}" style="width: 150px; height: auto;">
                
            @endforeach
        </div>
    </div>
@endforeach

</ul>
