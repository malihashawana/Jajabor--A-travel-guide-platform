<?php
namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of available flights.
     */
    public function index()
    {
        // Fetch only available flights
        $flights = Flight::where('is_available', true)->get();

        // Pass flights to the view
        return view('flights.index', compact('flights'));
    }

    /**
     * Display the specified flight.
     */
    public function show(Flight $flight)
    {
        // Optional: Check if the flight is available or add any restrictions
        if (!$flight->is_available) {
            abort(404, 'Flight not available.');
        }

        // Pass the flight to the view
        return view('flights.show', compact('flight'));
    }

    /**
     * Search for available flights based on user input.
     */
    public function search(Request $request)
    {
        // Validate user input
        $request->validate([
            'departure' => 'required|string',
            'destination' => 'required|string',
            'date' => 'required|date',
        ]);

        // Capture user input
        $departure = $request->input('departure');
        $destination = $request->input('destination');
        $date = $request->input('date');
        $passengers = $request->input('travelers', 1);
        session(['passengers' => $passengers]);

        // Search flights based on departure, destination, and date
        $flights = Flight::where('is_available', true)
                         ->where('departure', 'like', "%$departure%")
                         ->where('destination', 'like', "%$destination%")
                         ->whereDate('departure_time', $date)
    
                         ->get();

        // Check if flights were found
        if ($flights->isEmpty()) {
            return back()->with('error', 'No flights found for the specified criteria.');
        }

        // Return the search results to the new results view
        return view('flights.results', compact('flights', 'passengers'));
    }

    /**
     * Handle the flight purchase.
     */
    public function buy(Flight $flight)

    {
        $passengers = session('passengers', 1);
        
        // Example functionality: Check availability and display a confirmation page
        if ($flight->available_seats <= 0) {
            return redirect()->route('flights.index')->with('error', 'No seats available for this flight.');
        }

        // Display the purchase confirmation page for the selected flight
        return view('flights.buy',compact('flight', 'passengers'));
    }

    /**
     * Complete the purchase process.
     */
    public function completePurchase(Flight $flight)
    {
        // Check availability again
        if ($flight->available_seats <= 0) {
            return redirect()->route('flights.index')->with('error', 'No seats available for this flight.');
        }

        // Simulate purchase logic (e.g., reduce seats, log purchase, etc.)
        $flight->available_seats -= 1;
        $flight->save();

        // Redirect with success message
        return redirect()->route('flights.index')->with('success', 'Purchase completed successfully!');
    }
}