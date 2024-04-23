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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

        /* Styles for the settings panel */
        .settings-panel {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }
        .settings-panel h2 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
                    <li><a href="/admin/pakages.php" class="list-group-item "><i class="fas fa-box"></i> Packages</a></li>
                    <li><a href="booking_list.php" class="list-group-item bg-blue active"><i class="fas fa-list-alt"></i> Booking List</a></li>
                    <li><a href="#inquiries" class="list-group-item "><i class="fas fa-envelope"></i> Inquiries</a></li>
                    <li><a href="settings.php" class="list-group-item "><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
    
            <!-- Content -->
            <div class="col-md-9 content">
                <!-- Content goes here -->
                <h1>Welcome to Admin Dashboard</h1>
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
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Account</a></li>
                    </ul>

                </div>
                </div>
                <hr>
                <div class="container mt-5">
                    <h2>Booking Tracker</h2>
                    <!-- Booking Search Form -->
                    <form action="booking_list.php" method="GET">
                        <div class="mb-3">
                            <input type="text" name="search_query" placeholder="Enter name or email">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                    <!-- Booking Table -->
                    <h3>All Bookings</h3>
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ARRIVAL</th>
                            <th>DEPARTURE</th>
                            <th>CONTACT NUMBER</th>
                            <th>HOTEL</th>
                            <th>ACTION</th>
                        </tr>
                        <?php
                        include("connection.php");

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
                            $delete_id = $_POST['delete_id'];
                            $sql = "DELETE FROM booking_tracker WHERE id = $delete_id";
                            if ($conn->query($sql) !== TRUE) {
                                echo "Error deleting booking: " . $conn->error;
                            }
                            exit();
                        }

                        $query = "SELECT * FROM booking_tracker";
                        $result = mysqli_query($conn, $query);

                        if(isset($_GET['search_query'])) {
                            $search_query = $_GET['search_query'];
                            $query = "SELECT * FROM booking_tracker WHERE full_name LIKE '%$search_query%' OR email LIKE '%$search_query%'";
                            $result = mysqli_query($conn, $query);
                        }

                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            $idhaha = $row['id'];
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['full_name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['arrival']."</td>";
                            echo "<td>".$row['departure']."</td>";
                            echo "<td>".$row['contact_number']."</td>";
                            echo "<td>".$row['hotel']."</td>";
                            echo "<td>
                            <a href='update_form.php?choice=".urlencode($row['id'])."' class='btn btn-primary update-link'>Update</a>
                            <button type='button' class='btn btn-danger delete-btn' data-id='".$row['id']."'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }

                    
                       
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

        // Delete Button Click Event
        $(".delete-btn").click(function(){
            var bookingId = $(this).data("id");
            Swal.fire({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this booking!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: "booking_list.php",
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
</body>
</html>
