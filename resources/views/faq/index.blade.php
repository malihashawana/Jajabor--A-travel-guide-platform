<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header Styling */
        header {
            background-color: #2c3e50;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between; /* Space between title and navigation */
            align-items: center; /* Center the items vertically */
            width: 90%;
            margin: 0 auto;
        }

        .logo h1 {
            margin: 0;
            color: #ecf0f1;
            font-size: 2rem;
        }

        .nav-links ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nav-links a:hover {
            color: #f39c12;
        }

        /* Main Content Styling */
        .container {
            width: 80%;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .faq-list {
            margin-top: 20px;
        }

        .faq-item {
            background-color: #ecf0f1;
            margin-bottom: 15px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            background-color:rgb(131, 118, 98);
            color: black;
        }

        .faq-item h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .faq-item p {
            font-size: 1rem;
            color: #7f8c8d;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            h1 {
                font-size: 2rem;
            }

            header .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links ul {
                flex-direction: column;
                align-items: flex-start;
            }

            .faq-item {
                padding: 15px;
            }

            .faq-item h3 {
                font-size: 1.3rem;
            }

            .faq-item p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header with Home and Login links -->
    <header>
        <div class="header-content">
            <div class="logo">
                <h1>JaJabor</h1>
            </div>
            <!-- Navigation links on the right -->
            <div class="nav-links">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- FAQ Content -->
    <div class="container">
        <h1>Frequently Asked Questions</h1>

        <div class="faq-list">
            @foreach ($faqs as $faq)
                <div class="faq-item">
                    <h3>{{ $faq['question'] }}</h3>
                    <p>{{ $faq['answer'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
