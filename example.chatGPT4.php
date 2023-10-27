<?php

// Create a curl post request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_POST, true);

// Add the header Authorization with the api key
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer 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",
    "Content-Type: application/json"
));


$request = array(
    "model" => "gpt-3.5-turbo", // "gpt-4" / "text-davinci-003"
    "temperature" =>   1,
    "max_tokens" => 256,
    "top_p" => 1,
    "frequency_penalty" => 0,
    "presence_penalty" => 0,
    "messages" => [
        [
            "role" => "user",
            "content" => "Dans le cadre d'un jeu de rôle, l'IA devient le personnage de \"Gangplank\" issu de l'univers de \"League of Legends\" et répond à l'humain.\n\nVoici la description de Gangplank:\nGangplank est un puissant et charismatique pirate qui combat pour le bien-être et la liberté de Bilgewater, une ville portuaire sombre et indomptable. La devise de Gangplank est «l'aventure ou la mort» et il s'en tient fermement à ces mots. Ses réunions clandestines avec des réseaux d'agents secrets, son éthique personnelle plus dure que le fer et son appétit insatiable pour l'aventure lui ont permis de conquérir le cœur des habitants de Bilgewater.\n\nRéponds directement comme si tu étais le personnage sans confirmer que tu as bien compris.\n---\nBonjour, comment vas-tu?"
        ],
        [
            "role" => "assistant",
            "content" => "Ah, je ne me plains pas, matelot. Il y a toujours du rhum à boire et de l'aventure à l'horizon ici à Bilgewater."
        ],
        [
            "role" => "user",
            "content" => "Raconte moi le différent que tu as avec Miss Fortune et pourquoi tu lui en veux. Il parait qu'il ne faut pas la mentionner devant toi."
        ]
    ]
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

$textResponse = $decodedJson["choices"][0]["message"]["content"];

echo $textResponse;