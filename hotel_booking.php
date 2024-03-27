<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'C:/xampp/htdocs/Website/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/Website/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/Website/PHPMailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    $fullname = $_POST["name"];
    $children = $_POST["children"];
    $adult = $_POST["adults"];
    $arrival = $_POST["adate"];
    $departure = $_POST["ddate"];
    $payment = $_POST["payment_method"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $hotel = $_POST["hotel"];

    if ($arrival == $departure) {
        echo "Cannot match arrival and departure dates.";
    } elseif ($arrival > $departure) {
        echo "<script>alert('Invalid departure')</script>";
    } else {
        // Connect to MySQL database
        $conn = new mysqli('localhost:3307', 'root', 'admin', 'sample');
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        include("../connnection.php");

        // Construct the SQL query
        $sql = "INSERT INTO booking_tracker(full_name, children, adult, arrival, departure, payment, contact_number, email, hotel) 
                VALUES ('$fullname', '$children', '$adult', '$arrival', '$departure', '$payment', '$phone', '$email', '$hotel')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // Send confirmation email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kurosawataki84@gmail.com'; //Indicate My Gmail email address
                $mail->Password = 'fwbmdkvlhkxivqet'; // Indicate my Gmail password here
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption here
                $mail->Port = 587; // TCP port to connect to 

                //Recipients
                $mail->setFrom('kurosawataki84@gmail.com', $fullname);
                $mail->addAddress($email, $fullname); // Add recipient email address

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'From TravelGo Philippines';
                $mail->Body = "Dear $fullname,<br><br>Thank you for booking with us. Your reservation details are as follows:<br>Hotel: $hotel<br>Arrival Date: $arrival<br>Departure Date: $departure<br><br>We look forward to welcoming you.<br><br>Best regards,<br> Travel GO Philippines";

                $mail->send();
                echo "<script>alert('Email sent successfully')</script>";
                header("Location: calendar.php");
                exit;
            } catch (Exception $e) {
                echo "Error sending email: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book your travel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body class="">
    <div id="containermt-5" class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
            <?php  
            $img = isset($_GET["choice"]) ? $_GET["choice"] : 'No choice selected';
            echo "<h2 class='text-center mb-4'>Book this to: $img</h2>";
            ?>
                <h2 class="text-center mb-4">Booking Form</h2>
                <form action="hotel_booking.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="hotel" class="form-label">Hotel</label>
                        <input type="text" class="form-control" id="hotel" name="hotel" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Arrival Date</label>
                        <input type="date" class="form-control" id="arrival_date" name="adate" required>
                    </div>
                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Departure Date</label>
                        <input type="date" class="form-control" id="departure_date" name="ddate" required>
                    </div>
                    <div class="mb-3">
                        <label for="adults" class="form-label">Number of Adults</label>
                        <select class="form-select" id="adults" name="adults" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="children" class="form-label">Number of Children</label>
                        <select class="form-select" id="children" name="children" required>
                            <option value="">Select</option>
                            <option value="0">None</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="">Select</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="debit_card">Debit Card</option>
                            <option value="paypal">PayPal</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  
                    
                   
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
