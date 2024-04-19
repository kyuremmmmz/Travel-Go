<?php
$DB_HOST = "localhost:3307";
$DB_USER = "root";
$DB_PASS = "admin";
$DB_NAME = "sample";

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $name = $_POST["price"];
    $file = $_FILES["file"];
    $place =  $_POST["place"];

    if ($file["error"] == 4) {
        echo '<script>swal("Invalid", "", "error");</script>';
    } else {
        $filename = $file['name'];
        $filesize = $file['size'];
        $tempname = $file['tmp_name'];

        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo '<script>sweetAlert("Invalid image extension", "Please upload jpg, jpeg, png, or gif files.", "error");</script>';
        } elseif ($filesize >= 10000000) {
            echo'<script>';
            echo'sweetAlert("Invalid", "Wrong Password or Email try again", "error");';
            echo'</script>';
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadPath = 'img/' . $newImageName;

            if (move_uploaded_file($tempname, $uploadPath)) {
                $query = "INSERT INTO for_creating_a_place(price, place,image) VALUES('$name', '$place', '$newImageName')";

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
    <title>Post Places - TravelGoPH Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <style>
        .container{

            margin-top: 250px;
        }
    </style>
</head>
<body style="background-color: #f8f9fa;">

<div class="container mt-6">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Post Places in TravelGoPH</h1>
            <form action="postplaces.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" name="place" placeholder="Place...">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="price" placeholder="Price...">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="file" accept=".jpg, .jpeg, .gif, .png">
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <a href="system.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$sql = "SELECT image FROM for_creating_a_place";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<script>swal("Success", "Successfully fetch", "success");</script>';
    }
    echo '<script>swal("Error", "You did not fetch yet", "error");</script>';
}
?>

<