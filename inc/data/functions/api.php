<?php

    function api($endpoints = 'GET', $type = NULL, $data = NULL) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:5333/" . $endpoints,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            $response = $err;
        }
        curl_close($curl);
        $response = json_decode($response, true);
        return $response;
    }

?>