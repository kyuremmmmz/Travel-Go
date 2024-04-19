


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Sign in or Sign-up to TravelGoPH</title>
</head>
<body>
<div id="container" class="container">

<?php

//===============================================================================PHP ADMIN CONNECTION==========================================================================================
session_start(); // Start the session

// Check if the form is submitted
if (isset($_POST['Submit'])) {
    // Database connection
    $conn = new mysqli("localhost:3307", "root", "admin", "for_admin");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email2']);
    $password = mysqli_real_escape_string($conn, $_POST['passko']);
    $username = mysqli_real_escape_string($conn, $_POST['username'] );

    // Query to check if email and password match
    $query = mysqli_query($conn, "SELECT email, password, user_name FROM registration WHERE email = '$email' AND password = '$password' AND user_name = '$user_name'") 
    or die("error". mysqli_error($conn));

    // Fetch the result
    $row = mysqli_fetch_assoc($query);

    // If email and password match, store email in session
    if (is_array($row) && !empty($row)) {
        $_SESSION['email'] = $email;
        header("Location: Main.php"); // Redirect to Main.php after successful login
        exit();
    } else {
        echo '<script>alert("Invalid email or password. Please try again.");</script>';
    }
}




    

//===============================================================================PHP ADMIN CONNECTION============================================================================================
?>


		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
                
					<div class="form sign-up">

						<div class="input-group">
							<i class='fas fa-user'></i>
							<input type="text" placeholder="Username">
						</div>
						<div class="input-group">
							<i class='fas fa-envelope'></i>
							<input type="email" placeholder="Email">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Password">
						</div>
						<div class="input-group">
							<i class='bx bxs-lock-alt'></i>
							<input type="password" placeholder="Confirm password">
						</div>
						<button>
							Sign up
						</button name="">
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
							</b>
						</p>
					</div>
				</div>
			
			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
                <form action="Main/login2.php" method="post">
					<div class="form sign-in">
                        <img src="/2024-03-29-removebg-preview.png" style="background:linear-gradient(rgba(12, 7, 7, 0.5), rgba(0, 0, 0, 0.5)), url(/2024-03-29-removebg-preview.png); border-radius: 30px;" alt="">
						<div class="input-group">
							<i class='fas fa-user'></i>
							<input type="text" placeholder="Username" name="user_name">
						</div>

                        <div class="input-group">
							<i class='fas fa-envelope'></i>
							<input type="text" placeholder="Email" name="email2">
						</div>

						<div class="input-group">
							<i class='fas fa-lock'></i>
							<input type="password" placeholder="Password" name="passko">
						</div>
						<input type="button" value="Sign in" class="button" name="Submit">
						<p>
							<a href="" style="color: black; text-decoration:none; ">
								Forgot password?
							</a>
						</p>
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
						</p>
					</div>
				</div>
				<div class="form-wrapper">
		
				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
        </form> 
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome to Travel Go <br> Philippines
					</h2>
	
				</div>
				<div class="img sign-in">
                    
		
				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">
				
				</div>
				<div class="text sign-up">
					<h2>
						Join and Travel with us
					</h2>
	
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>

</body>
<script>
    let container = document.getElementById('container')

toggle = () => {
	container.classList.toggle('sign-in')
	container.classList.toggle('sign-up')
}

setTimeout(() => {
	container.classList.add('sign-in')
}, 200)
</script>
</html>


