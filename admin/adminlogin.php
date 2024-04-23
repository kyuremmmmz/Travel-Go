<!DOCTYPE html>
<html lang="en">
<head>
  <title>Travel Go Dashboard Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .container.mt-3 {
        background-color: antiquewhite;
        display: flex;
        align-items: center;
        text-align: center;
    }
    .selection{
        background-color: aliceblue;
        box-shadow: 10px 10px 10px 10px rgba(0,0,0,0.12);
        transform: translateY(70%);

        
    }
  </style>
</head>
<body>
<?php 
session_start();

if (isset($_POST['login'])) {
    $conn = new mysqli('localhost:3307', 'root', 'admin', 'for_admin');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["pswd"]);

    $sql = "SELECT email, confirm_password FROM registration WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $get = 
        $_SESSION['email'] = $email;
        header("Location: welcome.php");
        exit(); // Always exit after header redirect
    } else {
        echo "<script> alert('wrong pass'); </script>";
    }

    $conn->close();
}
?>

<div class="container mt-1">
  <div class="row justify-content-center">
    <form action="adminlogin.php" method="post" class="col-md-3 mt-5 justify-content-center selection" style="height:300px;">
    <h1 style="text-align:center;">Admin Login</h1>
      <div class="row">
        <div class="col-md-12"> 
          <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="form-floating mt-3 mb-3">
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            <label for="pwd">Password</label>
          </div>
        </div>
      </div>
      <div class="col-md-14 text-center"> 
        <button type="submit" class="btn btn-primary col-md-9" name="login">Submit</button>
      </div>
    </form>
  </div>
</div>

</body>



</html>

