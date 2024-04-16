


<?php 
session_start();
include_once 'config.php'; 
include_once 'dbConnect.php';

$pid = $_SESSION['email']; 
 
if(isset($_GET['PayerID'])){ 
    echo "<h1>Your Payment has been successfull</h1>";
    $insert = $db->query("UPDATE booking_tracker SET status='completed' where email='".$pid."'");
}
else{
    echo "<h1>Your Payment has been failed</h1>";
}






?>
<a href="e-ticket.php">Next</a>