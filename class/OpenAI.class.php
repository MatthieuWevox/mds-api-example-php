<?php

class OpenAI{
    // Singleton
    private static ?OpenAI $instance = null;

    private function __construct() {
        // Private constructor
    }

    public static function getInstance(): OpenAI {
        if (OpenAI::$instance == null) {
            OpenAI::$instance = new OpenAI();
        }
        return OpenAI::$instance;
    }

    function complete(string $request_body){
        // Create a curl post request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
        curl_setopt($ch, CURLOPT_POST, true);

        // Add the header Authorization with the api key
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . __OPENAI_KEY__,
            "Content-Type: application/json"
        ));


        $request = array(
            "model" => __OPENAI_MODEL__,
            "temperature" =>   __OPENAI_TEMPERATURE__,
            "max_tokens" => __OPENAI_MAX_TOKENS__,
            "top_p" => __OPENAI_TOP_P__,
            "frequency_penalty" => __OPENAI_FREQUENCY_PENALTY__,
            "presence_penalty" => __OPENAI_PRESENCE_PENALTY__,
            "stop" => __OPENAI_STOP__,
            "prompt" => $request_body
        );


        // Set the body
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $result = curl_exec($ch);

        // Close the request
        curl_close($ch);

        return json_decode($result, true);
    }
}