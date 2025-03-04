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
        body{
            overflow: hidden;
        }
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
                    <li><a href="settings.php"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-9">
                <!-- Content goes here -->
               
                    
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

                <h1>Welcome to Admin Dashboard</h1>
                <hr>
                <?php
                    $DB_HOST = "localhost:3307";
                    $DB_USER = "root";
                    $DB_PASS = "admin";
                    $DB_NAME = "sample";

                    // Establishing connection to the database
                    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Handle form submission
                    if (isset($_POST["submit"])) {
                        $name = $_POST["price"];
                        $hotel = $_POST["hotel"];
                        $file = $_FILES["file"];
                        $place =  $_POST["place"];

                        // Check if the file exists
                        if ($file["error"] == 4) {
                            echo '<script>swal("Invalid", "", "error");</script>';
                        } else {
                            $filename = $file['name'];
                            $filesize = $file['size'];
                            $tempname = $file['tmp_name'];

                            // Valid image extensions
                            $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png', 'webp'];
                            $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                            // Check if the image extension is valid
                            if (!in_array($imageExtension, $validImageExtensions)) {
                                echo '<script>sweetAlert("Invalid image extension", "Please upload jpg, jpeg, png, gif  or webp files.", "error");</script>';
                            } elseif ($filesize >= 10000000) { // Check if file size exceeds limit
                                echo'<script>';
                                echo'sweetAlert("Invalid", "Wrong Password or Email try again", "error");';
                                echo'</script>';
                            } else {
                                $newImageName = uniqid() . '.' . $imageExtension;
                                $uploadPath = 'images/' . $newImageName;

                                // Attempt to move the uploaded file to the specified destination
                                if (move_uploaded_file($tempname, $uploadPath)) {
                                    $query = "INSERT INTO for_creating_a_hotel(price, hotel,image, place) VALUES('$name', '$hotel', '$newImageName', '$place' )";

                                    // Execute the query
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
                   <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto py-4">
                            <h2 class="mb-4 text-center">Post Hotels in TravelGoPH</h2>
                            <form action="post_hotels.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="hotel" class="form-label">Hotel:</label>
                                    <input type="text" class="form-control" id="hotel" name="hotel" placeholder="Enter hotel name">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price:</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                                </div>
                                <div class="mb-3">
                                    <label for="place" class="form-label">Place:</label>
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Enter place">
                                </div>
                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload Image:</label>
                                    <input type="file" class="form-control" id="file" name="file" accept=".jpg, .jpeg, .gif, .png">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    <a href="system.php" class="btn btn-secondary">Back</a>
                                </div>
                            </form>
                        </div>
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
