<?php
 /*
  * curl -X POST https://clipdrop-api.co/text-to-image/v1 \
     -H 'x-api-key: YOUR_API_KEY' \
     -F 'prompt=shot of vaporwave fashion dog in miami'
     -o result.png
  * */

// Create a curl post request
$ch = curl_init();

// url
curl_setopt($ch, CURLOPT_URL, "https://clipdrop-api.co/text-to-image/v1");

// Method post
curl_setopt($ch, CURLOPT_POST, true);

// header api key in "x-api-key"
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "x-api-key:  xxxxx"
));

// multipart/form-data
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    "prompt" => "shot of vaporwave fashion dog in miami"
));

// Exec
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$result = curl_exec($ch);

// Close the request
curl_close($ch);

file_put_contents("result.png", $result);