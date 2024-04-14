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



    // Check if the form is submitted
if (isset($_POST["submit"])) {
    // Get form data
    $id = $_POST["id"];
    $fullname = $_POST["name"];
    $children = $_POST["children"];
    $adult = $_POST["adults"];
    $arrival = $_POST["adate"];
    $departure = $_POST["ddate"];
    $payment = $_POST["payment_method"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Prepare the SQL statement using prepared statements to prevent SQL injection
    $sql = "UPDATE booking_tracker SET full_name=?, children=?, adult=?, arrival=?, departure=?, payment=?, contact_number=?, email=? WHERE id=?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("siisssssi", $fullname, $children, $adult, $arrival, $departure, $payment, $phone, $email, $id);

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
                <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Update Booking</h2>
                <form action="update_form.php" method="POST">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Hotel</label>
                    <input type="text" class="form-control" id="email" name="hotel" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_date" class="form-label">Arrival Date</label>
                        <input type="date" class="form-control" id="arrival_date" name="adate" required>
                    </div>
                    <div class="mb-3">
                        <label for="departure_date" class="form-label">Departure Date</label>
                        <input type="date" class="form-control" id="departure_date" name="ddate" required>
                    </div>
                    <div class="mb-3">
                        <label for="adults" class="form-label">Number of Adults</label>
                        <select class="form-select" id="adults" name="adults" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="children" class="form-label">Number of Children</label>
                        <select class="form-select" id="children" name="children" required>
                            <option value="">Select</option>
                            <option value="0">None</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="">Select</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="debit_card">Debit Card</option>
                            <option value="paypal">PayPal</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

                
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
