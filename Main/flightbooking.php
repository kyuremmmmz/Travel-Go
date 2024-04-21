<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .booking-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: calc(100% - 20px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="booking-form">
        <h2>Flight Booking</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="fullname"><i class="fas fa-user"></i> Full Name</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone"><i class="fas fa-phone"></i> Phone Number</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address"><i class="fas fa-map-marker-alt"></i> Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="flight"><i class="fas fa-plane"></i> Flight</label>
                <input type="text" id="flight" name="flight" required>
            </div>
            <div class="form-group">
                <label for="date"><i class="far fa-calendar-alt"></i> Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="passengers"><i class="fas fa-users"></i> Passengers</label>
                <input type="number" id="passengers" name="passengers" min="1" required>
            </div>
            <div class="form-group">
                <button type="submit"><i class="fas fa-check"></i> Confirm Booking</button>
            </div>
        </form>
    </div>
</body>
</html>
