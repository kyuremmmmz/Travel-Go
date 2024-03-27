<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom dark theme */
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 20px;
            background-color: #212529;
            color: #ffffff;
        }

        .content {
            margin-left: 250px; /* Same as sidebar width */
            padding: 20px;
            background-color: #454d55;
            min-height: 100vh;
        }

        .nav-link {
            color: #ffffff;
        }

        .nav-link.active {
            background-color: #007bff;
        }

        

        .nav-link:hover {
            background-color: #0069d9;
        }

        .nav-item.active{
         background-color: #007bff;

        }
        .logo {
            width: 50px; /* Adjust width as needed */
            height: 50px; /* Adjust height as needed */
            margin-bottom: 20px; /* Add some space below the logo */
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <img class="logo" src="path/to/your/logo.png" alt="Logo"> <!-- Add your logo image -->
        <h2>Dashboard</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Analytics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notificaiton.php">Users Messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Analytics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Analytics</a>
            </li>
        </ul>
    </div>

    <!-- Main content area -->
    <div id="messages" class="content">
        <h2>Welcome to the Messages</h2>
        <p>This is the messages area of the dashboard.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
