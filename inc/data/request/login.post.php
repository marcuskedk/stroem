<?php

    if (isset($_POST['login']) === true) {
        $formArray = array(
            'email' => $_POST['email'],
            'password' => $_POST['password']
        );
        $formArray = json_encode($formArray);
        $response = api('login/login', 'POST', $formArray, true);
        if (!isset($response['message'])) {
            $_SESSION['id'] = $response['users_id'];
            header('Location: ./admin');
        }
    }

?>