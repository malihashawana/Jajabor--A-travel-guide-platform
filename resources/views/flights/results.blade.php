<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .btn-hover:hover {
            background-color: #4f8a10;
            transform: scale(1.05);
            transition: all 0.3s ease-in-out;
        }

        .btn-click:active {
            transform: scale(0.95);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
            transition: transform 0.1s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="container mx-auto p-8">
        <!-- Page Title -->
        <h1 class="text-3xl font-bold text-center text-gray-900 mb-8">Available Flights</h1>

        <!-- Check if flights are available -->
        @if(count($flights) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($flights as $flight)
                    <div class="card">
                        <div class="card-content p-6">
                            <!-- Card Header -->
                            <div class="card-header">
                                <h3 class="text-xl font-semibold text-gray-800">{{ $flight->airline }}</h3>
                            </div>

                            <!-- Card Body -->
                            <div class="mb-4">
                                <p class="text-sm text-gray-600"><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
                                <p class="text-sm text-gray-600"><strong>Departure:</strong> {{$flight->departure_time}}</p>
                                <p class="text-sm text-gray-600"><strong>Price:</strong> ${{ number_format($flight->price, 2) }}</p>
                                <p class="text-sm text-gray-600"><strong>Seats Available:</strong> {{ $flight->available_seats }}</p>
                                <p class="text-sm text-gray-600"><strong>Total price :</strong> {{ $flight->price*$passengers}}</p>
                            </div>

                            <!-- Book Now Button -->
                            <div class="mt-6">
                                <form action="{{ route('flights.buy', $flight) }}" method="GET">
                                    <button type="submit" class="btn-hover w-full py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 focus:outline-none btn-click">
                                        Book Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">No flights found matching your search criteria.</p>
        @endif
    </div>

</body>
</html>
