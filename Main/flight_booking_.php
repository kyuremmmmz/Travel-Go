<?php
// Establish database connection
$conn = new mysqli('localhost:3307', 'root', 'admin', 'sample');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {
    // Get form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$arrival_date = $_POST['arrival_date'] . ' ' . $_POST['arrival_time']; // Combine date and time
$departure_date = $_POST['departure_date'] . ' ' . $_POST['departure_time']; // Combine date and time
$contact_number = $_POST['contact_number'];
$flight_number = $_POST['flight_number'];
$destination = $_POST['destination'];
$seat_class = $_POST['seat_class'];

// Prepare and execute SQL query to insert data into flight_bookings table
$sql = "INSERT INTO flight_bookings (full_name, email, arrival_date, departure_date, contact_number, flight_number, destination, seat_class)
        VALUES ('$full_name', '$email', '$arrival_date', '$departure_date', '$contact_number', '$flight_number', '$destination', '$seat_class')";

if ($conn->query($sql) === TRUE) {
    echo "Flight booking submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking Form</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    margin-top: 20px;
}

form {
    width: 50%;
    margin: 0 auto;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="date"],
input[type="tel"],
input[type="email"],
select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <h2>Flight Booking Form</h2>
    

    <form action="flight_booking_.php" method="POST">
    <?php
        if (isset($_GET['destination'], $_GET['price'], $_GET['arrival'], $_GET['departure'])) {
            // Decode each parameter value
            $destination = $_GET['destination'];
            $price =$_GET['price'];
            $arrival = $_GET['arrival'];
            $departure = $_GET['departure'];

            
        }
        ?>
    <label for="full_name">Full Name:</label><br>
    <input type="text" id="full_name" name="full_name" required><br>
    
    <label for="children">Number of Children:</label><br>
    <input type="number" id="children" name="children" min="0" required><br>
    
    <label for="adult">Number of Adults:</label><br>
    <input type="number" id="adult" name="adult" min="1" required><br>
    
    <label for="arrival_date">Arrival Date:</label><br>
    <input type="date" id="arrival_date" name="arrival_date" value="<?php echo $arrival ?>" required>
    <input type="time" id="arrival_time" name="arrival_time" required><br>
    
    <label for="departure_date">Departure Date:</label><br>
    <input type="date" id="departure_date" name="departure_date" required>
    <input type="time" id="departure_time" name="departure_time" required><br>
    
    <label for="contact_number">Contact Number:</label><br>
    <input type="tel" id="contact_number" name="contact_number"  required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="flight_number">Flight Number:</label><br>
    <input type="text" id="flight_number" name="flight_number" required><br>
    
    <label for="destination">Destination:</label><br>
    <input type="text" id="destination" name="destination" required><br>
    
    <label for="seat_class">Seat Class:</label><br>
    <select id="seat_class" name="seat_class" required>
        <option value="">Select Seat Class</option>
        <option value="Economy">Economy</option>
        <option value="Business">Business</option>
        <option value="First Class">First Class</option>
    </select><br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
