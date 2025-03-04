<?php
session_start(); 
$conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
if ($conn->connect_error) {
    die("connection error". $conn->connect_error);
}

echo"";

?>