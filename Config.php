<?php

    ob_start();
    session_start();
    date_default_timezone_set('Europe/Copenhagen');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'http://localhost:27017/stroem');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    echo json_decode($response);
    echo json_encode($response);

?>