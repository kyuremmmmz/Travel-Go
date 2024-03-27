<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin TravelGoPH</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="Website/icon.ico" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/staticmap?key…=1080x250&zoom=16&markers=14.5995124,120.9842195&"></script>
    
</head>
<body class="login">


<?php

//===============================================================================PHP ADMIN CONNECTION==========================================================================================
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['Submit'])) {
    // Database connection
    $conn = new mysqli("localhost:3307", "root", "admin", "sample");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email2']);
    $password = mysqli_real_escape_string($conn, $_POST['passko']);

    // Query to check if email and password match
    $query = mysqli_query($conn, "SELECT email, password FROM registration WHERE email = '$email' AND password = '$password'") 
    or die("error". mysqli_error($conn));

    // Fetch the result
    $row = mysqli_fetch_assoc($query);

    // If email and password match, store email in session
    if (is_array($row) && !empty($row)) {
        $_SESSION['email'] = $email;
        header("Location: Main/Main.php"); // Redirect to Main.php after successful login
        exit();
    } else {
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
    }
}




    

//===============================================================================PHP ADMIN CONNECTION============================================================================================
?>

    

<form action="login_page.php" method="post">
<div id = "another">
<div id="signinForm" class="input">
    <h1 style="color: aliceblue;">Sign in</h1>

    
   
    <div class="icon">
    <ion-icon name="eye-outline" class="eye"></ion-icon>
    </div>
 

    <input type="email" class="email2" name="email2" id="email2"  required>

    <label  class="email">Email</label>
    
    <input type="password" class="passko" name="passko" id="passko" required>
    <label class="password">Password</label>
   
    <input class="Submit" type="Submit" value="Signin" id="Submit" name="Submit" onclick="parameters">
  

    

    
    <a href="ForgetPAssword.php" class="forgot-pass">Forgot password?</a>
    
    <p class="para">---------------------------or--------------------------</p>
    
    <p class="parag">Don't have an account?<a href="gagamitin-for-final.php" class="h">Signup</a></p>

</div>
</div>
<script>
//==========================================================================================================eye======================================================================
document.addEventListener("DOMContentLoaded", function() {
    const eyeIcon = document.querySelector('.eye');
    const passwordInput = document.querySelector('.passko');

    let showPassword = false;

    eyeIcon.addEventListener('click', function() {
        showPassword = !showPassword;
        if (showPassword) {
            passwordInput.setAttribute('type', 'text');
            eyeIcon.setAttribute('name', 'eye-off-outline');
        } else {
            passwordInput.setAttribute('type', 'password');
            eyeIcon.setAttribute('name', 'eye-outline');
        }
    });
});



        $(document).ready(function () {
            // Listen for form submission
            $('#loginForm').submit(function (event) {
                // Prevent default form submission
                event.preventDefault();
                // Get form data
                var formData = $(this).serialize();
                // Send Ajax request to login endpoint
                $.ajax({
                    url: 'login_page.php', // Replace 'login.php' with the actual endpoint URL
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Assuming the response contains the email
                        var email = response.email;
                        // Redirect to another page and pass the email as a parameter
                        window.location.href = 'Main/Main.php?email=' + email;
                    },
                    error: function () {
                        // Handle errors
                        alert('Login failed. Please try again.');
                    }
                });
            });
        });




</script>
</body>
</html>




