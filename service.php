<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation'); // Vi henter kontakt information dataer fra kontakt information i api'et

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

    echo breadcrumbs(['Forside' => ['link' => './'], 'Service' => ['link' => NULL]]);

?>

<section class="service-info">
    <div class="container">
        <div class="row g-3" id="services">
            <div class="col-lg-3">
                <aside class="list-group">
                    <?php foreach ($getServiceResult as $service_key => $service_item) { ?>
                        <button type="button" class="list-group-item list-group-item-action list-group-item-stroem rounded-1 py-2 px-3 mb-2<?=($service_key == 0) ? '': ' collapsed';?>" data-bs-toggle="collapse" data-bs-target="#service<?=$service_key;?>" aria-expanded="true" aria-controls="service<?=$service_key;?>"><?=$service_item['title'];?></button>
                    <?php } ?>
                </aside>
            </div>
            <div class="col-lg-9">
                <?php foreach ($getServiceResult as $service_key => $service_item) { ?>
                    <div id="service<?=$service_key;?>" class="accordion-collapse collapse<?=($service_key == 0) ? ' show': '';?>" aria-labelledby="headingTwo" data-bs-parent="#services">
                        <div class="accordion-body">
                            <img src="<?=API_URL . '/images/service/' . $service_item['image'];?>" class="mb-3" width="100%" alt="">
                            <h3 class="mb-2"><?=$service_item['title'];?></h3>
                            <p class="mb-3 text-secondary"><?=$service_item['teaser'];?></p>
                            <div class="text-secondary">
                                <?=$service_item['content'];?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>