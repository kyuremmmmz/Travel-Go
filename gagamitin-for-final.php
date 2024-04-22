
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Signup Travel Go ph</title>
    <style>
        html {
            height: 100%;
        }

        body {
            margin: 0%;
            padding: 0%;
            font-family: sans-serif;
            background: url(pic.jpg);
            background: linear-gradient(rgba(12, 7, 7, 0.5), rgba(0, 0, 0, 0.5)), url(pic.jpg);
            overflow: hidden;
            background-size: cover;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            width: 400px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            backdrop-filter: blur(20px);
            position: relative;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
        }

        .user-box {
            position: relative;
        }

        .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            outline: none;
            background: transparent;
            border: none;
            border-bottom: 1px solid #fff;
        }

        .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: 0.5s;
        }

        .user-box input:focus~label,
        .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03f484;
            font-size: 12px;
        }
        .a{
            color: #c9c4c4;
            transition: all 0.3s;
            transform: translateX(50%);
            transform: translateY(35%);
            
        }
        .p{
            color: #fff;

        }
        .submit{
            background-color: #333;
            border: none;
            text-emphasis: none;
            font-size: large;
            position: static;
            transition: color, 0.7s;
            cursor: pointer;
            border-radius: 50px;
            width: 100%;
            color: #d4d4d4;
            height: 50px;
            transition: all 0.7s ease;

        }
        .submit:hover{
            color: #fff;
            background-color: black;

        }


        #login-box{
            display: static;
            opacity: 0;
            transition: all 0.3s ease-in-out; 
            transform: scale(1) translate(-50%, 5550%); 
            position: fixed;
            top: 50%;
            left: 50%;
            z-index: 9999; 
        }

        #login-box.visible{
            display: block; 
            opacity: 1; 
            transform: scale(1) translate(-50%, -50%);
        }

        .message{
            position: relative;
            transform: translate(50%, 50%);
        }


    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">




<?php
// ==============================================================================GET THE INPUTS TO INSERT INTO THE DATABASE=========================================================
    
$conn = new mysqli($DB_HOST = "localhost:3307", $DB_USER = "root", $DB_PASS = "admin", $DB_NAME = "for_admin");
    // Include the PHP script to connect to the database

    // Check if the form is submitted
    if (isset($_POST["submit"])) {
        // Retrieve form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($confirm_password != $password) {
            echo'<script>swal("Wrong password", "Password dont match", "error");</script>';
            return ;
                }
                else {
                    $sql = "INSERT INTO registration (user_name, email, password, confirm_password) 
                    VALUES ('$username', '$email', '$password', '$confirm_password')";
    
            if ($conn->query($sql) === TRUE) {
                
                echo "<div class = 'message'
                style='background-color: #f0f0f0; 
                border: 1px solid #ccc; 
                border-radius: 5px; 
                padding: 20px; 
                width: 400px; 
                margin: 300px auto; 
                transform: scale(1) translate(-50%, -50%);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
                text-align: center;'>
                
                
                <h2 style='color: #333; font-size: 18px; margin-top: 0;'>Successfully created your account $username</h2>
                <p style='color: #666; font-size: 16px;'>Register successfully. <a href = 'Main/login_page.php' style = 'color: #252627'>Login your account now </a></p> 
            </div>";

            exit;
    ;
            
            } else {
                
                echo "'Error: Email '$email' already exist";
            
            }
}
    }
   
    //==============================================================================GET THE INPUTS TO INSERT INTO THE DATABASE=========================================================   
    ?>


    <div class="login-box">
        <h2>Signup Travel Go</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="user-box">
                <input type="text" name="username" id="username" class="username" required>
                <label for="">Username</label>
            </div>

            <div class="user-box">
                <input type="email" name="email" id="email" class="email" required>
                <label for="">Email</label>
            </div>

            <div class="user-box">
                <input type="password" name="password" id="password" class="password" required>
                <label for="">Password</label>
            </div>

            <div class="user-box">
                <input type="password" name="confirm_password" id="confirm_password" class="confirm-password" required>
                <label for="">Confirm Password</label>
            </div>
            
            <input type="submit" name="submit" id="Submit" class="submit" onclick="signup()" value="SUBMIT">
            <p class="p">Already have an account? <a href="login_page.php" class="a">Signin</a></p>
        </form>
        
    </div>
</body>
</html>



<script>

        function signup() {
            var loginBox = document.getElementById('login-box');
            loginBox.classList.toggle('visible');
        }

    
</script>





</form>

        
 