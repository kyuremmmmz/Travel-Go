<?php
require_once 'con4.php';

if (isset($_POST['submit'])) {
    // Get user inputs
    $email = $_SESSION['email']; 
    $user_name = $_POST['username'];
    $email_post = $_POST['email']; 
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if an image file was uploaded
    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        // Define the directory where the image will be saved
        $upload_dir = ''; // Change this to your desired directory
        
        // Get the uploaded file details
        $filename = $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];

        // Valid image extensions
        $validImageExtensions = ['jpg', 'gif', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Check if the image extension is valid
        if (!in_array($imageExtension, $validImageExtensions)) {
            echo '<script>alert("Invalid image extension. Please upload jpg, jpeg, png, gif, or webp files.");</script>';
        } else {
            // Generate a unique filename for the uploaded image
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadPath = $upload_dir . $newImageName;

            // Move the uploaded file to the designated directory
            if (move_uploaded_file($tempname, $uploadPath)) {
                // Update user data in the database including the new image path
                $sql = "UPDATE registration SET user_name = '$user_name', email = '$email_post', password = '$password', avatar = '$uploadPath' WHERE email = '$email_post'";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Success! Data Updated Successfully');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error; 
                }
            } else {
                echo '<script>alert("Error uploading file.");</script>';
            }
        }
    } else {
        // Handle other form submissions (without file upload)
        // ...
    }
}

// Retrieve user details for pre-filling the form
$email = $_SESSION['email'];
$sql = "SELECT * FROM registration WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        $User = $row['user_name'];
        $email = $row['email'];
        $password = $row['password'];
        $confirm_password = $row['confirm_password'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .settings-panel {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto; /* Centering the panel horizontally */
            max-width: 500px; /* Limiting the maximum width */
        }
        .settings-panel h2 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 15px;
            text-align: center; /* Centering the heading */
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block; /* Make the button full width */
            margin: 0 auto; /* Center the button horizontally */
        }
        button:hover {
            background-color: #0056b3;
        }


        .Back-btn {
            position: absolute;
            background-color: #0A57E6;
            color: #fff;
            border: none;
            top: 1%;
            text-decoration: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<a href="Main.php" class="Back-btn">Back</a>
    <div class="container-fluid">
        <div class="row">
            <!-- Content -->
            <div class="col-md-12">
                <!-- Content goes here -->
                <div class="settings-panel">
                    <h2>User Settings</h2>
                    <form action="settings.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo $User; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" id="confirm_password" name="confirm_password">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Image:</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".jpg, .jpeg, .gif, .png">
                        </div>
                        <button type="submit" name="submit">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>