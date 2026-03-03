<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jajabor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('https://www.nwslc.ac.uk/wp-content/uploads/hand-holding-loupe-traveller-table-scaled-e1681808146477.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: #fff;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.8);
            padding: 10px 20px;
        }
        .navbar .nav-logo {
            display: flex;
            align-items: center;
        }
        .navbar pre {
            font-size: 24px;
            margin-left: 20px;
            color: #fff;
            font-weight: bold;
        }
        .navbar .nav-links {
            display: flex;
            gap: 15px;
        }
        .navbar .nav-links a {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .navbar .nav-links a:hover {
            color: #00c0ff;
        }
        .hero {
            text-align: center;
            padding: 100px 20px;
            background: rgba(0, 0, 0, 0.6);
        }
        .hero h4 {
            font-size: 24px;
            margin: 0;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo">
                <pre>Jajabor</pre>
            </div>
            <div class="nav-links">
                <a href="/">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @endauth
                @guest
                    <a href="{{ route('register') }}">Register</a>
                    <a href="{{ route('login') }}">Log In</a>       
                @endguest
                <a href="{{ route('faq.index') }}">Faq</a>
                <a href="{{route('about.us')}}">About Us</a>
            </div>
        </div>
    </header>
</body>
</html>
