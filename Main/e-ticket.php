<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Go Hotel E-Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    session_start();
    // Establish MySQL connection
    $servername = "localhost:3307"; 
    $username = "root"; 
    $password = "admin"; 
    $dbname = "sample";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $session = $_SESSION['email'];

    // SQL query to fetch voucher or barcode data
    $stmt = $conn->prepare("SELECT * FROM booking_tracker WHERE email = ?"); 
    $stmt->bind_param("s", $session);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $barcodeData = $row["voucher_code"];
            $email = $row['email'];
            $fullname = $row['full_name'];
            $phone = $row['contact_number'];
            $specific_place = $row['hotel'];
            $voucherCode = $row['voucher_code'];
            $departure = $row['departure'];
            $arrival = $row['arrival'];
            $adult = $row['adult'];
            $children  = $row['children'];
            
            // Generate barcode image
            require 'C:\xampp\htdocs\Website\vendor\autoload.php';// Load Composer's autoloader
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            $barcodeImage = $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128);

            echo '<div class="container mt-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h1>Travel Go Hotel E-Ticket</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Hotel Booking Information</h3>
                                    <p><strong>Hotel:</strong> '.$specific_place.'</p>
                                    <p><strong>Hotel ID:</strong> '.$voucherCode.'</p>
                                    <p><strong>Departure Date:</strong> '.$departure.'</p>
                                    <p><strong>Arrival Date:</strong> '.$arrival.'</p>
                                    <p><strong>Adult No:</strong> '.$adult.'</p>
                                    <p><strong>Children No:</strong> '.$children.'</p>
                                </div>
                                <div class="col-md-6">
                                    <h3>Passenger Information</h3>
                                    <p><strong>Name:</strong> '.$fullname.'</p>
                                    <p><strong>Email:</strong> '.$email.'</p>
                                    <p><strong>Phone:</strong> '.$phone.'</p>
                                    <div class="barcode">
                                        <p><strong>Your Bar code</strong> </p>
                                        <img src="data:image/png;base64,'.base64_encode($barcodeImage).'" alt="Barcode">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="Main.php" method="post">
                                <button type="submit" class="btn btn-primary" name="back">Back</button>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo "0 results";
    }

    // Close MySQL connection
    $conn->close();
    ?>
</body>
</html>
