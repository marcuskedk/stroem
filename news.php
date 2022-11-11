<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation', 'GET', ''); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getAboutResult = api('about', 'GET', ''); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service', 'GET', ''); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial', 'GET', ''); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team', 'GET', ''); // Vi henter team dataer fra henter i api'et
    
    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    if (isset($_GET['id'])) { 
        $getThisNewsResult = api('news/' . $_GET['id'], 'GET', '');
        $getNewsResult = api('news', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et
        echo breadcrumbs(
            [
                'Forside' => ['link' => './'],
                'Nyheder' => ['link' => './news'],
                $getThisNewsResult['title'] => ['link' => NULL]
            ]
        );
    } else {
        $getNewsResult = api('news', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et
        echo breadcrumbs(
            [
                'Forside' => ['link' => './'],
                'Nyheder' => ['link' => NULL]
            ]
        );
    }

    usort($getNewsResult, function ($a, $b) {
        return substr($a['received'], 0, 10) > substr($b['received'], 0, 10) ? -1 : 1;
    });

?>

<section class="news-page">
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
                    <?php foreach ($getThisNewsResult['comments'] as $comments_key => $comments_item) {
                        $date = date_create(substr($comments_item['received'], 0, 10));
                        $day = date_format($date,"d");
                        $month = date_format($date,"M");
                        $year = date_format($date,"Y");
                        if ($month == "Oct") {
                            $month = "Okt";
                        } ?>
                        <div class="p-4">
                            <div class="comments">
                                <p class="fw-semi-bold fs-5 mb-1"><?=$comments_item['name'];?></p>
                                <p class="text-muted fw-semi-bold"><?=$day;?>. <?=$month;?>. <?=$year;?></p>
                                <p class="text-secondary"><?=$comments_item['comment'];?></p>
                            </div>
                        </div>
                    <?php } ?>
                    <hr>
                    <h5>Skriv en kommentar</h5>
                    <form method="POST" class="row g-3">
                        <div class="col-lg-6">
                            <input type="text" class="form-control py-2 px-3 rounded-1" placeholder="Navn" name="name" id="name-validate" value="<?=(isset($_POST['name'])) ? $_POST['name'] : '';?>" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="email" class="form-control py-2 px-3 rounded-1" placeholder="Email" name="email" id="email-validate" value="<?=(isset($_POST['email'])) ? $_POST['email'] : '';?>" required>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control py-2 px-3 rounded-1" cols="30" rows="6" placeholder="Kommentar" name="comment" id="comment-validate" required><?=(isset($_POST['comment'])) ? $_POST['comment'] : '';?></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1" name="send_comment">Send besked</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php } else { ?>
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
                    <h4>Arkiv</h4>
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