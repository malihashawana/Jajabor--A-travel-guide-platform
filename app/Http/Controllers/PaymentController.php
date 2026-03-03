<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Flight;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller

{
    /**
     * Show the payment page (using Stripe Checkout).
     */
    public function showPaymentPage($flightId)
    {
        $flight = Flight::findOrFail($flightId);
        return view('payment.checkout', compact('flight'));
    }

    /**
     * Create a Stripe Checkout session.
     */
    public function createCheckoutSession($flightId, Request $request)
    {
        $flight = Flight::findOrFail($flightId);

        // Validate and handle coupon and discounted price
        $request->validate([
            'discounted_price' => 'required|numeric|min:0',
            'coupon_code' => 'nullable|string',
        ]);

        $discountedPrice = $request->input('discounted_price');
        $couponCode = $request->input('coupon_code');

        // Set your secret key. Remember to switch to your live secret key in production.
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a new checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => "Flight to " . $flight->destination,
                        ],
                        'unit_amount' => $discountedPrice * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success', $flight->id),
            'cancel_url' => route('payment.cancel', $flight->id),
        ]);

        // Redirect to Stripe Checkout page
        return redirect()->away($session->url);
    }

    /**
     * Handle successful payment.
     */
   public function success($flightId)
{
    // Update flight status or perform necessary logic
    $passengers = session('passengers', 1);
    $loggedInUserName = Auth::user()->name;
    $flight = Flight::findOrFail($flightId);
    $flight->available_seats -= $passengers;
    $flight->save();

    // Data for the receipt
    $receiptData = [
        'flight' => $flight,
        'passenger_name' => $loggedInUserName, // Fetch the passenger's name dynamically
        'amount_paid' => $flight->price, // Replace with actual paid price
        'transaction_date' => now(),
    ];

    // Generate PDF receipt
    $pdf = Pdf::loadView('payment.receipt', $receiptData);
    $fileName = 'receipt_' . uniqid() . '.pdf';
    $filePath = config('app.receipt.storage_path') . $fileName;

    Storage::put($filePath, $pdf->output());


    // Stream or download the PDF
    return $pdf->download('receipt.pdf');
}

    /**
     * Handle canceled payment.
     */
    public function cancel($flightId)
    {
        return view('payment.cancel', compact('flightId'));
    }
}
