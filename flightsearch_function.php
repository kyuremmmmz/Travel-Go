<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            padding: 10px;
            width: 80%;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        .flight-info {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
        .flight-info p {
            margin-bottom: 10px;
            text-align: center;
        }
        .progress {
            margin-top: 20px;
            height: 30px;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
        }
        .progress-bar {
            width: 0%;
            height: 100%;
            background-color: #4caf50;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check Flight Status</h2>
        <form id="flightForm">
            <label for="flight_number">Enter Flight Number:</label><br>
            <input type="text" name="flight_number" id="flight_number" required><br>
            <button type="button" onclick="checkFlightStatus()">Check Status</button>
        </form>
        <div class="flight-info" id="flightInfo">
            <!-- Flight information will be loaded dynamically here -->
        </div>
        <div class="progress" id="progressBarContainer">
            <div class="progress-bar" id="progressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <script>
        function checkFlightStatus() {
            // Your AJAX code to check flight status and update flight information and progress bar goes here
            // For demonstration purposes, let's assume a static progress update
            var progressBar = document.getElementById('progressBar');
            var width = 10;
            var id = setInterval(frame, 1000);

            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++;
                    progressBar.style.width = width + '%';
                    progressBar.innerHTML = width * 1 + '%';
                }
            }
        }
    </script>
</body>
</html>
