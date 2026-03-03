<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $location->name }}</title>
    <style>
        /* Full-page background image */
        body {
            margin: 0;
            padding: 0;
            background: url('{{ $location->image_url }}') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
        }

        /* Page container */
        .container {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            max-width: 600px;
            margin: 100px auto;
            border-radius: 10px;
        }

        /* Modal styling */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        .close-btn {
            background: #ff5e57;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .show-more-btn {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .show-more-btn:hover, .close-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $location->name }}</h1>
        <p><strong>Description:</strong> {{ Str::limit($wikiExtract, 100, '...') }}</p>
        <button class="show-more-btn" onclick="openModal()">Show More</button>
    </div>

    <!-- Modal -->
    <div id="descriptionModal" class="modal">
        <div class="modal-content">
            <h2>{{ $location->name }}</h2>
            <p>{{ $wikiExtract }}</p>
            <button class="close-btn" onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        // Open modal
        function openModal() {
            document.getElementById('descriptionModal').style.display = 'flex';
        }

        // Close modal
        function closeModal() {
            document.getElementById('descriptionModal').style.display = 'none';
        }
    </script>
</body>
</html>
