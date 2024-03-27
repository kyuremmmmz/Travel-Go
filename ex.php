<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First PHP Page with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to my PHP Page with Bootstrap</h1>
        <ul>
            <li><a href="ex2.php?choice=<?php echo urlencode('Option 1');?>">Option 1</a></li>
            <li><a href="ex2.php?choice=<?php echo urlencode('Option 2');?>">Option 2</a></li>
            <li><a href="ex2.php?choice=<?php echo urlencode('Option 3');?>">Option 3</a></li>
        </ul>
    </div>

    <!-- Bootstrap JS (optional, only if you need JavaScript components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
