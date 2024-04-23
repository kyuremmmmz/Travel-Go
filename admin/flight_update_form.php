<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom styles */
        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar-logo {
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }
        .sidebar-menu {
            list-style-type: none;
            padding: 0;
        }
        .sidebar-menu li {
            padding: 10px;
            border-bottom: 1px solid #4e555b;
        }
        .sidebar-menu li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s; /* Add transition for smoother color change */
        }
        .sidebar-menu li:hover a,
        .sidebar-menu li:focus a,
        .sidebar-menu li:active a {
            color: #fff; /* Change text color on hover, focus, and active */
            background-color: #343a40;
        }
        .sidebar-menu li:hover {
            background-color: #4e555b; /* Change background color on hover */
        }
        /* Avatar */
        .avatar {
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .dropdown-menu {
            right: 0;
            left: auto;
        }

        .drop{
            border-radius: 50px;
            height: 25px;
            justify-content: center;
            
        }

        .drop:hover{
            
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="sidebar-logo">Admin Dashboard</div>
                <ul class="sidebar-menu">
                    <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-box"></i> Products</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Users</a></li>
                    <li><a href="#"><i class="fas fa-chart-bar"></i> Analytics</a></li>
                    <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-9 content">
                <div class="dropdown">
                    <div class="avatar">
                        <img src="avatar.jpg" alt="Avatar">
                        <button type="button" class="btn btn-primary dropdown-toggle drop d-flex justify-content-center align-items-center" data-bs-toggle="dropdown">
                            <?php 
                            session_start();
                            $conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
                            if ($conn->connect_error) {
                                die("connection error". $conn->connect_error);
                            }
                            echo"";
                            $email=$_SESSION['email'];
                            $sql = "SELECT `user_name` FROM `registration` WHERE email= '$email'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo $row['user_name'];
                                }
                            }
                            ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-link"></i> Link 3</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="adminlogin.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Account</a></li>
                        </ul>
                    </div>
                </div>
                <h1 class="mt-5">Update Flight Booking</h1>
                <hr>
                <form id="updateBookingForm" action="flight_update_form.php" method="POST">
                    <?php
                    include("connection.php");
                    if (isset($_POST["submit"])) {
                        $id = $_POST["id"];
                        $fullname = $_POST["name"];
                        $children = $_POST["children"];
                        $adult = $_POST["adults"];
                        $arrival = $_POST["adate"];
                        $departure = $_POST["ddate"];
                        $contact_number = $_POST["phone"];
                        $email = $_POST["email"];
                        $flight_number = $_POST["flight_number"];
                        $destination = $_POST["destination"];
                        $seat_class = $_POST["seat_class"];
                        $payment_method = $_POST["payment_method"];
                        $sql = "UPDATE flight_booking_tracker SET full_name=?, children=?, adult=?, arrival=?, departure=?, contact_number=?, email=?, flight_number=?, destination=?, seat_class=?, payment_method=? WHERE id=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("siissississsi", $fullname, $children, $adult, $arrival, $departure, $contact_number, $email, $flight_number, $destination, $seat_class, $payment_method, $id);
                        if ($stmt->execute()) {
                            echo "<script>sweetAlert('Success', 'Updated Successfully.', 'success')</script>";
                            echo "<script>window.location.href='booking_list.php'</script>";
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        $stmt->close();
                    }
                    $get = $_GET["choice"];
                    $query = "SELECT * FROM flight_booking_tracker WHERE id = $get ";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['full_name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="flight_number" class="form-label">Flight Number</label>
                        <input type="text" class="form-control" id="flight_number" name="flight_number" value="<?php echo $row['flight_number']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" value="<?php echo $row['destination']; ?>" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="arrival_date" class="form-label">Arrival Date</label>
                            <input type="date" class="form-control" id="arrival_date" name="adate" value="<?php echo $row['arrival']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="departure_date" class="form-label">Departure Date</label>
                            <input type="date" class="form-control" id="departure_date" name="ddate" value="<?php echo $row['departure']; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="adults" class="form-label">Number of Adults</label>
                            <select class="form-select" id="adults" name="adults" required>
                                <option value="1" <?php if($row['adult']==1){echo "selected";}?>>1</option>
                                <option value="2" <?php if($row['adult']==2){echo "selected";}?>>2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="children" class="form-label">Number of Children</label>
                            <select class="form-select" id="children" name="children" required>
                                <option value="0" <?php if($row['children']==0){echo "selected";}?>>None</option>
                                <option value="1" <?php if($row['children']==1){echo "selected";}?>>1</option>
                                <option value="2" <?php if($row['children']==2){echo "selected";}?>>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="seat_class" class="form-label">Seat Class</label>
                        <select class="form-select" id="seat_class" name="seat_class" required>
                            <option value="Economy" <?php if($row['seat_class']=='Economy'){echo "selected";}?>>Economy</option>
                            <option value="Business" <?php if($row['seat_class']=='Business'){echo "selected";}?>>Business</option>
                            <option value="First Class" <?php if($row['seat_class']=='First Class'){echo "selected";}?>>First Class</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $row['contact_number']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="Credit Card" <?php if($row['payment_method']=='Credit Card'){echo "selected";}?>>Credit Card</option>
                            <option value="Debit Card" <?php if($row['payment_method']=='Debit Card'){echo "selected";}?>>Debit Card</option>
                            <option value="PayPal" <?php if($row['payment_method']=='PayPal'){echo "selected";}?>>PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                <?php
                    }
                    mysqli_free_result($result);
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
