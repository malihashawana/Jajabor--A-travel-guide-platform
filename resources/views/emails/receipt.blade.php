<!DOCTYPE html>
<html>
<head>
    <title>Your Flight Receipt</title>
</head>
<body>
    <h1>Thank you for your purchase, {{ $receiptData['passenger_name'] }}!</h1>
    <p>Here are the details of your flight:</p>
    <ul>
        <li><strong>Destination:</strong> {{ $receiptData['flight']->destination }}</li>
        <li><strong>Amount Paid:</strong> ${{ $receiptData['amount_paid'] }}</li>
        <li><strong>Transaction Date:</strong> {{ $receiptData['transaction_date'] }}</li>
    </ul>
    <p>The receipt is attached to this email.</p>
</body>
</html>
