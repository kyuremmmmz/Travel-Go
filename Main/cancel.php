<?php 
session_start();
include_once 'con2.php';

$pid = $_SESSION['email'];

$insert = $db->query("UPDATE hotel SET status='cancelled' where id='".$pid."'");
session_destroy();
?>

        <h1 class="error">Your PayPal Transaction has been Canceled</h1>
    <a href="index.php" class="btn-link">Back to Home</a>