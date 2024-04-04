<?php
// Replace with your actual client ID and client secret
$client_id = "kOsEoNumZmE9n29k7V2P8C11fzcl5hYm";
$client_secret = "3OrWvxLxyXFsATWx";

// Prepare POST data
$postData = array(
    'grant_type' => 'client_credentials',
    'client_id' => $client_id,
    'client_secret' => $client_secret
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/security/oauth2/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if($response === false) {
    echo json_encode(array("error" => "cURL Error: " . curl_error($ch)));
} else {
    // Decode JSON response
    $responseData = json_decode($response, true);

    // Output access token
    if(isset($responseData['access_token'])) {
        echo json_encode(array("access_token" => $responseData['access_token']));
    } else {
        echo json_encode(array("error" => "Error fetching access token."));
    }
}

// Close cURL session
curl_close($ch);
?>
