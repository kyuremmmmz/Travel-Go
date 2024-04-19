<?php
session_start();
$email = $_SESSION['email']; 

include_once 'config.php'; 
include_once 'con2.php';

// Check if the request method is POST and if delete_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM booking_tracker WHERE id = $delete_id";
    if ($conn->query($sql) !== TRUE) {
        echo "Error deleting booking: " . $conn->error;
    }
    exit(); // Stop further execution
}

// Fetch booking information from the database
$sql = "SELECT id, hotel, full_name, departure, arrival FROM booking_tracker WHERE email = '$email'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Bookings</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Include SweetAlert library -->
    <script src="https://kit.fontawesome.com/3508e9b10b.js" crossorigin="anonymous"></script>
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
            height: 20px; /* Increased height for better visibility */
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
            width: 20px; /* Increased width for better visibility */
            height: 20px; /* Increased height for better visibility */
            background-color: #4caf50;
            border-radius: 50%;
            left: 0;
            top: 0;
            display: flex; /* Added to center the icon */
            justify-content: center; /* Added to center the icon */
            align-items: center; /* Added to center the icon */
        }
        .plane-icon {
            width: 20px; /* Increased width for better visibility */
            height: 20px; /* Increased height for better visibility */
            background-color: #FFFFFF;
            border-radius: 50%;
            left: 0;
            top: 0;
            display: flex; /* Added to center the icon */
            justify-content: center; /* Added to center the icon */
            align-items: center; /* Added to center the icon */
        }
        .cancel-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: #dc3545; /* Red color for cancel button */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .arrived-btn {
            position: absolute;
            right: 20px;
            top: 20px;
            background-color: #35DC4B; /* Red color for cancel button */
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Travel Status</h1>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $bookingId = $row['id'];
                    $place = $row['hotel'];
                    $price = $row['full_name'];
                    $startDate = $row['departure'];
                    $endDate = $row['arrival'];

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
                        </div>
                        <?php if ($progress < 100): ?>
                            <button class="cancel-btn" data-id="<?php echo $bookingId; ?>">Cancel</button>
                        <?php endif; ?>
                        <?php if ($progress == 100): ?>
                            <button class="arrived-btn" data-id="<?php echo $bookingId; ?>">Arrived</button>
                        <?php endif; ?>
                    </div>
                </div>
        <?php
            }
        } else {
            echo '<p>No bookings found.</p>';
        }
        ?>
    </div>
    <script>
        // Cancel Button Click Event
        $(".cancel-btn").click(function(){
            var bookingId = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once canceled, you will not be able to recover this booking!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, cancel it!"
            }).then((willCancel) => {
                if (willCancel.isConfirmed) {
                    $.ajax({
                        url: "travel.php", 
                        type: "POST",
                        data: {delete_id: bookingId},
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });







        // Cancel Button Click Event
        $(".arrived-btn").click(function(){
            var bookingId = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once canceled, you will not be able to recover this booking!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, cancel it!"
            }).then((willCancel) => {
                if (willCancel.isConfirmed) {
                    $.ajax({
                        url: "travel.php", // Corrected the URL here
                        type: "POST",
                        data: {delete_id: bookingId},
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
