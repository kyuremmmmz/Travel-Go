<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <style>
   .flight-card {
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    display: flex;
    flex-direction: column;
}

.flight-info {
    padding: 20px;
    flex-grow: 1;
}

.flight-number,
.airline {
    font-weight: bold;
    margin-bottom: 10px;
}

.route {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

.route i {
    font-size: 24px;
    color: #007bff;
}

.departure,
.arrival {
    display: flex;
    align-items: center;
}

.departure i,
.arrival i {
    margin: 0 10px;
}

.departure .airport,
.arrival .airport {
    font-size: 18px;
}

.actions {
    text-align: center;
    padding: 10px;
}

.btn-book {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-book:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<div class="flight-card">
    <div class="flight-info">
        <div class="flight-number">Flight Number: PR123</div>
        <div class="airline">Philippine Airlines</div>
        <div class="route">
            <div class="departure">
                <i class="fas fa-plane-departure"></i>
                <span class="airport">NAIA</span>
            </div>
            <div class="arrival">
                <span class="airport">JFK</span>
                <i class="fas fa-plane-arrival"></i>
            </div>
        </div>
        <div class="departure-date-time">
            <div class="date">Departure Date: 2024-04-30</div>
            <div class="time">Departure Time: 08:00 AM</div>
        </div>
    </div>
    <div class="actions">
        <button class="btn-book">Book Now</button>
    </div>
</div>


</body>
</html>