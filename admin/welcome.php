<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    .container {
      margin-top: 100px;
    }
    .welcome-text {
      font-size: 24px;
      margin-bottom: 20px;
    }
    .username {
      font-size: 28px;
      font-weight: bold;
      color: #007bff;
    }
    .logout-btn {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .logout-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php 
    session_start(); // Start the session
    // Check if the user is logged in
    if(isset($_SESSION['email'])) {
      echo '<div class="welcome-text">Welcome to admin developer dashboard, <span class="username">' . $_SESSION['email'] . '</span>!</div>';
      echo '<p>This is your welcome page. Enjoy your stay!</p>';
      echo '<form action="system.php" method="post">';
      echo '<button type="submit" class="logout-btn">Continue</button>';

      echo '</form>';
    } else {
      
      header("Location: adminlogin.php");
      exit();
    }
    ?>
  </div>
</body>
</html>
