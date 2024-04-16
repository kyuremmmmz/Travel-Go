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

.container {
            margin-top: 50px;
            width: auto;
            max-width: 700px; 
            padding: 20px; 
            border: 2px solid #ffffff; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2); 
            background-color: rgba(0, 0, 0, 0.5);
            margin-left: auto; 
            margin-right: auto; 
        }

        .form-group {
            padding-top: 15px; 
        }

        
        input[type="text"],
        input[type="file"] {
            background-color: #ffffff; 
            color: #343a40; /* Text color */
            border-color: #ffffff; /* Border color */
        }

        /* Style for form inputs on focus */
        input[type="text"]:focus,
        input[type="file"]:focus {
            background-color: #ffffff; /* Background color */
            color: #343a40; /* Text color */
            border-color: #ffffff; /* Border color */
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5); /* Added box shadow */
        }

        /* Style for buttons */
        .btn {
            margin-top: 20px; /* Adjusted margin */
            width: 100%; /* Button width */
        }

        /* Style for back button */
        .btn-secondary {
            margin-top: 10px; /* Adjusted margin */
            width: 100%; /* Button width */
        }

        /* Style for error message */
        .error-message {
            color: #ff0000; /* Red color */
            font-size: 14px; /* Font size */
            margin-top: 10px; /* Adjusted margin */
        }
    </style>
</head>
<body>
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

    
 
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="sidebar-logo">Travel Go Ph Admin</div>
                <ul class="sidebar-menu">
                    <li><a href="system.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="/admin/pakages.php"><i class="fas fa-box"></i> Packages</a></li>
                    <li><a href="booking_list.php"><i class="fas fa-list-alt"></i> Booking List</a></li>
                    <li><a href="#inquiries"><i class="fas fa-envelope"></i> Inquiries</a></li>
                    <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </div>
            <!-- Content -->
            <div class="col-md-9">
                <!-- Content goes here -->
                
                <h1>Update Booking</h1>
                <hr>
                <form id="updateBookingForm" method="POST">
                <?php
                    $get = $_GET["choice"];
                    $query = "SELECT * FROM booking_tracker WHERE id = $get ";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" required>
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
                        <label for="hotel" class="form-label">Hotel</label>
                        <input type="text" class="form-control" id="hotel" name="hotel" value="<?php echo  $row['hotel'] ?>" required>
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
                <?php
                    }
                
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
            </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
