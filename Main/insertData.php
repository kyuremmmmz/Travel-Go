<?php 
session_start();

// Include database connection file 
include_once 'dbConnect.php';


$amount = $_POST['amount'];
$comment = '';
if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
}
$status = "pending";

$insert = $db->query("INSERT INTO payment(amount,status,comment) VALUES('".$amount."','".$status."','".$comment."')");

$last_id = $db->insert_id;

$_SESSION['user_id'] = $last_id;
