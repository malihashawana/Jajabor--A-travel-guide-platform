<!DOCTYPE html>
<html>
<head>
    <title>Flight Ticket Receipt</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            margin: 0; 
            padding: 0; 
            background: #f8f9fa; 
        }

        .ticket {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            font-size: 14px;
            color: #555;
            margin: 5px 0 0;
        }

        .details {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .details p {
            margin: 8px 0;
        }

        .details strong {
            color: #333;
        }

        .section {
            margin-bottom: 15px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 10px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1>Flight Ticket</h1>
            <p>Your journey awaits!</p>
        </div>

        <div class="details">
            <div class="section">
                <p><strong>Passenger Name:</strong> {{ $passenger_name }}</p>
                <p><strong>Flight Number:</strong> {{ $flight->flight_number }}</p>
                <p><strong>Flight Date:</strong> {{ $flight->departure_time }}</p>
            </div>
            <div class="section">
                <p><strong>From:</strong> {{ $flight->departure }}</p>
                <p><strong>To:</strong> {{ $flight->destination }}</p>
            </div>
            <div class="section">
                <p><strong>Amount Paid:</strong> ${{ number_format($amount_paid, 2) }}</p>
                <p><strong>Transaction Date:</strong> {{ $transaction_date->format('F d, Y H:i') }}</p>
            </div>
        </div>

        <div class="footer">
            <p>This is an auto-generated ticket. For assistance, contact support.</p>
        </div>
    </div>
</body>
</html>
