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
  <button id="fetchButton">Fetch Data</button>
  <div id="output">
    <pre></pre>
  </div>

  <script>
  async function fetchData() {
  const url = 'https://local-business-data.p.rapidapi.com/search-in-area?query=Airport&lat=37.359428&lng=-121.925337&zoom=13&limit=20&language=en&region=ph';
  const options = {
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': '0619543772msh81be927ff53aafcp142370jsne69313bfd2c6',
      'X-RapidAPI-Host': 'local-business-data.p.rapidapi.com'
    }
  };

  try {
    const response = await fetch(url, options);
    const data = await response.json();
    console.log(data);
  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
  }
}

fetchData(); // Call the function to initiate fetching


  </script>
</body>
</html>
