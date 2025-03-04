<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking Form</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.heading {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="datetime-local"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px top 50%;
    background-size: 24px auto;
}

button {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Book Your Flight</h1>
        <form>
            <div class="form-group">
                <label for="flightNumber">Flight Number</label>
                <input type="text" id="flightNumber" name="flightNumber" required>
            </div>
            <div class="form-group">
                <label for="departureAirport">Departure Airport</label>
                <input type="text" id="departureAirport" name="departureAirport" required>
            </div>
            <div class="form-group">
                <label for="arrivalAirport">Arrival Airport</label>
                <input type="text" id="arrivalAirport" name="arrivalAirport" required>
            </div>
            <div class="form-group">
                <label for="departureTime">Departure Time</label>
                <input type="datetime-local" id="departureTime" name="departureTime" required>
            </div>
            <div class="form-group">
                <label for="arrivalTime">Arrival Time</label>
                <input type="datetime-local" id="arrivalTime" name="arrivalTime" required>
            </div>
            <div class="form-group">
                <label for="airline">Airline</label>
                <input type="text" id="airline" name="airline" required>
            </div>
            <div class="form-group">
                <label for="flightDuration">Flight Duration</label>
                <input type="text" id="flightDuration" name="flightDuration" required>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select id="class" name="class" required>
                    <option value="">Select Class</option>
                    <option value="Economy">Economy</option>
                    <option value="Premium Economy">Premium Economy</option>
                    <option value="Business">Business</option>
                    <option value="First Class">First Class</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ticketPrice">Ticket Price (PHP)</label>
                <input type="number" id="ticketPrice" name="ticketPrice" required>
            </div>
            <button type="submit">Book Now</button>
        </form>
    </div>
</body>
</html>
