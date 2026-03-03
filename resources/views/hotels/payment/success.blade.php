<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .confirmation-container {
            max-width: 500px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }
        .success-header {
            background-color: #28a745;
            color: #ffffff;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            font-size: 20px;
            font-weight: bold;
        }
        .confirmation-message {
            margin: 20px 0;
            font-size: 18px;
            color: #333333;
        }
        .booking-details {
            text-align: left;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.05);
        }
        .booking-details h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #444444;
        }
        .booking-details p {
            font-size: 16px;
            margin: 8px 0;
            color: #555555;
        }
        .action-button {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .action-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <div class="success-header">Payment Successful!</div>
        <div class="confirmation-message">
            Your booking has been successfully confirmed. Thank you for choosing us!
        </div>
        <div class="booking-details">
            <h3>Booking Details</h3>
            <p><strong>Hotel Name:</strong> {{ $hotelBooking->hotel->name }}</p>
            <p><strong>Check-in Date:</strong> {{ $hotelBooking->check_in_date }}</p>
            <p><strong>Check-out Date:</strong> {{ $hotelBooking->check_out_date }}</p>
            <p><strong>Guests:</strong> {{ $hotelBooking->number_of_guests }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($hotelBooking->total_price, 2) }}</p>
        </div>
        <a href="{{ route('dashboard') }}" class="action-button">Return to Homepage</a>
    </div>
</body>
</html>
