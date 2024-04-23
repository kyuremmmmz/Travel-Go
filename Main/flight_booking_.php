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
$arrival_date = $_POST['arrival_date'] ;
$departure_date = $_POST['departure_date']; // Combine date and time
$contact_number = $_POST['contact_number'];
$flight_number = $_POST['flight_number'];
$destination = $_POST['destination'];
$origin = $_POST['origin'];
$amount = $_POST['amount'];
$seat_class = $_POST['seat_class'];

// Prepare and execute SQL query to insert data into flight_bookings table
$sql = "INSERT INTO flight_bookings (full_name, email, arrival_date, departure_date, contact_number, flight_number, destination, origin ,amount,seat_class)
        VALUES ('$full_name', '$email', '$arrival_date', '$departure_date', '$contact_number', '$flight_number', '$destination', '$origin', '$amount' , '$seat_class')";

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
        if (isset($_GET['destination'], $_GET['price'], $_GET['arrival'], $_GET['departure'], $_GET['arrivaldate'], $_GET['departuredate'], $_GET['flightnum'], $_GET['origin'])) {
            // Decode each parameter value
            $destination = urldecode($_GET['destination']);
            $price = urldecode($_GET['price']);
            // Kunin ang mga petsa at oras mula sa mga URL parameter at i-decode
            $arrival = urldecode($_GET['arrival']);
            $departure = urldecode($_GET['departure']);
            $arrivaldate = urldecode($_GET['arrivaldate']);
            $departuredate = urldecode($_GET['departuredate']);

            // I-format ang petsa base sa iyong nais na format
            $arrival_formatted = date_format(date_create($arrival), 'Y-m-d');
            $departure_formatted = date_format(date_create($departure), 'Y-m-d');
            $arrivaldate_formatted = date_format(date_create($arrivaldate), 'Y-m-d');
            $departuredate_formatted = date_format(date_create($departuredate), 'Y-m-d');

            $flight_number = $_GET['flightnum'];
            $origin = urldecode($_GET['origin']);
        }
?>

    <label for="full_name">Full Name:</label><br>
    <input type="text" id="full_name" name="full_name" required><br>
    
    <label for="children">Number of Children:</label><br>
    <input type="number" id="children" name="children" min="0" required><br>
    
    <label for="adult">Number of Adults:</label><br>
    <input type="number" id="adult" name="adult" min="1" required><br>
    
    <label for="arrival_date">Arrival Date:</label><br>
    <input type="date" id="arrival_date" name="arrival_date" value="<?php echo $arrivaldate_formatted ?>" required>

    
    <label for="departure_date">Departure Date:</label><br>
    <input type="date" id="departure_date" name="departure_date" value="<?php echo $departuredate_formatted ?>" required>
    
    <label for="contact_number">Contact Number:</label><br>
    <input type="tel" id="contact_number" name="contact_number"  required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="flight_number">Flight Number:</label><br>
    <input type="text" id="flight_number" name="flight_number" value="<?php echo $flight_number ?>"  required><br>
    
    <label for="destination">Destination:</label><br>
    <input type="text" id="destination" name="destination" value="<?php echo $destination ?>" required><br>

    <label for="amount">Amount:</label><br>
    <input type="text" id="amount" name="amount" value="<?php  echo $price ?>" required><br>

    <label for="origin">Origin:</label><br>
    <input type="text" id="destination" name="origin" value="<?php echo $origin;?>" required><br>
    
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
