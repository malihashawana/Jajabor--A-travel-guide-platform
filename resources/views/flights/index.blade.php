<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4faff;
            font-family: 'Roboto', sans-serif;
        }

        /* Header styling */
        .navbar-custom {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('your-image-path.jpg') center/cover no-repeat; /* Background image with gradient overlay */
            color: #fff;
            padding: 1rem 2rem;
        }

        .navbar-custom .navbar-brand {
            font-weight: bold;
            color: #ffffff;
            font-size: 1.8rem;
        }

        .navbar-custom .nav-link {
            color: #89CFF0; /* Light blue for nav links */
            font-weight: bold;
            margin-left: 1rem; /* Space between nav items */
            transition: color 0.3s ease;
        }

        .navbar-custom .nav-link:hover {
            color: #ffffff; /* Change to white on hover */
        }

        .navbar-custom .navbar-nav {
            margin-left: auto; /* Align navigation items to the right */
        }

        .search-form {
            background-color: #ffffff;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: auto;
        }

        .form-group {
            background-color: #f9f9f9;
            border-radius: 1rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-search {
            background-color: #ffcc00;
            border: none;
            color: #003580;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            width: 100%;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .btn-search:hover {
            background-color: #ffb900;
            transform: scale(1.02);
        }

        .flight-card {
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .flight-card:hover {
            transform: scale(1.02);
        }

        .flight-card h5 {
            color: #003580;
        }

        .flight-card p {
            color: #555555;
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

    <!-- Search Section -->
    <div class="container mt-5">
        <form action="{{ route('flights.search') }}" method="POST" class="search-form">
            @csrf
           
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <i class="fas fa-plane-departure"></i>
                        <div>
                            <label for="departure">From</label>
                            <input type="text" id="departure" name="departure" placeholder="Departure City" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <i class="fas fa-plane-arrival"></i>
                        <div>
                            <label for="destination">To</label>
                            <input type="text" id="destination" name="destination" placeholder="Destination City" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <label for="date">Journey Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <i class="fas fa-user-friends"></i>
                        <div>
                            <label for="travelers">Travelers</label>
                            <input type="number" id="travelers" name="travelers" min="1" placeholder="1 Traveler, Economy" required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-search mt-4">Search</button>
        </form>
    </div>

    <!-- Available Flights Section -->
    <div class="container mt-5">
        <h4 class="mb-4" style="color: #003580;">Available Flights</h4>
        <div class="row">
            @foreach ($flights as $flight)
                <div class="col-md-4">
                    <div class="flight-card">
                        <h5>{{ $flight->flight_number }}</h5>
                        <p><strong>From:</strong> {{ $flight->departure }}</p>
                        <p><strong>To:</strong> {{ $flight->destination }}</p>
                        <p><strong>Price:</strong> ${{ $flight->price }}</p>
                        <p><strong>Date:</strong> {{ $flight->departure_time }}</p>
                        <form action="{{ route('flights.buy', $flight->id) }}" method="GET">
                            @csrf
                            <!-- Hidden field for travelers -->
                            <input type="hidden" id = "travelers" name="travelers" value="1">
                            <button type="submit" class="btn btn-primary w-100">View Details</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
