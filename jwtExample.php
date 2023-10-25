<?php
    include "vendor/autoload.php";

    use \Firebase\JWT\JWT;

    $secretKey = "fkldjqhflkdjsqhfhlkl";

    $payload = array(
        "id" => 34,
        "name" => "Matthieu",
        "email" => "mgeiss@wevox.eu"
    );

    $token = JWT::encode($payload, $secretKey, 'HS256');

    echo $token;