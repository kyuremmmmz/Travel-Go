<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    
    $hotelsPrices = $_POST["priceHotels"];
    $hotel = $_POST["hotel"];
    $place = $_POST["place"];
    $placee = $_POST["placee"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    $description = $_POST["description"];
    $amenities = $_POST["amenities"];
    
    
    // Initialize arrays to store uploaded image file names
    $hotelImageNames = [];
    $attractionImageNames = [];

    // Check if hotel images are uploaded
if (!empty($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
    // Loop through each uploaded hotel image
    foreach ($_FILES['file']['name'] as $key => $image) {
        // Get file details
        $filename = $_FILES['file']['name'][$key];
        $filesize = $_FILES['file']['size'][$key];
        $tempname = $_FILES['file']['tmp_name'][$key];
        
        // Valid image extensions
        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        // Check if the image extension is valid
        if (!in_array($imageExtension, $validImageExtensions)) {
            die("Invalid image extension. Please upload jpg, jpeg, png, gif, or webp files.");
        }
        
        // Check file size
        if ($filesize >= 10000000) { // 10MB
            die("File size exceeds the limit. Please upload files up to 10MB.");
        }
        
        // Generate a unique name for the image
        $newImageName = uniqid() . '.' . $imageExtension;
        $uploadPath = 'details/' . $newImageName;
        
        // Move the uploaded file to the specified destination
        if (move_uploaded_file($tempname, $uploadPath)) {
            // Store the uploaded image file name
            $hotelImageNames[] = $newImageName;
        } else {
            die("Error uploading file.");
        }
    }
}

// Check if attraction images are uploaded
if (!empty($_FILES['file3']['name']) && is_array($_FILES['file3']['name'])) {
    // Loop through each uploaded attraction image
    foreach ($_FILES['file3']['name'] as $key => $image) {
        // Get file details
        $filename = $_FILES['file3']['name'][$key];
        $filesize = $_FILES['file3']['size'][$key];
        $tempname = $_FILES['file3']['tmp_name'][$key];
        
        // Valid image extensions
        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        // Check if the image extension is valid
        if (!in_array($imageExtension, $validImageExtensions)) {
            die("Invalid image extension. Please upload jpg, jpeg, png, gif, or webp files.");
        }
        
        // Check file size
        if ($filesize >= 10000000) { // 10MB
            die("File size exceeds the limit. Please upload files up to 10MB.");
        }
        
        // Generate a unique name for the image
        $newImageName = uniqid() . '.' . $imageExtension;
        $uploadPath = 'details/' . $newImageName;
        
        // Move the uploaded file to the specified destination
        if (move_uploaded_file($tempname, $uploadPath)) {
            // Store the uploaded image file name
            $attractionImageNames[] = $newImageName;
        } else {
            die("Error uploading file.");
        }
    }
}

            // Insert data into the database
        $query = "INSERT INTO `create_see_details.php` (price, price_for_hotel, hotels, image, image3, place, specific_place, description, departure,  amenities, arrival) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $hotelImageNames_ref = implode(',', $hotelImageNames);
        $attractionImageNames_ref = implode(',', $attractionImageNames);
        $stmt->bind_param("sssssssssss", $name, $hotelsPrices, $hotel, $hotelImageNames_ref,  $attractionImageNames_ref, $place, $placee, $description, $departure, $amenities, $arrival);
        if ($stmt->execute()) {
            // Data inserted successfully, show SweetAlert
            echo '';
        } else {
            echo "Error: " . $stmt->error;
        }
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
            <div class="container">
                <form action="see_details_form.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <h1 class="mb-4 text-center">Post Details in TravelGoPH</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Hotel -->
                            <div class="mb-3">
                                <label for="hotel" class="form-label">Hotel</label>
                                <input type="text" class="form-control" name="hotel" placeholder="Hotel...">
                            </div>
                            <!-- Place -->
                            <div class="mb-3">
                                <label for="place" class="form-label">Place</label>
                                <input type="text" class="form-control" name="place" placeholder="Place...">
                            </div>
                            <!-- Place in Specific place -->
                            <div class="mb-3">
                                <label for="placee" class="form-label">Place in Specific place</label>
                                <input type="text" class="form-control" name="placee" placeholder="Place...">
                            </div>
                            <!-- Arrival -->
                            <div class="mb-3">
                                <label for="arrival" class="form-label">Arrival</label>
                                <input type="date" class="form-control" name="arrival" placeholder="Price...">
                            </div>
                            <!-- Amenities -->
                            <div class="mb-3">
                                <label for="amenities" class="form-label">Amenities</label>
                                <input type="text" class="form-control" name="amenities" placeholder="Amenities...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Price Hotel -->
                            <div class="mb-3">
                                <label for="priceHotels" class="form-label">Price Hotel</label>
                                <input type="text" class="form-control" name="priceHotels" placeholder="Price...">
                            </div>
                            <!-- Price Attraction -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price Attraction</label>
                                <input type="text" class="form-control" name="price" placeholder="Price...">
                            </div>
                            <!-- Departure -->
                            <div class="mb-3">
                                <label for="departure" class="form-label">Departure</label>
                                <input type="date" class="form-control" name="departure" placeholder="Departure...">
                            </div>
                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control note-toolbar card-header" name="description" placeholder="Description..."></textarea>
                            </div>
                            <!-- Attraction Images -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Attraction Images</label>
                                <input type="file" class="form-control" name="file[]" accept=".jpg, .jpeg, .gif, .png, .webp" multiple required>
                            </div>
                            <!-- Hotel Images -->
                            <div class="mb-3">
                                <label for="image3" class="form-label">Hotel Images</label>
                                <input type="file" class="form-control" name="file3[]" accept=".jpg, .jpeg, .gif, .png, .webp" multiple required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" data-bs-toggle="modal" data-bs-target="#myModal">SUBMIT</button>
                    <a href="admin/system.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
