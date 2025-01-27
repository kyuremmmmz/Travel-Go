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
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $hotel = $_POST["hotel"];
    $amount = $_POST["amount"];
    $status = "pending";


   

   

        if ($departure == $arrival) {
        echo "Cannot match arrival and departure dates.";
            } elseif ($departure > $arrival) {
                echo "<script>alert('Invalid departure')</script>";
            } else {
        // Generate a voucher code
        $voucherCode = generateVoucher(16);

        // Connect to MySQL database
        $conn = new mysqli('localhost:3307', 'root', 'admin', 'sample');
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        // Construct the SQL query
        $sql = "INSERT INTO booking_tracker(full_name, children, adult, arrival, departure, contact_number, email, hotel, voucher_code, amount, status) 
                VALUES ('$fullname', '$children', '$adult', '$arrival', '$departure', '$phone', '$email', '$hotel', '$voucherCode', '$amount', '$status')";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // Send confirmation email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'kurosawataki84@gmail.com'; // Your Gmail email address
                    $mail->Password = 'fwbmdkvlhkxivqet'; // Your Gmail password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                    $mail->Port = 587; // TCP port to connect to
    
                    // Set email recipients and content
                    $mail->setFrom('kurosawataki84@gmail.com', 'Travel Go Ph');
                    $mail->addAddress($email, $fullname); // Recipient email address
                    $mail->isHTML(true);
                    $mail->Subject = 'Your Booking Confirmation and Voucher';
                    $mail->Body = "Dear $fullname,<br><br>Thank you for booking with us. Your reservation details are as follows:<br>Hotel: $hotel<br>Arrival Date: $arrival<br>Departure Date: $departure<br>Voucher Code: $voucherCode<br><br>We look forward to welcoming you.<br><br>Best regards,<br>Travel GO Philippines";
    
                    // Send email
                    $mail->send();
                    echo "<script>alert('Email sent successfully')</script>";

                    $url = "payment.php?choice=" . urlencode($amount);
                    header("Location: $url");
                    exit;
                } catch (Exception $e) {
                    echo "Error sending email: {$mail->ErrorInfo}";
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
}

function generateVoucher($length) {
    //TODO: Generate a unique voucher code 
    $id = '';
    for ($i = 0; $i < $length; $i++) {
        $id.= mt_rand(0, 9); // Generate a random digit (0-9)
    }
    return $id;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Travel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
    body {
        background-color: #f8f9fa; /* Light background color */
        color: #343a40; /* Text color */
    }
    .container {
        margin-top: 50px;
        width: 80%; /* Set wider container width */
        text-align: center; /* Align text to center within container */
    }
    .form-group {
        margin-bottom: 20px; /* Add spacing between rows */
        text-align: left; /* Align text to left within form-group */
    }
    /* Style for form inputs */
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select {
        background-color: #ffffff; /* Background color */
        color: #343a40; /* Text color */
        border-color: #ced4da; /* Border color */
        width: 100%; /* Set width to 100% of parent container */
        box-sizing: border-box; /* Include padding and border in width calculation */
        padding: 10px; /* Add padding */
        border-radius: 5px; /* Add border radius */
    }
    /* Style for form inputs on focus */
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="tel"]:focus,
    select:focus {
        background-color: #ffffff; /* Background color */
        color: #343a40; /* Text color */
        border-color: #80bdff; /* Border color on focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Add box shadow on focus */
    }
    /* Style for buttons */
    .btn {
        background-color: #007bff; /* Button background color */
        color: #ffffff; /* Button text color */
        border: none; /* Remove border */
        padding: 10px 20px; /* Add padding */
        width: 100%; /* Set width to 100% of parent container */
        box-sizing: border-box; /* Include padding and border in width calculation */
        border-radius: 5px; /* Add border radius */
    }
    .btn:hover {
        background-color: #0056b3; /* Button background color on hover */
        color: #ffffff; /* Button text color on hover */
    }
</style>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Form -->
                <form action="placesbooking.php" method="POST">
                    <?php
                    if (isset($_GET["choice"]) && isset($_GET["price"])) {
                        $choice = $_GET["choice"];
                        $price =  $_GET["price"];
                        $price2 = number_format($_GET["price"]);
                        echo "<h2 class='text-center mb-4'>Book this to: $choice With PHP $price2</h2>";
                    }
                    ?>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="departure_date" class="form-label">Departure Date</label>
                        <input type="date" class="form-control" id="departure_date" name="ddate" required>
                    </div>
                    <div class="form-group">
                        <label for="arrival_date" class="form-label">Return Date</label>
                        <input type="date" class="form-control" id="arrival_date" name="adate" required>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $price ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="adults" class="form-label">Number of Adults</label>
                        <input type="number" class="form-control" id="adults" name="adults"  required>
                    </div>
                    <div class="form-group">
                        <label for="children" class="form-label">Number of Children</label>
                        <input type="number" class="form-control" id="children" name="children"  required>
                    </div>
                    <div class="form-group">
                        <label for="hotel" class="form-label">Book this to</label>
                        <input type="text" class="form-control" id="hotel" name="hotel" value="<?php echo isset($_GET["choice"]) ? $_GET["choice"] : ''; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Next</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>




    <script>
var amount = document.getElementById("amount");
var adultsInput = document.getElementById("adults");
var childrenInput = document.getElementById("children");


var adultPrice = 500; // Set the price for each adult
var childrenP = 100;

// Event listener for children input
childrenInput.addEventListener('input', function() {
    var children = parseInt(childrenInput.value);
    var totalC = children * childrenP;
    amount.value = parseInt(amount.value) + totalC;
});

// Event listener for adults input
adultsInput.addEventListener('input', function() {
    var adults = parseInt(adultsInput.value);
    var children = parseInt(childrenInput.value);
    var additionalAmount = adults * adultPrice;
    amount.value = parseInt(amount.value) + additionalAmount;
});




    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
