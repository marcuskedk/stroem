<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation'); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getSliderResult = api('slider', 'GET'); // Vi henter slider dataer fra slider i api'et

    $getAboutResult = api('about'); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service'); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial'); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team'); // Vi henter team dataer fra henter i api'et
    
    $getNewsResult = api('news'); // Vi henter nyheder dataer fra nyheder i api'et

    // usort er en function og her har jeg valgt at sortere efter datoer. Da vi gerne ville have de nyeste oplæg
    usort($getNewsResult, function ($a, $b) {
        return substr($a['received'], 0, 10) > substr($b['received'], 0, 10) ? -1 : 1;
    });

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    echo breadcrumbs(['Forside' => ['link' => './'], 'Kontakt' => ['link' => NULL]]);

?>



<?php require './inc/components/Footer.php'; ?>