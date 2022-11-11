<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation', 'GET', ''); // Vi henter kontakt information dataer fra kontakt information i api'et

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    if (isset($_SESSION['userId'])) {
        if (isset($_GET['page']) == "service") {
            require './inc/pages/admin.dashboard.php';
        } else {
            require './inc/pages/admin.dashboard.php';
        }
    } else { 
        require './inc/pages/admin.login.php';
    }
    
    echo $_SESSION['userId'];

?>

<?php require './inc/components/Footer.php'; ?>