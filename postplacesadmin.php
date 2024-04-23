<?php session_start();    
            

$conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
if ($conn->connect_error) {
    die("connection error". $conn->connect_error);
}

echo"";

$email=$_SESSION['email'];
$sql = "SELECT * FROM `registration` WHERE email= '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row ?>
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
                        } ?>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminlogin.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
                        <li><a class="dropdown-item" href="settings.php"><i class="fas fa-user"></i> Account</a></li>
                    </ul>

                </div>
                </div>
                
                <h1>Welcome to Admin Dashboard</h1>
              
                <hr>
                
                <?php
                                $DB_HOST = "localhost:3307";
                                $DB_USER = "root";
                                $DB_PASS = "admin";
                                $DB_NAME = "sample";

                                $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                if (isset($_POST["submit"])) {
                                    $name = $_POST["price"];
                                    $file = $_FILES["file"];
                                    $place =  $_POST["place"];

                                    if ($file["error"] == 4) {
                                        echo '<script>swal("Invalid", "", "error");</script>';
                                    } else {
                                        $filename = $file['name'];
                                        $filesize = $file['size'];
                                        $tempname = $file['tmp_name'];

                                        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png'];
                                        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                                        if (!in_array($imageExtension, $validImageExtensions)) {
                                            echo '<script>sweetAlert("Invalid image extension", "Please upload jpg, jpeg, png, or gif files.", "error");</script>';
                                        } elseif ($filesize >= 10000000) {
                                            echo'<script>';
                                            echo'sweetAlert("Invalid", "Wrong Password or Email try again", "error");';
                                            echo'</script>';
                                        } else {
                                            $newImageName = uniqid() . '.' . $imageExtension;
                                            $uploadPath = 'img/' . $newImageName;

                                            if (move_uploaded_file($tempname, $uploadPath)) {
                                                $query = "INSERT INTO for_creating_a_place(price, place,image) VALUES('$name', '$place', '$newImageName')";

                                                if ($conn->query($query) === TRUE) {
                                                    echo'<script>';
                                                    echo'sweetAlert("Invalid", "Wrong Password or Email try again", "error");';
                                                    echo'</script>';
                                                } else {
                                                    echo "Error: " . $query . "<br>" . $conn->error;
                                                }
                                            } else {
                                                echo '<script>sweetAlert("Error", "Error uploading file", "error");</script>';
                                            }
                                        }
                                    }
                                }
                                ?>
                                <div class="container mt-6">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h1 class="card-title text-center mb-4">Post Places in TravelGoPH</h1>
                                        <form action="postplacesadmin.php" method="post" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="place" placeholder="Place...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="price" placeholder="Price...">
                                            </div>
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="file" accept=".jpg, .jpeg, .gif, .png">
                                            </div>
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                <a href="admin/system.php" class="btn btn-secondary">Back</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       
                        <!-- Bootstrap JS -->
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

                    </body>
                    </html>
