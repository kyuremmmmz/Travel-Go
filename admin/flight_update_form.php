<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Flight Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Flight Booking</h1>
        <hr>
        <form id="updateBookingForm" action="flight_update_form.php" method="POST">
            <?php
            include("connection.php");

            if (isset($_POST["submit"])) {
                $id = $_POST["id"];
                $fullname = $_POST["name"];
                $arrival = $_POST["adate"];
                $departure = $_POST["ddate"];
                $contact_number = $_POST["phone"];
                $email = $_POST["email"];
                $flight_number = $_POST["flight_number"];
                $destination = $_POST["destination"];
                $seat_class = $_POST["seat_class"];
                $created_at = $_POST["created_at"];
                $origin = $_POST["origin"];
                $amount = $_POST["amount"];
                $status = $_POST["status"];

                $sql = "UPDATE flight_booking_tracker 
                        SET full_name=?, 
                            arrival_date=?, 
                            departure_date=?, 
                            contact_number=?, 
                            email=?, 
                            flight_number=?, 
                            destination=?, 
                            seat_class=?, 
                            created_at=?, 
                            origin=?, 
                            amount=?, 
                            status=?
                        WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssssssi", $fullname, $arrival, $departure, $contact_number, $email, $flight_number, $destination, $seat_class, $created_at, $origin, $amount, $status, $id);

                if ($stmt->execute()) {
                    echo "<script>alert('Updated Successfully.')</script>";
                    echo "<script>window.location.href='booking_list.php'</script>";
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $stmt->close();
            }

            $get = $_GET["choice"];
            $query = "SELECT * FROM flight_bookings WHERE id = $get ";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['full_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="arrival_date" class="form-label">Arrival Date</label>
                    <input type="date" class="form-control" id="arrival_date" name="adate" value="<?php echo $row['arrival_date']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="departure_date" class="form-label">Departure Date</label>
                    <input type="date" class="form-control" id="departure_date" name="ddate" value="<?php echo $row['departure_date']; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['contact_number']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="flight_number" class="form-label">Flight Number</label>
                <input type="text" class="form-control" id="flight_number" name="flight_number" value="<?php echo $row['flight_number']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="destination" class="form-label">Destination</label>
                <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $row['destination']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="seat_class" class="form-label">Seat Class</label>
                <select class="form-select" id="seat_class" name="seat_class" required>
                    <option value="Economy" <?php if($row['seat_class']=='Economy'){echo "selected";}?>>Economy</option>
                    <option value="Business" <?php if($row['seat_class']=='Business'){echo "selected";}?>>Business</option>
                    <option value="First Class" <?php if($row['seat_class']=='First Class'){echo "selected";}?>>First Class</option>
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="created_at" class="form-label">Created At</label>
                    <input type="text" class="form-control" id="created_at" name="created_at" value="<?php echo $row['created_at']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="origin" class="form-label">Origin</label>
                    <input type="text" class="form-control" id="origin" name="origin" value="<?php echo $row['origin']; ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $row['amount']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </form>
        <?php
            }
            mysqli_free_result($result);
            mysqli_close($conn);
        ?>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
