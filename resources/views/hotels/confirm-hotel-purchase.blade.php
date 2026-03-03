<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Hotel Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
            <div class="p-6">
                <h2 class="text-3xl font-semibold text-gray-900 mb-6">Confirm Hotel Booking</h2>
                <!-- Dynamic hotel details -->
                <p class="text-gray-700 mb-4"><strong>Hotel Name:</strong> {{ $hotel->name }}</p>
                <p class="text-gray-700 mb-4"><strong>Location:</strong> {{ $hotel->location }}</p>
                <p class="text-gray-700 mb-4"><strong>Price:</strong> ${{ number_format($hotel->price, 2) }}</p>
                <p class="text-gray-700 mb-6"><strong>Rooms Available:</strong> {{ $hotel->available_rooms }}</p>

                <!-- Redirect to Payment Page -->
                <form action="{{ route('hotel.payment.createCheckoutSession', $hotel->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg shadow-md hover:bg-green-600 transition-all duration-300 hover:shadow-lg active:scale-95">
                        Proceed to Payment
                    </button>
                </form>

                <a href="{{ route('hotels.index') }}" class="inline-block mt-4 text-blue-500 hover:underline transition-all duration-300">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</body>
</html>
