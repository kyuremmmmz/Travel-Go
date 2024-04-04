

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Access Token</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Fetch Access Token</h1>
    <button id="fetchToken">Fetch Access Token</button>
    <div id="response"></div>

    <script>
        $(document).ready(function(){
            $("#fetchToken").click(function(){
                $.ajax({
                    url: "fetch_token.php",
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        $("#response").text("Access Token: " + response.access_token);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        $("#response").text("Error fetching access token.");
                    }
                });
            });
        });
    </script>
</body>
</html>
