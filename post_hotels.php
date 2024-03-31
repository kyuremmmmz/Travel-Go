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
    $file = $_FILES["file"];
    $place =  $_POST["place"];

    // Check if the file exists
    if ($file["error"] == 4) {
        echo '<script>swal("Invalid", "", "error");</script>';
    } else {
        $filename = $file['name'];
        $filesize = $file['size'];
        $tempname = $file['tmp_name'];

        // Valid image extensions
        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Check if the image extension is valid
        if (!in_array($imageExtension, $validImageExtensions)) {
            echo '<script>sweetAlert("Invalid image extension", "Please upload jpg, jpeg, png, gif  or webp files.", "error");</script>';
        } elseif ($filesize >= 10000000) { // Check if file size exceeds limit
            echo'<script>';
            echo'sweetAlert("Invalid", "Wrong Password or Email try again", "error");';
            echo'</script>';
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadPath = 'images/' . $newImageName;

            // Attempt to move the uploaded file to the specified destination
            if (move_uploaded_file($tempname, $uploadPath)) {
                $query = "INSERT INTO for_creating_a_hotel(price, hotel,image) VALUES('$name', '$place', '$newImageName')";

                // Execute the query
                if ($conn->query($query) === TRUE) {
                    echo'<script>';
                    echo'sweetAlert("Invalid", "Wrong Password or Email try again", "error");';
                    echo'</script>';
                } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                }
            } else {
                echo '<script>sweetAlert("Error", "Error uploading file", "error");</script>';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelGoPH Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <style>
        body {
            background-color: #343a40; /* Dark background color */
            color: white; /* Text color */
        }
        .container {
            margin-top: 50px;
            width: auto;
            max-width: 500px;
            height: 500px;
            border: 1px solid black;
            align-self: center;
        }

        .form-group{
            padding-top: 25px;
        }
        .vertical-center {
            display: flex;
            align-items: center; /* Vertically center align */
            justify-content: center; /* Horizontally center align */
            height: 100%; /* Take up full height of the body */
            margin-top: 200px;
        }
    </style>
</head>
<body>

<div class="vertical-center"> <!-- Center the container both horizontally and vertically -->
    <div class="container">
        <form action="post_hotels.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <h1 class="mb-4 text-center">Post Hotels in TravelGoPH</h1>
            
            <div class="form-group">
                <input type="text" class="form-control" name="place" placeholder="Place...">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="price" placeholder="Price...">
            </div>
            
            <div class="form-group">
                <input type="file" class="form-control-file" name="file" accept=".jpg, .jpeg, .gif, .png">
            </div>
           
            <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
            <a href="system.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</body>
</html>
