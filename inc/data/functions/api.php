<?php

    function api($endpoints = NULL, $type = 'GET', $data = NULL, $returnTransfer = NULL) {
        ($returnTransfer == null) ? $returnTransfer = ($type == 'GET') ? true : false : $returnTransfer = $returnTransfer;
        $ContentType = ($type == 'GET') ? 'application/x-www-form-urlencoded' : 'application/json';
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://localhost:5333/" . $endpoints,
            CURLOPT_RETURNTRANSFER => $returnTransfer,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                'Content-Type: ' . $ContentType
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            $response = "Fejl";
        } else {
            $response = json_decode($response, true);
        }
        curl_close($curl);
        return $response;
    }

?>