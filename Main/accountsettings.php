<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - Travel Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
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
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Account Settings</h1>
    
    <!-- Profile Information -->
    <section>
        <h2>Profile Information</h2>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
            <!-- Add other profile fields here -->
            <button type="submit">Save</button>
        </form>
    </section>

    <!-- Travel Preferences -->
    <section>
        <h2>Travel Preferences</h2>
        <form>
            <label for="travel-style">Travel Style:</label>
            <select id="travel-style" name="travel-style">
                <option value="solo">Solo Travel</option>
                <option value="family">Family Travel</option>
                <option value="adventure">Adventure Travel</option>
                <option value="luxury">Luxury Travel</option>
            </select><br>
            <label for="favorite-destinations">Favorite Destinations:</label>
            <input type="text" id="favorite-destinations" name="favorite-destinations"><br>
            <button type="submit">Save</button>
        </form>
    </section>

    <!-- Booking History -->
    <section>
        <h2>Booking History</h2>
        <!-- Display booking history here -->
        <p>No bookings found.</p>
    </section>

    <!-- Notification Settings -->
    <section>
        <h2>Notification Settings</h2>
        <form>
            <input type="checkbox" id="email-notifications" name="email-notifications">
            <label for="email-notifications">Receive Email Notifications</label><br>
            <input type="checkbox" id="push-notifications" name="push-notifications">
            <label for="push-notifications">Receive Push Notifications</label><br>
            <button type="submit">Save</button>
        </form>
    </section>

    <!-- Account Deactivation/Deletion -->
    <section>
        <h2>Account Deactivation/Deletion</h2>
        <form>
            <button type="button">Deactivate Account</button>
            <button type="button">Delete Account</button>
        </form>
    </section>

    <!-- Help and Support -->
    <section>
        <h2>Help and Support</h2>
        <p>If you need further assistance, please contact our support team at support@example.com</p>
    </section>
</body>
</html>
