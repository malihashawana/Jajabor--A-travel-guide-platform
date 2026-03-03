<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f8fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1, h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 36px;
            margin-top: 20px;
            color: #4CAF50;
        }

        h3 {
            font-size: 24px;
            margin: 20px 0;
            text-align: left;
            color: #555;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .search-box {
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .search-box input[type="text"] {
            width: 70%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-right: 10px;
        }

        .search-box button {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-box button:hover {
            background-color: #45a049;
        }

        .hotel-list {
            margin-top: 20px;
        }

        .hotel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .hotel-card {
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .hotel-card h4 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #333;
        }

        .hotel-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .hotel-card .price {
            font-size: 18px;
            color: #4CAF50;
            margin-top: 10px;
            font-weight: bold;
        }

        .heart-button {
            font-size: 24px;
            color: gray;
            background: none;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
            transition: color 0.3s ease;
        }

        .heart-button.active {
            color: red;
        }

        .heart-button:hover {
            color: #ff6b6b;
        }

        .no-results {
            text-align: center;
            font-size: 18px;
            color: #888;
            margin-top: 50px;
        }

        .book-now {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }

        .book-now:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find Your Perfect Hotel</h1>
        <div class="search-box">
            <form action="{{ route('hotels.search') }}" method="GET">
                <input type="text" name="search" placeholder="Search by hotel name or location" value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="hotel-list">
            @if(request()->has('search') && !empty(request('search')))
                @if($hotels->isNotEmpty())
                    <h3>Search Results</h3>
                    <div class="hotel-grid">
                        @foreach ($hotels as $hotel)
                            <div class="hotel-card">
                                <h4>{{ $hotel->name }}</h4>
                                <p><strong>Location:</strong> {{ $hotel->location }}</p>
                                <p class="price">${{ number_format($hotel->price, 2) }}</p> <!-- Display price -->
                                <form action="{{ route('favorites.toggle') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                    <button type="submit" class="heart-button {{ in_array($hotel->id, $favoriteHotels) ? 'active' : '' }}">
                                    ❤
                                    </button>
                                </form>
                                <a href="{{ route('hotelbookings.create', $hotel->id) }}" class="book-now">Book Now</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="no-results">No hotels found for "{{ request('search') }}".</p>
                @endif
            @else
                <h3>All Hotels</h3>
                <div class="hotel-grid">
                    @foreach ($hotels as $hotel)
                        <div class="hotel-card">
                            <h4>{{ $hotel->name }}</h4>
                            <p><strong>Location:</strong> {{ $hotel->location }}</p>
                            <p class="price">${{ number_format($hotel->price, 2) }}</p> <!-- Display price -->
                            <form action="{{ route('favorites.toggle') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                <button type="submit" class="heart-button {{ in_array($hotel->id, $favoriteHotels) ? 'active' : '' }}">
                                ❤
                                </button>
                            </form>
                            <a href="{{ route('hotelbookings.create', $hotel->id) }}" class="book-now">Book Now</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
