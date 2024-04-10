<?php
session_start();
$email = $_SESSION['email'];

// Establish database connection
$conn = mysqli_connect("localhost:3307", "root", "admin", "sample");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch booking information from the database
$stmt = $conn->prepare("SELECT hotel, full_name, departure, arrival FROM booking_tracker WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .booking {
            margin-bottom: 40px;
        }
        .booking-info {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
        }
        .booking-info h2 {
            margin-top: 0;
        }
        .progress-container {
            position: relative;
            width: 100%; /* Width of the progress bar container */
            background-color: #f3f3f3;
            border-radius: 5px;
            height: 10px;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .progress-bar {
            height: 100%;
            background-color: #4caf50; /* Green color for completed progress */
            transition: width 0.5s ease; /* Transition effect for smooth width change */
        }
        .progress-start {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #4caf50;
            border-radius: 50%;
            left: 0;
            top: 0;
        }
        .plane-icon {
            position: absolute;
            top: -20px;
            left: 0;
            color: #4caf50;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Travel Status</h1>
        <?php
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $place = $row['hotel'];
                    $price = $row['full_name'];
                    $startDate = $row['arrival'];
                    $endDate = $row['departure'];

                    // Calculate progress bar
                    $currentDate = strtotime('now');
                    $startDateTimestamp = strtotime($startDate);
                    $endDateTimestamp = strtotime($endDate);

                    if ($currentDate < $startDateTimestamp) {
                        $progress = 0; // If current date is before the start date, progress is 0%
                    } elseif ($currentDate > $endDateTimestamp) {
                        $progress = 100; // If current date is after the end date, progress is 100%
                    } else {
                        $totalDuration = $endDateTimestamp - $startDateTimestamp;
                        $currentDuration = $currentDate - $startDateTimestamp;
                        $progress = ($currentDuration / $totalDuration) * 100;
                    }
        ?>
                <div class="booking">
                    <div class="booking-info">
                        <h2><?php echo $place; ?></h2>
                        <p>Name: <?php echo $price; ?></p>
                        <p>Travel period: <?php echo date('F jS', strtotime($startDate)) . ' to ' . date('F jS', strtotime($endDate)); ?></p>
                        <div class="progress-container">
                            <div class="progress-start"></div>
                            <div class="progress-bar" style="width: <?php echo $progress; ?>%;"></div>
                            <i class="fas fa-plane plane-icon" style="left: <?php echo $progress; ?>%;"></i>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No bookings found.</p>';
        }
        ?>
    </div>
</body>
</html>
