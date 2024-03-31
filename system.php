<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom CSS -->
    <style>
        /* Custom dark theme */
        body {
            background-color: #23272B;
            color: #ffffff;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 20px;
            background-color: #212529;
            color: #ffffff;
        }

        .content {
            margin-left: 250px; /* Same as sidebar width */
            padding: 20px;
            background-color: #454d55;
            min-height: 100vh;
            width: 100%;
        }

        .nav-link {
            color: #ffffff;
        }

        .nav-link.active {
            background-color: #007bff;
            color: #ffffff;
        }

        

        .nav-link:hover {
            background-color: #0069d9;
            color: black;
        }

        .nav-item.active{
         background-color: #007bff;

        }
        .logo {
            width: 100%; /* Adjust width as needed */
            height: 50px; /* Adjust height as needed */
            margin-bottom: 20px; /* Add some space below the logo */
        }

        th{
            color: #fff;

        }

        td{
            color: #fff;
        }

        
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img class="logo" src="2024-03-29-removebg-preview.png" alt="Logo"> <!-- Add your logo image -->
        <h2>Dashboard</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reports</a><!-- TODO: AJAX IMPLEMENTATION -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Employees</a><!-- TODO: FETCH THE DATA FROM THE DATABASE ADMIN -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notificaiton.php">Mails</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tracker">Booking Tracker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#EWAN">Analytics</a>
            </li>
        </ul>
    </div>

    <!-- Main content area -->
    <div id="messages" class="content">
        <h2>Welcome to the Messages</h2>
        <p>This is the messages area of the dashboard.</p>
    </div>

    

    <div class="container mt-5 content" id="tracker">
    <h2>Booking Tracker</h2>
    
    <!-- Booking Search Form -->
    <form action="system.php" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search_query" placeholder="Enter name or email">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <!-- Booking Table -->
    <h3>All Bookings</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Payment Method</th>
                    <th>Contact Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connection.php");

                // Delete message from the database
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
                    $delete_id = $_POST['delete_id'];
                    $sql = "DELETE FROM booking_tracker WHERE id = $delete_id";
                    if ($conn->query($sql) !== TRUE) {
                        echo "Error deleting booking: " . $conn->error;
                    }
                    exit(); // Exit to prevent further processing
                }

                // Fetch bookings from the database and display in the table
                $query = "SELECT * FROM booking_tracker";
                if(isset($_GET['search_query'])) {
                    $search_query = $_GET['search_query'];
                    $query .= " WHERE full_name LIKE '%$search_query%' OR email LIKE '%$search_query%'";
                }
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['full_name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['arrival']."</td>";
                    echo "<td>".$row['departure']."</td>";
                    echo "<td>".$row['payment']."</td>";
                    echo "<td>".$row['contact_number']."</td>";

                    // Add action buttons for delete and update
                    echo "<td>
                            <a href='update_form.php?id=".$row['id']."' class='btn btn-primary'>Update</a>
                            <button type='button' class='btn btn-danger delete-btn' data-id='".$row['id']."'>Delete</button> 
                          </td>";
                    echo "</tr>";
                }


                if (!isset($row["id"])) {
                    echo "<tr>
                            <td colspan='8'>No bookings found</td>
                        </tr>";
                    
                }

                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
   $(document).ready(function() {
    $(".delete-btn").click(function() {
        var bookingId = $(this).data("id");
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this booking!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Send AJAX request to delete booking
                $.ajax({
                    url: "system.php",
                    type: "POST",
                    data: {delete_id: bookingId},
                    success: function(response) {
                        // Reload the page after successful deletion
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
});
</script>


<div id="EWAN" class="content">
        <h2>Welcome to the Messages</h2>
        <p>This is the messages area of the dashboard.</p>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
