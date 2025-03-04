<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search</title>
    <style>
        .hotel-details {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .hotel-details img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<input type="text" id="searchInput" placeholder="Enter location...">
<button id="searchButton">Search</button>
<div id="resultsContainer"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchButton').click(function() {
            var searchValue = $('#searchInput').val().trim();
            var resultsContainer = $('#resultsContainer');

            $.ajax({
                url: 'hotelsearch.php',
                type: 'POST',
                data: { searchValue: searchValue },
                success: function(response) {
                    resultsContainer.html(response);
                },
                error: function() {
                    resultsContainer.html('Error fetching hotel details.');
                }
            });
        });
    });
</script>

</body>
</html>


<?php

if(isset($_POST['searchValue'])) {
    $searchValue = $_POST['searchValue'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://booking-com.p.rapidapi.com/v1/hotels/locations?name={$searchValue}&locale=en-gb",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: booking-com.p.rapidapi.com",
            "X-RapidAPI-Key: fab4483496msh4513353915e775bp1d0c54jsna375bdb8381d"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $hotelLocations = json_decode($response, true);

        if ($hotelLocations) {
            foreach ($hotelLocations as $location) {
                echo "<div class='hotel-details'>";
                echo "<h2>{$location['name']}</h2>";
                echo "<img src='{$location['image_url']}' alt='Hotel Image'>";
                echo "<p>{$location['label']}</p>";
                echo "</div>";
            }
        } else {
            echo "No hotel locations found.";
        }
    }
}

?>
