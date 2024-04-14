<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Tracker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #343a40; /* Dark background color */
            color: white; /* Text color */
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
    <div class="container mt-5">
        <h2>Booking Tracker</h2>
        <!-- Booking Search Form -->
        <form action="booking_tracker.php" method="GET">
            <div class="mb-3">
                <input type="text" name="search_query" placeholder="Enter name or email">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Booking Table -->
        <h3>All Bookings</h3>
        <table class="table table-stripped">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>ARRIVAL</th>
                <th>DEPARTURE</th>
                <th>CONTACT NUMBER</th>
                <th>ACTION</th> <!-- Add new column for action buttons -->
            </tr>
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
            $result = mysqli_query($conn, $query);

            if(isset($_GET['search_query'])) {
                $search_query = $_GET['search_query'];
                // Perform the search query in your database and display the results
                $query = "SELECT * FROM booking_tracker WHERE full_name LIKE '%$search_query%' OR email LIKE '%$search_query%'";
                $result = mysqli_query($conn, $query);
            }

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['full_name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['arrival']."</td>";
                echo "<td>".$row['departure']."</td>";
                
                echo "<td>".$row['contact_number']."</td>";

                // Add action buttons for delete and update
                echo "<td>
                        <a href='update_form.php?id=".$row['id']."' class='btn btn-primary'>Update</a>
                        <button type='button' class='btn btn-danger delete-btn' data-id='".$row['id']."'>Delete</button> 
                      </td>";
                echo "</tr>";
            }

            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </table>
    </div>

    <script>
        $(document).ready(function(){
            $(".delete-btn").click(function(){
                var bookingId = $(this).data("id");
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this booking!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Send AJAX request to delete booking
                        $.ajax({
                            url: "booking_tracker.php",
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
</body>
</html>
