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
    $flight_price = $_POST["priceFlights"];
    $hotelsPrices = $_POST["priceHotels"];
    $hotel = $_POST["hotel"];
    $file = $_FILES["file"];
    $file2 = $_FILES["file2"]; // Image 2
    $file3 = $_FILES["file3"]; // Image 3
    $place = $_POST["place"];
    $placee = $_POST["placee"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    $description = $_POST["description"];
    $amenities = $_POST["amenities"];
    $flights = $_POST["flights"];
    

    // Check if the file exists
    if ($file["error"] == 4) {
        echo '<script>swal("Invalid", "", "error");</script>';
    } else {
        $newImageName2 = ""; // Initialize $newImageName2
        $newImageName3 = ""; // Initialize $newImageName3
        // Upload image 1
        $filename = $file['name'];
        $filesize = $file['size'];
        $tempname = $file['tmp_name'];

        // Valid image extensions
        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Check if the image extension is valid
        if (!in_array($imageExtension, $validImageExtensions)) {
            echo '<script>Alert("Invalid image extension", "Please upload jpg, jpeg, png, gif  or webp files.", "error");</script>';
        } elseif ($filesize >= 10000000) { // Check if file size exceeds limit
            echo '<script>sweetAlert("Invalid", "Wrong Password or Email try again", "error");</script>';
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadPath = 'details/' . $newImageName;

            // Attempt to move the uploaded file to the specified destination
            if (move_uploaded_file($tempname, $uploadPath)) {
                // Upload image 2 if exists
                if ($file2["error"] != 4) {
                    // Upload logic for image 2
                    $newImageName2 = uniqid() . '.' . $imageExtension;
                    $uploadPath2 = 'details/' . $newImageName2;
                    move_uploaded_file($file2['tmp_name'], $uploadPath2);
                }

                // Upload image 3 if exists
                if ($file3["error"] != 4) {
                    // Upload logic for image 3
                    $newImageName3 = uniqid() . '.' . $imageExtension;
                    $uploadPath3 = 'details/' . $newImageName3;
                    move_uploaded_file($file3['tmp_name'], $uploadPath3);
                }

               
                                // Insert data into the database
                    $query = "INSERT INTO `create_see_details.php` (price, price_for_hotel, price_for_flights, hotels, image, image2, image3, place, specific_place, description, departure, flights, amenities, arrival) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    // Prepare the statement
                    $stmt = $conn->prepare($query);

                    // Bind parameters
                    $stmt->bind_param("ssssssssssssss", $name, $hotelsPrices, $flight_price, $hotel, $newImageName, $newImageName2, $newImageName3, $place, $placee, $description, $departure, $flights, $amenities, $arrival);

                    // Execute the statement
                    if ($stmt->execute()) {
                        echo '<script>sweetAlert("Invalid", "Wrong Password or Email try again", "error");</script>';
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    // Close the statement
                    $stmt->close();
                                    
                }
                
    }
}
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
                <div class="container">
    <form action="see_details_form.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1 class="mb-4 text-center">Post Details in TravelGoPH</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hotel">Hotel</label>
                    <input type="text" class="form-control" name="hotel" placeholder="Hotel...">
                </div>

                <div class="form-group">
                    <label for="place">Place</label>
                    <input type="text" class="form-control" name="place" placeholder="Place...">
                </div>

                <div class="form-group">
                    <label for="place">Place in Specific place</label>
                    <input type="text" class="form-control" name="placee" placeholder="Place...">
                </div>

                <div class="form-group">
                    <label for="arrival">Arrival</label>
                    <input type="date" class="form-control" name="arrival" placeholder="Price...">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description...">
                </div>

                <div class="form-group">
                    <label for="departure">Amenities</label>
                    <input type="text" class="form-control" name="amenities" placeholder="Amenities...">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="priceHotels">Price Hotel</label>
                    <input type="text" class="form-control" name="priceHotels" placeholder="Price...">
                </div>

                <div class="form-group">
                    <label for="price">Price Attraction</label>
                    <input type="text" class="form-control" name="price" placeholder="Price...">
                </div>

                <div class="form-group">
                    <label for="departure">Departure</label>
                    <input type="date" class="form-control" name="departure" placeholder="Departure...">
                </div>

                <div class="form-group">
                    <label for="image">Attraction Url</label>
                    <input type="file" class="form-control-file" name="file" accept=".jpg, .jpeg, .gif, .png, .webp" required  multiple>
                </div>
                <div class="form-group">
                    <label for="image3">Hotels URL</label>
                    <input type="file" class="form-control-file" name="file3" accept=".jpg, .jpeg, .gif, .png, .webp" required multiple>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
        <a href="system.php" class="btn btn-secondary">Back</a>
    </form>
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
