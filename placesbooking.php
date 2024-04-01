<?php


require 'C:/xampp/htdocs/Website/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/Website/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/Website/PHPMailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    // Capture form data
    $fullname = $_POST["name"];
    $children = $_POST["children"];
    $adult = $_POST["adults"];
    $arrival = $_POST["adate"];
    $departure = $_POST["ddate"];
    $payment = $_POST["payment_method"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $hotel = $_POST["hotel"];

    // Check arrival and departure dates
    if ($arrival == $departure) {
        echo "Cannot match arrival and departure dates.";
    } elseif ($arrival > $departure) {
        echo "<script>alert('Invalid departure')</script>";
    } else {
        // Generate a voucher code
        $voucherCode = generateVoucher();

        // Connect to MySQL database
        $conn = new mysqli('localhost:3307', 'root', 'admin', 'sample');
        if ($conn->connect_error) {
            die("Connection error: " . $conn->connect_error);
        }

        // Construct the SQL query to insert booking details
        $sql = "INSERT INTO booking_tracker(full_name, children, adult, arrival, departure, payment, contact_number, email, hotel, voucher_code) 
                VALUES ('$fullname', '$children', '$adult', '$arrival', '$departure', '$payment', '$phone', '$email', '$hotel', '$voucherCode')";

        // Execute the SQL query to insert booking details
        if ($conn->query($sql) === TRUE) {
            // Payment transaction details
            $paypalTransactionID = $_POST['paypal_transaction_id']; // Assuming you receive this from the PayPal transaction response

            // Construct the SQL query to insert payment transaction
            $sqlPaypal = "INSERT INTO payment_transactions (voucher_code, transaction_id) 
                          VALUES ('$voucherCode', '$paypalTransactionID')";

            // Execute the SQL query to insert payment transaction
            if ($conn->query($sqlPaypal) === TRUE) {
                // Redirect to payment page
                header("Location: payment.php");
                exit;
            } else {
                // Error inserting payment transaction
                echo "Error: " . $sqlPaypal . "<br>" . $conn->error;
            }
        } else {
            // Error inserting booking details
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
}

function generateVoucher() {
    //TODO: Generate a unique voucher code 
    return uniqid();
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
            $img = isset($_GET["choice"])? $_GET["choice"] : 'No choice selected';
            echo "<h2 class='text-center mb-4'>Book this to: $img</h2>";
           ?>
                <h2 class="text-center mb-4">1. Fill The Credentials</h2>
                <form action="placesbooking.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="hotel" class="form-label">Book this to</label>
                        <input type="text" class="form-control" id="hotel" name="hotel" value= <?php  
                        $choice = isset($_GET["choice"])? $_GET["choice"] : 'No choice selected';
                        echo $choice;?> required>
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
                     <!-- PayPal SDK Script -->
                    <div id="paypal-button-container"></div>
                    <button type="submit" class="btn btn-primary" name="submit">Next</button>
                    <input type="hidden" name="voucher_code" value="<?php echo $voucherCode;?>">
                    <p id="result-message"></p>
                </form>
               
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
   
     <!-- PayPal SDK Script -->
     <script src="https://www.paypal.com/sdk/js?client-id=AXhUv-yDdR_jwAUx76BMOQ_lRBTTiJeV6o99AyNdJbE2ntg-3OYUl8ddgL8JP1wIkJH92GveA-g7zsQ_&currency=USD"></script>
     <script src="add.js"></script>


<script>
    paypal.Buttons({
  createOrder: function(data, actions){
    
    
    console.log('Data: ' + data);
    console.log('Actions: ' + actions);
    
    return actions.order.create({
      purchase_units: [{
        amount: {
          value:'200',

        }
      }]

    })
  },
  onApprove: function(data, actions) {
console.log('Data: ' + data);
    console.log('Actions: ' + actions);
    return actions.order.capture().then(function(details) {
      alert('Transaction completed by'+ details.payer.name.given_name);
    });
    
  }

    
}).render(
  '#paypal-button-container',
);
</script>


</body>
</html>
