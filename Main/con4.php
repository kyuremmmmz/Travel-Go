<?php 
session_start(); 
// Database connection
$conn = new mysqli("localhost:3307", "root", "admin", "for_admin");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>