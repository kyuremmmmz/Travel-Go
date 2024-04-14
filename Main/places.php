<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Listings</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .hotel-list {
      display: none;
    }

    .hotel-list.active {
      display: block;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center mb-4">Hotel Listings</h1>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action" onclick="toggleHotelList('hongKongHotels')">Hong Kong</button>
        <div id="hongKongHotels" class="list-group-item hotel-list">
          <ul class="list-group">
            <li class="list-group-item">Hotel A</li>
            <li class="list-group-item">Hotel B</li>
            <li class="list-group-item">Hotel C</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and jQuery (required for Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  function toggleHotelList(hotelId) {
    const hotelList = document.getElementById(hotelId);
    hotelList.classList.toggle('active');
  }
</script>

</body>
</html>
