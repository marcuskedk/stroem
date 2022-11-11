<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation', 'GET', ''); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getAboutResult = api('about', 'GET', ''); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service', 'GET', ''); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial', 'GET', ''); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team', 'GET', ''); // Vi henter team dataer fra henter i api'et
    
    $getNewsResult = api('news', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et

    $getFAQResult = api('faq', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et

    // usort er en function og her har jeg valgt at sortere efter datoer. Da vi gerne ville have de nyeste oplæg
    usort($getNewsResult, function ($a, $b) {
        return substr($a['received'], 0, 10) > substr($b['received'], 0, 10) ? -1 : 1;
    });

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    echo breadcrumbs(['Forside' => ['link' => './'], 'FAQ' => ['link' => NULL]]);

?>

<section class="faq-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="faq">
                    <?php foreach ($getFAQResult as $faq_key => $faq_item) { ?>
                        <div class="accordion-item rounded-3 mb-3">
                            <h2 class="accordion-header" id="faqHead<?=$faq_key;?>">
                                <button class="accordion-button accordion-button-item-stroem<?=($faq_key == 0) ? '' : ' collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?=$faq_key;?>" aria-expanded="<?=($faq_key == 0) ? 'true' : 'false';?>" aria-controls="faq<?=$faq_key;?>">
                                    <?=$faq_item['question'];?>
                                </button>
                            </h2>
                            <div id="faq<?=$faq_key;?>" class="accordion-collapse<?=($faq_key == 0) ? ' collapse show' : ' collapse';?>" aria-labelledby="faqHead<?=$faq_key;?>" data-bs-parent="#faq">
                                <div class="accordion-body">
                                    <?=$faq_item['answer'];?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>