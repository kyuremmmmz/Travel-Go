<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking E-Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    session_start();
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

    $session = $_SESSION['email'];

    // SQL query to fetch flight booking data
    $stmt = $conn->prepare("SELECT * FROM flight_bookings WHERE email = ?"); 
    $stmt->bind_param("s", $session);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $flight_number = $row['flight_number'];
            $destination = $row['destination'];
            $origin = $row['origin'];
            $arrival_date = $row['arrival_date'];
            $departure_date = $row['departure_date'];
            $full_name = $row['full_name'];
            $email = $row['email'];
            $contact_number = $row['contact_number'];
            $seat_class = $row['seat_class'];
            
            echo '<div class="container mt-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1>Flight Booking E-Ticket</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Flight Information</h3>
                                    <p><strong>Flight Number:</strong> '.$flight_number.'</p>
                                    <p><strong>Origin:</strong> '.$origin.'</p>
                                    <p><strong>Destination:</strong> '.$destination.'</p>
                                    <p><strong>Arrival Date:</strong> '.$arrival_date.'</p>
                                    <p><strong>Departure Date:</strong> '.$departure_date.'</p>
                                    <p><strong>Seat Class:</strong> '.$seat_class.'</p>
                                </div>
                                <div class="col-md-6">
                                    <h3>Passenger Information</h3>
                                    <p><strong>Name:</strong> '.$full_name.'</p>
                                    <p><strong>Email:</strong> '.$email.'</p>
                                    <p><strong>Contact Number:</strong> '.$contact_number.'</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="Main.php" method="post">
                                <button type="submit" class="btn btn-primary" name="back">Back</button>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "0 results";
    }

    // Close MySQL connection
    $conn->close();
    ?>
</body>
</html>
