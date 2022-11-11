<?php

    ob_start();
    session_start();
    date_default_timezone_set('Europe/Copenhagen');
    header("Access-Control-Allow-Origin: *");

    define('URL', 'http://localhost');
    define('API_URL', 'http://localhost:5333');

?>