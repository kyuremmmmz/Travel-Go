<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Book Your Flight</h1>
        <form action="flightbooking.php" method="post" class="mt-3">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="departure">Departure Date:</label>
                <input type="date" id="departure" name="departure" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="arrival">Arrival Date:</label>
                <input type="date" id="arrival" name="arrival" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="adult">Number of Adults:</label>
                <input type="number" id="adult" name="adult" min="1" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="children">Number of Children:</label>
                <input type="number" id="children" name="children" min="0" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Book Flight</button>
        </form>
    </div>
</body>
</html>
<?php
session_start();

// Retrieve form data
if (isset($_POST[''])) {
    $fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$departure = $_POST['departure'];
$arrival = $_POST['arrival'];
$adult = $_POST['adult'];
$children = $_POST['children'];

// Establish MySQL connection
$servername = "localhost:3307";
$username = "root";
$password = "admin";
$dbname = "sample";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to insert flight booking data into the database
$stmt = $conn->prepare("INSERT INTO booking_tracker_flight (full_name, email, phone, departure, arrival, adult, children) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $fullname, $email, $phone, $departure, $arrival, $adult, $children);

if ($stmt->execute()) {
    echo "Flight booked successfully!";
} else {
    echo "Error: " . $stmt->error;
}
}



?>
