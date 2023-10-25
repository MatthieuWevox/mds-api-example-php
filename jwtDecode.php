<?php

include "vendor/autoload.php";

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;


$secretKey = "fkldjqhflkdjsqhfhlkl";

$token  = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MzQsIm5hbWUiOiJNYXR0aGlldSIsImVtYWlsIjoibWdlaXNzQHdldm94LmV1In0.c_ZYkQR8Ive_LkTnh1cGFPZS9GjUgSEY3w_zEsyItUQ%";

$payload = JWT::decode($token, new Key($secretKey, 'HS256'));

print_r($payload);