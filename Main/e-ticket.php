<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel E-Ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .ticket-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .ticket {
            width: 600px;
            background-color: #fff;
            padding: 20px;
            border: 2px solid #007bff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-header h1 {
            margin-top: 0;
            color: #007bff;
        }
        .ticket-body {
            padding: 20px;
        }
        .ticket-details {
            margin-bottom: 20px;
        }
        .ticket-details h3 {
            margin-top: 0;
            color: #007bff;
        }
        .ticket-details p {
            margin-bottom: 5px;
        }
        .barcode {
            text-align: center;
            margin-top: 20px;
        }
        .barcode img {
            width: 80%;
            max-width: 200px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="ticket">
            <div class="ticket-header">
                <h1>Travel E-Ticket</h1>
            </div>
            <div class="ticket-body">
                <div class="ticket-details">
                    <h3>Flight Information</h3>
                    <p><strong>Airline:</strong> XYZ Airlines</p>
                    <p><strong>Flight Number:</strong> XYZ123</p>
                    <p><strong>Departure:</strong> New York (JFK) - 10:00 AM</p>
                    <p><strong>Arrival:</strong> London (LHR) - 2:00 PM</p>
                    <p><strong>Date:</strong> April 15, 2024</p>
                    <p><strong>Seat:</strong> 23A</p>
                </div>
                <div class="ticket-details">
                    <h3>Passenger Information</h3>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Phone:</strong> +1234567890</p>
                </div>
                <div class="barcode">
                <?php
                        // Establish MySQL connection
                        $servername = "localhost:3307"; // Change this to your MySQL server hostname
                        $username = "root"; // Change this to your MySQL username
                        $password = "admin"; // Change this to your MySQL password
                        $dbname = "sample"; // Change this to your MySQL database name

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // SQL query to fetch voucher or barcode data
                        $sql = "SELECT voucher_code FROM booking_tracker WHERE id = 34"; // Change this query according to your database schema

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                $barcodeData = $row["voucher_code"];
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close MySQL connection
                        $conn->close();

                        // Generate barcode image
                        require 'vendor/autoload.php'; // Load Composer's autoloader
                        use Picqer\Barcode\BarcodeGeneratorPNG;

                        $generator = new BarcodeGeneratorPNG();
                        $barcodeImage = $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128);

                        // Output HTML with barcode image
                        echo '<img src="data:image/png;base64,' . base64_encode($barcodeImage) . '" alt="Barcode">';
                        ?>
                </div>
            </div>
            <div class="footer">
                <p>&copy; 2024 Travel E-Ticket. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>