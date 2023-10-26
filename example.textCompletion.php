<?php

// Create a curl post request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
curl_setopt($ch, CURLOPT_POST, true);

// Add the header Authorization with the api key
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer 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",
    "Content-Type: application/json"
));


$request = array(
    "model" => "gpt-3.5-turbo-instruct", // "text-ada-001" / "text-davinci-003"
    "temperature" =>   1,
    "max_tokens" => 256,
    "top_p" => 1,
    "frequency_penalty" => 0,
    "presence_penalty" => 0,
    "stop" => ["Human:", "AI:"],
    "prompt" => "Fais moi une description de l'univers de Star WArs"
);


// Set the body
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$result = curl_exec($ch);

// Close the request
curl_close($ch);

//print_r(json_decode($result, true));

$decodedJson = json_decode($result, true);
$textResponse = $decodedJson["choices"][0]["text"];

echo $textResponse;