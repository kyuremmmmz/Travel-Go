<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Flight</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>


<?php 
include("con2.php");


function generateFlightNumber($length = 6) {
    // Characters for flight number generation
    $characters = '0123456789';
    $airports = array(
        "MNL",
        "CEB",
        "CRK" ,
        "DVO" ,
        "ILO",
        "KLO" ,
        "PPS" ,
        "BCD" ,
        "ZAM" ,
        "TAG" ,
        "CGY" ,
        "GES" ,
        "MPH",
        "TAC"
    ); // PAL, Cebu Pacific, PAL Express, Cebgo

    // Randomly select a prefix
    $prefix = $airports[array_rand($airports)];
    $flightNumber = $prefix;

 
    for ($i = strlen($prefix); $i < $length; $i++) {
        $flightNumber .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $flightNumber;
}





?>
<div class="container">
    <h2>Create Flight</h2>
    <form action="process_flight.php" method="POST">
        <div class="form-group">
            <label for="flight_number">Flight Number:</label>
            <input type="text" id="flight_number" name="flight_number" value="<?php echo generateFlightNumber(); ?>" required>
        </div>
        <div class="form-group">
            <label for="departure_airport">Departure Airport:</label>
            <select id="departure_airport" name="departure_airport" required>
                <option value="">Departure  <?php
                // Assuming you have already established a database connection

                // Query to select distinct departure airports from the flights table
                $sql = "SELECT * FROM flights";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch each row from the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output an option element for each departure airport
                        echo "<option value='" . $row['departure_airport_id'] . "'>" . $row['departure_airport_id'] . "</option>";
                    }
                } else {
                    // If query fails, display an error message
                    echo "<option value=''>Error fetching airports</option>";
                }

                // Close the database connection
                
                ?></option>
                <!-- Add PHP code here to dynamically populate options with airports -->
            </select>
        </div>
        <div class="form-group">
            <label for="arrival_airport">Arrival Airport:</label>
            <select id="arrival_airport" name="arrival_airport" required>
                <option value="">Select Arrival Airport

                <?php 
                // Assuming you have already established a database connection

                // Query to select distinct departure airports from the flights table
                $sql = "SELECT * FROM flights";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch each row from the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output an option element for each departure airport
                        echo "<option value='" . $row['arrival_airport_id'] . "'>" . $row['arrival_airport_id'] . "</option>";
                    }
                } else {
                    // If query fails, display an error message
                    echo "<option value=''>Error fetching airports</option>";
                }
                ?>
                </option>
                <!-- Add PHP code here to dynamically populate options with airports -->
            </select>
        </div>
        <div class="form-group">
            <label for="airline">Airline:</label>
            <select id="airline" name="airline" required>
                <option value="">Select Airline

                <?php 
                // Assuming you have already established a database connection

                // Query to select distinct departure airports from the flights table
                $sql = "SELECT * FROM airlines";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch each row from the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output an option element for each departure airport
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                    }
                } else {
                    // If query fails, display an error message
                    echo "<option value=''>Error fetching airports</option>";
                }
                ?>
                </option>
                <!-- Add PHP code here to dynamically populate options with airlines -->
            </select>
        </div>
        <div class="form-group">
            <label for="departure_date">Departure Date:</label>
            <input type="date" id="departure_date" name="departure_date" required>
        </div>
        <div class="form-group">
            <label for="departure_time">Departure Time:</label>
            <input type="time" id="departure_time" name="departure_time" required>
        </div>
        <input type="submit" value="Create Flight" name="submit">
    </form>
</div>

</body>
</html>
