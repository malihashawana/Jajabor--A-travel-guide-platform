<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            padding: 15px 25px;
            background-color:rgb(0, 118, 215);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        header h1 {
            color: white;
            margin: 0;
            font-size: 1.8rem;
        }

        .dashboard-btn {
            background-color: #ffffff;
            color:rgb(107, 137, 161);
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1.4rem;
            cursor: pointer;
        }

        .dashboard-btn:hover {
            background-color:rgb(124, 142, 160);
            color: white;
        }

        .weather-container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        }

        h1, h2, p {
            margin: 20px 0;
        }

        .form-container {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container label {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .form-container input {
            padding: 10px;
            border-radius: 8px;
            border: none;
            width: 80%;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .form-container button {
            background-color: #0078d7;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color:rgb(32, 69, 94);
        }

        .error-message {
            color: #ff4c4c;
            font-size: 1rem;
        }

        .weather-info {
            font-size: 1.3rem;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Weather Forecast</h1>
        <button class="dashboard-btn" onclick="window.location.href='{{ url('dashboard') }}'">Dashboard</button>
    </header>

    <div class="form-container">
        <form method="GET" action="{{ url('weather') }}">
            <label for="city">Enter city:</label>
            <input type="text" id="city" name="city" placeholder="City name" value="{{ $city ?? '' }}">
            <button type="submit">Get Weather</button>
        </form>
    </div>

    <div class="weather-container">
        @if(isset($weather['error']))
            <p class="error-message">{{ $weather['error'] }}</p>
        @elseif(isset($weather['current']))
            <h1>Weather in {{ $city }}</h1>
            <h2>{{ $weather['current']['condition']['text'] }}</h2>
            <p class="weather-info">Temperature: {{ $weather['current']['temp_c'] }}°C</p>
            <p class="weather-info">Humidity: {{ $weather['current']['humidity'] }}%</p>
            <p class="weather-info">Wind Speed: {{ $weather['current']['wind_kph'] }} km/h</p>
        @endif
    </div>
</body>
</html>
