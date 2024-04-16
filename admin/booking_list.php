<?php
// Include database connection file
include("connection.php");

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
        header("Location: booking_list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        /* Custom styles */
        .sidebar {
            background-color: #0080FF;
            color: #fff;
            height: 100vh;
            overflow-y: auto;
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
            transition: color 0.3s;
        }
        .sidebar-menu li:hover a,
        .sidebar-menu li:focus a,
        .sidebar-menu li:active a {
            color: #fff;
        }
        .sidebar-menu li:hover {
            background-color: #4e555b;
        }
        .content {
            max-height: calc(150vh - 70px);
            overflow-y: auto;
            background-color: #343a40;
            color: aliceblue;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="sidebar-logo">Travel Go Ph Admin</div>
                <ul class="sidebar-menu">
                    <li><a href="system.php"><i class="fas fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="pakages.php"><i class="fas fa-box"></i> Packages</a></li>
                    <li><a href="booking-list.php"><i class="fas fa-list-alt"></i> Booking List</a></li>
                    <li><a href="#inquiries"><i class="fas fa-envelope"></i> Inquiries</a></li>
                    <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-9 content">
                <!-- Content goes here -->
                <h1>Welcome to Admin Dashboard</h1>
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
