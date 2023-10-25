<?php

include "class/universe.class.php";

require_once("controllers/universes.php");

// Not deprecated
error_reporting(E_ALL ^ E_DEPRECATED);

// Method received
$request_method = $_SERVER["REQUEST_METHOD"]; // GET / POST / PUT / DELETE

// Received data
$data = json_decode(file_get_contents('php://input'), true);

// Headers of the requests
$headers_tmp = apache_request_headers();
$headers = array();

// Remplissage des headers
foreach ($headers_tmp as $key => $value) {
    $headers[$key] = $value;
// Ajout des headers en minuscules
    $headers[strtolower($key)] = $value;
}

// URL requested
$url = isset($_GET['url']) && $_GET['url'] != "" ? $_GET['url'] : null;

// Explode the URL
$argv_tmp = explode("/", $url);
$argv = array();

// Fill up argv
foreach ($argv_tmp as $key => $value) {
    if (trim($value) != "") {
        $argv[] = $value;
    }
}

switch ($argv[0]){
    case "universes":
        UniverseController($argv, $request_method, $data, $headers);
        break;
}