<?php

    require './Config.php'; // Config - diverse indstillinger og hurtig kan ændres, hvis noget skulle ændres
    
    require './inc/data/ControllerData.php'; // ControllerData - funktioner / dataer der bliver hentet, så der ikke skal skrives flere gange

    $getContactInformationResult = api('contactinformation', 'GET', ''); // Vi henter kontakt information dataer fra kontakt information i api'et

    $getSliderResult = api('slider', 'GET', ''); // Vi henter slider dataer fra slider i api'et

    $getAboutResult = api('about', 'GET', ''); // Vi henter om os dataer fra om os i api'et

    $getServiceResult = api('service', 'GET', ''); // Vi henter service dataer fra service i api'et

    $getTestimonialResult = api('testimonial', 'GET', ''); // Vi henter testimonial dataer fra testimonial i api'et

    $getTeamResult = api('team', 'GET', ''); // Vi henter team dataer fra henter i api'et
    
    $getNewsResult = api('news', 'GET', ''); // Vi henter nyheder dataer fra nyheder i api'et

    // usort er en function og her har jeg valgt at sortere efter datoer. Da vi gerne ville have de nyeste oplæg
    usort($getNewsResult, function ($a, $b) {
        return substr($a['received'], 0, 10) > substr($b['received'], 0, 10) ? -1 : 1;
    });

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

?>

<section class="slider-section">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($getSliderResult as $slider_key => $slider_item) { ?>
                <div class="carousel-item<?=($slider_key == 0) ? ' active': '';?>" data-bs-interval="5000">
                    <div class="bg-slider"></div>
                    <img src="<?=API_URL . '/images/slider/' . $slider_item['image'];?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-flex flex-column">
                        <h2>First slide label</h2>
                        <p>Some representative placeholder content for the first slide.</p>
                        <a href="./contact" class="btn btn-stroem text-uppercase rounded-1 py-2 px-4">Kontakt os</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Tilbage</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Næste</span>
        </button>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="fs-2"><?=$getAboutResult['title'];?></h4>
                <p class="text-secondary"><?=$getAboutResult['teaser'];?></p>
                <a href="./about" class="btn btn-stroem rounded-1 text-uppercase py-2 px-4">Læs mere</a>
            </div>
        </div>
    </div>
</section>

<section class="help-section bg-onyx">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-white">
                <h4 class="fs-2">Skal du bruge <span class="text-stroem">hjælp</span> fra <span class="text-stroem">Strøm?</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <a href="./contact" class="btn btn-stroem rounded-1 text-uppercase py-2 px-4">Kontakt os</a>
            </div>
        </div>
    </div>
</section>

<section class="service-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="fs-2">Vores <span class="text-stroem">services?</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <div class="line-mark">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="row g-4">
                    <?php foreach ($getServiceResult as $service_key => $service_item) { ?>
                        <div class="col-lg-6 d-flex">
                            <div class="me-3"><i class="<?=$service_item['icon'];?> text-stroem flaticon-services"></i></div>
                            <div>
                                <a href="./service" class="text-decoration-none text-dark fs-5 fw-semi-bold mb-2 d-block"><?=$service_item['title'];?></a>
                                <p class="text-secondary"><?=(strlen($service_item['teaser']) > 155) ? substr($service_item['teaser'], 0, 155) . '...': $service_item['teaser'];?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4">
                <img src="<?=API_URL . '/images/about/1.png'?>" width="100%" alt="">
            </div>
        </div>
    </div>
</section>

<section class="book-section py-3 bg-light">
    <div class="container">
        <form class="row g-3" method="POST" id="bookForm">
            <div class="error-message"></div>
            <div class="col-lg-2">
                <p class="fw-bold fs-5 mb-0 text-stroem" style="line-height: 1;">Book</p>
                <p class="fw-bold fs-5 mb-0" style="line-height: 1;">service nu</p>
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control py-2 px-3 rounded-1" placeholder="Dit navn" name="name" id="name-validate" value="<?=isset($_POST['name']) ? $_POST['name']: '';?>" required>
            </div>
            <div class="col-lg-2">
                <input type="email" class="form-control py-2 px-3 rounded-1" placeholder="Din Email" name="email" id="email-validate" value="<?=isset($_POST['email']) ? $_POST['email']: '';?>" required>
            </div>
            <div class="col-lg-2">
                <input type="number" class="form-control py-2 px-3 rounded-1" placeholder="Telefon nr." name="phone" id="phone-validate" value="<?=isset($_POST['phone']) ? $_POST['phone']: '';?>" required>
            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-stroem rounded-1 text-uppercase py-2 px-4">Send</button>
            </div>
        </form>
    </div>
</section>

<section class="testimonial-section pb-5 bg-cultured">
    <?php require './inc/components/Testimonial.php';?>
</section>

<section class="team-section">
    <div class="container">
        <?php require './inc/components/Team.php';?>
    </div>
</section>

<section class="news-section">
    <div class="container">
        <div class="row g-3">
            <div class="col-12 text-center">
                <h4 class="fs-2">Sidste <span class="text-stroem">nyt</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur</p>
                <div class="line-mark justify-content-center">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <?php foreach ($getNewsResult as $news_key => $news_item) { 
                $date = date_create(substr($news_item['received'], 0, 10));
                $day = date_format($date,"d");
                $month = date_format($date,"M");
                if ($month == "Oct") {
                    $month = "Okt";
                }
                if ($news_key < 3) { ?>
                <div class="col-lg-4">
                    <a href="./news?id=<?=$news_item['_id'];?>" class="card news-card border-0 text-decoration-none text-dark shadow-sm">
                        <div class="position-relative">
                            <img src="<?=API_URL . '/images/news/' . $news_item['image'];?>" width="100%" height="300px" class="card-img-top" alt="">
                            <div class="bookmark">
                                <span></span>
                                <span></span>
                                <span><?=$day;?></span>
                                <span><?=$month;?></span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?=$news_item['title'];?></h5>
                            <p class="card-text mb-0"><?=(strlen($news_item['content']) > 255) ? substr($news_item['content'], 0, 255) . '...': $news_item['content'];?></p>
                        </div>
                    </a>
                </div>
            <?php } 
        } ?>
        </div>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>