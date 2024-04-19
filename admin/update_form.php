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
                        // Output data of each row
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
                <h1 class="mt-5">Update Booking</h1>
                <hr>
                <form id="updateBookingForm" action="booking_list.php" method="POST">
                <?php
                    // Include database connection file
                    include("C:/xampp/htdocs/Website/user_connection..php");

                    // Check if the form is submitted
                    if (isset($_POST["submit"])) {
                        // Get form data
                        $id = $_POST["id"];
                        $fullname = $_POST["name"];
                        $children = $_POST["children"];
                        $adult = $_POST["adults"];
                        $arrival = $_POST["adate"];
                        $departure = $_POST["ddate"];
                        $contact_number = $_POST["phone"];
                        $email = $_POST["email"];
                        $hotel = $_POST["hotel"];

                        // Prepare the SQL statement using prepared statements to prevent SQL injection
                        $sql = "UPDATE booking_tracker SET full_name=?, children=?, adult=?, arrival=?, departure=?, contact_number=?, email=?, hotel=? WHERE id=?";

                        // Prepare the statement
                        $stmt = $conn->prepare($sql);

                        // Bind parameters
                        $stmt->bind_param("siississi", $fullname, $children, $adult, $arrival, $departure, $contact_number, $email, $hotel, $id);

                        // Execute the statement
                        if ($stmt->execute()) {
                            echo "<script>sweetAlert('Success', 'Updated Successfully.', 'success')</script>";
                            echo "<script>window.location.href='booking_list.php'</script>";
                            
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        // Close the statement
                        $stmt->close();
                    }

                    $get = $_GET["choice"];
                    $query = "SELECT * FROM booking_tracker WHERE id = $get ";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                     
                    }
                
                    mysqli_free_result($result);
                    mysqli_close($conn);
                
                ?>
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" required>
                    </div>
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
                        <input type="text" class="form-control" id="hotel" name="hotel" value="<?php echo  $row['hotel'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="arrival_date" class="form-label">Arrival Date</label>
                            <input type="date" class="form-control" id="arrival_date" name="adate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="departure_date" class="form-label">Departure Date</label>
                            <input type="date" class="form-control" id="departure_date" name="ddate" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="adults" class="form-label">Number of Adults</label>
                            <select class="form-select" id="adults" name="adults" required>
                                <option value="">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="children" class="form-label">Number of Children</label>
                            <select class="form-select" id="children" name="children" required>
                                <option value="">Select</option>
                                <option value="0">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="">Select</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="debit_card">Debit Card</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>
</html>
