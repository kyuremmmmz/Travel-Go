<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <?php 
    $conn = mysqli_connect("localhost:3307","root","admin","sample");

    if ($conn-> connect_error) {
        die("". $conn->connect_error);
        # code...
    }
    
    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="sidebar-logo">Travel Go Ph Admin</div>
                <ul class="sidebar-menu">
                    <li><a href="#packages"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="/admin/pakages.php"><i class="fas fa-box"></i> Packages</a></li>
                    <li><a href="booking_list.php"><i class="fas fa-list-alt"></i> Booking List</a></li>
                    <li><a href="#inquiries"><i class="fas fa-envelope"></i> Inquiries</a></li>
                    <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-9">
                <!-- Content goes here -->
                
                <h1>Welcome to Admin Dashboard</h1>
                <hr>
                <p>This is the main content area.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
