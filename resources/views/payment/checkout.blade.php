<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <h1>Confirm Payment for Flight</h1>
    <p>Flight to {{ $flight->destination }} for ${{ number_format($flight->price, 2) }}</p>
    
    <form action="{{ url('flights/' . $flight->id . '/checkout') }}" method="POST">
        @csrf
        <button type="submit" id="checkout-button">Pay Now</button>
    </form>

    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var checkoutButton = document.getElementById('checkout-button');
        
        checkoutButton.addEventListener('click', function () {
            fetch('{{ url('flights/' . $flight->id . '/checkout') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(function (response) {
                return response.json();
            })
            .then(function (sessionId) {
                stripe.redirectToCheckout({ sessionId: sessionId });
            })
            .catch(function (error) {
                console.error("Error:", error);
            });
        });
    </script>
</body>
</html>