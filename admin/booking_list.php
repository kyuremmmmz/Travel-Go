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
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['full_name']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['arrival']."</td>";
                            echo "<td>".$row['departure']."</td>";
                            echo "<td>".$row['contact_number']."</td>";
                            echo "<td>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>Update</button>
                                <button type='button' class='btn btn-danger delete-btn' data-id='".$row['id']."'>Delete</button>
                              </td>";
                        echo "</tr>";
                    }

                        mysqli_free_result($result);
                        mysqli_close($conn);
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>





 <!-- The Modal -->
<?php
 // Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get form data
    $fullname = $_POST["name"];
    $children = $_POST["children"];
    $adult = $_POST["adults"];
    $arrival = $_POST["adate"];
    $departure = $_POST["ddate"];
    $payment = $_POST["payment_method"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];










    // Prepare the SQL statement using prepared statements to prevent SQL injection
    $sql = "UPDATE booking_tracker SET full_name=?, children=?, adult=?, arrival=?, departure=?, contact_number=?, email=? WHERE id=?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("siisssss", $fullname, $children, $adult, $arrival, $departure, $phone, $email, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>sweetAlert('Success', 'Updated Successfully.', 'success')</script>";
        header("Location: system.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>




<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update Booking</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form id="updateBookingForm" method="POST">
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
                        <input type="text" class="form-control" id="hotel" name="hotel" required>
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
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <script>
        jQuery(document).ready(function($){
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
        });


        $(document).ready(function() {
        $('.btn-primary').on('click', function() {
            var row = $(this).closest('tr');
            var cols = row.find('td');

            // Populate form fields with row data
            $('#booking_id').val(cols.eq(0).text()); // Booking ID
            $('#name').val(cols.eq(1).text());
            $('#email').val(cols.eq(2).text());
            $('#arrival_date').val(cols.eq(3).text());
            $('#departure_date').val(cols.eq(4).text());
            $('#phone').val(cols.eq(5).text());

            // Set selected options for Adults and Children
            var adults = parseInt(cols.eq(6).text()); // Number of Adults
            var children = parseInt(cols.eq(7).text()); // Number of Children
            $('#adults').val(adults);
            $('#children').val(children);

            $('#payment_method').val(cols.eq(8).text());
            $('#hotel').val(cols.eq(9).text());

            // Display modal
            $('#myModal').modal('show');
        });

        // Form submission handling
        $('#updateBookingForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Get form data
            var formData = $(this).serialize();

            // Submit form using AJAX
            $.ajax({
                url: 'update_booking.php', // Adjust the URL according to your file structure
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // Reload page or update UI as needed
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
    </script>
</body>
</html>
