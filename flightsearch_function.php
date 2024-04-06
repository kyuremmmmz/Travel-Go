<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with OpenAI</title>
</head>
<body>
    <form method="post" action="">
        <label for="user_input">Enter your message:</label><br>
        <textarea id="user_input" name="user_input" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <div id="response">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_input = $_POST['user_input'];

            $payload = [
                "model" => "mixtral-8x7b",
                "messages" => [
                    [
                        "role" => "system",
                        "content" => "Your are a helpful assistant that help the users by assisting them."
                    ],
                    [
                        "role" => "user",
                        "content" => $user_input
                    ]
                ],
                "temperature" => 0.1,
                "top_p" => 0.95,
                "max_tokens" => 500,
                "use_cache" => false,
                "stream" => false
            ];

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://open-ai34.p.rapidapi.com/api/v1/chat/completions",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: open-ai34.p.rapidapi.com",
                    "X-RapidAPI-Key: fab4483496msh4513353915e775bp1d0c54jsna375bdb8381d",
                    "content-type: application/json"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $decoded_response = json_decode($response, true);
                echo "AI's response: " . $decoded_response['choices'][0]['message']['content'];
            }
        }
        ?>
    </div>
</body>
</html>
