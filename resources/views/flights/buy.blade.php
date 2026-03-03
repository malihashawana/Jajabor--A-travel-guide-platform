<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function applyCoupon() {
            const priceElement = document.getElementById('price');
            const discountElement = document.getElementById('discount-price');
            const couponCode = document.getElementById('coupon-code').value.trim();
            const feedbackElement = document.getElementById('coupon-feedback');
            const passengers = parseInt(document.getElementById('passengers').value, 10);
            const originalPrice = parseFloat(priceElement.dataset.originalPrice);
            let discountedPrice = originalPrice * passengers;

            // Validate coupon code and calculate discount
            if (couponCode === 'RANASIRVALO50') {
                discountedPrice *= 0.5; // 10% off
                feedbackElement.textContent = '50% discount applied!-> Rana Sir onek bhalo';
                feedbackElement.classList.add('text-green-500');
                feedbackElement.classList.remove('text-red-500');
            } else if (couponCode === 'DISCOUNT20') {
                discountedPrice *= 0.8; // 20% off
                feedbackElement.textContent = '20% discount applied!';
                feedbackElement.classList.add('text-green-500');
                feedbackElement.classList.remove('text-red-500');
            } else {
                feedbackElement.textContent = 'Invalid coupon code.';
                feedbackElement.classList.add('text-red-500');
                feedbackElement.classList.remove('text-green-500');
            }

            // Update discounted price display
            discountElement.textContent = `$${discountedPrice.toFixed(2)}`;
            document.getElementById('discounted-price-input').value = discountedPrice;
            document.getElementById('coupon-code-input').value = couponCode;
        }
    </script>
    <style>
        /* Header styling */
        .navbar-custom {
            background: linear-gradient(
                rgba(0, 0, 0, 0.6), 
                rgba(0, 0, 0, 0.6)
            ), url('your-image-path.jpg') center/cover no-repeat;
            color: #ffffff;
            padding: 1.5rem 2rem;
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            color: #ffffff;
            font-size: 2rem;
        }

        .navbar-custom .nav-link {
            color: #b3d4fc;
            font-weight: 600;
            margin: 0 1rem;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff;
        }

        .navbar-custom .navbar-nav {
            margin-left: auto;
        }

        .navbar-custom .nav-item {
            margin-left: 1rem;
        }

        /* Ticket-style card */
        .ticket-card {
            background-color: #f9f9f9;
            border: 2px dashed #ccc;
            border-radius: 0.5rem;
            padding: 2rem;
            margin: auto;
            max-width: 600px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .ticket-card .header {
            background-color: #003580;
            color: white;
            padding: 1rem;
            border-radius: 0.5rem 0.5rem 0 0;
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Jajabor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Confirm Purchase Section -->
    <div class="container mx-auto p-6">
        <div class="ticket-card">
            <div class="header">Confirm Purchase</div>
            <div class="p-4">
                <!-- Dynamic flight details -->
                <p class="text-gray-700 mb-4"><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
                <p class="text-gray-700 mb-4"><strong>Departure:</strong> {{ $flight->departure }}</p>
                <p class="text-gray-700 mb-4"><strong>Destination:</strong> {{ $flight->destination }}</p>
                <p class="text-gray-700 mb-4" id="price" data-original-price="{{ $flight->price }}">
                    <strong>Price (per person):</strong> ${{ $flight->price }}
                </p>
                <p class="text-gray-700 mb-4">
                    <strong>Total Price:</strong> <span id="discount-price">${{ $flight->price *= $passengers }}</span>
                </p>
                <p class="text-gray-700 mb-6"><strong>Seats Available:</strong> {{ $flight->available_seats }}</p>

                <!-- Coupon Field -->
                <div class="mb-4">
                    <label for="coupon-code" class="block text-gray-700 mb-2">Coupon Code</label>
                    <input type="text" id="coupon-code" class="w-full border border-gray-300 rounded-lg p-2" placeholder="Enter coupon code">
                    <button type="button" onclick="applyCoupon()" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-300">
                        Apply Coupon
                    </button>
                    <div id="coupon-feedback" class="mt-2 text-sm"></div>
                </div>

                <!-- Redirect to Payment Page -->
                <form action="{{ route('payment.createCheckoutSession', $flight->id) }}" method="POST">
                    @csrf
                    <input type="hidden" id="passengers" name="passengers" value="{{ $passengers }}">
                    <input type="hidden" name="discounted_price" id="discounted-price-input" value="{{ $flight->price * $passengers }}">
                    <input type="hidden" name="coupon_code" id="coupon-code-input" value="">
                    <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg shadow-md hover:bg-green-600 transition-all duration-300">
                        Proceed to Payment
                    </button>
                </form>

                <a href="{{ route('flights.index') }}" class="inline-block mt-4 text-blue-500 hover:underline transition-all duration-300">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</body>
</html>
