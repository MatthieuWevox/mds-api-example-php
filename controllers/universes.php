<?php

    function UniverseController($argv, $request_method, $data, $headers){
        if(isset($argv[1])){
            // Il y a quelque chose il faut gérer un univers en
            if(is_numeric($argv[1])){
                // C'est un nombre
                switch ($request_method){
                    case "GET":
                        getUniverse($argv[1]);
                        break;
                    case "PUT":
                        updateUniverse($argv[1], $data);
                        break;
                    case "DELETE":
                        deleteUniverse($argv[1]);
                        break;
                }
            }
            else{
                // return error status code 400
                http_response_code(400);
                echo json_encode(array(
                    "error" => "Bad request"
                ));
            }
        }

        if(!isset($argv[1])){
            // Il n'y a rien il faut gérer tous les univers
            switch ($request_method){
                case "GET":
                    getAllUniverses();
                    break;
                case "POST":
                    createUniverse($data);
                    break;
            }
        }
    }

function getAllUniverses(){
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=api_b3_mds", "root", "root");

        $query = "SELECT * FROM universes";
        $res = $pdo->query($query);

        $universes = array();
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $universeTmp = Universe::fromMap($row);
            $universes[] = $universeTmp->toMap();
        }

        echo json_encode($universes);
}