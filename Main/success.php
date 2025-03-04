<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <!-- Add any necessary CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            margin-top: 50px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include_once 'config.php'; 
    include_once 'dbConnect.php';

    $pid = $_SESSION['email']; 
    
    if(isset($_GET['PayerID'])){ 
        echo "<h1>Your Payment has been successful</h1>";
        $insert = $db->query("UPDATE booking_tracker SET status='completed' where email='".$pid."'");
    }
    else{
        echo "<h1>Your Payment has failed</h1>";
    }
    ?>
    <a href="e-ticket.php">Go to travel</a>
    <a href="flightbooking_e-ticket.php">Go to flight</a>
</body>
</html>
