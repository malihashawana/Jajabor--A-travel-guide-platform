<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\WeatherController;

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HotelPaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;




// Welcome Page
Route::get('/', function () {
    return view('welcome');
})->name('home');


use App\Http\Controllers\DashboardController;
// Dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/about-us', function () {
    return view('about-us');
})->name('about.us');

// Public Hotel Routes
Route::prefix('hotels')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('hotels.index');
    Route::get('/search', [HotelController::class, 'search'])->name('hotels.search');
    Route::get('/{hotel}/details', [HotelController::class, 'show'])->name('hotels.show');
});

// Weather Routes
Route::get('weather', [WeatherController::class, 'showWeather'])->name('weather.show');

// Location Routes
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::match(['PUT', 'POST'], 'profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Flight Routes
    Route::prefix('flights')->group(function () {
        Route::get('/', [FlightController::class, 'index'])->name('flights.index');
        Route::get('/{flight}', [FlightController::class, 'show'])->name('flights.show');
        Route::get('/{flight}/buy', [FlightController::class, 'buy'])->name('flights.buy');
        Route::post('/{flight}/complete-purchase', [FlightController::class, 'completePurchase'])->name('flights.completePurchase');

        Route::post('/search', [FlightController::class, 'search'])->name('flights.search');
        Route::get('/history', [BookingController::class, 'history'])->name('booking.history');


        Route::post('/confirm/{flight}', [BookingController::class, 'confirm'])->name('flights.confirm');
        Route::post('/cancel/{id}', [BookingController::class, 'cancel'])->name('flights.cancel');
    });

    // Stripe Payment Routes
    Route::prefix('payment')->group(function () {
        Route::get('/checkout/{flight}', [PaymentController::class, 'showPaymentPage'])->name('payment.checkout');
        Route::post('/checkout/{flight}', [PaymentController::class, 'createCheckoutSession'])->name('payment.createCheckoutSession');
        Route::get('/success/{flight}', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/cancel/{flight}', [PaymentController::class, 'cancel'])->name('payment.cancel');
    });

    // Complaint Routes
    Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');


    // Favorites Routes
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::delete('/favorites/toggle/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

    // Hotel Booking Routes
    Route::post('/hotelbookings', [HotelBookingController::class, 'store'])->name('hotelbookings.store');
    Route::get('/hotelbookings/create/{hotel}', [HotelBookingController::class, 'create'])->name('hotelbookings.create');
    Route::get('/history', [HotelBookingController::class, 'history'])->name('history.index');
    Route::delete('/hotelbookings/{id}/cancel', [HotelBookingController::class, 'cancel'])->name('hotelbookings.cancel');

    // Hotel Payment Routes
    Route::prefix('hotel/payment')->group(function () {
        Route::post('/create-checkout-session/{hotel}', [HotelPaymentController::class, 'createCheckoutSession'])->name('hotel.payment.createCheckoutSession');
        Route::get('/success', [HotelPaymentController::class, 'success'])->name('hotel.payment.success');
        Route::get('/cancel', [HotelPaymentController::class, 'cancel'])->name('hotel.payment.cancel');
        Route::get('/receipt/{file}', function ($file) {
            return response()->download(storage_path('app/public/' . $file));
        })->name('payment.receipt');
    });


// Location Routes
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

// Reviews Routes
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// Login Route


    // Hotel Booking Routes
    Route::post('/hotelbookings', [HotelBookingController::class, 'store'])->name('hotelbookings.store');
    Route::get('/hotelbookings/create/{hotel}', [HotelBookingController::class, 'create'])->name('hotelbookings.create');

    // Favorites Routes
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::delete('/favorites/toggle/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.delete');

    // Hotel Payment Routes
    Route::prefix('hotel/payment')->group(function () {
        Route::post('/create-checkout-session/{hotel}', [HotelPaymentController::class, 'createCheckoutSession'])->name('hotel.payment.createCheckoutSession');
        Route::get('/success', [HotelPaymentController::class, 'success'])->name('hotel.payment.success');
        Route::get('/cancel', [HotelPaymentController::class, 'cancel'])->name('hotel.payment.cancel');
        Route::get('/receipt/{file}', function ($file) {
            return response()->download(storage_path('app/public/' . $file));
        })->name('payment.receipt');
    });
});

// Auth Routes
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Include additional authentication routes
require __DIR__ . '/auth.php';
// FAQ Route
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');