<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation', 'GET', ''); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getAboutResult = api('about', 'GET', ''); // Vi henter om os dataer fra om os i api'et

    $getSliderResult = api('slider', 'GET', ''); // Vi henter slider dataer fra slider i api'et

    $getServiceResult = api('service', 'GET', ''); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial', 'GET', ''); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team', 'GET', ''); // Vi henter team dataer fra henter i api'et
    
    $getNewsResult = api('news', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et

    (isset($_SESSION['id'])) ? $getUserInformationResult = api('user/admin/' . $_SESSION['id'], 'GET', '') : ''; // Vi henter kontakt information dataer fra kontakt information i api'et

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    if (isset($_SESSION['id'])) {
        if (!isset($_GET['page']) || !$_GET['page']) {
            require './inc/pages/admin.dashboard.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "about") {
            require './inc/pages/admin.about.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "booking") {
            require './inc/pages/admin.booking.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "contact") {
            require './inc/pages/admin.contact.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "news") {
            require './inc/pages/admin.news.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "service") {
            require './inc/pages/admin.dashboard.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "account") {
            require './inc/pages/admin.account.php';
        } else if (isset($_GET['page']) && $_GET['page'] == "logout") {
            session_destroy();
            header('Location: ./admin');
        } else {
            require './inc/pages/admin.notapage.php';
        }
    } else { 
        require './inc/pages/admin.login.php';
    }

?>

<?php require './inc/components/Footer.php'; ?>