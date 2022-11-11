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

    require './inc/components/Head.php'; // Head components - links, meta, scripts
    require './inc/components/Header.php'; // Header components - Header med navbar

    echo breadcrumbs(
        [
            'Forside' => ['link' => './'],
            'Kontakt os' => ['link' => NULL]
        ]
    );

?>

<section class="contact-page">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card p-4 rounded-1">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex pe-3">
                                <div class="me-3 pt-2">
                                    <img src="http://localhost:5333/images/icons/map-marker.png" width="20px" alt="">
                                </div>
                                <div class="w-100">
                                    <h5 class="mb-1">Adresse</h5>
                                    <p class="mb-0"><?=$getContactInformationResult['address'];?>, <?=$getContactInformationResult['zipcity'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 border-start border-end">
                            <div class="d-flex px-3">
                                <div class="me-3 pt-2">
                                    <img src="http://localhost:5333/images/icons/map-marker.png" width="20px" alt="">
                                </div>
                                <div class="w-100">
                                    <h5 class="mb-1">Telefon</h5>
                                    <p class="mb-0"><?=$getContactInformationResult['phone'];?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex ps-3">
                                <div class="me-3 pt-2">
                                    <img src="http://localhost:5333/images/icons/map-marker.png" width="20px" alt="">
                                </div>
                                <div class="w-100">
                                    <h5 class="mb-1">email</h5>
                                    <p class="mb-0"><?=$getContactInformationResult['email'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-8">
                <form method="POST" class="row g-3">
                    <div class="col-12">
                        <h4>Kontakt os</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam eaque illo dolor facilis et harum porro velit dolorum earum maiores necessitatibus quos similique, eveniet maxime fuga laudantium saepe corporis deleniti?</p>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Dit navn" name="name" id="name-validate" value="<?=isset($_POST['name']);?>" required>
                        <input type="email" class="form-control py-2 px-3 rounded-1 mb-3" placeholder="Din Email" name="email" id="email-validate" value="<?=isset($_POST['email']);?>" required>
                        <input type="number" class="form-control py-2 px-3 rounded-1" placeholder="Telefon nr." name="phonenumber" id="phonenumber-validate" value="<?=isset($_POST['phonenumber']);?>" required>
                    </div>
                    <div class="col-lg-6">
                        <textarea class="form-control py-2 px-3 rounded-1" cols="30" rows="6" placeholder="Din besked..." name="message" id="message-validate" required><?=isset($_POST['message']);?></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-stroem text-uppercase py-2 px-4 rounded-1">Send besked</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <!-- MAPPERT ER BLEVET HENTET FRA https://google-map-generator.com/ -->
                <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=Str%C3%B8mparken%201,%208500%20Grenaa&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:400px;width:408px;}</style><a href="https://www.embedgooglemap.net">google embed</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:408px;}</style></div></div>
            </div>
        </div>
    </div>
</section>

<?php require './inc/components/Footer.php'; ?>