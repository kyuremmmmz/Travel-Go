<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetch API Data</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
    }
    pre {
      background-color: #f4f4f4;
      padding: 10px;
      border-radius: 5px;
      overflow-x: auto;
    }
  </style>
</head>
<body>
  <h1>Fetch API Data</h1>
  <input type="text" id="fetch-text">
  <button id="fetchButton">Fetch Data</button>
  <div id="text">
    
  </div>


  <script type="text/javascript">
 // Define the fetchData function
// Define the fetchData function
async function fetchData() {
    var searchQuery = document.getElementById("fetch-text").value;

    const url = 'https://local-business-data.p.rapidapi.com/search';
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-RapidAPI-Key': 'fab4483496msh4513353915e775bp1d0c54jsna375bdb8381d',
            'X-RapidAPI-Host': 'local-business-data.p.rapidapi.com'
        },
        body: JSON.stringify({
            queries: [
                `${searchQuery}`,
                `${searchQuery}`,
                `${searchQuery}`
            ],
            limit: 2,
            region: 'ph',
            language: 'en',
            coordinates: '38.447030, -101.547385',
            zoom: 13,
            dedup: true
        })
    };

    try {
        const response = await fetch(url, options);
        const result = await response.json();
        console.log(result);

        // Access photo URLs
        const data = result.data;
        data.forEach(item => {
            if (item.photos_sample && item.photos_sample.length > 0) {
                const photoUrl = item.photos_sample[0].photo_url;
                console.log(photoUrl);
            } else {
                console.log("No photos available for this item.");
            }
        });
    } catch (error) {
        console.error(error);
    }
}

// Attach event listener to the fetch button
document.getElementById("fetchButton").addEventListener("click", fetchData);

   
</script>

   

</body>
</html>
