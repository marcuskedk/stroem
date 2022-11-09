<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation'); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getAboutResult = api('about'); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service'); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial'); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team'); // Vi henter team dataer fra henter i api'et

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    if (isset($_GET['id'])) { 
        $getThisNewsResult = api('news/' . $_GET['id']);
        $getNewsResult = api('news'); // Vi henter nyheder dataer fra nyheder i api'et
        echo breadcrumbs(
            [
                'Forside' => ['link' => './'],
                'Nyheder' => ['link' => './news'],
                $getThisNewsResult['title'] => ['link' => NULL]
            ]
        );
    } else {
        $getNewsResult = api('news'); // Vi henter nyheder dataer fra nyheder i api'et
        echo breadcrumbs(['Forside' => ['link' => './'], 'Nyheder' => ['link' => NULL]]);
    }

?>

<section class="news-info">
    <div class="container">
        <div class="row">
            <?php if (isset($_GET['id'])) { 
                $date = date_create(substr($getThisNewsResult['received'], 0, 10));
                $day = date_format($date,"d");
                $month = date_format($date,"M");
                if ($month == "Oct") {
                    $month = "Okt";
                }
            ?>
            <div class="col-lg-8">
                <div class="card news-card border-0 shadow-sm mb-5">
                    <div class="position-relative">
                        <img src="<?=API_URL . '/images/news/' . $getThisNewsResult['image'];?>" width="100%" class="card-img-top" height="500px" alt="">
                        <div class="bookmark">
                            <span></span>
                            <span></span>
                            <span><?=$day;?></span>
                            <span><?=$month;?></span>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="mb-0"><?=count($getThisNewsResult['comments']);?> kommentar</p>
                        <h5 class="card-title"><?=$getThisNewsResult['title'];?></h5>
                        <hr>
                        <p class="card-text"><?=$getThisNewsResult['content'];?></p>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <h5>Kommentarer (<?=count($getThisNewsResult['comments']);?>)</h5>
                </div>
            </div>
            <?php } else { 
                $getNewsResult = api('news'); // Vi henter nyheder dataer fra nyheder i api'et ?>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <?php foreach ($getNewsResult as $news_key => $news_item) {
                            $date = date_create(substr($news_item['received'], 0, 10));
                            $day = date_format($date,"d");
                            $month = date_format($date,"M");
                            if ($month == "Oct") {
                                $month = "Okt";
                            } ?>
                            <div class="col-lg-6">
                                <a class="card news-card border-0 text-decoration-none text-dark shadow-sm h-100" href="./news?id=<?=$news_item['_id'];?>">
                                    <div class="position-relative">
                                        <img src="<?=API_URL . '/images/news/' . $news_item['image'];?>" width="100%" height="300px" class="card-img-top" alt="">
                                        <div class="bookmark">
                                            <span></span>
                                            <span></span>
                                            <span><?=$day;?></span>
                                            <span><?=$month;?></span>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?=$news_item['title'];?></h5>
                                        <p class="card-text"><?=(strlen($news_item['content']) > 255) ? substr($news_item['content'], 0, 255) . '...': $news_item['content'];?></p>
                                        <hr class="mt-auto">
                                        <p class="mb-0"><?=count($news_item['comments']);?> kommentar</p>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-4">
                <aside class="list-group news-sidebar">
                    <?php foreach ($getNewsResult as $news_key => $news_item) {
                        $date = date_create(substr($news_item['received'], 0, 10));
                        $day = date_format($date,"d");
                        $month = date_format($date,"M");
                        $year = date_format($date,"Y");
                        if ($month == "Oct") {
                            $month = "Okt";
                        } ?>
                        <a href="./news?id=<?=$news_item['_id'];?>" class="list-group-item list-group-item-action">
                            <div class="d-flex">
                                <div class="me-2">
                                    <img src="<?=API_URL . '/images/news/' . $news_item['image'];?>" width="80px" height="80px" alt="">
                                </div>
                                <div class="">
                                    <p class="mb-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;width:200px;"><?=$news_item['title'];?></p>
                                    <p class="mb-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;width:200px;"><?=$news_item['content'];?></p>
                                    <small class="text-muted"><?=$day;?>. <?=$month;?>. <?=$year;?></small>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>