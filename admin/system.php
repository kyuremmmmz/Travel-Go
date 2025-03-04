<?php
    session_start();    
    $conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
    if ($conn->connect_error) {
        die("connection error". $conn->connect_error);
    }

    echo"";

    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $sql = "SELECT * FROM `registration` WHERE email= '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
?>
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

        .list-group-item{
            background-color: #343a40;
            color: #fff;
            border: none;
            width: 100%;
        }

        .list-group-item:hover{
            background-color: #0088FF;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="sidebar-logo">Travel Go Ph Admin</div>
                <ul class="list-group">
                    <li><a href="#packages" class="list-group-item bg-blue active"><i class="fas fa-tachometer-alt" ></i> Dashboard</a></li>
                    <li><a href="/admin/pakages.php" class="list-group-item "><i class="fas fa-box"></i> Packages</a></li>
                    <li><a href="booking_list.php" class="list-group-item"><i class="fas fa-list-alt"></i> Booking List</a></li>
                    <li><a href="flight_booking_list.php" class="list-group-item"><i class="fas fa-envelope"></i> Flight Booking List</a></li>
                    <li><a href="settings.php" class="list-group-item "><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            
            <!-- Content -->
            <!-- Content -->
            <div class="col-md-9 content">
                <!-- Content goes here -->
                <div class="avatar">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        $getrow = $row['avatar'];
                        echo '<img src="'.$getrow.'" alt="Avatar">
                        <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle drop d-flex justify-content-center align-items-center" data-bs-toggle="dropdown">';
                        echo $row['user_name'];
                    }
                    ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminlogin.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
                        <li><a class="dropdown-item" href="settings.php"><i class="fas fa-user"></i> Account</a></li>
                    </ul>
                    </div>
                </div>
                
                <h1>Welcome to Admin Dashboard</h1>
              
                <hr>
                
                <!-- Card for User Statistics -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Statistics</h5>
                        <div class="card-text">
                            <?php
                            // Include your database connection file
                            $conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
                            if ($conn->connect_error) {
                                die("connection error". $conn->connect_error);
                            }
                        }

                            echo"";

                            // Fetch the number of signed-in users
                            $sql_users = "SELECT COUNT(*) AS total_users FROM registration";
                            $result_users = $conn->query($sql_users);
                            $total_users = 0;
                            if ($result_users->num_rows > 0) {
                                $row_users = $result_users->fetch_assoc();
                                $total_users = $row_users['total_users'];
                            }
                            ?>
                            <?php
                            include("connection.php");
                            // Fetch the number of booked packages
                            $sql_bookings = "SELECT COUNT(*) AS total_bookings FROM booking_tracker";
                            $sql_places =  "SELECT COUNT(*) AS total_places FROM for_creating_a_hotel";
                            $result_places = $conn->query($sql_places);
                            $result_bookings = $conn->query($sql_bookings);
                            $total_bookings = 0;
                            $total_places = 0;
                            if ($result_bookings->num_rows > 0) {
                                $row_bookings = $result_bookings->fetch_assoc();
                                $total_bookings = $row_bookings['total_bookings'];
                            }

                            if ($result_places->num_rows > 0) {
                                $row_places = $result_places->fetch_assoc();
                                $total_places = $row_places['total_places'];
                            }
                            ?>
                            <p>Total Signed-in Users: <?php echo $total_users; ?></p>
                            <p>Total Booked Packages: <?php echo $total_bookings; ?></p>
                            <p>Total Places Packages: <?php echo $total_places; ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
