<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                    <li><a href="system.php" class="list-group-item "><i class="fas fa-tachometer-alt" ></i> Dashboard</a></li>
                    <li><a href="/admin/pakages.php" class="list-group-item bg-blue active"><i class="fas fa-box"></i> Packages</a></li>
                    <li><a href="booking_list.php" class="list-group-item"><i class="fas fa-list-alt"></i> Booking List</a></li>
                    <li><a href="#inquiries" class="list-group-item "><i class="fas fa-envelope"></i> Inquiries</a></li>
                    <li><a href="settings.php" class="list-group-item"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
           
            <!-- Content -->
            <div class="col-md-9 content">
                <!-- Content goes here -->
                <div class="dropdown">
                    <?php 
                    
                            session_start();    
            

                            $conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
                            if ($conn->connect_error) {
                                die("connection error". $conn->connect_error);
                            }

                            echo"";

                        $email=$_SESSION['email'];
                        $sql = "SELECT * FROM `registration` WHERE email= '$email'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $get = $row['avatar'];
                                echo ' <div class="avatar">
                                        <img src="'.$get.'" alt="Avatar">
                                <button type="button" class="btn btn-primary dropdown-toggle drop d-flex justify-content-center align-items-center" data-bs-toggle="dropdown">';
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

                <h1>Welcome to Admin Dashboard Packages</h1>
                <hr>
                <!-- Table with "Create New" button -->
                <div class="btn-group d-flex justify-content-between mb-3">
                    <h2>Packages</h2>
                    <a href="/see_details_form.php" class="btn btn-primary">Create New</a>
                </div>
                <table class="table table-striped table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Place</th>
                            <th>Specific Place</th>
                            <th>Hotels</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                            <th>Amenities</th>
                            <th>Description</th>
                            <th>Hotel Price</th>
                            <th>Attraction Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once("connection.php");

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM `create_see_details.php` WHERE id = $delete_id";
                            if ($conn->query($sql) !== TRUE) {
                                echo "Error deleting    booking: " . $conn->error;
                            }
                            exit();
                        }
                        // Fetch data from database
                        $query = "SELECT * FROM `create_see_details.php`";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['place'] . "</td>";
                                echo "<td>" . $row['specific_place'] . "</td>";
                                echo "<td>" . $row['hotels'] . "</td>";
                                echo "<td>" . $row['arrival'] . "</td>";
                                echo "<td>" . $row['departure'] . "</td>";
                                echo "<td>" . $row['amenities'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . number_format($row['price_for_hotel']) . "</td>";
                                echo "<td>" . number_format($row['price']) . "</td>";
                                echo "<td><button class='btn btn-primary'>Edit</button>
                                <button type='button' class='btn btn-danger delete-btn' data-id='".$row['id']."'>Delete</button>";
                                echo "</tr>";
                               
                            }
                        } else {
                            echo "<tr><td colspan='8'>No data found</td></tr>";
                        }

                       
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<script>

        // Delete Button Click Event
        $(".delete-btn").click(function(){
            var bookingId = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "pakages.php",
                        type: "POST",
                        data: {delete_id: bookingId},
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your booking has been deleted.",
                        icon: "success",
                        confirmButtonText: "Ok"
                    })
                }
            });
        });
</script>
        
