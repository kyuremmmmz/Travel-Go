<?php
include("con2.php"); // Include your database connection file

// Function to generate a random time
function generateRandomTime() {
    return sprintf('%02d:%02d:%02d', rand(0, 23), rand(0, 59), rand(0, 59));
}

// Function to generate a random date within a range
function generateRandomDate($start_date, $end_date) {
    $start_timestamp = strtotime($start_date);
    $end_timestamp = strtotime($end_date);
    $random_timestamp = mt_rand($start_timestamp, $end_timestamp);
    return date("Y-m-d", $random_timestamp);
}

// Array of Philippine airports
$airports = array("MNL", "CEB", "CRK", "DVO", "ILO", "KLO", "PPS", "BCD", "ZAM", "TAG", "CGY", "GES", "MPH", "TAC");

// Generate and insert 10 random flights
for ($i = 0; $i < 10; $i++) {
    $airline_name = "Philippine Airlines"; // Assuming all flights are from Philippine Airlines
    $flight_number = "PR" . rand(100, 999); // Random flight number in the format "PRXXX"
    $origin = $airports[array_rand($airports)]; // Random origin airport
    $destination = $airports[array_rand($airports)]; // Random destination airport
    while ($origin === $destination) {
        $destination = $airports[array_rand($airports)]; // Ensure destination is different from origin
    }
    $departure_date = generateRandomDate("2024-01-01", "2024-12-31"); // Random departure date within 2024
    $departure_time = generateRandomTime(); // Random departure time
    $arrival_date = generateRandomDate($departure_date, "2024-12-31"); // Random arrival date after departure date
    $arrival_time = generateRandomTime(); // Random arrival time
    $price = rand(1000, 10000); // Random price between 1000 and 10000

    // Generate image URL (assuming images are stored in a folder named "flight_images")
    $image_url = "/flight_images/default_flight_image.jpg";

    // Insert flight details into the database
    $sql = "INSERT INTO flights (airline_name, flight_number, origin, destination, departure_date, departure_time, arrival_date, arrival_time, price, image_url) 
            VALUES ('$airline_name', '$flight_number', '$origin', '$destination', '$departure_date', '$departure_time', '$arrival_date', '$arrival_time', '$price', '$image_url')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting flight: " . $conn->error;
    }
}

echo "10 flights generated and inserted successfully";

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Flight Generator</h2>
    <button id="generateBtn">Generate Flights</button>
</div>

<script>
    // Function to trigger flight generation
    document.getElementById('generateBtn').addEventListener('click', function() {
        // Send an AJAX request to the flight generator script
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'flightmaker.php', true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                alert(xhr.responseText); // Display success message
            } else {
                alert('Error generating flights'); // Display error message
            }
        };
        xhr.send();
    });
</script>

</body>
</html>
