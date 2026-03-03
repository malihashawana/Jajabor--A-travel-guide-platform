<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Hotel;
use App\Models\Coupon;
use App\Models\HotelBooking;

class HotelPaymentController extends Controller
{
    public function createCheckoutSession(Request $request, $hotelId)
    {
        // Retrieve the hotel information
        $hotel = Hotel::findOrFail($hotelId);

        // Retrieve and validate form inputs
        $totalPrice = $request->input('total_price');
        $couponCode = $request->input('coupon_code', null);
        $checkInDate = $request->input('check_in_date');
        $checkOutDate = $request->input('check_out_date');
        $numberOfGuests = $request->input('number_of_guests');

        if (!$totalPrice || !$checkInDate || !$checkOutDate || !$numberOfGuests) {
            return redirect()->back()->withError('All fields are required.');
        }

        // Validate and apply coupon if provided
        $discount = 0;
        if ($couponCode) {
            $discount = $this->validateAndApplyCoupon($couponCode, $totalPrice);
            $totalPrice -= $discount;
        }

        // Ensure total price is not negative
        $totalPrice = max(0, $totalPrice);

        // Set Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create Stripe Checkout Session
        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $hotel->name,
                            'description' => "Booking for Hotel: " . $hotel->name,
                        ],
                        'unit_amount' => $totalPrice * 100, // Convert to cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('hotel.payment.success') . '?hotel_id=' . $hotel->id .
                    '&check_in_date=' . $checkInDate .
                    '&check_out_date=' . $checkOutDate .
                    '&number_of_guests=' . $numberOfGuests .
                    '&total_price=' . $totalPrice,
                'cancel_url' => route('hotel.payment.cancel'),
            ]);

            // Redirect to Stripe checkout
            return redirect($session->url);
        } catch (\Exception $e) {
            // Handle Stripe API errors gracefully
            return back()->withError('Error creating Stripe session: ' . $e->getMessage());
        }
    }

    /**
     * Validate and apply the coupon.
     *
     * @param string $couponCode
     * @param float $totalPrice
     * @return float Discount amount
     */
    private function validateAndApplyCoupon($couponCode, $totalPrice)
    {
        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            return 0; // Invalid coupon
        }

        // Ensure coupon is active and not expired
        if (!$coupon->is_active || $coupon->expires_at < now()) {
            return 0; // Coupon not valid
        }

        // Calculate discount based on percentage or fixed amount
        if ($coupon->type === 'percentage') {
            return $totalPrice * ($coupon->value / 100);
        } elseif ($coupon->type === 'fixed') {
            return min($coupon->value, $totalPrice); // Avoid negative price
        }

        return 0; // Default no discount
    }

    /**
     * Handle successful payment.
     */
    public function success(Request $request)
    {
        // Retrieve the passed query parameters
        $hotelId = $request->query('hotel_id');
        $checkInDate = $request->query('check_in_date');
        $checkOutDate = $request->query('check_out_date');
        $numberOfGuests = $request->query('number_of_guests');
        $totalPrice = $request->query('total_price');

        // Create a new booking in the HotelBookings table
        $hotelBooking = HotelBooking::create([
            'user_id' => auth()->id(), // Authenticated user ID
            'hotel_id' => $hotelId,
            'check_in_date' => $checkInDate,
            'check_out_date' => $checkOutDate,
            'number_of_guests' => $numberOfGuests,
            'total_price' => $totalPrice,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Optionally, you could send a confirmation email here.

        return view('hotels.payment.success', compact('hotelBooking'));
    }

    /**
     * Handle canceled payment.
     */
    public function cancel()
    {
        // Redirect to the hotels index page upon cancellation
        return redirect()->route('hotels.index')->with('error', 'Payment was canceled. Please try again.');
    }
}
