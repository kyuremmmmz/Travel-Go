<?php 
session_start();
include_once 'dbConnect.php';

$pid = $_SESSION['user_id'];

$insert = $db->query("UPDATE product SET status='cancelled' where id='".$pid."'");
session_destroy();
?>

        <h1 class="error">Your PayPal Transaction has been Canceled</h1>
    <a href="index2.php" class="btn-link">Back to Home</a>