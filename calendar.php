<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your bookings</title>
    <!-- Latest compiled and minified CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>


    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        table {
            border-color: #ffffff;
            table-layout: fixed;
            color: #ffffff;
        }

        td {
            text-align: center;
            width: 33%;
        }

        tr {
            text-align: center;
        }

        th {
            text-align: center;
        }

        a {
            align-self: center;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1 style="text-align: center;">MY BOOKINGS</h1>
        <div class="row">
            <div class="col-md-12">
                <?php
                function bookings($month, $year)
                {
                    $conn = mysqli_connect("localhost:3307","root","admin","sample");


                    if ($conn->connect_error) {
                        die("Connection failed: ". $conn->connect_error);
                            }

                    session_start();

                    $email = $_SESSION['email'];
                    $stmt = $conn->prepare("SELECT arrival, departure, email FROM booking_tracker WHERE MONTH(arrival) = ? AND YEAR(departure) = ? AND email = '$email'");

                    $stmt->bind_param("ss", $month, $year);

                    $bookings = array();

                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $bookings[] = $row;
                        }
                        $stmt->close();
                    }

                    if (!isset($email)) {
                        echo "<h1 style='text-align: center;'>You are not logged in</h1>";
                    }

                    $numbersofweeks = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

                    $timezone = date_default_timezone_set('Asia/Taipei');
                    $currentDateTime = date('Y-m-d H:i:s'); // Get the current date and time

                    $months = mktime(0, 0, 0, $month, 1, $year);
                    $numbersOfdays = date("t", $months);
                    $setdate = getdate($months);
                    $monthname = $setdate['month'];
                    $daysoftheweeks = $setdate['wday']; // Adjusting to start from Monday

                    $currentDateTime = date('Y-m-d'); // Get the current date
                    $datetoday = date("Y-m-d");
                    $dayname = date('d');
                    $time = date('H:i:s'); // Get the current time

                    $calendar = "<table class='table table-bordered'> ";
                    $calendar .= "<center><h2>$monthname $year $time</h2>"; // Update the calendar header to display the current date and time

                    $calendar .= "<a class='btn btn-xs btn-success' href='/Main/Main.php'>Back</a>";

                    $calendar .= "<a class='btn btn-xs btn-primary' href='?month="
                        . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a>";

                    $calendar .= "<a class='btn btn-xs btn-primary' href='?month="
                        . date('m', mktime($month, $year)) . "&year=" . date('Y', mktime($month, $year)) . "'>Current Month</a>";



                    $calendar .= "<a class='btn btn-xs btn-primary' href='?month="
                        . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";

                    $calendar .= "<tr>";

                    foreach ($numbersofweeks as $day) {
                        $calendar .= "<th class='header'>$day</th>";
                    }
                    $calendar .= "<tr></tr>";

                    if ($numbersOfdays > 0) {
                        for ($k = 0; $k < $daysoftheweeks; $k++) {
                            $calendar .= "<td></td>";
                        }
                    }

                    $currentday = 1;
                    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

                    while ($currentday <= $numbersOfdays) {
                        if ($daysoftheweeks == 7) {
                            $daysoftheweeks = 0;
                            $calendar .= "</tr><tr>";
                        }

                        $currentdayrel = str_pad($currentday, 2, "0", STR_PAD_LEFT);
                        $date = "$year-$month-$currentdayrel";
                        $dayname = strtolower(date('l', strtotime($date))); // Getting day name

                        $today = ($date == $currentDateTime) ? "today" : ""; // Comparing the dates

                        if ($date < $currentDateTime) {
                            $calendar .= "<td class='today'><h4>$currentday</h4><button class='btn btn-danger btn-xs'>N/A</button>";
                        } else {
                            $booking_info = array_filter($bookings, function ($booking) use ($date) {
                                return $booking['arrival'] <= $date && $booking['departure'] >= $date;
                            });

                            if (!empty($booking_info)) {
                                $calendar .= "<td class='today'><h4>$currentday</h4>";
                                foreach ($booking_info as $info) {
                                    $calendar .= "<button class='btn btn-danger btn-xs'>Arrival: " . $info['arrival'] . "<br>Departure: " . $info['departure'] . "</button>";
                                }
                                $calendar .= "</td>";
                            } else {
                                $calendar .= "<td class='$today'><h4>$currentday</h4><a class='btn btn-success btn-xs'>Book</button>";
                            }
                        }

                        $calendar .= "</td>";
                        $currentday++;
                        $daysoftheweeks++;
                    }

                    // Close the remaining empty cells if needed
                    if ($daysoftheweeks != 0) {
                        $remainingdays = 7 - $daysoftheweeks;
                        for ($i = 0; $i < $remainingdays; $i++) {
                            $calendar .= "<td></td>";
                        }
                        $calendar .= "</tr>";
                    }

                    $calendar .= "</table>";
                    echo $calendar;
                }

                // Retrieve the month and year parameters from the URL
                $month = isset($_GET['month']) ? $_GET['month'] : date('m');
                $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

                echo bookings($month, $year);

                
                $get_login = isset( $_GET["email"] ) ? $_GET["email"] :"You've been hacked";

                echo"<div class='box_container'> <h3 class='myh3'><i class='fas fa-user'></i> $get_login </h3>  </div>";


                
                
                ?>
            </div>

                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
</body>

</html>
