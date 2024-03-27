<?php

$conn = mysqli_connect("localhost:3307","root","admin","sample");


if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>