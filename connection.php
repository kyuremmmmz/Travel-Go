<?php

$conn = new mysqli('localhost:3307', 'root', 'admin', 'sample');
if ($conn->connect_error) {
    die("connection error". $conn->connect_error);
}

echo"";

?>