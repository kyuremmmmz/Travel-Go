<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second PHP Page with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Second PHP Page with Bootstrap</h1>
        <?php
            // Retrieving the choice from the URL parameter
           $sender = "ako";
           $senderemail = "chba.jasmin.up@phinmaed.com";
           $remail = "chba.jasmin.up@phinmaed.com";
           $header = "From: $sender <$senderemail>";
           $emailcontent = "haha tite";

          if (mail($remail, "Test Email", $emailcontent, $header)) {
            echo 'Email sent';
          } else {
            echo 'Failed to send email';
          }
        ?>
    </div>

    <!-- Bootstrap JS (optional, only if you need JavaScript components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
