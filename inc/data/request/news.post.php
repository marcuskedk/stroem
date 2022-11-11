<?php

    if (isset($_POST['send_comment']) === true) {
        $formArray = array(
            'name' => $_POST['name'],
            'comment' => $_POST['comment']
        );
        $formArray = json_encode($formArray);
        $response = api('news/comment/' . $_GET['id'], 'POST', $formArray, true);
        header('Location: ./news?id=' . $_GET['id']);
    }

?>