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
        /* CSS for the progress bar container */
        .progress-container {
            position: relative;
            width: 80%; /* Width of the progress bar container */
            background-color: #f3f3f3;
            border-radius: 20px;
            margin-top: 20px;
        }

        /* CSS for the progress bar */
        .progress-bar {
            height: 20px;
            background-color: #4caf50; /* Green color for completed progress */
            border-radius: 20px;
            transition: width 0.5s ease; /* Transition effect for smooth width change */
        }

        /* CSS for the progress percentage text */
        .progress-text {
            text-align: center;
            padding: 10px 0;
        }

        /* CSS for the plane icon */
        .fas.travel-2 {
            position: absolute;
            transform: translateY(-60%); /* Adjust vertically to center the icon */
            font-size: 30px; /* Adjust the font size of the icon */
    }
  </style>
</head>
<body>
    <h1>Your Bookings</h1>
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

          



            if ($progress>=30) {
                echo '<div>';
            echo '<h2>' . $place . '</h2>';
            echo '<p>Name: ' . $price . '</p>';
            echo '<p>Travel period: ' . date('F jS', strtotime($startDate)) . ' to ' . date('F jS', strtotime($endDate)) . '</p>';

            // Progress bar
            echo '<div class="progress-container">
                <i class="fas fa-calendar" id="icon" style="left: '.$progress.'%; transform: translateX(-60%);"></i>
                <div class="progress-bar" id="progressBar" style="width: '.$progress.'%;"></div>
            </div>
           <h1>Already travelling</h1>';

            echo '</div>';
                
            }

            else if ($progress<=0) {
                echo '<div>';
                echo '<h2>' . $place . '</h2>';
                echo '<p>Name: ' . $price . '</p>';
                echo '<p>Travel period: ' . date('F jS', strtotime($startDate)) . ' to ' . date('F jS', strtotime($endDate)) . '</p>';
    
                // Progress bar
                echo '<div class="progress-container">
                    <i class="fas travel-2" id="icon" style="left: '.$progress.'%; transform: translateX(-60%);"></i>
                    <div class="progress-bar" id="progressBar" style="width: '.$progress.'%;"></div>
                </div>
               <h1>Get READY</h1>';
    
                echo '</div>';

                
            }

            else if ($progress==100) {
                echo '<div>';
                echo '<h2>' . $place . '</h2>';
                echo '<p>Name: ' . $price . '</p>';
                echo '<p>Travel period: ' . date('F jS', strtotime($startDate)) . ' to ' . date('F jS', strtotime($endDate)) . '</p>';
    
                // Progress bar
                echo '<div class="progress-container">
                    <i class="material-icons plane-icon" id="icon" style="left: '.$progress.'%; transform: translateX(-60%);"></i>
                    <div class="progress-bar" id="progressBar" style="width: '.$progress.'%;"></div>
                </div>
               <h1>Arrived</h1>';
    
                echo '</div>';

                # code...
            }
        }
    } else {
        echo '<p>No bookings found.</p>';
    }
    ?>
</body>
</html>
